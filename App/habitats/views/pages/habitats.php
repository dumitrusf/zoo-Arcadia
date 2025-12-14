<?php
// App/habitats/views/pages/habitats.php
?>

<?php include_once __DIR__ . '/../../../../includes/templates/hero.php'; ?>

<main>
	<div class="intro intro--services">

        <?php if (!empty($habitats)): ?>
            <?php foreach($habitats as $habitat): ?>
                <section class="intro__section">
                    <h2 class="intro__title"><?= htmlspecialchars($habitat->service_title) ?></h2>

                    <div class="intro__content">
                        <?php if (!empty($habitat->media_path)): ?>
                            <picture>
                                <source
                                    srcset="<?= getCloudinaryUrl($habitat->media_path, 'w_1280,c_scale,q_auto,f_auto') ?>"
                                    media="(min-width: 1280px)" />
                                <source
                                    srcset="<?= getCloudinaryUrl($habitat->media_path, 'w_744,c_scale,q_auto,f_auto') ?>"
                                    media="(min-width: 744px)" />
                                <img src="<?= getCloudinaryUrl($habitat->media_path, 'w_400,c_scale,q_auto,f_auto') ?>"
                                    class="intro__image d-block" alt="Image for <?= htmlspecialchars($habitat->service_title) ?>" loading="lazy" />
                            </picture>
                        <?php endif; ?>

                        <div class="intro__details">
                            <p class="intro__description"><?= htmlspecialchars($habitat->service_description) ?></p>
                            <?php if (!empty($habitat->link)): ?>
								<a class="btn intro__button intro__button--more" href="<?= htmlspecialchars($habitat->link) ?>">more</a>
							<?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="container text-center py-5">
                <p class="h3 text-muted">No habitats are available at the moment.</p>
            </div>
        <?php endif; ?>

	</div>
</main>
