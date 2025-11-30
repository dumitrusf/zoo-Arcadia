<?php
// Obtener el nombre del archivo actual
$domain = $currentDomain ?? "home";

// Definir el título dinámico


switch ($domain) {
    // PÁGINAS PÚBLICAS
    case "home":
        if (isset($_GET['action']) && $_GET['action'] === 'start') {
            $pageTitle = "ARC Dashboard"; // Para el admin/empleado
        } else {
            $pageTitle = "ARC Home";      // Para el público
        }
        break;
    case "cms": // Services está dentro del dominio CMS
        $pageTitle = "ARC Services";
        break;
    case "habitats":
        $pageTitle = "ARC Habitats";
        break;
    case "animals":
        $pageTitle = "ARC Animals";
        break;
    case "contact":
        $pageTitle = "ARC Contact";
        break;
    case "auth":
        $pageTitle = "ARC Login";
        break;

    // PÁGINAS DE GESTIÓN (DASHBOARD)
    case "employees":
        $pageTitle = "ARC Employees";
        break;
    case "users":
        $pageTitle = "ARC Users";
        break;
    case "roles":
        $pageTitle = "ARC Roles";
        break;
    case "permissions":
        $pageTitle = "ARC Permissions";
        break;
    case "reports":
        $pageTitle = "ARC Reports";
        break;

    // CASOS ESPECÍFICOS O ANTIGUOS (Por si acaso)
    case "animal-picked":
        $pageTitle = "ARC Animal Details";
        break;
    case "error-404":
        $pageTitle = "ARC Error 404";
        break;

    default:
        $pageTitle = "Arcadia Zoo";
        break;
}
