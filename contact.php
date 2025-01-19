<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="keywords"
        content="zoo, animals, habitats, Brocéliande, veterinarians, ecology, wildlife park, conservation, zoo services, guided tours, France zoo, sustainable energy, wild animals, animal feeding, zoo management, Arcadia Zoo" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <title>ARCADIA - Contact</title>

    <link rel="icon" type="image/svg+xml" href="/src/assets/images/favicon.svg" />
    <link rel="icon" type="image/png" href="/src/assets/images/favicon.png" />

    <link rel="stylesheet" href="/node_modules/Normalize-css/normalize.css" />

    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css" />

    <link rel="stylesheet" href="build/css/app.css">
</head>

<body class="body-contact">

    <!-- navbar for mobile with his fonts and sizes -->
    <nav class="d-md-none nav navbar position-fixed">
        <div class="nav__menu collapse" id="navbarToggler">
            <div class="nav__m-flex">

                <ul class="nav__items">
                    <li class="nav__item">
                        <a class="nav__link nav__home" href="./index.php">home</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__services" href="./services.php">services</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__habitats" href="./habitats.php">habitats</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__animals" href="./all-animals-habitats.php">animals</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__contact nav__link--active" href="#">contact</a>
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

            <a class="main-logo-link" href="#">
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

            <a class="main-logo-link" href="#">
                <img class="main__logo" src="./src/assets/images/logo-bar.svg" alt="logo site">
            </a>

        </div>

        <div class="nav__menu nav__menu--tablet collapse" id="navbarToggler">
            <div class="nav__m-flex">
                <ul class="nav__items">
                    <li class="nav__item">
                        <a class="nav__link nav__home" href="./index.php">home</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__services" href="./services.php">services</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__habitats" href="./habitats.php">habitats</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__animals" href="./all-animals-habitats.php">animals</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__contact nav__link--active" href="#">contact</a>
                    </li>
                </ul>
                <img class="panda__logo" src="./src/assets/images/panda-menu-mobile.svg" alt="Logo site">


            </div>
            <div class="nav__menu nav__menu--desk collapse" id="navbarToggler">
                <ul class="nav__items">
                    <li class="nav__item">
                        <a class="nav__link nav__home" href="./index.php">home</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__services" href="./services.php">services</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__habitats" href="./habitats.php">habitats</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__animals" href="./all-animals-habitats.php">animals</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__contact nav__link--active" href="#">contact</a>
                    </li>
                </ul>
                <div class="logo-desk">
                    <img class="logo-desk" src="./src/assets/images/logo-desk.svg" alt="Logo site">
                </div>
            </div>

        </div>
    </nav>



    <!-- <nav class="nav navbar"> -->

    <main class="contact">

        <!-- Logo site web -->
        <header class="contact__header">
            <a href="./index.php" class="contact__logo-link">
                <img src="./src/assets/images/logo-site-mobile.svg" alt="Logo del sitio" class="contact__logo">
            </a>
            <a href="./login.php" target="_blank" rel="noopener">
                <span>Log in?</span>
            </a>
        </header>



        <div class="contact__container">
            <!-- Form contacto -->
            <section class="contact__form-section">
                <h2 class="contact__title">Contact About:</h2>

                <form action="/contact" method="POST" class="contact__form">

                    <div class="contact__form-info">

                        <div>

                            <!-- Campo de primer nombre -->


                            <label for="first-name" class="contact__label">First Name</label>
                            <input type="text" id="first-name" name="first-name" placeholder="Emilio" required
                                class="contact__input">





                            <!-- Campo de apellido -->


                            <label for="last-name" class="contact__label">Last Name</label>
                            <input type="text" id="last-name" name="last-name" placeholder="Emiliano" required
                                class="contact__input">

                        </div>

                        <div>
                            <!-- Campo de correo electrónico -->

                            <label for="email" class="contact__label">Email</label>
                            <input type="email" id="email" name="email" placeholder="Maximiliano@outlook.com" required
                                class="contact__input">





                            <label for="subject" class="contact__label">Subject</label>
                            <input type="text" id="subject" name="subject" placeholder="snakes" required
                                class="contact__input">





                        </div>
                    </div>
                    <!-- Campo de mensaje -->
                    <div>

                        <label for="message" class="contact__label">Message</label>

                        <textarea id="message" name="message" rows="4" placeholder="are there snakes?" required
                            class="contact__textarea"></textarea>
                    </div>
                    <!-- Campo de asunto -->




                    <!-- Botón de envío -->
                    <button type="submit" class="contact__button">Send</button>
                </form>
            </section>
        </div>

    </main>
    <script type="module" src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>

</html>