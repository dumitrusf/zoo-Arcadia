<?php
require_once __DIR__ . '/../includes/functions.php';
includeTemplate("nav");
?>



<header class="hero">
    <div class="hero__container">
        <div class="hero__text">
            <h1 class="hero__title">zoo arcadia</h1>
            <p class="hero__subtitle">Where all animals love to live</p>
        </div>


        <a type="button" class="btn intro__button intro__button--hours" href="#opening-hours">opening hours</a>

    </div>

    <picture>
        <source
            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228542&authkey=!AMl2o5PoyxXuRBU&ithint=photo&e=u9NmzI"
            media="(min-width: 1280px)" />
        <source
            srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228541&authkey=!ALbJeAgEo2Qdg4I&ithint=photo&e=Fo1CxO"
            media="(min-width: 744px)" />
        <img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228540&authkey=!AMZQRT_KTs11Qf0&ithint=photo&e=xZ2JoE"
            class="hero__image d-block" alt="hero image" />
    </picture>
</header>

<main>
	<section class="k-about">
		<div class="k-about__container">

			<div class="k-about__image">

				<img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!229330&authkey=!APCoHyp5AxaPBUw&ithint=photo&e=D9Tjm4"
					class="k-about__image d-block img-fluid" alt="about image" />



			</div>
			<div class="k-about__content">
				<h2 class="k-about__content-title">More About Us</h2>
				<div class="k-about__content-description">

					<p>In the heart of Bretagne, Arcadia Zoo is home to unique animals from the savannah, jungle, and
						wetlands.
					</p>
					<p>Since 1960, we have ensured their well-being through daily veterinary care and tailored feeding.
					</p>
				</div>
				<a href="about.php" class="k-about__content-button btn intro__button intro__button--hours">know
					more</a>
			</div>
		</div>
	</section>
	<div class="intro intro--index">




		<section class="intro__section intro__section--services">
			<h2 class="intro__title">services</h2>

			<div class="intro__content">



				<picture>

					<source
						srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!229326&authkey=!AMTCK-ljrEkI3kU&ithint=photo&e=rrfb5C"
						media="(min-width: 744px)" />
					<img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228539&authkey=!AN4rlHglgLF3_Lg&ithint=photo&e=GjHwzM"
						class="intro__image d-block img-fluid" alt="intro services" />
				</picture>


				<div class="intro__details">

					<a class="btn intro__button intro__button--more intro__button--services"
						href="./services.php">more</a>

					<p class="intro__description">see what arcadia can offers you</p>
				</div>
			</div>
		</section>



		<section class="intro__section intro__section--habitats">
			<h2 class="intro__title">habitats</h2>

			<div class="intro__content">
				<!-- <img class="intro__image"
					src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!227792&authkey=!AMKZjbJ965omT9g&ithint=photo&e=MUp6nM"
					alt="intro habitats"> -->

				<picture>

					<source
						srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228559&authkey=!AAcykAnJfMU5FcM&ithint=photo&e=lTXyX4"
						media="(min-width: 744px)" />
					<img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228555&authkey=!AOBeDVAn7wllJcw&ithint=photo&e=UP3W8L"
						class="intro__image d-block img-fluid" alt="intro habitats" />
				</picture>

				<div class="intro__details">

					<a href="./habitats.php"
						class="btn intro__button intro__button--more intro__button--habitats">more</a>


					<p class="intro__description">amazing habitats to discover</p>
				</div>
			</div>
		</section>



		<section class="intro__section intro__section--animals">
			<h2 class="intro__title">animals</h2>

			<div class="intro__content">

				<picture>

					<source
						srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228558&authkey=!ADU2Nm_3LG8N9Ic&ithint=photo&e=ha5ani"
						media="(min-width: 744px)" />
					<img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228556&authkey=!AJS4UQNMDnuFR34&ithint=photo&e=O1BROQ"
						class="intro__image d-block img-fluid" alt="intro animals" />
				</picture>

				<div class="intro__details">

					<a href="./all-animals-habitats.php"
						class="btn intro__button intro__button--more intro__button--animals">more</a>


					<p class="intro__description">explore another way of love</p>
				</div>
			</div>
		</section>
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

<?php

includeTemplate("footer");

?>