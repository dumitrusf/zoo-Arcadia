<?php

$datecopy = date('d-m-Y');

?>

<footer class="footer">
	<section class="footer__hours" id="opening-hours">
		<div class="footer__location">
			<div class="footer__location-details">
				<p class="footer__city">BRETAGNE (35380)</p>
				<p class="footer__forest">FORÊT DE BROCÉLIANDE</p>
			</div>

			<div>
				<p class="footer__hours-title">HEURES D'OUVERTURE</p>

				<table class="footer__hours-table">
					<tbody>

						<tr class="footer__hours-row">
							<th class="footer__hours-header">Matin:</th>
							<td class="footer__hours-data">08:45 - 12:00</td>
						</tr>
						<tr class="footer__hours-row">
							<th class="footer__hours-header">Après-midi:</th>
							<td class="footer__hours-data">14:00 - 18:00</td>
						</tr>
						<tr class="footer__hours-row">
							<th class="footer__hours-header">Samedi:</th>
							<td class="footer__hours-data">08:45 - 12:00</td>
						</tr>
						<tr class="footer__hours-row">
							<th class="footer__hours-header">Dimanche:</th>
							<td class="footer__hours-data">Fermé</td>
						</tr>
					</tbody>
				</table>
			</div>


		</div>

		<!-- the image click redirect to top for this moment just exemple -->
		<a class="footer__logo-link" href="#top">
			<img class="footer__logo" src="./src/assets/images/logo-site-mobile.svg"
				alt="Logo del sitio - Volver al inicio">
		</a>
	</section>

	<div class="footer__copyright">
		
		<small>&copy; <?= $datecopy; ?> Arcadia ZOO Bretagne | Designed By D.S.F</small>
	</div>
</footer>

<script type="module" src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="module" src="/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>

</body>
</html> 