<?php
require_once __DIR__ . '/../includes/functions.php';

includeTemplate("nav");


?>


<!-- <nav class="nav navbar"> -->

<header class="hero">
	<div class="hero__container">
		<div class="hero__text">
			<h1 class="hero__title">Juan</h1>
			<p class="hero__subtitle">Lion</p>
		</div>


		<a type="button" class="btn intro__button intro__button--hours" href="#opening-hours">opening hours</a>

	</div>


	<picture>
		<source
			srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228707&authkey=!AOva3ENGeg4Ep40&ithint=photo&e=WlnQn9"
			media="(min-width: 1280px)" />
		<source
			srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228706&authkey=!ALn94T9OrtbZQpI&ithint=photo&e=yLqmB9"
			media="(min-width: 744px)" />
		<img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228705&authkey=!AIAenWn29MuniTM&ithint=photo&e=apkdhj"
			class="hero__image d-block" alt="hero image" />
	</picture>

</header>












<main class="animal">

	<!-- Sección de Información del Animal -->
	<section class="animal__info animal__card">
		<h2 class="animal__title">Animal</h2>
		<table class="animal__table">
			<tbody>
				<tr class="animal__row">
					<th class="animal__header">Name:</th>
					<td class="animal__data">Juan</td>
				</tr>
				<tr class="animal__row">
					<th class="animal__header">gender:</th>
					<td class="animal__data">male</td>
				</tr>
				<tr class="animal__row">
					<th class="animal__header">Animal Breed:</th>
					<td class="animal__data">Crocodile</td>
				</tr>
				<tr class="animal__row">
					<th class="animal__header">Habitat:</th>
					<td class="animal__data">Swamp</td>
				</tr>
			</tbody>
		</table>
	</section>



	<!-- Sección de Información Adicional -->
	<section class="animal__about animal__card">
		<h2 class="animal__title">About It</h2>
		<table class="animal__table">
			<tbody>
				<tr class="animal__row">
					<th class="animal__header">Nutrition:</th>
					<td class="animal__data">Carnivorous</td>
				</tr>
				<tr class="animal__row">
					<th class="animal__header">Food Offered:</th>
					<td class="animal__data">Fish & Meat</td>
				</tr>
				<tr class="animal__row">
					<th class="animal__header">Food Qty:</th>
					<td class="animal__data">5KG</td>
				</tr>
				<tr class="animal__row">
					<th class="animal__header">Date Of Check-Up:</th>
					<td class="animal__data">August 18, 2024</td>
				</tr>
			</tbody>
		</table>
	</section>



	<!-- Sección de Observación Veterinaria -->
	<section class="animal__observation animal__card">
		<h2 class="animal__title">Veterinary Observation</h2>
		<p class="animal__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu odio
			sed tortor luctus malesuada.</p>
		<table class="animal__table">
			<tbody>
				<tr class="animal__row">
					<th class="animal__header">Mood Animal:</th>
					<td class="animal__data">Angry</td>
				</tr>
			</tbody>
		</table>
	</section>



	<!-- Sección de Detalles Opcionales -->
	<section class="animal__optional animal__card">
		<h2 class="animal__title">Optional Animal Details</h2>
		<p class="animal__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu odio
			sed tortor luctus malesuada.</p>
	</section>

</main>





<?php
includeTemplate("footer");


?>