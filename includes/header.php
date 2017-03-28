<?php
	/*
	 * @author: Sunaina Punyani, Arpita Karkera
	 * @date: 4th December, 2016
	 * 
	 * Header template file. To be included in every page.
	 *
	 */

	if( ! ini_get('date.timezone') )
	{
	    date_default_timezone_set('Asia/Kolkata');
	}
?>

<!DOCTYPE html>
<html>

<head>

	<!--Dynamically render the title. If not set just show "VJTI RegDesk". Value of title is set before including the header.-->
	<title><?php if(isset($title)) echo $title." | "; ?>VJTI-RegDesk</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700|PT+Sans:400,700|Raleway:500" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: 'PT Sans', sans-serif;
			padding-bottom: 0px;
			padding-right: 0px;
			/*background: #e2e1e0;*/
		}
	</style>
	<?php
		if (basename($_SERVER['PHP_SELF']) == 'index.php') {
			echo '<link rel = "stylesheet" type = "text/css" href="css/index.css">';
		}
		else if (basename($_SERVER['PHP_SELF']) == 'dashboard.php') {
			
			echo '<link rel = "stylesheet" type = "text/css" href = "../css/dashboard.css">';
		}
		else if (basename($_SERVER['PHP_SELF']) == 'manage.php' || basename($_SERVER['PHP_SELF']) == 'myevents.php') {
			
			echo '<link rel = "stylesheet" type = "text/css" href = "../css/manageevents.css">';
		}
		else if (basename($_SERVER['PHP_SELF']) == 'event.php') {
			echo '<link rel="stylesheet" type="text/css" href="../css/event.css">';
		}
		else if (basename($_SERVER['PHP_SELF']) == 'addevent.php') { ?>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

		<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


		<style type="text/css">
			/**
 			* Override feedback icon position
 			* See http://formvalidation.io/examples/adjusting-feedback-icon-position/
 			*/

			#eventForm .form-control-feedback {
				top: 0;
				right: -15px;
			}
		</style>
		<?php
		}
		else {
			if (!in_array(basename($_SERVER['PHP_SELF']), ['signup.php', 'addevent.php', 'editevent.php'])) {
				// default one
				echo '<link rel = "stylesheet" type = "text/css" href = "../css/confirmsignup.css">';
			}
		}
	?>
</head>

<body>
	<!--Display navigation bar for all pages except index page-->
	<?php
	if (basename($_SERVER['PHP_SELF']) != 'index.php') {
?>
		<header style="background-image: url('../images/background.jpg'); border-bottom: 3px solid rgb(213,224,224);">

			<div class="row" style="padding-top:1.2%;padding-bottom:1.2%;">
				<div class="span4" style="padding-left:5%;">
					<a href="../index.php">
						<img style="float:left;padding-left:0%;padding-top:0%;" src="../images/logo.png" class="img-responsive" alt="VJTI RegDesk"
						    width="40" height="40">
					</a>
					<div style="padding-right:4%; vertical-align: middle;">
						<?php if (isset($_SESSION['user_id'])) { ?>
						<a href="../controls/logout.php"><img style="float:right; vertical-align: middle;" src="../images/logout.png" class="img-responsive" title="Logout"
							    alt="Logout" width="30" height="30"></a>
						<?php } ?>
					</div>
					<div style="font-size:25px;color:rgb(213,224,224);font-weight:bold;padding-top:0.6%">&nbsp;&nbsp;<a href="../index.php" style="text-decoration:none;color:rgb(213,224,224);">VJTI RegDesk</a></div>

				</div>
			</div>
		</header>
		<?php
	}
?>