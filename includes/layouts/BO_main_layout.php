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
include(__DIR__ . "/../pageTitle.php");

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
                <a class="nav-item nav-link" href="/users/gest/start">Users</a>
                <a class="nav-item nav-link" href="/employees/gest/start">Employees</a>
                <a class="nav-item nav-link" href="/roles/gest/start">Roles</a>
                <a class="nav-item nav-link" href="/permissions/gest/start">Permissions</a>
                <?php if (isset($_SESSION['user']['role_name']) && $_SESSION['user']['role_name'] === 'Admin'): ?>
                    <a class="nav-item nav-link" href="/schedules/gest/start">Schedules</a>
                <?php endif; ?>
                
                <!-- CMS Services (Admin & Employee) -->
                <?php if (in_array($_SESSION['user']['role_id'], [2, 3])): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'cms' && ($action === 'start' || $action === 'edit' || $action === 'create')) ? 'active' : '' ?>" href="/cms/gest/start">
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'cms' && $action === 'logs') ? 'active' : '' ?>" href="/cms/gest/logs">
                            Service Logs
                        </a>
                    </li>

                    <!-- All the animals -->

                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'animals' && ($action === 'start' || $action === 'edit' || $action === 'create')) ? 'active' : '' ?>" href="/animals/gest/start">
                            All Animals gest
                        </a>
                    </li>


                    <!-- All the habitats -->
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'habitats' && ($action === 'start' || $action === 'edit' || $action === 'create')) ? 'active' : '' ?>" href="/habitats/gest/start">
                            All Habitats gest
                        </a>
                    </li>
                    
                    
                <?php endif; ?>

                <!-- Page Headers (Admin Only) -->
                <?php if (isset($_SESSION['user']['role_id']) && $_SESSION['user']['role_id'] == 3): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'hero') ? 'active' : '' ?>" href="/hero/gest/start">
                            Page Headers
                        </a>
                    </li>
                    <!-- Bricks (Content Blocks) -->
                    <li class="nav-item">
                        <a class="nav-link <?= ($domain === 'cms' && $controller === 'bricks') ? 'active' : '' ?>" href="/cms/bricks/start">
                            Content Blocks
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
