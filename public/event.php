<?php
  /*
   * @author: Apeksha Gothawal
   * @date: 19th December, 2016
   * 
   * Event page.
   *
   */

  $title = 'Eventname';
  require_once(__DIR__ . '/../includes/header.php');
  ?>

<!DOCTYPE html >
<html lang="en">
<head>
	<title>VJTI RegDesk</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
  <div>
    <h3 style="text-align: right; ">Hi User</h3>
  </div>
    <div class="top">
      <img src="images/technovanza.jpg" alt="VJTI RegDesk" width="1100" height="500" style="padding: 50px;margin-left: 50px;">
    </div>
    <div class="info" style="width: 150px; float: left;border : 1px solid black;padding: 10px;">
        <div class="row">
          <div class="col-sm-1">
             <span class="glyphicon glyphicon-calendar"></span>
          </div>
    	    <p style="text-align: center;">10th Oct,2016</p>
          <div class="col-sm-1">
            <span class="glyphicon glyphicon-time"></span>
          </div>
    	    <p style="text-align: center;">9:00 pm</p>
          <div class="col-sm-1">
            <span class="glyphicon glyphicon-map-marker"></span>
          </div>
    	    <p style="text-align: center;">Quadrangle</p>
    	  </div>
    </div>
    <div class="description">
      <div style="border: 1px solid black;width: 1000px; margin-left: 160px; padding:10px;">
        <p style="font-family: 'Comic Sans MS'">Technovanza is proud to present the eighth lecture of the VJTI Guest Lecture Series, Mr. Suresh Prabhu, Minister of Railways, Govt. of India. His comprehensive leadership is monumental for the far-reaching growth and the facelift of the Indian Railways. He is working with eminent Organisations like World Federation of UNESCO, Asia Energy Forum, World Economic Forum, United Nations Development Programme - UNDP and UN Advisory Committee among others.
          Get to meet and interact with this exemplary leader and polymath at Technovanza!</p>
        <h5>Category : </h5>
        <h5>Fee : </h5>
        <h5>Refreshments : </h5>
        <h5>Incharge : </h5>
        <h5>Note : </h5>
      </div>
    </div>
    <h4 style="text-align: center;">To know more about the event, visit the following link : </h4>
    <h5 style="text-align: center;"><a href="http://www.technovanza.org">www.technovanza.org</a></h5>
    <button type="button" class="btn btn-primary" style="float: left; margin-left:100px; ">Register</button>
    <button type="button" class="btn btn-primary" style="float: right;margin-right:70px;">Add To Bucket</button>
    <p></p>
  </div>
<?php
  require_once(__DIR__ . '/../includes/footer.php');
?>
</body>
</html>