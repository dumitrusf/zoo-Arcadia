<header class="hero">
	<div class="hero__container">
		<div class="hero__text">
			<h1 class="hero__title">services</h1>
		</div>
		<a class="btn intro__button intro__button--hours" href="#opening-hours">opening hours</a>
	</div>
	<picture>
		<source
			srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876450/DALL_E_2024-08-23_20.27.03_-_A_hyper-realistic_image_of_a_monkey_dressed_exactly_like_the_one_provided_wearing_a_tailored_butler_suit_complete_with_a_bow_tie_and_white_gloves._T_8_pmcjcu.webp"
			media="(min-width: 1280px)" />
		<source
			srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876398/DALL_E_2024-08-23_20.27.03_-_A_hyper-realistic_image_of_a_monkey_dressed_exactly_like_the_one_provided_wearing_a_tailored_butler_suit_complete_with_a_bow_tie_and_white_gloves._T_7_rtctpu.webp"
			media="(min-width: 744px)" />
		<img src="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876163/DALL_E_2024-08-23_20.27.03_-_A_hyper-realistic_image_of_a_monkey_dressed_exactly_like_the_one_provided_wearing_a_tailored_butler_suit_complete_with_a_bow_tie_and_white_gloves._T_1_dbwrhq.webp"
			class="hero__image d-block" alt="monkey" fetchpriority="high" />
	</picture>
</header>

<main>
	<div class="intro intro--services">

        <?php if (!empty($services)): ?>
            <?php foreach($services as $service): ?>
                <section class="intro__section">
                    <h2 class="intro__title"><?= htmlspecialchars($service->service_title) ?></h2>

                    <div class="intro__content">
                        <?php if (!empty($service->media_path)): ?>
                            <picture>
                                <source
                                    srcset="<?= getCloudinaryUrl($service->media_path, 'w_1280,c_scale,q_auto,f_auto') ?>"
                                    media="(min-width: 1280px)" />
                                <source
                                    srcset="<?= getCloudinaryUrl($service->media_path, 'w_744,c_scale,q_auto,f_auto') ?>"
                                    media="(min-width: 744px)" />
                                <img src="<?= getCloudinaryUrl($service->media_path, 'w_400,c_scale,q_auto,f_auto') ?>"
                                    class="intro__image d-block" alt="Image for <?= htmlspecialchars($service->service_title) ?>" loading="lazy" />
                            </picture>
                        <?php endif; ?>

                        <div class="intro__details">
                            <p class="intro__description"><?= htmlspecialchars($service->service_description) ?></p>
                        </div>
                    </div>
                </section>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="container text-center py-5">
                <p class="h3 text-muted">No services are available at the moment.</p>
            </div>
        <?php endif; ?>

	</div>
</main>