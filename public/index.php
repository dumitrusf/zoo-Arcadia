<?php
// _router.php → "El Portero" del sitio web

// 0. CARGAR LAS HERRAMIENTAS (¡NUEVO!)
require_once __DIR__ . '/../vendor/autoload.php';      // Carga las librerías
require_once __DIR__ . '/../database/connection.php';  // Carga la BD y config.php
require_once __DIR__ . '/../includes/functions.php';   // Carga tus funciones

// ==========================================
// DEBUG: LOG MANUAL EN CONSOLA PHP
// Escribimos en php://stdout para que salga en la terminal verde
// $logMsg = sprintf("[%s] %s %s\n", date("D M j H:i:s Y"), $_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
// file_put_contents("php://stdout", $logMsg);
// ==========================================

// 1. OBTENER EL CAMINO (PATH) DE LA URL SOLICITADA
$path = ltrim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

// 3. MÁGIA PARA SERVIR ARCHIVOS ESTÁTICOS (CSS, JS, IMÁGENES) SI ESTÁN FUERA DE PUBLIC
// Si la URL empieza por "node_modules", "src" o "public", intentamos servir el archivo directamente.
if (strpos($path, 'public/') === 0 || strpos($path, 'src/') === 0 || strpos($path, 'node_modules/') === 0) {
    $fullPath = __DIR__ . '/../' . $path; // Buscamos en la raíz del proyecto
    
    if (file_exists($fullPath) && is_file($fullPath)) {
        // Adivinamos el tipo de archivo (MIME type)
        $ext = pathinfo($fullPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'css':  header('Content-Type: text/css'); break;
            case 'js':   header('Content-Type: application/javascript'); break;
            case 'png':  header('Content-Type: image/png'); break;
            case 'jpg':  header('Content-Type: image/jpeg'); break;
            case 'svg':  header('Content-Type: image/svg+xml'); break;
            case 'ttf':  header('Content-Type: font/ttf'); break;
            case 'woff': header('Content-Type: font/woff'); break;
            case 'woff2':header('Content-Type: font/woff2'); break;
        }
        readfile($fullPath);
        exit; // ¡Importante! Terminamos aquí para no cargar el router de la App
    }
}


// 4. COMPROBAR SI EL PATH CORRESPONDE A UN ARCHIVO REAL DENTRO DE PUBLIC
if (file_exists($path) && is_file($path)) {
    return false; // 🚪 Salida directa, el archivo se entrega sin pasar por el router.
}

// 5. SI NO ES UN ARCHIVO, INTERPRETARLO COMO "URL BONITA"
$parts = explode('/', $path);

// 6. ASIGNAR SEGMENTOS
$_GET['domain'] = !empty($parts[0]) ? $parts[0] : 'home';
$_GET['controller'] = !empty($parts[1]) ? $parts[1] : 'pages';
$_GET['action'] = !empty($parts[2]) ? $parts[2] : 'index';

// 7. CARGAR EL ENRUTADOR PRINCIPAL
require_once __DIR__ . '/../App/router.php';
?>