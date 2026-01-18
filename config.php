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
// Prioridad: 1. Variables de Railway (Producción) -> 2. Variables .env (Custom) -> 3. Fallback (Local)
define('DB_HOST', $_ENV['MYSQLHOST'] ?? $_ENV['DB_HOST'] ?? 'localhost');
define('DB_PORT', $_ENV['MYSQLPORT'] ?? $_ENV['DB_PORT'] ?? 3306);
define('DB_NAME', $_ENV['MYSQLDATABASE'] ?? $_ENV['DB_NAME'] ?? 'zoo_arcadia');
define('DB_USER', $_ENV['MYSQLUSER'] ?? $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['MYSQLPASSWORD'] ?? $_ENV['DB_PASS'] ?? 'root');

