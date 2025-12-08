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
                srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877378/DALL_E_2024-08-27_16.54.15_-_A_highly_detailed_and_realistic_image_featuring_a_cheetah_from_the_savannah_a_scarlet_ibis_from_the_swamp_and_a_chimpanzee_from_the_jungle_all_seam_1_ibqrb7.webp"
                media="(min-width: 1280px)" />
            <source
                srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877726/DALL_E_2024-08-27_16.54.15_-_A_highly_detailed_and_realistic_image_featuring_a_cheetah_from_the_savannah_a_scarlet_ibis_from_the_swamp_and_a_chimpanzee_from_the_jungle_all_seam_1_o4z04j.webp"
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
                            srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877372/DALL_E_2024-10-18_18.28.54_-_A_hyper-realistic_jungle_scene_featuring_a_harpy_eagle_perched_on_a_branch_with_a_similar_environment_to_the_previous_jungle_images._The_background_i_1_il6ikc.webp"
                            media="(min-width: 1280px)" />
                        <source
                            srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877722/DALL_E_2024-10-18_18.28.54_-_A_hyper-realistic_jungle_scene_featuring_a_harpy_eagle_perched_on_a_branch_with_a_similar_environment_to_the_previous_jungle_images._The_background_i_1_nczypq.webp"
                            media="(min-width: 744px)" />
                        <img src="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764878015/DALL_E_2024-10-18_18.28.54_-_A_hyper-realistic_jungle_scene_featuring_a_harpy_eagle_perched_on_a_branch_with_a_similar_environment_to_the_previous_jungle_images._The_background_i_1_gxgj6y.webp"
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
                            srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877366/jirafa_ddeelb.webp"
                            media="(min-width: 1280px)" />
                        <source
                            srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877731/jirafa_mfpdrh.webp"
                            media="(min-width: 744px)" />
                        <img src="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764878015/jirafa_rqtifl.webp"
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
                            srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877362/DALL_E_2024-10-19_11.56.54_-_A_close-up_realistic_scene_featuring_a_hippopotamus_in_a_swampy_area._The_hippo_is_partially_submerged_in_water_with_its_large_head_and_upper_body_v_1_iu8pvm.webp"
                            media="(min-width: 1280px)" />
                        <source
                            srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877718/DALL_E_2024-10-19_11.56.54_-_A_close-up_realistic_scene_featuring_a_hippopotamus_in_a_swampy_area._The_hippo_is_partially_submerged_in_water_with_its_large_head_and_upper_body_v_1_sxpzxo.webp"
                            media="(min-width: 744px)" />
                        <img src="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764878016/DALL_E_2024-10-19_11.56.54_-_A_close-up_realistic_scene_featuring_a_hippopotamus_in_a_swampy_area._The_hippo_is_partially_submerged_in_water_with_its_large_head_and_upper_body_v_1_zmk9xs.webp"
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
                            srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877358/DALL_E_2024-08-24_20.30.28_-_A_hyper-realistic_image_of_a_vulture_in_the_savanna._The_vulture_is_in_the_foreground_standing_on_the_ground_with_its_wings_slightly_spread_showcasi_3_sayqga.webp"
                            media="(min-width: 1280px)" />
                        <source
                            srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877713/DALL_E_2024-08-24_20.30.28_-_A_hyper-realistic_image_of_a_vulture_in_the_savanna._The_vulture_is_in_the_foreground_standing_on_the_ground_with_its_wings_slightly_spread_showcasi_2_azrc3v.webp"
                            media="(min-width: 744px)" />
                        <img src="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877968/DALL_E_2024-08-24_20.30.28_-_A_hyper-realistic_image_of_a_vulture_in_the_savanna._The_vulture_is_in_the_foreground_standing_on_the_ground_with_its_wings_slightly_spread_showcasi_1_widzmc.png"
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

