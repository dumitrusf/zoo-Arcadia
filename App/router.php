<?php
// App/router.php (El Guardia Central)

$domain = $_GET["domain"] ?? "home";

// --- COMENTARIO D: LISTA DE INVITADOS (SEGURIDAD) ---
// La única responsabilidad de este archivo es la seguridad y la delegación de alto nivel.
// Mantiene una "lista blanca" de dominios que existen. Si un dominio no está aquí, es rechazado.
$allowed_domains = [ "home", "animals", "employees", "habitats", "permissions", "reports", "roles", "schedules", "testimonials", "users"];

if (in_array($domain, $allowed_domains)) {
    
    // --- COMENTARIO E: DELEGACIÓN A EXPERTOS ---
    // ¡Esta es la clave de la arquitectura!
    // El Guardia Central NO SABE NADA sobre cómo funciona el dominio `employees`.
    // Su único trabajo es decir: "Ah, es para `employees`... pues que se encargue el experto de `employees`".
    // Le pasa el control total al "Recepcionista" de ese dominio.
    $domainRouterPath = __DIR__ . "/{$domain}/{$domain}Router.php";

    if (file_exists($domainRouterPath)) {
        require_once $domainRouterPath;
    } else {
        // ERROR 500: El dominio está en la lista, pero no hemos creado su archivo router.
        // Esto es un error nuestro (de los programadores), no del usuario.
        http_response_code(500); 
        // Por ahora, lo mandamos al 404 para no confundir al usuario.
        // En un futuro, podríamos crear una página `error-500.php`.
        header('Location: /public/error');
        exit();
    }
} else {
    // ERROR 404: El dominio que ha pedido el usuario no existe en nuestra lista.
    http_response_code(404);
    header('Location: /public/error');
    exit();
}
?>