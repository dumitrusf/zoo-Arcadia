<?php
/**
 * Configuración de Base de Datos
 * 
 * Lee variables de entorno usando getenv() y $_SERVER (más confiable en Apache/Docker).
 * Si no existen, usa valores por defecto para desarrollo local.
 */

// Cargar variables de entorno desde .env si existe (solo en local)
if (file_exists(__DIR__ . '/.env')) {
    require_once __DIR__ . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();
}

// Helper function para leer variables de forma robusta
function env($key, $default = null) {
    // Prioridad: 1. getenv() -> 2. $_SERVER -> 3. $_ENV -> 4. default
    $value = getenv($key);
    if ($value !== false && $value !== '') {
        return $value;
    }
    
    if (isset($_SERVER[$key]) && $_SERVER[$key] !== '') {
        return $_SERVER[$key];
    }
    
    if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
        return $_ENV[$key];
    }
    
    return $default;
}

// Configuración de Base de Datos
define('DB_HOST', env('DB_HOST', 'localhost'));
define('DB_PORT', env('DB_PORT', 3306));
define('DB_NAME', env('DB_NAME', 'zoo_arcadia'));
define('DB_USER', env('DB_USER', 'root'));
define('DB_PASS', env('DB_PASS', 'root'));
