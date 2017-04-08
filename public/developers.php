<?php
    /*
     * @author: Apeksha Gothawal
	 * @date: 8th April, 2017
	 * 
	 * Developers page.
	 *
	 */
?>
	<!--Render header-->
	<?php
	$title = 'Developers';
	require_once(__DIR__ . '/../includes/header.php');
?>
<section class="intro">
<div class="container">
	<h3 style="text-align: center; font-family: 'Open Sans', sans-serif; font-weight: 600; font-size: 80px; color: rgb(0,0,0);">WHO ARE WE?</h3>
	<div class="row">
		<div class="col-sm-4">
			<div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
				<img src="../images/arpita.jpg" class="img-responsive" alt="Arpita">
				<div class="info">
					<h2 style="text-align: center;">Arpita Karkera</h2>
					<p style="text-align: center;">S.Y B.Tech Computer Engineering</p>
					<p style="text-align: center;">ID: 151071041</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
				<img src="../images/sunaina.jpg" class="img-responsive" alt="Sunaina">
				<div class="info">
					<h2 style="text-align: center;">Sunaina Punyani</h2>
					<p style="text-align: center;">S.Y B.Tech Computer Engineering</p>
					<p style="text-align: center;">ID: 151071006</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
				<img src="../images/apeksha.jpg" class="img-responsive" alt="Apeksha">
				<div class="info">
					<h2 style="text-align: center;">Apeksha Gothawal</h2>
					<p style="text-align: center;">S.Y B.Tech Computer Engineering</p>
					<p style="text-align: center;">ID: 151071003</p>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<?php
require_once(__DIR__.'/../includes/footer.php');
?>