<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="keywords"
        content="zoo, animals, habitats, Brocéliande, veterinarians, ecology, wildlife park, conservation, zoo services, guided tours, France zoo, sustainable energy, wild animals, animal feeding, zoo management, Arcadia Zoo" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <title>ARCADIA - login</title>

    <link rel="icon" type="image/svg+xml" href="/src/assets/images/favicon.svg" />
    <link rel="icon" type="image/png" href="/src/assets/images/favicon.png" />

    <link rel="stylesheet" href="/node_modules/Normalize-css/normalize.css" />

    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css" />

    <link rel="stylesheet" href="build/css/app.css">
</head>

<body class="body-login">







    <!-- <nav class="nav navbar"> -->

    <main class="login">

        <!-- Logo site web -->
        <header class="login__header">
            <a href="./index.php" class="login__logo-link">
                <img src="/src/assets/images/logo-site-mobile.svg" alt="Logo del sitio" class="login__logo">
            </a>

        </header>



        <div class="login__container">
            <!-- Form logino -->
            <section class="login__form-section">
                <h2 class="login__title">Owner?</h2>

                <form action="/login" method="POST" class="login__form">

                    <div class="login__form-info">

                        <div>

                            <!-- Campo de primer nombre -->


                            <label for="email" class="login__label">UserName</label>
                            <input type="email" id="email" name="email" placeholder="(Email)" required
                                class="login__input">



                            <!-- Campo de apellido -->


                            <label for="password" class="login__label">Password</label>
                            <input type="password" id="password" name="password" placeholder="********" required
                                class="login__input">

                        </div>
                    </div>

                    <!-- Botón de envío -->
                    <button type="submit" class="login__button">Login</button>
                </form>
            </section>
        </div>

        <a href="./login.php" target="_blank" rel="noopener">
            <span>¿Have you forgotten your password?</span>
        </a>

    </main>
    <script type="module" src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>

</html>