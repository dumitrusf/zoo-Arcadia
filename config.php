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
define('DB_HOST', getenv('MYSQLHOST') ?: ($_ENV['MYSQLHOST'] ?? $_ENV['DB_HOST'] ?? 'localhost'));
define('DB_PORT', getenv('MYSQLPORT') ?: ($_ENV['MYSQLPORT'] ?? $_ENV['DB_PORT'] ?? 3306));
define('DB_NAME', getenv('MYSQLDATABASE') ?: ($_ENV['MYSQLDATABASE'] ?? $_ENV['DB_NAME'] ?? 'zoo_arcadia'));
define('DB_USER', getenv('MYSQLUSER') ?: ($_ENV['MYSQLUSER'] ?? $_ENV['DB_USER'] ?? 'root'));
define('DB_PASS', getenv('MYSQLPASSWORD') ?: ($_ENV['MYSQLPASSWORD'] ?? $_ENV['DB_PASS'] ?? 'root'));

