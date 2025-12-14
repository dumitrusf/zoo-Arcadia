<?php
// App/home/views/pages/index.php
?>

<?php include_once __DIR__ . '/../../../../includes/templates/hero.php'; ?>


<main>
	<!-- K-ABOUT (Restored exactly as requested) -->
	<section class="k-about">
		<div class="k-about__container">
			<div class="k-about__image">
				<!-- Using static image for now, as it was in original -->
				<img src="https://res.cloudinary.com/dxkdwzbs6/image/upload/v1764873838/5e6e4c9a-7e33-4dc0-ad86-783068dd38a8_1_gadwme.png"
					class="k-about__image d-block img-fluid" alt="about image" loading="lazy" />
			</div>
			<div class="k-about__content">
				<h2 class="k-about__content-title">More About Us</h2>
				<div class="k-about__content-description">
					<p>In the heart of Bretagne, Arcadia Zoo is home to unique animals from the savannah, jungle, and wetlands.</p>
					<p>Since 1960, we have ensured their well-being through daily veterinary care and tailored feeding.</p>
				</div>
				<a href="/about/pages/about" class="k-about__content-button btn intro__button intro__button--hours">know more</a>
			</div>
		</div>
	</section>

	<div class="intro intro--services">
		<?php if (!empty($featuredServices)): ?>
			<?php foreach ($featuredServices as $service): ?>
				<section class="intro__section">
					<h2 class="intro__title"><?= htmlspecialchars($service->service_title) ?></h2>

					<div class="intro__content">
						<?php if (!empty($service->media_path)): ?>
							<picture>
								<source
									srcset="<?= getCloudinaryUrl($service->media_path, 'w_744,c_scale,q_auto,f_auto') ?>"
									media="(min-width: 744px)" />
								<img src="<?= getCloudinaryUrl($service->media_path, 'w_320,c_scale,q_auto,f_auto') ?>"
									class="intro__image d-block" alt="Image for <?= htmlspecialchars($service->service_title) ?>" loading="lazy" />
							</picture>
						<?php endif; ?>
						<div class="intro__details">
							<?php if (!empty($service->link)): ?>
								<a class="btn intro__button intro__button--more intro__button--<?= strtolower(htmlspecialchars($service->service_title)) ?>" href="<?= htmlspecialchars($service->link) ?>">more</a>
							<?php endif; ?>
							<p class="intro__description"><?= htmlspecialchars($service->service_description) ?></p>

						</div>
					</div>
				</section>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<section class="testimony">
		<div class="testimony__approuved testimony__container">
			<h2 class="testimony__title testimony__title--shown">take a look to our most recent testimony</h2>

			<!--  -->

			<div class="testimony__item">
				<div class="testimony__header">
					<span class="testimony__user">knight</span>
					<span class="testimony__rating">★★★★★</span>
				</div>
				<p class="testimony__text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem reiciendis exercitationem
					iste, repellendus repudiandae nihil ut eaque sed quam sit at harum non quas nulla
					explicabo architecto numquam eum deleniti!
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem reiciendis exercitationem
					iste, repellendus repudiandae nihil ut eaque sed quam sit at harum non quas nulla
					explicabo architecto numquam eum deleniti!
				</p>
			</div>
		</div>
		<a href="./about.php#testimonys" class="btn intro__button intro__button--hours">know more</a>

	</section>
</main>