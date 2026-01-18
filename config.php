<?php
/**
 * Configuración de Base de Datos
 * 
 * En Railway, el entrypoint.sh genera env_railway.php con las variables.
 * En local, se usa el archivo .env tradicional.
 */

// 1. Si existe env_railway.php (generado por Railway), cargarlo
if (file_exists(__DIR__ . '/env_railway.php')) {
    require_once __DIR__ . '/env_railway.php';
}

// 2. Si existe .env (local), cargarlo con phpdotenv
if (file_exists(__DIR__ . '/.env')) {
    require_once __DIR__ . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();
}

// 3. Helper function para leer variables
function env($key, $default = null) {
    // Prioridad: $_ENV (poblado por env_railway.php o .env) -> getenv() -> $_SERVER -> default
    if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
        return $_ENV[$key];
    }
    
    $value = getenv($key);
    if ($value !== false && $value !== '') {
        return $value;
    }
    
    if (isset($_SERVER[$key]) && $_SERVER[$key] !== '') {
        return $_SERVER[$key];
    }
    
    return $default;
}

// 4. Definir constantes
define('DB_HOST', env('DB_HOST', 'localhost'));
define('DB_PORT', env('DB_PORT', 3306));
define('DB_NAME', env('DB_NAME', 'zoo_arcadia'));
define('DB_USER', env('DB_USER', 'root'));
define('DB_PASS', env('DB_PASS', 'root'));
