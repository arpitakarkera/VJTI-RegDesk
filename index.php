<?php
	/*
	 * @author: Sunaina Punyani,Arpita Karkera
	 * @date: 5th December, 2016
	 * 
	 * Index page.
	 *
	 */

	// authenticate
	require_once(__DIR__ . '/includes/authenticate.php');

	$user_email = $err_msg = "";
	
	// grab login logic
	require_once(__DIR__ . '/controls/login.php');
?>

<!--Render header-->
<?php
	$title = 'Sign In';
	require_once(__DIR__ . '/includes/header.php');
?>

<div class="container-fluid" id="p" style="min-height:100%;height:100%;width:100%">
	<div class="row">
		<div class="col-sm-8" style="padding-left: 20px; padding-bottom: 10%; padding-top: 15%;">
			<div class="container-fluid" id="z" style="min-height: 100%; height: 100%, width: 100%">
				<div class="row">
					<div class="col-sm-2">
						<img src="images/logo.png" class="img-responsive" alt="VJTI RegDesk" height="200px" width="200px">
					</div>
					<div class="col-sm-10">
						<p style="font-family:'Open Sans', sans-serif; font-weight: 700; font-size: 100px;color: rgb(213,224,224);"> VJTI RegDesk </p>
					</div>
				</div>
			</div>
			<p style="font-family: 'Raleway', sans-serif; font-weight: 500; font-size:50px;color: rgb(213,224,224)">&nbsp;One  Account. Many  Opportunities.</p>
		</div>
		<div class="col-sm-4" style="padding-right: 5%; padding-top: 10%; padding-bottom: 10%; text-align: center; vertical-align: center; align-self: center;">	
	<form roll="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<p style="font-size: 15px; color: rgb(230,74,60);">&nbsp;<?php echo $err_msg; ?>&nbsp;</p>	
		<div class="form-group">
		<div class="input-group">
		<span class="input-group-addon transparent"><span class="glyphicon glyphicon-envelope"></span></span>
		<input type="email" class="form-control left-border-none" id="email" name="user_email" placeholder="e-mail" required value="<?php if(isset($user_email)) echo $user_email; ?>">
		</div>
		<br>

		<div class="input-group">
		<span class="input-group-addon transparent"><span class="glyphicon glyphicon-lock"></span></span>
		<input type="password" class="form-control" id="pwd" name="user_password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required>
		</div>
		</div>
		<br>
		<button id="sign" type="submit" class="btn btn-success btn-lg" name="submit" value="Sign In">Sign In</button>
		<br>
		<div style="text-align: center; padding-top: 10px">
		<a href="public/forgot.php" style="font-size:15px">Forgot  Password?</a>
		</div>
		<br>
		<p style="font-size:20px;color:rgb(213,224,224)">Don't  have  an  account?</p>
		<a href="public/signup.php"><button id="sign" type="button" class="btn btn-success btn-lg">Sign Up!</button></a>
	</form>
	    </div>
	</div>
</div>

<br>
<br>
<br>
<br>
<br>
<p class="text-center" style="font-size:50px;">Our Partners</p>

<div class="container-fluid" >
	<br>
		<div id="myCarousel" class= "carousel slide"  data-ride="carousel">
			<!--Indicators-->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1" ></li>
					<li data-target="#myCarousel" data-slide-to="2" ></li>
					<li data-target="#myCarousel" data-slide-to="3" ></li>
					<li data-target="#myCarousel" data-slide-to="4" ></li>
					<li data-target="#myCarousel" data-slide-to="5" ></li>
					<li data-target="#myCarousel" data-slide-to="6" ></li>
					<li data-target="#myCarousel" data-slide-to="7" ></li>
					<li data-target="#myCarousel" data-slide-to="8" ></li>

				</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="images/coc.jpg" alt="COC" width="460" height="100">
				</div>
				<div class="item">
					<img src="images/technovanza.jpg" alt="TECHNOVANZA" width="460" height="100">
				</div>
				<div class="item">
					<img src="images/sra.jpg" alt="SRA" width="460" height="100">
				</div>
				<div class="item">
					<img src="images/enthusia.jpg" alt="ENTHUSIA" width="460" height="100">
				</div>
				<div class="item">
					<img src="images/e-cell.jpg" alt="E-CELL" width="460" height="100">
				</div>
				<div class="item">
					<img src="images/dla.jpg" alt="DLA" width="460" height="100">
				</div>
				<div class="item">
					<img src="images/pratibimb.jpg" alt="PRATIBIMB" width="460" height="100">
				</div>
				<div class="item">
					<img src="images/rangawardhan.jpg" alt="RANGAWARDHAN" width="460" height="100">
				</div>
				<div class="item">
					<img src="images/nirmaan.jpg" alt="NIRMAAN" width="460" height="100">
				</div>
			</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only" >Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only" >Next</span>
		</a>
	</div>
</div>

<script>
$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel();
    
    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel").carousel(1);
    });
    $(".item3").click(function(){
        $("#myCarousel").carousel(2);
    });
    $(".item4").click(function(){
        $("#myCarousel").carousel(3);
    });
    $(".item5").click(function(){
        $("#myCarousel").carousel(4);
    });
    $(".item6").click(function(){
        $("#myCarousel").carousel(5);
    });
    $(".item7").click(function(){
        $("#myCarousel").carousel(6);
    });
    $(".item8").click(function(){
        $("#myCarousel").carousel(7);
    });
    $(".item9").click(function(){
        $("#myCarousel").carousel(8);
    });
    
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel").carousel("next");
    });
});
</script>
<div class="container-fluid text-center" style="font-size:30px; color:rgb(0,0,0);">
<div class="row" style=" padding-top: 200px; padding-bottom: 100px;">
<div class="col-sm-3">
<img src="images/events.png" class="img-circle" alt="EVENTS">
<p id="category_label">Events</p>
</div>
<div class="col-sm-3">
<img src="images/workshop.png" class="img-circle" alt="WORKSHOPS">
<p id="category_label">Workshops</p>
</div>
<div class="col-sm-3">
<img src="images/competitions.png" class="img-circle" alt="COMPETITIONS">
<p id="category_label">Competitions</p>
</div>
<div class="col-sm-3">
<img src="images/lectures.png" class="img-circle" alt="LECTURES">
<p id="category_label">Lectures</p>
</div>
</div>
</div>
<div class="container-fluid text-center">
<p  style="font-size:50px; color:rgb(0,0,0)">Don't miss out!</p>
<a href="public/signup.php"><button type="button" class="btn btn-success btn-lg">Sign Up!</button></a>
</div>
<br>
<br>
<br>
<script>
  $('.carousel').carousel({
   interval: 2000
  });
 </script> 
<!---Render footer-->
<?php require_once(__DIR__ . '/includes/footer.php'); ?>