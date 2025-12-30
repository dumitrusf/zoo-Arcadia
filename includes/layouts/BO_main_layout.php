<?php

/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Includes\Layouts
 * 📂 Physical File:   includes/layouts/BO_main_layout.php
 * 
 * 📝 Description:
 * Main layout for BACKOFFICE (Management).
 * HTML base structure for the administration panel.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Includes\PageTitle (via includes/pageTitle.php)
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get the name of the current file
$currentDomain = $_GET['domain'] ?? 'home';
$domain = $_GET['domain'] ?? 'home';
$controller = $_GET['controller'] ?? 'pages';
$action = $_GET['action'] ?? 'index';
include(__DIR__ . "/../pageTitle.php");

// Include functions to use hasPermission()
require_once __DIR__ . "/../functions.php";

// If user is logged in but permissions are not loaded in session, load them now
// This handles cases where user was already logged in before we implemented permission loading
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $userId = $_SESSION["user"]["id_user"] ?? null;
    if ($userId && (!isset($_SESSION["user"]["permissions"]) || empty($_SESSION["user"]["permissions"]))) {
        require_once __DIR__ . "/../../App/users/models/user.php";
        $_SESSION["user"]["permissions"] = User::getAllUserPermissions($userId);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="keywords"
        content="zoo, animals, habitats, Brocéliande, veterinarians, ecology, wildlife park, conservation, zoo services, guided tours, France zoo, sustainable energy, wild animals, animal feeding, zoo management, Arcadia Zoo" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <title><?= $pageTitle; ?></title>

    <link rel="icon" type="image/svg+xml" href="/src/assets/images/favicon.svg" />

    <link rel="icon" type="image/png" href="/src/assets/images/favicon.png" />

    <!-- Compiled and copied stylesheets by Gulp -->
    <link rel="stylesheet" href="/public/build/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/build/css/dataTables.bootstrap5.min.css">
    <!-- <link rel="stylesheet" href="/public/build/css/app.css"> -->

</head>

<body class="<?= $currentDomain == 'contact' ? 'body-contact' : ($currentDomain == 'auth' ? 'body-login' : '') ?>" id="top">

    <?php if (!in_array($currentDomain, ['contact', 'auth'])): ?>
        <nav class="navbar navbar-expand navbar-light bg-light d-flex justify-content-between">
            <div class="nav navbar-nav">
                <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false): ?>
                    <a class="nav-item nav-link active" href="/auth/pages/login">Login</a>
                <?php else: ?>
                    <a class="nav-item nav-link active" href="/home/pages/start"><?php echo $_SESSION["user"]["username"]; ?></a>
                <?php endif; ?>
                
                <?php 
                // Users: Always visible for any logged-in user
                $isAdmin = isset($_SESSION['user']['role_name']) && $_SESSION['user']['role_name'] === 'Admin';
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): 
                ?>
                    <a class="nav-item nav-link" href="/users/gest/start">Users</a>
                <?php endif; ?>
                
                <?php 
                // Employees: Always visible for any logged-in user
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): 
                ?>
                    <a class="nav-item nav-link" href="/employees/gest/start">Employees</a>
                <?php endif; ?>
                
                <?php 
                // Roles: Always visible for Admin, or if user has roles-view OR roles-create OR roles-edit OR roles-delete permission
                if ($isAdmin || hasPermission('roles-view') || hasPermission('roles-create') || hasPermission('roles-edit') || hasPermission('roles-delete')): 
                ?>
                    <a class="nav-item nav-link" href="/roles/gest/start">Roles</a>
                <?php endif; ?>
                
                <?php 
                // Permissions: Always visible for any logged-in user
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): 
                ?>
                    <a class="nav-item nav-link" href="/permissions/gest/start">Permissions</a>
                <?php endif; ?>
                
                <?php if (hasPermission('schedules-view') || hasPermission('schedules-edit')): ?>
                    <a class="nav-item nav-link" href="/schedules/gest/start">Schedules</a>
                <?php endif; ?>
                
                <!-- CMS Services - Visible if user has services-view OR services-edit OR services-create OR services-delete -->
                <?php if (hasPermission('services-view') || hasPermission('services-edit') || hasPermission('services-create') || hasPermission('services-delete')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'cms' && $controller === 'gest' && ($action === 'start' || $action === 'edit' || $action === 'create')) ? 'active' : '' ?>" href="/cms/gest/start">
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'cms' && $controller === 'gest' && $action === 'logs') ? 'active' : '' ?>" href="/cms/gest/logs">
                            Service Logs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'cms' && $controller === 'bricks') ? 'active' : '' ?>" href="/cms/bricks/start">
                            Content Blocks
                        </a>
                    </li>
                <?php endif; ?>

                <!-- All the animals - Visible if user has animals-view OR animals-create OR animals-edit OR animals-delete -->
                <?php if (hasPermission('animals-view') || hasPermission('animals-create') || hasPermission('animals-edit') || hasPermission('animals-delete')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'animals' && $controller === 'gest' && ($action === 'start' || $action === 'edit' || $action === 'create')) ? 'active' : '' ?>" href="/animals/gest/start">
                            All Animals gest
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Animal Statistics - Visible if user has animal_stats-view -->
                <?php if (hasPermission('animal_stats-view')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'animals' && $controller === 'stats') ? 'active' : '' ?>" href="/animals/stats/start">
                            Animal Statistics
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Feeding Logs - Visible if user has animal_feeding-view or animal_feeding-assign -->
                <?php if (hasPermission('animal_feeding-view') || hasPermission('animal_feeding-assign')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'animals' && $controller === 'feeding') ? 'active' : '' ?>" href="/animals/feeding/start">
                            Feeding Logs
                        </a>
                    </li>
                <?php endif; ?>

                <!-- All the habitats - Visible if user has habitats-view OR habitats-create OR habitats-edit OR habitats-delete -->
                <?php if (hasPermission('habitats-view') || hasPermission('habitats-create') || hasPermission('habitats-edit') || hasPermission('habitats-delete')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'habitats' && $controller === 'gest' && ($action === 'start' || $action === 'edit' || $action === 'create')) ? 'active' : '' ?>" href="/habitats/gest/start">
                            All Habitats gest
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Habitat Suggestions (View or Manage) -->
                <?php if (hasPermission('habitat_suggestions-view') || hasPermission('habitat_suggestions-manage')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'habitats' && $controller === 'suggestion') ? 'active' : '' ?>" href="/habitats/suggestion/start">
                            Habitat Suggestions
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Health State Reports (Veterinary) -->
                <?php if (hasPermission('vet_reports-view') || hasPermission('vet_reports-create') || hasPermission('vet_reports-edit')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'vreports' && $controller === 'gest') ? 'active' : '' ?>" href="/vreports/gest/start">
                            Health Reports
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Page Headers (Admin Only) -->
                <?php if (isset($_SESSION['user']['role_name']) && $_SESSION['user']['role_name'] === 'Admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'hero') ? 'active' : '' ?>" href="/hero/gest/start">
                            Page Headers
                        </a>
                    </li>
                <?php endif; ?>

            </div>

            <div class="nav navbar-nav d-flex justify-content-end px-5">
                <a class="nav-item nav-link" href="/home/pages/index">Zoo Arcadia</a>
                <a class="nav-item nav-link" href="/auth/pages/logout">Logout</a>
            </div>
        </nav>
    <?php endif; ?>

    <div class="container-xs p-5">
        <div class="row">
            <div class="col-12">
                <?php

                // Show the captured content from the controller, otherwise show a message that there is no content to show
                echo $viewContent ?? '<p>There is no content to show</p>';

                ?>
            </div>
        </div>
    </div>


    <!-- 
      Order of loading Scripts is important:
      1. jQuery (required for Bootstrap and DataTables)
      2. Bootstrap JS (for the functionality of the template)
      3. DataTables Core
      4. DataTables Bootstrap 5 Integration
      5. Nuestro código de activación (app.js)
    -->
    <script src="/public/build/js/jquery.min.js" defer></script>
    <script src="/public/build/js/bootstrap.bundle.min.js" defer></script>
    <script src="/public/build/js/dataTables.min.js" defer></script>
    <script src="/public/build/js/dataTables.bootstrap5.min.js" defer></script>
    <script src="/public/build/js/app.js" defer></script>

</body>
