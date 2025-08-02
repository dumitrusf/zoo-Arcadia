<?php
// Obtener el nombre del archivo actual
$currentPage = basename($_SERVER['PHP_SELF']);

// Definir el título dinámico
switch ($currentPage) {
    case 'index.php':
        $pageTitle = 'ARCADIA';
        break;
    case 'services.php':
        $pageTitle = 'ARCADIA - Services';
        break;
    case 'contact.php':
        $pageTitle = 'ARCADIA - Contact';
        break;
    case 'about.php':
        $pageTitle = 'ARCADIA - About Us';
        break;
    case 'login.php':
        $pageTitle = 'ARCADIA - Login';
        break;
    case 'habitats.php':
        $pageTitle = 'ARCADIA - Habitats';
        break;
    case 'animal-picked.php':
        $pageTitle = 'ARCADIA - Animal Details';
        break;
    case 'all-animals-habitats.php':
        $pageTitle = 'ARCADIA - All Animals';
        break;
    case 'dash-admin.php':
        $pageTitle = 'ARCADIA - Admin Dashboard';
        break;
    case 'dash-vet.php':
        $pageTitle = 'ARCADIA - Vet Dashboard';
        break;
    case 'dash-employee.php':
        $pageTitle = 'ARCADIA - Employee Dashboard';
        break;
    case 'error-404.php':
        $pageTitle = 'ARCADIA - Error 404';
        break;
    case 'habitat-1.php':
        $pageTitle = 'ARCADIA - Habitat 1';
        break;
    default:
        $pageTitle = 'ARCADIA';
        break;
}
?>
