<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Obtener el nombre del archivo actual
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

    <!-- Hojas de Estilo Compiladas y Copiadas por Gulp -->
    <link rel="stylesheet" href="/public/build/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/build/css/dataTables.bootstrap5.min.css">
    <!-- <link rel="stylesheet" href="/public/build/css/app.css"> -->

</head>

<body class="<?= $currentDomain == 'contact' ? 'body-contact' : '' ?>" id="top">




    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Logged in (user) <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="/home/pages/start">Home</a>
            <a class="nav-item nav-link" href="/users/gest/start">Users</a>
            <a class="nav-item nav-link" href="/employees/gest/start">Employees</a>
            <a class="nav-item nav-link" href="/roles/gest/start">Roles</a>
            <a class="nav-item nav-link" href="/permissions/gest/start">Permissions</a>
        </div>
    </nav>

    <div class="container-xs p-5">
        <div class="row">
            <div class="col-12">
                <?php

                // Mostrar el contenido capturado del controlador de lo contrario mostrar un mensaje de no hay contenido para mostrar
                echo $viewContent ?? '<p>No hay contenido para mostrar</p>';

                ?>

            </div>
        </div>
    </div>


    <!-- 
      Orden de carga de Scripts es importante:
      1. jQuery (requerido por Bootstrap y DataTables)
      2. Bootstrap JS (para la funcionalidad de la plantilla)
      3. DataTables Core
      4. DataTables Bootstrap 5 Integration
      5. Nuestro código de activación (app.js)
    -->
    <script src="/public/build/js/jquery.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/public/build/js/dataTables.min.js"></script>
    <script src="/public/build/js/dataTables.bootstrap5.min.js"></script>
    <script src="/public/build/js/app.js"></script>

</body>