<?php include "includes/templates/nav.php"; ?>



    <header class="hero">
        <div class="hero__container">
            <div class="hero__text">
                <h1 class="hero__title">savannah animals</h1>
                <p class="hero__subtitle">wild animals</p>
            </div>


            <a class="btn intro__button intro__button--hours" href="#opening-hours">opening hours</a>

        </div>


        <picture>
            <source
                srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228689&authkey=!AGb9hyvEkexZX_0&ithint=photo&e=Twgyf3"
                media="(min-width: 1280px)" />
            <source
                srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228682&authkey=!AO_ZZzP6a6mOPwg&ithint=photo&e=cvlTBH"
                media="(min-width: 744px)" />
            <img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228659&authkey=!AMjsIy-pRloHNkM&ithint=photo&e=2wFiuy"
                class="hero__image d-block img-fluid" alt="hero image intro habitat-1" />
        </picture>
    </header>







    <main>


        <nav class="filter">
            <div class="container-fluid">
                <a href="#">Open Filter</a>
                <button class="navbar-toggler bar-button" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <i class="bi bi-filter-right"></i>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h2 class="offcanvas-title" id="offcanvasNavbarLabel">close filter:</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">

                        <form class="filter__container d-flex mt-3" role="search">

                            <fieldset class="filter__fieldset">
                                <legend class="filter__legend">filter by:</legend>

                                <!-- Animal breed filter -->
                                <div class="filter__legend-election">
                                    <label for="animal-breed" class="filter__label">Animal breed:</label>

                                    <select id="animal-breed" name="animal-breed" class="filter__select">
                                        <option value="" selected>Select animal breed</option>
                                        <option value="mammal">Mammal</option>
                                        <option value="reptile">Reptile</option>
                                        <option value="bird">Bird</option>
                                        <option value="amphibian">Amphibian</option>
                                        <option value="arachnid">Arachnid</option>
                                        <option value="insect">Insect</option>
                                    </select>

                                    <!-- Nutrition filter -->
                                    <label for="nutrition" class="filter__label">Nutrition:</label>

                                    <select id="nutrition" name="nutrition" class="filter__select">
                                        <option value="" selected>Select animal nutrition</option>
                                        <option value="carnivorous">Carnivorous</option>
                                        <option value="herbivore">Herbivore</option>
                                        <option value="omnivore">Omnivore</option>
                                    </select>
                                    <label for="state" class="filter__label">State:</label>

                                    <select id="state" name="state" class="filter__select">
                                        <option value="" selected>Select animal state</option>
                                        <option value="healthy">Healthy</option>
                                        <option value="sick">Sick</option>
                                        <option value="injured">Injured</option>
                                        <option value="recovering">Recovering</option>
                                        <option value="quarantined">Quarantined</option>
                                        <option value="pregnant">Pregnant</option>
                                        <option value="deceased">Deceased</option>
                                        <option value="stressed">Stressed</option>
                                        <option value="under-observation">Under Observation</option>
                                        <option value="new-arrival">New Arrival</option>
                                        <option value="endangered">Endangered</option>
                                        <option value="old-age">Old Age</option>
                                        <option value="angry">Angry</option>
                                    </select>

                                </div>


                                <!-- Restart button -->
                                <button type="reset" class="filter__button filter__button--reset">Restart</button>
                            </fieldset>

                        </form>
                    </div>
                    <div class="offcanvas-header">
                        <h2 class="offcanvas-title">close filter:</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                </div>

            </div>
        </nav>



        <div class="intro">



            <article class="intro__article intro__animal">

                <a class="intro__link" href="./animal-picked.php" target="_blank" rel="noopener noreferrer">
                    <picture>
                        <source
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228687&authkey=!AADI2MBU26FJT04&ithint=photo&e=kHFnPE"
                            media="(min-width: 1280px)" />
                        <source
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228683&authkey=!ABwE8fNtME0OPUQ&ithint=photo&e=wAwFTK"
                            media="(min-width: 744px)" />
                        <img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228660&authkey=!ANsNXnRR0er7Ugw&ithint=photo&e=iibNL9"
                            class="intro__image d-block img-fluid" alt="animal-1" />
                    </picture>

                    <div class="intro__details">
                        <h3 class="intro__name">bujara</h3>
                        <p class="intro__species">vulture</p>
                        <p class="intro__habitat">savannah</p>
                    </div>
                </a>
            </article>

            <article class="intro__article intro__animal">
                <a class="intro__link" href="./animal-picked.php" target="_blank" rel="noopener noreferrer">


                    <picture>
                        <source
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228655&authkey=!ADtHdPuknbAhUts&ithint=photo&e=lJFlYv"
                            media="(min-width: 1280px)" />
                        <source
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228645&authkey=!ALc4yOxSqIXXcts&ithint=photo&e=xvefO4"
                            media="(min-width: 744px)" />
                        <img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228637&authkey=!ABpNXHA_qfVEdLc&ithint=photo&e=XHDMXn"
                            class="intro__image d-block img-fluid" alt="animal-2" />
                    </picture>
                    <div class="intro__details">
                        <h3 class="intro__name">bujara</h3>
                        <p class="intro__species">vulture</p>
                        <p class="intro__habitat">savannah</p>
                    </div>
                </a>
            </article>

            <article class="intro__article intro__animal">
                <a class="intro__link" href="./animal-picked.php" target="_blank" rel="noopener noreferrer">
                    <picture>
                        <source
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228692&authkey=!AE4JQzILKzGbYcU&ithint=photo&e=JsrNyL"
                            media="(min-width: 1280px)" />
                        <source
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228684&authkey=!AI0h-H8_m_fMzvQ&ithint=photo&e=GakFzc"
                            media="(min-width: 744px)" />
                        <img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228658&authkey=!APQlYnFbMcDRlrA&ithint=photo&e=GGAqjy"
                            class="intro__image d-block img-fluid" alt="animal-3" />
                    </picture>
                    <div class="intro__details">
                        <h3 class="intro__name">bujara</h3>
                        <p class="intro__species">vulture</p>
                        <p class="intro__habitat">savannah</p>
                    </div>
                </a>
            </article>
            <article class="intro__article intro__animal">
                <a class="intro__link" href="./animal-picked.php" target="_blank" rel="noopener noreferrer">
                    <picture>
                        <source
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228692&authkey=!AE4JQzILKzGbYcU&ithint=photo&e=JsrNyL"
                            media="(min-width: 1280px)" />
                        <source
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228684&authkey=!AI0h-H8_m_fMzvQ&ithint=photo&e=GakFzc"
                            media="(min-width: 744px)" />
                        <img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228658&authkey=!APQlYnFbMcDRlrA&ithint=photo&e=GGAqjy"
                            class="intro__image d-block img-fluid" alt="animal-3" />
                    </picture>
                    <div class="intro__details">
                        <h3 class="intro__name">bujara</h3>
                        <p class="intro__species">vulture</p>
                        <p class="intro__habitat">savannah</p>
                    </div>
                </a>
            </article>

        </div>

        <nav class="nav-pagination">

            <ul class="nav-pagination__ul">
                <li class="nav-pagination__li">
                    <a href="#" aria-label="Previous">
                        <i class="bi bi-caret-left-fill"></i>
                    </a>
                </li>
                <li class="nav-pagination__li"><a href="#">1,</a></li>
                <li class="nav-pagination__li nav__link--active"><a href="#">2,</a></li>
                <li class="nav-pagination__li"><a href="#">3 ...</a></li>
                <li class="nav-pagination__li">
                    <a href="#" aria-label="Next">
                        <i class="bi bi-caret-right-fill"></i>
                    </a>
                </li>
            </ul>
        </nav>

    </main>



    





    <footer class="footer">
        <section class="footer__hours" id="opening-hours">
            <div class="footer__location">
                <div class="footer__location-details">
                    <p class="footer__city">BRETAGNE (35380)</p>
                    <p class="footer__forest">FORÊT DE BROCÉLIANDE</p>
                </div>

                <div>
                    <p class="footer__hours-title">HEURES D'OUVERTURE</p>

                    <table class="footer__hours-table">
                        <tbody>

                            <tr class="footer__hours-row">
                                <th class="footer__hours-header">Matin:</th>
                                <td class="footer__hours-data">08:45 - 12:00</td>
                            </tr>
                            <tr class="footer__hours-row">
                                <th class="footer__hours-header">Après-midi:</th>
                                <td class="footer__hours-data">14:00 - 18:00</td>
                            </tr>
                            <tr class="footer__hours-row">
                                <th class="footer__hours-header">Samedi:</th>
                                <td class="footer__hours-data">08:45 - 12:00</td>
                            </tr>
                            <tr class="footer__hours-row">
                                <th class="footer__hours-header">Dimanche:</th>
                                <td class="footer__hours-data">Fermé</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>

            <!-- the image click redirect to top for this moment just exemple -->
            <a class="footer__logo-link" href="#top">
                <img class="footer__logo" src="./src/assets/images/logo-site-mobile.svg"
                    alt="Logo del sitio - Volver al inicio">
            </a>
        </section>

        <div class="footer__copyright">
            <small>&copy; 2024 Arcadia ZOO Bretagne | Designed By D.S.F</small>
        </div>
    </footer>
    <script type="module" src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>

</html>