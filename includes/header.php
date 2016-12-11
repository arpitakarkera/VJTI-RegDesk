<?php
	/*
	 * @author:Sunaina Punyani, Arpita Karkera
	 * @date: 4th December, 2016
	 * 
	 * Header template file. To be included in every page.
	 *
	 */
?>

<!DOCTYPE html>
<html>
<head>

	<!--Dynamically render the title. If not set just show "VJTI RegDesk". Value of title is set before including the header.-->
	<title>VJTI-RegDesk<?php if(isset($title)) echo " | ".$title; ?></title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
		if (basename($_SERVER['PHP_SELF']) == 'index.php') {
			echo '<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Domine:700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">  
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>

  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin:auto;
  }
 #p.container-fluid
  {
  	 background-image: url("images/newbgm.png");
    background-repeat: repeat;
    background-position: right top;
    background-attachment: fixed;
  	
  }
  .transparent
  {
  	background-color:#FFFFFF;
  	box-shadow:inset 0px 1px 0 rgba(0,0,0,.075);
  }
  .left-border-none
  {
  	
  	box-shadow:inset 0px 1px 0 rgba(0,0,0,.075);
  }
   {
  background: #000 !important;
  color: #0f0 !important;
  outline: solid #f00 1px !important;
}
  </style>';

		}
		else if (basename($_SERVER['PHP_SELF']) == 'signup.php') {
			// for signup
		}
		// similarly you can add more
		else {
			// default one
		}
	?>
</head>
<body>
<!--Display navigation bar for all pages except index page-->
<?php
	if (basename($_SERVER['PHP_SELF']) != 'index.php') {
		echo '<header>';
		// some other stuff
		echo '</header>';
	}
?>