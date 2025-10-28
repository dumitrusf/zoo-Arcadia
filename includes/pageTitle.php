<?php
// Obtener el nombre del archivo actual
$domain = $currentDomain ?? "home";

// Definir el título dinámico


switch ($domain) {
    case 'zoo-Arcadia':
        $pageTitle = 'ARCADIA';
        break;
    case 'employees':
        $pageTitle = 'ARC Employees';
        break;
    case 'users':
        $pageTitle = 'ARC Users';
        break;
    case 'roles':
        $pageTitle = 'ARC Roles';
        break;
    case 'permissions':
        $pageTitle = 'ARC Permissions';
        break;
    case 'services':
        $pageTitle = 'ARC Services';
        break;
    case 'contact':
        $pageTitle = 'ARC Contact';
        break;
    case 'about':
        $pageTitle = 'ARC About Us';
        break;
    case 'login':
        $pageTitle = 'ARC Login';
        break;
    case 'habitats':
        $pageTitle = 'ARC Habitats';
        break;
    case 'animal-picked':
        $pageTitle = 'ARC Animal Details';
        break;
    case 'all-animals-habitats':
        $pageTitle = 'ARC All Animals';
        break;
    case 'dash-vet':
        $pageTitle = 'ARC Vet';
        break;
    case 'employee':
        $pageTitle = 'ARC Employee';
        break;
    case 'error-404':
        $pageTitle = 'ARC Error 404';
        break;
    case 'habitat':
        $pageTitle = 'ARC Habitat';
        break;
    default:
        $pageTitle = 'Arcadia';
        break;
}
