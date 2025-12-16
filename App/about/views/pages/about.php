<?php
// App/about/views/pages/about.php
?>

<!-- HERO SECTION (Dynamic) -->
<?php include_once __DIR__ . '/../../../../includes/templates/hero.php'; ?>

<main class="intro">

	<section class="intro__section--presentation">
        <!-- Dynamic Brick Title -->
		<h2 class="intro__title"><?= isset($aboutBrick) ? htmlspecialchars($aboutBrick->title) : 'who we are ?' ?></h2>

		<div class="intro__content">
			<div class="intro__presentation">
                <!-- Dynamic Brick Description -->
                <?php if (isset($aboutBrick)): ?>
				    <p><?= nl2br(htmlspecialchars($aboutBrick->description)) ?></p>
                <?php else: ?>
                    <!-- Fallback static content -->
                    <p>Arcadia Zoo, located near the Brocéliande Forest in Brittany, France, has been a sanctuary for
					animals since 1960. Organized into diverse habitats such as the savannah, jungle, and wetlands,
					the zoo is committed to the well-being of its residents. Daily veterinary checks ensure the
					health of all animals before the zoo opens its doors to the public, and their meals are
					carefully portioned according to veterinarian reports.
					<br><br>
					With its thriving operation and happy animals, Arcadia Zoo is a source of pride for its
					director, José, who envisions even greater achievements for the zoo's future. Through innovation
					and care, the zoo continues to be a place where visitors can connect with animals and nature.
				    </p>
                <?php endif; ?>
			</div>
		</div>
	</section>

</main>

<section class="testimony" id="testimonys">
    <!-- ... testimony section remains static for now ... -->
	<div class="testimony__approuved testimony__container">
		<h2 class="testimony__title testimony__title--shown">All testimonys</h2>

		<div id="carouselExampleRide" data-bs-theme="dark" class="carousel slide" data-bs-ride="true">
			<div class="carousel-inner">
				<div class="carousel-item active">
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
				<div class="carousel-item">
					<div class="testimony__item">
						<div class="testimony__header">
							<span class="testimony__user">willfred</span>
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
				<div class="carousel-item">
					<div class="testimony__item">
						<div class="testimony__header">
							<span class="testimony__user">Robin</span>
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
			</div>
			<div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide"
					data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
					data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</div>

	<div class="testimony__feedback testimony__container">
		<h2 class="testimony__title testimony__title--feedback">Write your feedback</h2>
		<form class="testimony__form">
			<fieldset class="testimony__fieldset">

				<div class="testimony__field">
					<div class="testimony__rating-group">
						<label class="testimony__label" for="rating"></label>
						<div id="rating" class="testimony__stars">
							<span class="testimony__star" data-value="1">★</span>
							<span class="testimony__star" data-value="2">★</span>
							<span class="testimony__star" data-value="3">★</span>
							<span class="testimony__star" data-value="4">★</span>
							<span class="testimony__star" data-value="5">★</span>
						</div>
						<label class="testimony__label" for="pseudo">Pseudo</label>

					</div>
					<input class="testimony__input" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" />
				</div>

				<div class="testimony__field testimony__field--message">
					<div class="testimony__message-group">
						<label class="testimony__label" for="message">Message</label>
						<br />
						<textarea class="testimony__textarea" id="message" name="message" rows="4"
							placeholder="Your message"></textarea>
						<br />
					</div>
					<a type="submit" class="btn intro__button intro__button--send">SEND</a>
				</div>


			</fieldset>
		</form>
	</div>
</section>
