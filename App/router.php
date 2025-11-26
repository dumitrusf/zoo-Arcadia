<?php
// App/router.php (El Guardia Central)

session_start();


// App/router.php

// 1. Caché out (it usually works, but sometimes we have to clear the browser cache to start going)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$domain = $_GET["domain"] ?? "home";

// 2. List of sites where we don't need to be logged in
// "home", "about", "habitats", "animals", "cms" deben estar aquí para ser accesibles públicamente.
$public_domains = ["auth", "contact", "home", "about", "habitats", "animals", "cms"];

// 3. Security check
// If there is no user and the domain is not public...
if (!isset($_SESSION["user"]["username"]) && !in_array($domain, $public_domains)) {
    // we redirect to login!.
    header("Location: /auth/pages/login");
    exit();
}

// 3.1 Protección específica para el Dashboard (/home/pages/start)
// Aunque "home" sea público (para index), la acción "start" requiere login.
if ($domain === "home" && $_GET["action"] === "start" && !isset($_SESSION["user"]["username"])) {
    header("Location: /auth/pages/login");
    exit();
}

// 4. Inverse check (optional but useful)
// If there is a user and the user tries to go to login...
if (isset($_SESSION["user"]["username"]) && $domain === "auth" && $_GET["action"] === "login") {
    // ... why? If you are already inside, we send you to home! (to avoid infinite loops).
    header("Location: /home/pages/start");
    exit();
}

$domain = $_GET["domain"] ?? "home";

//  "lista blanca" de dominios que existen. Si un dominio no está aquí, es rechazado.
$allowed_domains = [ "habitat1", "cms", "about", "auth", "home", "animals", "employees", "habitats", "permissions", "reports", "roles", "schedules", "testimonials", "users", "contact"];

if (in_array($domain, $allowed_domains)) {
    // we redirect to the domain router.
    $domainRouterPath = __DIR__ . "/{$domain}/{$domain}Router.php";

    if (file_exists($domainRouterPath)) {
        require_once $domainRouterPath;
    } else {
        // ERROR 500: The domain is in the list, but we haven't created its router file.
        // This is our error (of the programmers), not the user's.
        http_response_code(500); 
        // For now, we send you to the 404 page to avoid confusing the user.
        // In the future, we could create an `error-500.php` page.
        header('Location: /public/error-404.php');
        exit();
    }
} else {
    // ERROR 404: The domain that the user requested does not exist in our list.
    http_response_code(404);
    header('Location: /public/error-404.php');
    exit();
}




?>


