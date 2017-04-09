<?php
	/*
	 * @author: Sunaina Punyani, Arpita Karkera
	 * @date: 6th December, 2016
	 * 
	 * Dashboard
	 *
	 */

	// authenticate
	require_once(__DIR__ . '/../includes/authenticate.php');

	// connect to database
	require_once(__DIR__ . '/../includes/dbconfig.php');

	$title = 'Dashboard';
	require_once(__DIR__ . '/../includes/header.php');
?>

<div class="container-fluid" id="p">
	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-4" id="a">
			<p style="font-size:40px">
				<?php echo htmlspecialchars($_SESSION['first_name']); ?>&nbsp;&nbsp;
				<?php echo htmlspecialchars($_SESSION['last_name']); ?>
			</p>
			<a href="myevents.php"><button class="button" id="q">My Events</button></a>
			<br>
			<br>
			<?php if(isset($_SESSION['manager_id'])) {?>
			<a href="manage.php"><button class="button">Manage Events</button></a>
			<?php } else { ?>
			<a href="apply.php"><button class="button">Apply for Manager</button></a>
			<?php } ?>
		</div>
		<div class="col-sm-2"></div>
		<div class="col-sm-4">
		<?php
/* Set the default timezone */
//date_default_timezone_set("America/Montreal");

/* Set the date */
$date = strtotime(date("Y-m-d"));
$mydate = date("Y-m-d");
//echo $mydate;
$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);
$firstDay = mktime(0,0,0,$month, 1, $year);
$title = strftime('%B', $firstDay);
$dayOfWeek = date('D', $firstDay);
$daysInMonth = cal_days_in_month(0, $month, $year);
/* Get the name of the week days */
$timestamp = strtotime('next Sunday');
$weekDays = array();
for ($i = 0; $i < 7; $i++) {
	$weekDays[] = strftime('%a', $timestamp);
	$timestamp = strtotime('+1 day', $timestamp);
}
$blank = date('w', strtotime("{$year}-{$month}-01"));
$id=$_SESSION['user_id'];
$query="SELECT DAY(events.start_date) as d FROM registrations LEFT JOIN events ON registrations.event_id=events.event_id where user_id=".$id." and MONTH(start_date)=MONTH('$mydate')";
$result = mysqli_query($dbc,$query) or die(mysqli_err());
$num = mysqli_num_rows($result);
//echo $num;
if ($num > 0){
	$row = mysqli_fetch_array($result);
	//$num = $num - 1;
	//echo $row['d'];
}


?>
<table class='table table-bordered' style="table-layout: fixed;">
	<tr>
		<th colspan="7" class="text-center" style="background-color:rgb(172,230,191);color:black;border: 1px solid black;"> <?php echo $title ?> <?php echo $year ?> </th>
	</tr>
	<tr>
		<?php foreach($weekDays as $key => $weekDay) : ?>
			<td class="text-center" style="background-color:rgb(172,230,191);color:black;border: 1px solid black;"><?php echo $weekDay ?></td>
		<?php endforeach ?>
	</tr>
	<tr>
		<?php for($i = 0; $i < $blank; $i++): ?>
			<td style="background-color:rgb(172,230,191);color:black;border: 1px solid black;"></td>
		<?php endfor; ?>
		<?php for($i = 1; $i <= $daysInMonth; $i++): ?>
			<?php 
			
			if($num > 0 && $i == intval($row['d'])){?>
				<td style="background-color:rgb(67,156,35);color:black;border: 1px solid black;"><strong><?php echo $i; ?></strong></td>
				<?php 
				if($num >0){
					$row = mysqli_fetch_array($result);
					$num = $num - 1;
				}
				continue;
				}?>
				
			<?php if($day == $i): ?>
				<td style="background-color:rgb(25,45,74);color:white;border: 1px solid black;"><strong><?php echo $i; ?></strong></td>
			<?php else: ?>
				<td style="background-color:rgb(172,230,191);color:black;border: 1px solid black;"><?php echo $i; ?></td>
			<?php endif; ?>
			<?php if(($i + $blank) % 7 == 0): ?>
				</tr><tr>
			<?php endif; ?>
		<?php endfor; ?>
		<?php for($i = 0; ($i + $blank + $daysInMonth) % 7 != 0; $i++): ?>
			<td style="background-color:rgb(172,230,191);color:black;border: 1px solid black;"></td>
		<?php endfor; ?>
	</tr>
</table>
		</div>
		
	</div>
</div>

<ul>
	<li><a href="dashboard.php?cat=1#start">Events</a></li>
	<li><a href="dashboard.php?cat=4#start">Lectures</a></li>
	<li><a href="dashboard.php?cat=2#start">Workshops</a></li>
	<li><a href="dashboard.php?cat=3#start">Competitions</a></li>
	<li style="float:right;padding:1% 10.5%;">
		<div class="input-group">
			<form class="form-inline" method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search" value="<?php if (isset($_GET['q']) && !empty($_GET['q'])) echo htmlspecialchars($_GET['q']); ?>">
					<span class="input-group-btn">
                  <button class = "btn btn-default" type = "submit">
                     <span class="glyphicon glyphicon-search"></span>
					</button>
					</span>
					<!--button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>-->
				</div>
			</form>
	</li>
</ul>
<div class="container-fluid text-center" style="padding-top: 2%; font-family: 'Raleway', sans-serif; font-size: 30px;">Committees</div>

