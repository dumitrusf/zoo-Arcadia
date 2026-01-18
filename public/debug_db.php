<?php
// ARCHIVO DE DIAGNÓSTICO TEMPORAL
// Borrar después de usar

header('Content-Type: text/plain');

echo "--- DIAGNÓSTICO DE VARIABLES DE ENTORNO ---\n";

echo "MYSQLHOST: " . ($_ENV['MYSQLHOST'] ?? 'NO DEFINIDO') . "\n";
echo "MYSQLPORT: " . ($_ENV['MYSQLPORT'] ?? 'NO DEFINIDO') . "\n";
echo "MYSQLDATABASE: " . ($_ENV['MYSQLDATABASE'] ?? 'NO DEFINIDO') . "\n";
echo "DB_HOST (env): " . ($_ENV['DB_HOST'] ?? 'NO DEFINIDO') . "\n";

echo "\n--- INTENTO DE CARGA DE DOTENV ---\n";
if (file_exists(__DIR__ . '/.env')) {
    echo ".env encontrado.\n";
} else {
    echo ".env NO encontrado (Normal en producción si usamos variables del sistema).\n";
}

echo "\n--- CONSTANTES DEFINIDAS EN CONFIG.PHP ---\n";
require_once __DIR__ . '/config.php';
echo "DB_HOST: " . DB_HOST . "\n";
echo "DB_PORT: " . (defined('DB_PORT') ? DB_PORT : 'NO DEFINIDO') . "\n";
echo "DB_NAME: " . DB_NAME . "\n";

echo "\n--- PRUEBA DE CONEXIÓN ---\n";
try {
    require_once __DIR__ . '/database/connection.php';
    $db = DB::createInstance();
    echo "¡CONEXIÓN EXITOSA!\n";
} catch (Exception $e) {
    echo "ERROR DE CONEXIÓN: " . $e->getMessage() . "\n";
}
