<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Helpers\EmailHelper
 * 📂 Physical File:   includes/helpers/EmailHelper.php
 * 
 * 📝 Description:
 * Helper class for sending emails using PHPMailer (SMTP) or Resend (HTTPS API).
 * Resend avoids blocked SMTP ports on hosts like Railway Hobby.
 *
 * 🔗 Dependencies:
 * - PHPMailer, resend/resend-php (via Composer)
 */

// Cargamos el autoloader de Composer para poder usar PHPMailer
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;
use Resend\Exceptions\ErrorException as ResendApiException;

class EmailHelper
{
    /**
     * Carga .env una vez por petición (Railway inyecta vars sin .env).
     */
    private static function loadEnv(): void
    {
        static $loaded = false;
        if ($loaded) {
            return;
        }
        $loaded = true;
        try {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
            $dotenv->safeLoad();
        } catch (Exception $e) {
            error_log('Warning: Error parsing .env file: ' . $e->getMessage());
        }
    }

    /** Clave API Resend (sin espacios; Railway a veces añade saltos de línea al pegar). */
    private static function getResendApiKey(): string
    {
        $key = getenv('RESEND_API_KEY');
        if (!is_string($key)) {
            return '';
        }
        return trim($key);
    }

    /** Prioridad: API Resend (HTTPS :443) si hay RESEND_API_KEY; si no, SMTP (local, etc.). */
    private static function useResend(): bool
    {
        return self::getResendApiKey() !== '';
    }

    /**
     * Cabecera From para Resend: RESEND_FROM o "Nombre <correo>" desde SMTP_*.
     */
    private static function resendFromAddress(): string
    {
        $raw = getenv('RESEND_FROM');
        if (is_string($raw) && trim($raw) !== '') {
            return trim($raw);
        }
        $email = getenv('SMTP_FROM_EMAIL') ?: '';
        $name = getenv('SMTP_FROM_NAME') ?: 'Arcadia Zoo';
        if ($email === '') {
            return '';
        }
        return $name . ' <' . $email . '>';
    }

