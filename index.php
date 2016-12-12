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
		<div class="col-sm-8">
			<br>
			
				<img src="images/logo.png" class="img-circle img-responsive" alt="VJTI RegDesk" width="200" height="200">
				<p style="font-family:'Domine', serif;font-size:120px;color:#FFFFFF"> VJTI RegDesk </p>
				<p style="font-family: 'Droid Sans', sans-serif;font-size:50px;color:rgb(195,195,195)">One  Account. Many  Opportunities.</p>
		</div>
		<div class="col-sm-4">
		<br>
		<br>
		<br>
		<p><?php echo $err_msg; ?></p>
		<br>
		<br>
		<br>
		
	<form roll="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
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
		<div class="col-sm-offset-4 col-sm-7">
		<button type="submit" class="btn btn-success btn-lg" name="submit" value="Sign In">Sign In</button>
		</div>
		<div class="col-sm-offset-4 col-sm-8">
		<a href="public/forgot.php" style="font-family:'Montserrat', sans-serif; line-height: 1.8;font-size:15px">
		Forgot  Password?
		</a>
		</div>
		<br>
		<br>
		
		<div class="col-sm-offset-2 col-sm-10">
		<p style="font-family:'Montserrat', sans-serif;line-height: 1.8;font-size:20px;color:#FFFFFF">
			Don't  have  an  account?
		</p>
		</div>
		
		<br>
		<br>
		<div class="col-sm-offset-5 col-sm-7">
			<a href="public/signup.php"><button type="button"  class="btn btn-success btn-lg">Sign Up!</button></a>
		</div>
	</form>
	    </div>
	</div> 
	<br>
    <br>
	<br> 
	<br>
	<br>
	<br>  
</div>

<br>
<br>
<br>
<br>
<br>
<p class="text-center" style="font-family: 'Acme', sans-serif; font-size:50px;color:rgb(0,0,0)">Our Partners</p>

<div class="container-fluid" >
	<br>
		<div id="mycarousel" class= "carousel slide"  data-ride="carousel">
			<!.. Indicators ..>
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
<br>
<br>
<br>
<br>
<br>
<div class="container-fluid text-center" style="font-family: 'Acme', sans-serif;font-size:50px; color:rgb(0,0,0)">
<div class="row">
<div class="col-sm-3">
<img src="images/events.png" class="img-circle" alt="EVENTS">
<p> Events</p>
</div>
<div class="col-sm-3">
<img src="images/workshops.png" class="img-circle" alt="WORKSHOPS">
<p> Workshops</p>
</div>
<div class="col-sm-3">
<img src="images/competitions.png" class="img-circle" alt="COMPETITIONS">
<p>Competitions</p>
</div>
<div class="col-sm-3">
<img src="images/Lectures.png" class="img-circle" alt="LECTURES">
<p>Lectures</p>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<div class="container-fluid text-center">
<p  style="font-family: 'Acme', sans-serif;font-size:50px; color:rgb(0,0,0)">Don't miss out!</p>
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