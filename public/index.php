<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Public
 * 📂 Physical File:   public/index.php
 * 
 * 📝 Description:
 * MAIN FRONT CONTROLLER.
 * "The Porter": Receives all requests and decides who to call.
 * 
 * 🔗 Dependencies:
 * - Vendor\Autoload (via vendor/autoload.php)
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\Includes\Functions (via includes/functions.php)
 * - Arcadia\App\Router (via App/router.php)
 */

// _router.php → "The Porter" of the website

// 0. I'll load the tools
require_once __DIR__ . '/../vendor/autoload.php';      // Load the libraries
require_once __DIR__ . '/../database/connection.php';  // Load the database and config.php
require_once __DIR__ . '/../includes/functions.php';   // Load the functions

// 1. GET THE PATH (PATH) OF THE REQUESTED URL
$path = ltrim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

// 2. MAGIC TO SERVE STATIC FILES (CSS, JS, IMAGES) IF THEY ARE OUTSIDE OF PUBLIC
// If the URL starts with "node_modules", "src" or "public", we try to serve the file directly.
if (strpos($path, 'public/') === 0 || strpos($path, 'src/') === 0 || strpos($path, 'node_modules/') === 0) {
    $fullPath = __DIR__ . '/../' . $path; // Search in the project root
    
    if (file_exists($fullPath) && is_file($fullPath)) {
        // Guess the file type (MIME type)
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
        exit; // ¡Importante! We end here to not load the router of the App
    }
}


// 3. CHECK IF THE PATH CORRESPONDS TO A REAL FILE INSIDE OF PUBLIC
if (file_exists($path) && is_file($path)) {
    return false; // DIRECT OUTPUT, THE FILE IS DELIVERED WITHOUT PASSING THROUGH THE ROUTER.
}

// 4. IF IT IS NOT A FILE, INTERPRET IT AS "NICE URL"
$parts = explode('/', $path);

// 5. ASSIGN SEGMENTS
$_GET['domain'] = !empty($parts[0]) ? $parts[0] : 'home';
$_GET['controller'] = !empty($parts[1]) ? $parts[1] : 'pages';
$_GET['action'] = !empty($parts[2]) ? $parts[2] : 'index';

// 6. LOAD THE MAIN ROUTER
require_once __DIR__ . '/../App/router.php';
?>