    /**
     * @param array{from: string, to: string|string[], subject: string, html: string, text?: string, reply_to?: string|string[]} $params
     * @return array{success: bool, message: string}
     */
    private static function sendViaResend(array $params): array
    {
        try {
            $client = \Resend::client(self::getResendApiKey());
            $client->emails->send($params);
            return ['success' => true, 'message' => 'Email enviado vía Resend'];
        } catch (ResendApiException $e) {
            error_log('Resend API: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Resend: ' . $e->getMessage(),
            ];
        } catch (\Throwable $e) {
            error_log('Resend error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error al enviar con Resend: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Configura y retorna una instancia de PHPMailer lista para usar
     * 
     * Este método se encarga de configurar todas las opciones necesarias
     * para enviar emails: servidor SMTP, autenticación, etc.
     * 
     * @return PHPMailer Una instancia configurada de PHPMailer
     * @throws Exception Si hay un error al configurar PHPMailer
     */
    private static function getMailer()
    {
        // Create a new PHPMailer instance
        // true as parameter enables exception handling
        $mail = new PHPMailer(true);

        try {
            self::loadEnv();

            // configure the SMTP server
    // SMTP is the protocol used to send emails
            $mail->isSMTP();
            
            // SMTP server address (e.g., smtp.gmail.com, smtp.outlook.com)
            // getenv() reads the variables injected by Railway/process; $_ENV may be empty in production
            $mail->Host = getenv('SMTP_HOST') ?: 'localhost';
            
            // Enable SMTP authentication (required for most servers)
            $mail->SMTPAuth = true;
            
            // Username to authenticate with the SMTP server
            $mail->Username = getenv('SMTP_USER') ?: '';
            
            // Password to authenticate with the SMTP server
            $mail->Password = getenv('SMTP_PASS') ?: '';
            
            // Encryption type (TLS or SSL)
            // TLS is more modern and secure than SSL
            // In .env you can use: 'tls', 'ssl', or leave empty
            $smtpSecure = getenv('SMTP_SECURE') ?: 'tls';
            if ($smtpSecure === 'tls') {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            } elseif ($smtpSecure === 'ssl') {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            } else {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Default TLS
            }
            
            // Puerto del servidor SMTP
            // 587 is the standard port for TLS, 465 for SSL
            // $mail->Port = getenv('SMTP_PORT') ?: 587;
            // 465 for SSL (SMTPS); alternativamente 587 for TLS (STARTTLS)
            $mail->Port = getenv('SMTP_PORT') ?: 465;
            // $mail->Port = getenv('SMTP_PORT') ?: 587;

            // Evita cuelgues largos (p. ej. Railway Hobby bloquea SMTP → sin esto PHPMailer usa 300 s).
            $timeout = (int) (getenv('SMTP_TIMEOUT') ?: 20);
            $mail->Timeout = max(5, min(120, $timeout));
            
            // Character encoding (UTF-8 supports all languages)
            $mail->CharSet = 'UTF-8';
            
            // Email from which it is sent (sender)
            $mail->setFrom(getenv('SMTP_FROM_EMAIL') ?: 'noreply@arcadia-zoo.com', getenv('SMTP_FROM_NAME') ?: 'Arcadia Zoo');
            
            // In development mode, we can disable SSL verification
            // ⚠️ IMPORTANT: In production, this must be false for security
            if ((getenv('APP_ENV') ?: '') === 'development') {
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
            }

        } catch (Exception $e) {
            // If there is an error, log it and throw the exception
            error_log("Error configurando PHPMailer: " . $e->getMessage());
            throw $e; 
        }

        return $mail;
    }

    /**
     * Verifica si la configuración de email está completa
     * 
     * Este método valida que todas las variables de entorno necesarias
     * estén configuradas antes de intentar enviar un email.
     * 
     * @return array ['valid' => bool, 'message' => string] 
     *               Indica si la configuración es válida y un mensaje descriptivo
     */
    private static function validateEmailConfig()
    {
        self::loadEnv();

        if (self::useResend()) {
            if (self::getResendApiKey() === '') {
                return ['valid' => false, 'message' => 'RESEND_API_KEY vacío.'];
            }
            $from = self::resendFromAddress();
            if ($from === '') {
                return [
                    'valid' => false,
                    'message' => 'Configura RESEND_FROM (ej. Arcadia <onboarding@resend.dev>) o SMTP_FROM_EMAIL para el remitente Resend.',
                ];
            }
            return ['valid' => true, 'message' => 'Resend OK'];
        }

        $requiredVars = [
            'SMTP_HOST' => 'Servidor SMTP',
            'SMTP_USER' => 'Usuario SMTP',
            'SMTP_PASS' => 'Contraseña SMTP',
            'SMTP_FROM_EMAIL' => 'Email remitente',
        ];

        $missing = [];
        foreach ($requiredVars as $var => $description) {
            if (empty(getenv($var))) {
                $missing[] = $description . " ({$var})";
            }
        }

        if (!empty($missing)) {
            return [
                'valid' => false,
                'message' => 'Configuración SMTP incompleta. Faltan: ' . implode(', ', $missing) .
                    '. O define RESEND_API_KEY (+ RESEND_FROM) para usar la API Resend (HTTPS).',
            ];
        }

        return ['valid' => true, 'message' => 'Configuración válida'];
    }

    /**
     * Envía un email informativo cuando se crea una nueva cuenta de usuario
     * 
     * Según el enunciado del TP, cuando el administrador crea una cuenta,
     * se debe enviar un email al usuario con su username (pero NO el password).
     * El password debe ser entregado en persona por el administrador.
     * 
     * @param string $toEmail Email del destinatario (el nuevo usuario)
     * @param string $username Username que se le asignó al usuario
     * @param string $roleName Nombre del rol asignado (ej: "Employé", "Vétérinaire")
     * @return array ['success' => bool, 'message' => string] 
     *               Indica si el email se envió y un mensaje descriptivo
     */
    public static function sendAccountCreationEmail($toEmail, $username, $roleName)
    {
        // STEP 1: VALIDATE CONFIGURATION
        // Before attempting to send, verify that the configuration is complete
        $configCheck = self::validateEmailConfig();
        if (!$configCheck['valid']) {
            // If configuration is invalid, log error and return false
            error_log("Error en configuración de email: " . $configCheck['message']);
            return ['success' => false, 'message' => $configCheck['message']];
        }

        $subject = 'Bienvenue à Arcadia Zoo - Votre compte a été créé';
        $htmlBody = "
                <html>
                <head>
                    <style>
                        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                        .header { background-color: #2d5016; color: white; padding: 20px; text-align: center; }
                        .content { padding: 20px; background-color: #f9f9f9; }
                        .info-box { background-color: #e8f5e9; border-left: 4px solid #2d5016; padding: 15px; margin: 20px 0; }
                        .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            <h1>🦁 Arcadia Zoo</h1>
                        </div>
                        <div class='content'>
                            <h2>Bienvenue dans l'équipe !</h2>
                            <p>Votre compte a été créé avec succès par l'administrateur.</p>
                            
                            <div class='info-box'>
                                <p><strong>Votre nom d'utilisateur :</strong> {$username}</p>
                                <p><strong>Votre rôle :</strong> {$roleName}</p>
                            </div>
                            
                            <p><strong>Important :</strong> Pour obtenir votre mot de passe, veuillez vous rapprocher de l'administrateur.</p>
                            
                            <p>Vous pouvez maintenant vous connecter à l'application en utilisant votre nom d'utilisateur.</p>
                        </div>
                        <div class='footer'>
                            <p>Arcadia Zoo - Depuis 1960</p>
                            <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
                        </div>
                    </div>
                </body>
                </html>
            ";

        $altBody = "Bienvenue à Arcadia Zoo\n\n" .
                           "Votre compte a été créé avec succès.\n\n" .
                           "Nom d'utilisateur : {$username}\n" .
                           "Rôle : {$roleName}\n\n" .
                           "Important : Pour obtenir votre mot de passe, veuillez vous rapprocher de l'administrateur.\n\n" .
                           "Arcadia Zoo - Depuis 1960";

        if (self::useResend()) {
            $res = self::sendViaResend([
                'from' => self::resendFromAddress(),
                'to' => [$toEmail],
                'subject' => $subject,
                'html' => $htmlBody,
                'text' => $altBody,
            ]);
            if ($res['success']) {
                $res['message'] = 'Email enviado exitosamente a: ' . $toEmail;
            }
            return $res;
        }

        try {
            $mail = self::getMailer();
            $mail->addAddress($toEmail);
            $mail->Subject = $subject;
            $mail->isHTML(true);
            $mail->Body = $htmlBody;
            $mail->AltBody = $altBody;
            $mail->send();

            return ['success' => true, 'message' => 'Email enviado exitosamente a: ' . $toEmail];

        } catch (Exception $e) {
            $errorMessage = "Error enviando email de creación de cuenta a {$toEmail}: " . $e->getMessage();
            error_log($errorMessage);
            
            error_log("Detalles del error: " . print_r([
                'to' => $toEmail,
                'username' => $username,
                'smtp_host' => getenv('SMTP_HOST') ?: 'no configurado',
                'smtp_user' => getenv('SMTP_USER') ?: 'no configurado',
                'error' => $e->getMessage()
            ], true));
            
            return [
                'success' => false, 
                'message' => 'Error al enviar email: ' . $e->getMessage() . 
                           '. Verifica SMTP o Resend en .env / variables del servidor'
            ];
        }
    }

    /**
     * Envía un email al zoo cuando un visitante envía el formulario de contacto
     * 
     * Este método envía un email al zoo con los datos del formulario de contacto
     * para que el empleado pueda responder directamente por email.
     * 
     * @param string $toEmail - Email del zoo (destinatario)
     * @param string $firstName - Nombre del visitante
     * @param string $lastName - Apellido del visitante
     * @param string $visitorEmail - Email del visitante (para responder)
     * @param string $subject - Asunto del mensaje
     * @param string $message - Mensaje del visitante
     * @return array - Array con 'success' (bool) y 'message' (string)
     */
    public static function sendContactFormEmail($toEmail, $firstName, $lastName, $visitorEmail, $subject, $message)
    {
        $configCheck = self::validateEmailConfig();
        if (!$configCheck['valid']) {
            error_log('Error en configuración de email (contacto): ' . $configCheck['message']);
            return ['success' => false, 'message' => $configCheck['message']];
        }

        $emailSubject = 'Nouveau message de contact - ' . htmlspecialchars($subject);
        $htmlBody = "
                <html>
                <head>
                    <style>
                        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                        .header { background-color: #2d5016; color: white; padding: 20px; text-align: center; }
                        .content { padding: 20px; background-color: #f9f9f9; }
                        .info-box { background-color: #e8f5e9; border-left: 4px solid #2d5016; padding: 15px; margin: 20px 0; }
                        .message-box { background-color: white; border: 1px solid #ddd; padding: 15px; margin: 20px 0; border-radius: 5px; }
                        .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
                        .reply-note { background-color: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0; }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            <h1>🦁 Arcadia Zoo - Nouveau message de contact</h1>
                        </div>
                        <div class='content'>
                            <h2>Vous avez reçu un nouveau message de contact</h2>
                            
                            <div class='info-box'>
                                <p><strong>De :</strong> " . htmlspecialchars($firstName) . " " . htmlspecialchars($lastName) . "</p>
                                <p><strong>Email :</strong> <a href='mailto:" . htmlspecialchars($visitorEmail) . "'>" . htmlspecialchars($visitorEmail) . "</a></p>
                                <p><strong>Sujet :</strong> " . htmlspecialchars($subject) . "</p>
                                <p><strong>Date :</strong> " . date('d/m/Y à H:i') . "</p>
                            </div>
                            
                            <div class='message-box'>
                                <h3>Message :</h3>
                                <p>" . nl2br(htmlspecialchars($message)) . "</p>
                            </div>
                            
                            <div class='reply-note'>
                                <p><strong>💡 Pour répondre :</strong> Utilisez simplement le bouton \"Répondre\" de votre client de messagerie. 
                                L'email sera automatiquement envoyé à " . htmlspecialchars($visitorEmail) . "</p>
                            </div>
                        </div>
                        <div class='footer'>
                            <p>Arcadia Zoo - Depuis 1960</p>
                            <p>Cet email a été envoyé automatiquement depuis le formulaire de contact du site web.</p>
                        </div>
                    </div>
                </body>
                </html>
            ";

        $altBody = "Nouveau message de contact - Arcadia Zoo\n\n" .
                           "De : " . htmlspecialchars($firstName) . " " . htmlspecialchars($lastName) . "\n" .
                           "Email : " . htmlspecialchars($visitorEmail) . "\n" .
                           "Sujet : " . htmlspecialchars($subject) . "\n" .
                           "Date : " . date('d/m/Y à H:i') . "\n\n" .
                           "Message :\n" . htmlspecialchars($message) . "\n\n" .
                           "Pour répondre, utilisez simplement le bouton \"Répondre\" de votre client de messagerie.\n\n" .
                           "Arcadia Zoo - Depuis 1960";

        if (self::useResend()) {
            return self::sendViaResend([
                'from' => self::resendFromAddress(),
                'to' => [$toEmail],
                'subject' => $emailSubject,
                'html' => $htmlBody,
                'text' => $altBody,
                'reply_to' => $visitorEmail,
            ]);
        }

        try {
            $mail = self::getMailer();
            $mail->addAddress($toEmail);
            $mail->Subject = $emailSubject;
            $mail->addReplyTo($visitorEmail, $firstName . ' ' . $lastName);
            $mail->isHTML(true);
            $mail->Body = $htmlBody;
            $mail->AltBody = $altBody;
            $mail->send();

            return ['success' => true, 'message' => 'Email enviado exitosamente al zoo'];

        } catch (Exception $e) {
            $errorMessage = "Error enviando email de contacto al zoo: " . $e->getMessage();
            error_log($errorMessage);

            error_log("Detalles del error: " . print_r([
                'to' => $toEmail,
                'visitor_email' => $visitorEmail,
                'subject' => $subject,
                'smtp_host' => getenv('SMTP_HOST') ?: 'no configurado',
                'error' => $e->getMessage()
            ], true));

            return [
                'success' => false,
                'message' => 'Error al enviar email: ' . $e->getMessage() .
                           '. Verifica SMTP o Resend en .env / variables del servidor',
            ];
        }
    }
}

