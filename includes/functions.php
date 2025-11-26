<?php

define("TEMPLATES_URL", __DIR__ . "/templates");
define("FUNCTIONS_URL", __DIR__ . "functions.php");


function includeTemplate(string  $nombre)
{
    include TEMPLATES_URL . "/{$nombre}.php";
}

if (!function_exists('get_row_class')) {

    function get_row_class(int $rowNumber): string
    {
        return ($rowNumber % 2 == 0) ? 'table-warning' : 'table-primary';
    }

    function get_cell_border_class(int $rowNumber): string
    {
        return ($rowNumber % 2 == 0) ? 'border border-start-5 border-top-0 border-bottom-0 border-end-5 border-primary' : 'border border-start-5 border-top-0 border-bottom-0 border-end-5 border-primary';
    }
}
// includes/functions.php


function handleDomainRouting($domainName, $basePath)
{
    $controller = $_GET['controller'] ?? 'pages';
    $action = $_GET['action'] ?? 'start';

    // OJO: Tu convención de nombres de archivo es diferente a la de la clase.
    // Archivo: employees_pages_controller.php
    // Clase: EmployeesPagesController
    $controllerFileName = $domainName . "_" . $controller . "_controller.php";
    $controllerClassName = ucfirst($domainName) . ucfirst($controller) . "Controller";

    $controllerFile = $basePath . "/controllers/" . $controllerFileName;

    if (file_exists($controllerFile)) {
        require_once $controllerFile;

        ob_start();
        $controllerInstance = new $controllerClassName();
        $controllerInstance->$action();
        $viewContent = ob_get_clean();

        // DEBUG EXTREMO
        // echo "<!-- DEBUG FUNCTIONS: Domain recibido: '$domainName' -->";

        // LÓGICA DE SELECCIÓN DE LAYOUT MEJORADA:
        // Mapa dominio -> acciones públicas (vacío = todas)
        $public_layout_map = [
            "home"      => ["index"],
            "about"     => ["about"],
            "habitats"  => ["habitats", "habitat1"],
            "animals"   => ["allanimals", "animalpicked"],
            "cms"       => ["cms"],
            "contact"   => ["contact"],
            "auth"      => ["login"]
        ];

        $domainKey = strtolower($domainName);
        $actionKey = strtolower($action);

        $usePublicLayout = false;
        if (isset($public_layout_map[$domainKey])) {
            $allowedActions = $public_layout_map[$domainKey];
            $usePublicLayout = empty($allowedActions) || in_array($actionKey, $allowedActions, true);
        }

        if ($usePublicLayout) {
            require __DIR__ . "/layouts/FC_main_layout.php";
        } else {
            require __DIR__ . "/layouts/BO_main_layout.php";
        }
    } else {
        http_response_code(404);
        header('Location: /public/error-404.php');
        exit();
    }
}
