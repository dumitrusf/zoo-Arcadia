<?php
/**
 * Configuración de Base de Datos
 * 
 * Si existe un archivo .env, se cargan las variables desde ahí.
 * Si no, se usan los valores por defecto (para desarrollo local).
 */

// Cargar variables de entorno desde .env si existe
if (file_exists(__DIR__ . '/.env')) {
    require_once __DIR__ . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();
}

// Configuración de Base de Datos
// Prioridad: 1. Variables de Railway (getenv) -> 2. Variables .env ($_ENV) -> 3. Fallback (Local)
// Usamos getenv() porque $_ENV a veces viene vacío en algunos entornos Docker/Cloud
function envValue(string $key, $default = null) {
    $val = getenv($key);
    if ($val !== false && $val !== '') {
        return $val;
    }
    if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
        return $_ENV[$key];
    }
    return $default;
}

define('DB_HOST', envValue('MYSQLHOST', envValue('DB_HOST', 'localhost')));
define('DB_PORT', envValue('MYSQLPORT', envValue('DB_PORT', 3306)));
define('DB_NAME', envValue('MYSQLDATABASE', envValue('DB_NAME', 'zoo_arcadia')));
define('DB_USER', envValue('MYSQLUSER', envValue('DB_USER', 'root')));
define('DB_PASS', envValue('MYSQLPASSWORD', envValue('DB_PASS', 'root')));

