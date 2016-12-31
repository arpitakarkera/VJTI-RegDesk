<?php
/*
   * @author: Arpita Karkera, Sunaina Punyani
   * @date: 4th December, 2016
   * 
   *  css for dashboard.
   *
   */

	// authenticate
	require_once(__DIR__ . '/../includes/authenticate.php');

	// connnect to database
	require_once(__DIR__ . '/../includes/dbconfig.php');

	$title = 'Manage Events';
	require_once(__DIR__ . '/../includes/header.php');

	// get all upcoming events that the manager has posted
	$up_query = "SELECT event_id, event_name, start_date, end_date, start_time, end_time, venue FROM events WHERE manager = ".$_SESSION['manager_id']." ORDER BY start_date ASC";
	$up_result = mysqli_query($dbc, $up_query);

	// get all past events that the manager has posted
	$past_query = "SELECT event_id, event_name, start_date, end_date, start_time, end_time, venue FROM archived_events WHERE manager = ".$_SESSION['manager_id']." ORDER BY start_date DESC";
	$past_result = mysqli_query($dbc, $past_query);
?>

<div  class="container-fluid">
<div style="text-align: left;padding-left:10%;padding-top:4%;padding-bottom: 3%;">
<a href="addevent.php"><button class="btn btn-success btn-lg">Post Event</button></a>
</div>
</div>
<hr>
<div class="container-fluid">
<div style="text-align:left;padding-top:3%;padding-left:10%;">
<p style="font-size:30px; font-family: 'Raleway', sans-serif;">Upcoming Events</p>
</div>
<div class="container" id="h">
<?php
	if (mysqli_num_rows($up_result) != 0) {
		while ($event = mysqli_fetch_array($up_result)) {

?>
<div id="a" class="cube">
<div class="row">
<div class="col-sm-7">
<div style="text-align: left;padding-top: 1%;padding-left: 9%;">
<p style="font-size: 10px; color: gray; padding-bottom: 0px;"><?php echo 'EV'.htmlspecialchars(str_pad($event['event_id'], 3, '0', STR_PAD_LEFT)); ?></p>
<a href="event.php?event=<?php echo $event['event_id']; ?>"><p style="font-size:30px;font-family: 'Raleway', sans-serif;"><?php echo $event['event_name']; ?></p></a>
<p style="font-size:15px;"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;
<?php
	if (empty($event['end_date'])) 
		echo htmlspecialchars(date('d M, Y', strtotime($event['start_date']))); 
	else 
		echo htmlspecialchars(date('d M, Y', strtotime($event['start_date']))).' - '.htmlspecialchars(date('d M, Y', strtotime($event['end_date'])));
?></p>
<p style="font-size:15px;"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;
<?php
	if (empty($event['end_time']))
		echo htmlspecialchars(date('H:i A', strtotime($event['start_time'])));
	else
		echo htmlspecialchars(date('H:i A', strtotime($event['start_time']))).' - '.htmlspecialchars(date('H:i A', strtotime($event['end_time'])));;
?></p>
<p style="font-size:15 px;"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;
<?php
	echo htmlspecialchars($event['venue']);
?></p>
</div>
</div>
<div class="col-sm-1">
</div>
<div class="col-sm-4">
<div style="padding-top:22%;padding-bottom:4%;padding-right:9%;padding-left:9%;">
<a href="../controls/download.php?event=<?php echo $event['event_id']; ?>"><img class="img img-responsive inline-block" width="60" height="60" title="Download registered users' databse" src="../images/download_icon.png"></a>
&nbsp;&nbsp;&nbsp;
<a href="editevent.php?event=<?php echo htmlspecialchars($event['event_id']); ?>"><img class="img img-responsive inline-block" width="60" height="60" title="Edit event details" src="../images/edit_icon.png"></a>
&nbsp;&nbsp;&nbsp;

<a href="#"><img class="img img-responsive inline-block" width="60" height="60" title="Mail registered users" src="../images/mail_icon.png"></a>
</div>
</div>
</div>
</div>
<br>
<?php
		}
	}
?>
</div>
</div>
<hr>
<div class="container-fluid">
<div style="text-align:left;padding-top:3%;padding-left:10%;">
<p style="font-size:30px; font-family: 'Raleway', sans-serif;">Past Events</p>
</div>
<div class="container" id="h">
<?php
	if (mysqli_num_rows($past_result) != 0) {
		while ($event = mysqli_fetch_array($past_result)) {

?>
<div id="a" class="cube">
<div class="row">
<div class="col-sm-7">
<div style="text-align: left;padding-top: 1%;padding-left: 9%;">
<p style="font-size: 10px; color: gray; padding-bottom: 0px;"><?php echo 'EV'.htmlspecialchars(str_pad($event['event_id'], 3, '0', STR_PAD_LEFT)); ?></p>
<a href="event.php?event=<?php echo $event['event_id']; ?>"><p style="font-size:30px;font-family: 'Raleway', sans-serif;"><?php echo $event['event_name']; ?></p></a>
<p style="font-size:15px;"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;
<?php
	if (empty($event['end_date'])) 
		echo htmlspecialchars(date('d M, Y', strtotime($event['start_date']))); 
	else 
		echo htmlspecialchars(date('d M, Y', strtotime($event['start_date']))).' - '.htmlspecialchars(date('d M, Y', strtotime($event['end_date'])));
?></p>
<p style="font-size:15px;"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;
<?php
	if (empty($event['end_time']))
		echo htmlspecialchars(date('H:i A', strtotime($event['start_time'])));
	else
		echo htmlspecialchars(date('H:i A', strtotime($event['start_time']))).' - '.htmlspecialchars(date('H:i A', strtotime($event['end_time'])));;
?></p>
<p style="font-size:15 px;"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;
<?php
	echo htmlspecialchars($event['venue']);
?></p>
</div>
</div>
<div class="col-sm-1">
</div>
<div class="col-sm-4">
<div style="padding-top:22%;padding-bottom:4%;padding-right:9%;padding-left:9%;">
<a href="../controls/download.php?event=<?php echo $event['event_id']; ?>"><img class="img img-responsive inline-block" width="60" height="60" title="Download registered users' database" src="../images/download_icon.png"></a>
&nbsp;&nbsp;&nbsp;

<a href="#"><img class="img img-responsive inline-block" width="60" height="60" title="Mail registered users" src="../images/mail_icon.png"></a>
</div>
</div>
</div>
</div>
<br>
<?php
		}
	}
	else
		echo "No events.";
?>
</div>
</div>
<?php
	require_once(__DIR__ . '/../includes/footer.php');
?>