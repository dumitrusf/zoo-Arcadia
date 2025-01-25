<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Obtener el nombre del archivo actual
$currentPage = basename($_SERVER['PHP_SELF']);
include './includes/pageTitle.php';

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

    <link rel="stylesheet" href="/build/css/app.css">



</head>

<body class="<?= $currentPage == 'contact.php' ? 'body-contact' : '' ?>" id="top">


    <!-- navbar for mobile with his fonts and sizes -->
    <nav class="d-md-none nav navbar position-fixed">
        <div class="nav__menu collapse" id="navbarToggler">
            <div class="nav__m-flex">

                <ul class="nav__items">
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'index.php' ? 'nav__link--active' : '' ?>" href="/index.php">home</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'services.php' ? 'nav__link--active' : '' ?>" href="./services.php">services</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'habitats.php' ? 'nav__link--active' : '' ?>" href="./habitats.php">habitats</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'all-animals-habitats.php' ? 'nav__link--active' : '' ?>" href="./all-animals-habitats.php">animals</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'contact.php' ? 'nav__link--active' : '' ?>" href="./contact.php">contact</a>
                    </li>
                </ul>

                <img class="panda__logo" src="./src/assets/images/panda-menu-mobile.svg" alt="Logo site">

            </div>
        </div>

        <div class="bar container-fluid d-flex">
            <button class="bar-button navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="main-logo-link" href="/index.php">
                <img class="main__logo" src="./src/assets/images/logo-bar.svg" alt="logo site">
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

            <a class="main-logo-link" href="/index.php">
                <img class="main__logo" src="./src/assets/images/logo-bar.svg" alt="logo site">
            </a>

        </div>

        <div class="nav__menu nav__menu--tablet collapse" id="navbarToggler">
            <div class="nav__m-flex">
                <ul class="nav__items">
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'index.php' ? 'nav__link--active' : '' ?>" href="/index.php">home</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'services.php' ? 'nav__link--active' : '' ?>" href="./services.php">services</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'habitats.php' ? 'nav__link--active' : '' ?>" href="./habitats.php">habitats</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'all-animals-habitats.php' ? 'nav__link--active' : '' ?>" href="./all-animals-habitats.php">animals</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'contact.php' ? 'nav__link--active' : '' ?>" href="./contact.php">contact</a>
                    </li>
                </ul>
                <img class="panda__logo" src="./src/assets/images/panda-menu-mobile.svg" alt="Logo site">


            </div>
            <div class="nav__menu nav__menu--desk collapse" id="navbarToggler">
                <ul class="nav__items">
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'index.php' ? 'nav__link--active' : '' ?>" href="/index.php">home</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'services.php' ? 'nav__link--active' : '' ?>" href="./services.php">services</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'habitats.php' ? 'nav__link--active' : '' ?>" href="./habitats.php">habitats</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'all-animals-habitats.php' ? 'nav__link--active' : '' ?>" href="./all-animals-habitats.php">animals</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentPage == 'contact.php' ? 'nav__link--active' : '' ?>" href="./contact.php">contact</a>
                    </li>
                </ul>
                <div class="logo-desk">
                    <img class="logo-desk" src="./src/assets/images/logo-desk.svg" alt="Logo site">
                </div>
            </div>

        </div>
    </nav>