	<!-- <nav class="nav navbar"> -->

	<header class="hero">
		<div class="hero__container">
			<div class="hero__text">
				<h1 class="hero__title">habitats</h1>
			</div>


			<a class="btn intro__button intro__button--hours" href="#opening-hours">opening hours</a>

		</div>


		<picture>
			<source
				srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876866/DALL_E_2024-08-24_13.04.18_-_A_hyper-realistic_image_showing_three_distinct_habitats_with_no_visible_vertical_dividing_lines._On_the_left_a_savanna_with_golden_grass_sparse_tree_2_pskxpd.webp"
				media="(min-width: 1280px)" />
			<source
				srcset="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764876995/DALL_E_2024-08-24_13.04.18_-_A_hyper-realistic_image_showing_three_distinct_habitats_with_no_visible_vertical_dividing_lines._On_the_left_a_savanna_with_golden_grass_sparse_tree_2_jas09u.webp"
				media="(min-width: 744px)" />
			<img src="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764877493/DALL_E_2024-08-24_13.04.18_-_A_hyper-realistic_image_showing_three_distinct_habitats_with_no_visible_vertical_dividing_lines._On_the_left_a_savanna_with_golden_grass_sparse_tree_1_ubumul.webp"
				class="hero__image d-block img-fluid" alt="hero image habitats" />
		</picture>

	</header>







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
                            <?php if (!empty($habitat->link)): ?>
								<a class="btn intro__button intro__button--more" href="<?= htmlspecialchars($habitat->link) ?>">more</a>
							<?php endif; ?>
                            <p class="intro__description"><?= htmlspecialchars($habitat->service_description) ?></p>
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