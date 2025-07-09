<?php
require_once __DIR__ . '/../includes/functions.php';

includeTemplate("nav");


?>



<!-- <nav class="nav navbar"> -->

<main class="contact">

    <!-- Logo site web -->
    <header class="contact__header">
        <a href="./index.php" class="contact__logo-link">
            <img src="/src/assets/images/logo-site-mobile.svg" alt="Logo del sitio" class="contact__logo">
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



<?php
includeTemplate("footer");


?>