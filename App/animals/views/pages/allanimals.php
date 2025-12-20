<!-- <nav class="nav navbar"> -->

<?php include_once __DIR__ . '/../../../../includes/templates/hero.php'; ?>

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

                            <!-- Animal specie  filter -->
                            <div class="filter__legend-election">
                                <label for="animal-specie " class="filter__label">Animal specie :</label>

                                <select id="animal-specie " name="animal-specie " class="filter__select">
                                    <option value="" selected>Select animal specie </option>
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
        <?php if (!empty($animals)): ?>
            <?php foreach ($animals as $animal): ?>
                <article class="intro__article intro__animal">
                    <a class="intro__link" href="/animals/pages/animalpicked?id=<?= $animal->id_full_animal ?>" target="_blank" rel="noopener noreferrer">
                        <?php if (!empty($animal->media_path)): ?>
                            <picture>
                                <source
                                    srcset="<?= !empty($animal->media_path_large) ? $animal->media_path_large : getCloudinaryUrl($animal->media_path, 'w_1280,c_scale,q_auto,f_auto') ?>"
                                    media="(min-width: 1280px)" />
                                <source
                                    srcset="<?= !empty($animal->media_path_medium) ? $animal->media_path_medium : getCloudinaryUrl($animal->media_path, 'w_744,c_scale,q_auto,f_auto') ?>"
                                    media="(min-width: 744px)" />
                                <img src="<?= getCloudinaryUrl($animal->media_path, 'w_400,c_scale,q_auto,f_auto') ?>"
                                    class="intro__image d-block img-fluid" alt="<?= htmlspecialchars($animal->animal_name) ?>" loading="lazy" />
                            </picture>
                        <?php else: ?>
                            <div class="intro__image bg-light d-flex align-items-center justify-content-center" style="min-height: 200px;">
                                <i class="bi bi-image" style="font-size: 3rem; color: #ccc;"></i>
                            </div>
                        <?php endif; ?>

                        <div class="intro__details">
                            <h3 class="intro__name"><?= htmlspecialchars($animal->animal_name ?? 'Unknown') ?></h3>
                            <p class="intro__classes"><?= htmlspecialchars($animal->specie_name ?? 'Unknown species') ?></p>
                            <p class="intro__habitat"><?= htmlspecialchars($animal->habitat_name ?? 'Unknown habitat') ?></p>
                        </div>
                    </a>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="container text-center py-5">
                <p class="h3 text-muted">No animals found at the moment.</p>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($animals) && count($animals) > 12): ?>
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
    <?php endif; ?>
</main>