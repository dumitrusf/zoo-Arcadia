<?php
// _router.php → "El Portero" del sitio web

// 1. OBTENER EL CAMINO (PATH) DE LA URL SOLICITADA
$path = ltrim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

// 2. COMPROBAR SI EL PATH CORRESPONDE A UN ARCHIVO REAL
if (file_exists($path) && is_file($path)) {
    return false; // 🚪 Salida directa, el archivo se entrega sin pasar por el router.
}

// 3. SI NO ES UN ARCHIVO, INTERPRETARLO COMO "URL BONITA"
$parts = explode('/', $path);

// 4. ASIGNAR SEGMENTOS
$_GET['domain'] = $parts[0] ?? null;
$_GET['controller'] = $parts[1] ?? 'index';
$_GET['action'] = $parts[2] ?? 'home';

// 5. CARGAR EL ENRUTADOR PRINCIPAL
require_once 'App/router.php';
?>