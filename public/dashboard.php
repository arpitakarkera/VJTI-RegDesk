<?php
	/*
	 * @author: Sunaina Punyani,Arpita Karkera
	 * @date: 6th December, 2016
	 * 
	 * Dashboard
	 *
	 */

	// authenticate
	//require_once(__DIR__ . '/../includes/authenticate.php');

	$title = 'Dashboard';
	require_once(__DIR__ . '/../includes/header.php');
?>

<div class="container-fluid" id="p">
<div class="row">
<div class="col-sm-1">
</div>
<div class="col-sm-4" id="a"> 
<p style="font-size:40px">Firstname &nbsp;&nbsp;Lastname</p>
</div>
<div class="col-sm-3">
</div>
<div class="col-sm-3 text-right" style="padding-top: 2.5%;">
<button class="button" id="q">My Events</button>
<br>
<br>
<button class="button">Manage Events</button>
</div>
<div class="col-sm-2">
</div>  
</div>
</div>

<ul>
<li><a href="#">Events</a></li>
<li><a href="#">Lectures</a></li>
<li><a href="#">Workshops</a></li>
<li><a href="#">Competitions</a></li>
<li style="float:right;padding:1% 15%;"><div class="input-group">
		<input class="form-control"  placeholder="Search"><span class="input-group-addon transparent"><span class="glyphicon glyphicon-search"></span></span>
		</div></li>
</ul>
<div class="container-fluid text-center" style="padding-top: 2%;font-size: 30px;">By &nbsp;Committee</div>

<div class="container-fluid" style="width:100%;">
<div class="row">


<div class="col-sm-12" style="padding-left:6%;padding-right:6%;padding-top:1%;padding-bottom:2%;text-align:center;">   
<a href="#"><img class="img img-responsive inline-block" width="130" height="130" src="../images/technovanza_icon.png"></a>

<a href="#"><img class="img img-responsive inline-block" width="130" height="130" src="../images/pratibimb_icon.png"></a>


<a href="#"><img class="img img-responsive inline-block" width="130" height="130" src="../images/sra_icon.png"></a>

<a href="#"><img class="img img-responsive inline-block" width="130" height="130" src="../images/coc_icon.png"></a>

<a href="#"><img class="img img-responsive inline-block" width="130" height="130" src="../images/ecell_icon.png"></a>

<a href="#"><img class="img img-responsive inline-block" width="130" height="130" src="../images/dla_icon.png"></a>

<a href="#"><img class="img img-responsive inline-block" width="130" height="130" src="../images/nirmaan_icon.png"></a>

<a href="#"><img class="img img-responsive inline-block" width="130" height="130" src="../images/rangawardhan_icon.png"></a>
</div>
</div>
</div>
<div class="container-fluid text-center" style="padding-top: 2%;font-size: 30px;">Upcoming</div>
<div class="container" id="h">
<div id="w" class="cube">
<div class="row">
<div class="col-sm-2">
<img src="../images/star.png" class="img img-responsive" style="padding-top:11%; ">
</div>
<div class="col-sm-7">
<div style="text-align: left;padding-top: 1%;padding-left: 2%;">
<p style="font-size:40px;font-family: 'Raleway', sans-serif;"> XYZ &nbsp;Event &nbsp;Name</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;Date</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Time</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;Venue</p>
</div>
</div>
<div class="col-sm-3">
<div style="padding-top:12%;" class="text-center">
<button id="tileb" class="button">Register</button>
<br>
<br>
<button id="tile" class="button">More</button>
</div>
</div>
</div>
</div>
<br>
<div id="a" class="cube">
<p> this and the tiles this r alike and have lighter box shadows than the 1st 1 change the ids and set whichever u like</p>
</div>
<br>
<div class="cube" id="a">
<div class="row">
<div class="col-sm-2">
<img src="../images/star.png" class="img img-responsive" style="padding-top:11%; ">
</div>
<div class="col-sm-7">
<div style="text-align: left;padding-top: 1%;padding-left: 2%;">
<p style="font-size:40px;font-family: 'Raleway', sans-serif;"> XYZ &nbsp;Event &nbsp;Name</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;Date</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Time</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;Venue</p>
</div>
</div>
<div class="col-sm-3">
<div style="padding-top:12%;" class="text-center">
<button id="tileb" class="button">Register</button>
<br>
<br>
<button id="tile" class="button">More</button>
</div>
</div>
</div>
</div>
<br>
<div class="cube" id="a">
<div class="row">
<div class="col-sm-2">
<img src="../images/star.png" class="img img-responsive" style="padding-top:11%; ">
</div>
<div class="col-sm-7">
<div style="text-align: left;padding-top: 1%;padding-left: 2%;">
<p style="font-size:40px;font-family: 'Raleway', sans-serif;"> XYZ &nbsp;Event &nbsp;Name</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;Date</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Time</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;Venue</p>
</div>
</div>
<div class="col-sm-3">
<div style="padding-top:12%;" class="text-center">
<button id="tileb" class="button">Register</button>
<br>
<br>
<button id="tile" class="button">More</button>
</div>
</div>
</div>
</div>
<br>
<div class="cube" id="a">
<div class="row">
<div class="col-sm-2">
<img src="../images/star.png" class="img img-responsive" style="padding-top:11%; ">
</div>
<div class="col-sm-7">
<div style="text-align: left;padding-top: 1%;padding-left: 2%;">
<p style="font-size:40px;font-family: 'Raleway', sans-serif;"> XYZ &nbsp;Event &nbsp;Name</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;Date</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Time</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;Venue</p>
</div>
</div>
<div class="col-sm-3">
<div style="padding-top:12%;" class="text-center">
<button id="tileb" class="button">Register</button>
<br>
<br> 
<button id="tile" class="button">More</button>
</div>
</div>
</div>
</div>
<br>
<div class="cube" id="a">
<div class="row">
<div class="col-sm-2">
<img src="../images/star.png" class="img img-responsive" style="padding-top:11%; ">
</div>
<div class="col-sm-7">
<div style="text-align: left;padding-top: 1%;padding-left: 2%;">
<p style="font-size:40px;font-family: 'Raleway', sans-serif;"> XYZ &nbsp;Event &nbsp;Name</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;Date</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Time</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;Venue</p>
</div>
</div>
<div class="col-sm-3">
<div style="padding-top:12%;" class="text-center">
<button id="tileb" class="button">Register</button>
<br>
<br>
<button id="tile" class="button">More</button>
</div>
</div>
</div>
</div>
<br>
<div class="cube" id="a">
<div class="row">
<div class="col-sm-2">
<img src="../images/star.png" class="img img-responsive" style="padding-top:11%; ">
</div>
<div class="col-sm-7">
<div style="text-align: left;padding-top: 1%;padding-left: 2%;">
<p style="font-size:40px;font-family: 'Raleway', sans-serif;"> XYZ &nbsp;Event &nbsp;Name</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;Date</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Time</p>
<p style="font-size:20px;"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;Venue</p>
</div>
</div>
<div class="col-sm-3">
<div style="padding-top:12%;" class="text-center">
<button id="tileb" class="button">Register</button>
<br>
<br>
<button id="tile" class="button">More</button>
</div>
</div>
</div>
</div>
</div>
<?php
	require_once(__DIR__ . '/../includes/footer.php');
?>