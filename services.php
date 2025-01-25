<?php
require "includes/functions.php";

includeTemplate("nav");


?>


<header class="hero">
	<div class="hero__container">
		<div class="hero__text">
			<h1 class="hero__title">services</h1>
		</div>


		<a class="btn intro__button intro__button--hours" href="#opening-hours">opening hours</a>

	</div>

	<picture>
		<source
			srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228719&authkey=!AGTY2s96OBDnxMM&ithint=photo&e=q6wI1b"
			media="(min-width: 1280px)" />
		<source
			srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228718&authkey=!AMrw3FacU5UOofA&ithint=photo&e=yfvBFp"
			media="(min-width: 744px)" />
		<img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228716&authkey=!AOS4UjSu_nmtdPM&ithint=photo&e=zYW3DS"
			class="hero__image d-block" alt="monkey" />
	</picture>


</header>






<main>
	<div class="intro intro--services">


		<section class="intro__section intro__section--restaurant">
			<h2 class="intro__title">restaurant</h2>

			<div class="intro__content">
				<picture>
					<source
						srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228605&authkey=!AHfT_uNL82QNaqA&ithint=photo&e=8M1MYv"
						media="(min-width: 744px)" />
					<img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228601&authkey=!AMwl8tdd54UdeZU&ithint=photo&e=zf3BPN"
						class="intro__image d-block" alt="image restaurant arcadia" />
				</picture>

				<div class="intro__details">
					<p class="intro__description">get a break</p>
				</div>
			</div>
		</section>

		<section class="intro__section intro__section--zoo-guide">
			<h2 class="intro__title">zoo guide</h2>

			<div class="intro__content">
				<picture>
					<source
						srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228604&authkey=!AFtcXND_IMYWhaw&ithint=photo&e=U1Fh7A"
						media="(min-width: 744px)" />
					<img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228600&authkey=!AGDdjc_ImB72btE&ithint=photo&e=pIVANY"
						class="intro__image d-block" alt="image zoo guide" />
				</picture>

				<div class="intro__details">
					<p class="intro__description">feel safe all time</p>
				</div>
			</div>
		</section>

		<section class="intro__section intro__section--train">
			<h2 class="intro__title">train to arcadia</h2>

			<div class="intro__content">
				<picture>
					<source
						srcset="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228606&authkey=!ACuDQjIRsNPwqy8&ithint=photo&e=GRAPQN"
						media="(min-width: 744px)" />
					<img src="https://onedrive.live.com/embed?cid=2C3D1E2234649594&resId=2C3D1E2234649594!228602&authkey=!AJlfBtd35_Ehi4k&ithint=photo&e=rYQDuT"
						class="intro__image d-block" alt="image family train" />
				</picture>

				<div class="intro__details">
					<p class="intro__description">a family adventure</p>
				</div>
			</div>
		</section>


	</div>
</main>



<?php
includeTemplate("footer");


?>