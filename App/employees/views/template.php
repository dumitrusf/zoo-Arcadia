<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Obtener el nombre del archivo actual
$currentPage = basename($_SERVER['PHP_SELF']);
include(__DIR__ . '/../../../includes/pageTitle.php');
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

    <link rel="stylesheet" href="/node_modules/Normalize-css/normalize.css" />

    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css" />

    <!-- <link rel="stylesheet" href="/public/build/css/app.css"> -->



</head>

<body class="<?= $currentPage == 'contact.php' ? 'body-contact' : '' ?>" id="top">




    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Sistema <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="#">Home</a>
            <a class="nav-item nav-link" href="#">Empleados</a>
        </div>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                
                include_once __DIR__ . "/../employeesRouter.php";
                
                ?>
                
            </div>
        </div>
    </div>


    <script type="module" src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>
