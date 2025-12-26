<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\App
 * 📂 Physical File:   App/router.php
 * 
 * 📝 Description:
 * CENTRAL ROUTER ("The Guard").
 * Validates permissions, sessions and dispatches to Domain Routers.
 * 
 * 🔗 Dependencies:
 * - Arcadia\{Domain}\{Domain}Router (via App/{domain}/{domain}Router.php)
 */

// App/router.php (The central guard)

session_start();


// 1. Caché out (it usually works, but sometimes we have to clear the browser cache to start going)(trying also ctrl + shift + r)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$domain = $_GET["domain"] ?? "home";

// 2. List of sites where we don't need to be logged in
// "home", "about", "habitats", "animals", "cms" should be here to be accessible publicly.
$public_domains = ["auth", "contact", "home", "about", "habitats", "animals", "cms"];

// 2.1 Session expiration check (11 hours = 39600 seconds)
// If session is older than 11 hours, destroy it and require re-login
if (isset($_SESSION["user"]["username"])) {
    $sessionTimeout = 39600; // 11 hours in seconds
    $lastActivity = $_SESSION["last_activity"] ?? time();
    
    if (time() - $lastActivity > $sessionTimeout) {
        // Session expired - destroy it
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header("Location: /auth/pages/login?msg=session_expired");
        exit();
    } else {
        // Update last activity time
        $_SESSION["last_activity"] = time();
    }
    
    // Additional security: Verify session data integrity
    if (!isset($_SESSION["user"]["id_user"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        // Invalid session data - destroy it
        $_SESSION = array();
        session_destroy();
        header("Location: /auth/pages/login?msg=invalid_session");
        exit();
    }
}

// 3. Security check
// If there is no user and the domain is not public...
if (!isset($_SESSION["user"]["username"]) && !in_array($domain, $public_domains)) {
    // we redirect to login!.
    header("Location: /auth/pages/login");
    exit();
}

// 3.1 Protection specific for the Dashboard (/home/pages/start)
// Even though "home" is public (for index), the action "start" requires login.
if ($domain === "home" && $_GET["action"] === "start" && !isset($_SESSION["user"]["username"])) {
    //we'll redirect to login page.
    header("Location: /auth/pages/login");
    exit();
}

// 3.2 Global Management Protection (/gest/)
// If someone tries to access a management controller (gest) without being logged in -> Login.
// This covers /cms/gest, /hero/gest, etc., even if the domain is public.
$controller = $_GET['controller'] ?? '';
if ($controller === 'gest' && !isset($_SESSION["user"]["username"])) {
    header("Location: /auth/pages/login");
    exit();
}

// 3.3 Protection for private routes within public domains
// Animals domain: /animals/feeding/* and /animals/gest/* require authentication
if ($domain === "animals") {
    $controller = $_GET['controller'] ?? '';
    if (in_array($controller, ['feeding', 'gest']) && !isset($_SESSION["user"]["username"])) {
        header("Location: /auth/pages/login");
        exit();
    }
}

// 3.4 Protection for private routes in habitats domain
// Habitats domain: /habitats/gest/* and /habitats/suggestion/* require authentication
if ($domain === "habitats") {
    $controller = $_GET['controller'] ?? '';
    if (in_array($controller, ['gest', 'suggestion']) && !isset($_SESSION["user"]["username"])) {
        header("Location: /auth/pages/login");
        exit();
    }
}

// 4. Inverse check (optional but useful to perform a security check and to avoid infinite loops)
// If there is a user and the user tries to go to login...
if (isset($_SESSION["user"]["username"]) && $domain === "auth" && $_GET["action"] === "login") {
    // ... why? If you are already inside the database and logged in, we send you to home!
    // (to avoid infinite loops).
    header("Location: /home/pages/start");
    exit();
}

$domain = $_GET["domain"] ?? "home";

//  "white list" of domains that exist. If a domain is not here, it is rejected.
$allowed_domains = ["hero", "medias", "habitat1", "cms", "about", "auth", "home", "animals", "employees", "habitats", "permissions", "reports", "roles", "schedules", "testimonials", "users", "contact"];

if (in_array($domain, $allowed_domains)) {
    // we redirect to the domain router.
    $domainRouterPath = __DIR__ . "/{$domain}/{$domain}Router.php";

    if (file_exists($domainRouterPath)) {
        require_once $domainRouterPath;
    } else {
        // ERROR 500: The domain is in the list, but we haven't created its router file.
        // This is our error (of the programmers), not the user's.
        http_response_code(500); 
        // In the future, we could create an `error-500.php` page.
        header('Location: /public/error-500.php');
        exit();
    }
} else {
    // ERROR 404: The domain that the user requested does not exist in our list.
    http_response_code(404);
    header('Location: /public/error-404.php');
    exit();
}




?>


