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

// 0. Load required dependencies
require_once __DIR__ . '/../vendor/autoload.php';      // Load Composer libraries
require_once __DIR__ . '/../database/connection.php';  // Load database connection and config
require_once __DIR__ . '/../includes/functions.php';   // Load helper functions

// 1. Extract the path from the requested URL
$parsedUrl = parse_url($_SERVER['REQUEST_URI']);
$path = ltrim($parsedUrl['path'] ?? '', '/');

// 2. Serve static files (CSS, JS, images) if they are outside the public directory
// If the URL starts with "public/", "src/" or "node_modules/", we serve the file directly
if (strpos($path, 'public/') === 0 || strpos($path, 'src/') === 0 || strpos($path, 'node_modules/') === 0) {
    $fullPath = __DIR__ . '/../' . $path;
    
    if (file_exists($fullPath) && is_file($fullPath)) {
        // Set appropriate MIME type based on file extension
        $ext = pathinfo($fullPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'css':  header('Content-Type: text/css'); break;
            case 'js':   header('Content-Type: application/javascript'); break;
            case 'png':  header('Content-Type: image/png'); break;
            case 'jpg':  header('Content-Type: image/jpeg'); break;
            case 'jpeg': header('Content-Type: image/jpeg'); break;
            case 'svg':  header('Content-Type: image/svg+xml'); break;
            case 'ttf':  header('Content-Type: font/ttf'); break;
            case 'woff': header('Content-Type: font/woff'); break;
            case 'woff2':header('Content-Type: font/woff2'); break;
        }
        readfile($fullPath);
        exit; // Important: stop execution here to prevent loading the router
    }
}

// 3. Check if the path corresponds to a real file inside the public directory
// If it exists, serve it directly without passing through the router
$publicFilePath = __DIR__ . '/' . $path;
if (file_exists($publicFilePath) && is_file($publicFilePath)) {
    readfile($publicFilePath);
    exit;
}

// 4. If it's not a file, interpret it as a "nice URL" and parse the segments
$parts = explode('/', $path);

// 5. Assign URL segments to GET parameters for the router
$_GET['domain'] = !empty($parts[0]) ? $parts[0] : 'home';
$_GET['controller'] = !empty($parts[1]) ? $parts[1] : 'pages';
$_GET['action'] = !empty($parts[2]) ? $parts[2] : 'index';

// 6. Load and execute the main router
require_once __DIR__ . '/../App/router.php';
?>