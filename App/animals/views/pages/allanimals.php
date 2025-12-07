<!-- <nav class="nav navbar"> -->

    <header class="hero">
        <div class="hero__container">
            <div class="hero__text">
                <h1 class="hero__title">zoo arcadia</h1>
                <p class="hero__subtitle">discover all animals from the zoo</p>
            </div>

            <a href="#opening-hours" class="btn intro__button intro__button--hours">opening hours</a>
        </div>


        <picture>
            <source
                srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228651&authkey=!AF7FDhfIr6Irtcw&ithint=photo&e=z0hucX"
                media="(min-width: 1280px)" />
            <source
                srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228642&authkey=!ADsg4gNZ0nxjNgs&ithint=photo&e=ROnGBA"
                media="(min-width: 744px)" />
            <img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228640&authkey=!AA8J10uGPzxeMWo&ithint=photo&e=gNK7aA"
                class="hero__image d-block img-fluid" alt="hero images all animals" />
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

                                    <!-- Habitat filter -->
                                    <label for="animal-habitat" class="filter__label">Habitat:</label>

                                    <select id="animal-habitat" name="animal-habitat" class="filter__select">
                                        <option value="" selected>Select animal habitat</option>
                                        <option value="savannah">Savannah</option>
                                        <option value="swamp">Swamp</option>
                                        <option value="jungle">Jungle</option>
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
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228653&authkey=!AHvuPgzUrsQF0kU&ithint=photo&e=yyl6sG"
                            media="(min-width: 1280px)" />
                        <source
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228643&authkey=!AP6YS2eyrPEr_gA&ithint=photo&e=8G9t8t"
                            media="(min-width: 744px)" />
                        <img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228638&authkey=!APg7D8eJ-_2D0Lc&ithint=photo&e=RbCz5k"
                            class="intro__image d-block" alt="animal-1" />
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
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228653&authkey=!AHvuPgzUrsQF0kU&ithint=photo&e=yyl6sG"
                            media="(min-width: 1280px)" />
                        <source
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228643&authkey=!AP6YS2eyrPEr_gA&ithint=photo&e=8G9t8t"
                            media="(min-width: 744px)" />
                        <img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228638&authkey=!APg7D8eJ-_2D0Lc&ithint=photo&e=RbCz5k"
                            class="intro__image d-block" alt="animal-1" />
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
                            class="intro__image d-block" alt="animal-2" />
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
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228652&authkey=!AL7eQVJXK5aqJ9k&ithint=photo&e=hneCoo"
                            media="(min-width: 1280px)" />
                        <source
                            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228646&authkey=!ANEWjBbCNzdBSBc&ithint=photo&e=GbOF8g"
                            media="(min-width: 744px)" />
                        <img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228639&authkey=!ANa8tcYt_CgCXaQ&ithint=photo&e=tD9HEy"
                            class="intro__image d-block" alt="animal-3" />
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

