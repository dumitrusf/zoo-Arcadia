<?php
// App/habitats/views/pages/habitat1.php
?>

<?php include_once __DIR__ . '/../../../../includes/templates/hero.php'; ?>

<main>
    <!-- Filter Navigation (can be enhanced later) -->
    <nav class="filter">
        <div class="container-fluid">
            <a href="/habitats/pages/habitats">← Back to Habitats</a>
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
                            <!-- Animal specie filter -->
                            <div class="filter__legend-election">
                                <label for="animal-specie" class="filter__label">Animal specie:</label>
                                <select id="animal-specie" name="animal-specie" class="filter__select">
                                    <option value="" selected>Select animal specie</option>
                                    <!-- TODO: Populate dynamically from database -->
                                </select>
                            </div>
                            <button type="reset" class="filter__button filter__button--reset">Restart</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Habitat Description Section -->
    <?php if (isset($habitat)): ?>
        <div class="container my-5">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-4"><?= htmlspecialchars(strtoupper($habitat->habitat_name)) ?></h2>
                    <?php if (!empty($habitat->description_habitat)): ?>
                        <p class="text-center lead"><?= htmlspecialchars($habitat->description_habitat) ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Animals Grid -->
    <div class="intro intro--habitats">
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
                            <p class="intro__habitat"><?= htmlspecialchars($habitat->habitat_name ?? 'Unknown habitat') ?></p>
                        </div>
                    </a>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="container text-center py-5">
                <p class="h3 text-muted">No animals found in this habitat at the moment.</p>
                <a href="/habitats/pages/habitats" class="btn btn-primary mt-3">Back to Habitats</a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination (can be implemented later) -->
    <?php if (!empty($animals) && count($animals) > 12): ?>
        <nav class="nav-pagination">
            <ul class="nav-pagination__ul">
                <li class="nav-pagination__li">
                    <a href="#" aria-label="Previous">
                        <i class="bi bi-caret-left-fill"></i>
                    </a>
                </li>
                <li class="nav-pagination__li nav__link--active"><a href="#">1</a></li>
                <li class="nav-pagination__li">
                    <a href="#" aria-label="Next">
                        <i class="bi bi-caret-right-fill"></i>
                    </a>
                </li>
            </ul>
        </nav>
    <?php endif; ?>

</main>
