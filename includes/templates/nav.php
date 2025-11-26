<?php
// Datos básicos del enrutador público
$currentDomain = $_GET['domain'] ?? 'home';
$currentAction = $_GET['action'] ?? 'index';

if (!function_exists('public_nav_is_active')) {
    function public_nav_is_active(string $expectedDomain, array $actions = []): string
    {
        $domain = $_GET['domain'] ?? 'home';
        $action = $_GET['action'] ?? 'index';

        if ($domain !== $expectedDomain) {
            return '';
        }

        if (!empty($actions) && !in_array($action, $actions, true)) {
            return '';
        }

        return 'nav__link--active';
    }
}

include(__DIR__ . '/../pageTitle.php');
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

    <link rel="stylesheet" href=" /public/build/css/bootstrap.min.css" />

    <link rel="preload" href="/public/build/css/app.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="/public/build/css/app.css">
    </noscript>



</head>

<body class="<?= $currentDomain == 'contact' ? 'body-contact' : ($currentDomain == 'auth' ? 'body-login' : '') ?>" id="top">


    <!-- navbar for mobile with his fonts and sizes -->
    <nav class="d-md-none nav navbar position-fixed">
        <div class="nav__menu collapse" id="navbarToggler">
            <div class="nav__m-flex">

                <ul class="nav__items">
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('home', ['index']) ?>" href="/home/pages/index">home</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('cms', ['cms']) ?>" href="/cms/pages/cms">services</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('habitats', ['habitats']) ?>" href="/habitats/pages/habitats">habitats</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('animals') ?>" href="/animals/pages/allanimals">animals</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('contact', ['contact']) ?>" href="/contact/pages/contact">contact</a>
                    </li>
                </ul>

                <img class="panda__logo" src="/src/assets/images/panda-menu-mobile.svg" alt="Logo site">

            </div>
        </div>

        <div class="bar container-fluid d-flex">
            <button class="bar-button navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="main-logo-link" href="/home/pages/index">
                <img class="main__logo" src="/src/assets/images/logo-bar.svg" alt="logo site">
            </a>

        </div>
    </nav>



    <!-- navbar for desk with his fonts and sizes -->
    <nav class="d-none d-md-block nav navbar position-fixed">

        <div class="bar container-fluid d-flex">
            <button class="bar-button navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="main-logo-link" href="/home/pages/index">
                <img class="main__logo" src="/src/assets/images/logo-bar.svg" alt="logo site">
            </a>

        </div>

        <div class="nav__menu nav__menu--tablet collapse" id="navbarToggler">
            <div class="nav__m-flex">
                <ul class="nav__items">
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('home', ['index']) ?>" href="/home/pages/index">home</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('cms', ['cms']) ?>" href="/cms/pages/cms">services</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('habitats', ['habitats']) ?>" href="/habitats/pages/habitats">habitats</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('animals') ?>" href="/animals/pages/allanimals">animals</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('contact', ['contact']) ?>" href="/contact/pages/contact">contact</a>
                    </li>
                </ul>
                <img class="panda__logo" src="/src/assets/images/panda-menu-mobile.svg" alt="Logo site">


            </div>
            <div class="nav__menu nav__menu--desk collapse" id="navbarToggler">
                <ul class="nav__items">
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('home', ['index']) ?>" href="/home/pages/index">home</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('cms', ['cms']) ?>" href="/cms/pages/cms">services</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('habitats', ['habitats']) ?>" href="/habitats/pages/habitats">habitats</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('animals') ?>" href="/animals/pages/allanimals">animals</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= public_nav_is_active('contact', ['contact']) ?>" href="/contact/pages/contact">contact</a>
                    </li>
                </ul>
                <div class="logo-desk">
                    <img class="logo-desk" src="/src/assets/images/logo-desk.svg" alt="Logo site">
                </div>
            </div>

        </div>
    </nav>