<div class="container-fluid" style="width:100%;">
	<div class="row">


		<div class="col-sm-12" style="padding-left:6%;padding-right:6%;padding-top:1%;padding-bottom:2%;text-align:center;">
			<?php
	// get the committee names
	$query = "SELECT * FROM committees";
	$result = mysqli_query($dbc, $query);
	$count = 0;
	if (mysqli_num_rows($result) != 0) {
		while ($com = mysqli_fetch_array($result)) {
?>
				<a href="dashboard.php?com=<?php echo htmlspecialchars($com['committee_id']); ?>"><img class="img img-responsive inline-block" width="130" height="130" src="../images/<?php echo str_replace(' ','',strtolower($com['committee_name'])); ?>_logo.png"></a>
				<?php		
			++$count;
			if ($count == 8)
				break;
		}
	}
?>

		</div>
		<div class = "col-sm-1"></div>
	</div>
</div>
<?php
	// get the events
	if (isset($_GET['cat'])) {
		// get events that fall under specified category
		$category = mysqli_real_escape_string($dbc, trim($_GET['cat']));
		$query = "SELECT event_id, event_name, start_date, end_date, start_time, end_time, banner, venue FROM events WHERE category = $category AND event_id NOT IN (SELECT event_id FROM registrations WHERE user_id = ".$_SESSION['user_id'].") ORDER BY start_date";
	}
	else if (isset($_GET['com'])) {
		// get events that fall under specified committee
		$committee = mysqli_real_escape_string($dbc, trim($_GET['com']));
		$query = "SELECT event_id, event_name, start_date, end_date, start_time, end_time,banner, venue FROM events WHERE committee = $committee AND event_id NOT IN (SELECT event_id FROM registrations WHERE user_id = ".$_SESSION['user_id'].") ORDER BY start_date";
	}
	else if (isset($_GET['q']) && !empty($_GET['q'])) {
		// search for event with specified keywords
		$keywords = mysqli_real_escape_string($dbc, trim($_GET['q']));
		$query = "SELECT event_id, event_name, start_date, start_time, end_date, end_time,banner, venue FROM events WHERE MATCH (event_name, description) AGAINST ('$keywords' IN NATURAL LANGUAGE MODE) AND event_id NOT IN (SELECT event_id FROM registrations WHERE user_id = ".$_SESSION['user_id'].")";
	}
	else {
		// get all upcoming events
		$query = "SELECT event_id, event_name, start_date, end_date, start_time, end_time, banner, venue FROM events WHERE event_id NOT IN (SELECT event_id FROM registrations WHERE user_id = ".$_SESSION['user_id'].") ORDER BY start_date";
	}
?>
<div class="container-fluid text-center" style="padding-top: 2%;font-family: 'Raleway', sans-serif; font-size: 30px; " id="start">
	Upcoming</div>
<div class="container" id="h">
	<?php
	$result = mysqli_query($dbc, $query);
	if (mysqli_num_rows($result) != 0) {
		while ($event = mysqli_fetch_array($result)) {
			$filename = "../banners/".str_pad($event['event_id'], 4, 0, STR_PAD_LEFT).$event['banner'];
			
			if (file_exists($filename)) {
				$source = $filename;
			}
			else {
				$source = "../banners/event_default.jpg";
			}
			
?>
<div class="cube" id="a">
	<div class="row">
		<div class="col-sm-3" style="padding-left:4%;">
			<img src="<?php echo htmlspecialchars($source); ?>" class="img img-responsive" style="padding-top:5%; vertical-align: middle;"
			    width="160px" height="160px">
		</div>
		<div class="col-sm-6">
			<div style="text-align: left;">
				<p style="font-size: 10px; color: gray; padding-bottom: 0px;">
					<?php echo 'EV'.htmlspecialchars(str_pad($event['event_id'], 3, '0', STR_PAD_LEFT)); ?>
				</p>
				<a href="event.php?event=<?php echo htmlspecialchars($event['event_id']); ?>">
					<p style="font-size:30px;color:rgb(65,65,65); padding-top: 0px;">
						<?php echo htmlspecialchars($event['event_name']) ?>
					</p>
				</a>
				<p style="font-size:15px;"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;
					<?php 
	if (empty($event['end_date'])) 
		echo htmlspecialchars(date('d M, Y', strtotime($event['start_date']))); 
	else 
		echo htmlspecialchars(date('d M, Y', strtotime($event['start_date']))).' - '.htmlspecialchars(date('d M, Y', strtotime($event['end_date']))); 
?>
				</p>
				<p style="font-size:15px;"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;
					<?php
	if (empty($event['end_time']))
		echo htmlspecialchars(date('H:i A', strtotime($event['start_time'])));
	else
		echo htmlspecialchars(date('H:i A', strtotime($event['start_time']))).' - '.htmlspecialchars(date('H:i A', strtotime($event['end_time'])));;
?>
				</p>
				<p style="font-size:15px;"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;
					<?php
	echo htmlspecialchars($event['venue']);
?>
				</p>
			</div>
		</div>
		<div class="col-sm-3">
			<div style="padding-top:12%;" class="text-center">
				<a href="../controls/register.php?event=<?php echo htmlspecialchars($event['event_id']); ?>"><button id="tileb" class="button">Register</button></a>
				<br>
				<br>
				<a href="event.php?event=<?php echo htmlspecialchars($event['event_id']); ?>"><button id="tile" class="button">More</button></a>
			</div>
		</div>
	</div>
</div>
<br>
<?php
		}
	}
	else
		echo "No upcoming event!";
?>
	</div>
	</div>
	<?php
	require_once(__DIR__ . '/../includes/footer.php');
?>