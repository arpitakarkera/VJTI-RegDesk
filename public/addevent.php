<?php
	/*
	 *
	 * @author Sunaina Punyani, Arpita Karkera
	 * @date 8 December, 2016
	 *
	 * Form to add an event
	 *
	 */

	// authenticate
	require_once(__DIR__ . '/../includes/authenticate.php');

	// connect to database
	require_once(__DIR__ . '/../includes/dbconfig.php');

	$err_msg = '';

	if (isset($_GET['event'])) {
		$event_id = mysqli_real_escape_string($dbc, trim($_GET['event']));
		$query = "SELECT * FROM events WHERE event_id = $event_id";
		$result = mysqli_query($dbc, $query);
		if (mysqli_num_rows($result) == 1) {
			$event = mysqli_fetch_array($result);
			// check if the manager posted the event
			if ($_SESSION['manager_id'] == $event['manager']) {
				$event_name = $event['event_name'];
				$description = $event['description'];
				$start_date = $event['start_date'];
				$end_date = $event['end_date'];
				$start_time = $event['start_time'];
				$end_time = $event['end_time'];
				$incharge1 = $event['incharge1_name'];
				$contact1 = $event['incharge1_contact'];
				$incharge2 = $event['incharge2_name'];
				$contact2 = $event['incharge2_contact'];
				$category = $event['category'];
				$committee = $event['committee'];
				$note = $event['note'];
			}
			else
				header('Location: manageevents.php');
		}
		else
			header('Location: manageevents.php');
	}

	if (isset($_SESSION['manager_id'])) {
		// user is a manager

		if (isset($_POST['submit'])) {
			// grab the data
			$event_name = mysqli_real_escape_string($dbc, trim($_POST['event_name']));
			$description = mysqli_real_escape_string($dbc, trim($_POST['description']));
			$start_date = mysqli_real_escape_string($dbc, trim($_POST['start_date']));
			$start_time = mysqli_real_escape_string($dbc, trim($_POST['start_time']));
			$end_date = mysqli_real_escape_string($dbc, trim($_POST['end_date']));
			$end_time = mysqli_real_escape_string($dbc, trim($_POST['end_time']));
			$venue = mysqli_real_escape_string($dbc, trim($_POST['venue']));
			$incharge1 = mysqli_real_escape_string($dbc, trim($_POST['incharge1']));
			$contact1 = mysqli_real_escape_string($dbc, trim($_POST['contact1']));
			$incharge2 = mysqli_real_escape_string($dbc, trim($_POST['incharge2']));
			$contact2 = mysqli_real_escape_string($dbc, trim($_POST['contact2']));
			$category = mysqli_real_escape_string($dbc, trim($_POST['category']));
			$committee = mysqli_real_escape_string($dbc, trim($_POST['committee']));
			$cost = mysqli_real_escape_string($dbc, trim($_POST['cost']));
			$refreshment = mysqli_real_escape_string($dbc, trim($_POST['refreshment']));
			$note = mysqli_real_escape_string($dbc, trim($_POST['note']));

			if (!empty($event_name) && !empty($description) && !empty($start_date) && !empty($start_time) && !empty($venue) && !empty($incharge1) && !empty($contact1) && !empty($committee) && !empty($category)) {
				$cost = empty($cost) ? 0 : $cost;
				$note = empty($note) ? NULL : $note;
				$start_time = date('H:i:s', strtotime($start_time));
				$end_time = date('H:i:s', strtotime($end_time));

				$manager_id = $_SESSION['manager_id'];
				$query = "INSERT INTO events (event_name, description, start_date, start_time, ";
				if (!empty($end_date))
					$query .= "end_date, ";
				if (!empty($end_time))
					$query .= "end_time, ";
				$query .= "venue, category, committee, incharge1_name, incharge1_contact, ";
				if (!empty($incharge2))
					$query .= "incharge2_name, incharge2_contact, ";
				$query .= "cost, refreshment, note, manager) VALUES ('$event_name', '$description', STR_TO_DATE('$start_date', '%m/%d/%Y'), '$start_time', ";
				if (!empty($end_date))
					$query .= "STR_TO_DATE('$end_date', '%m/%d/%Y'), ";
				if (!empty($end_time))
					$query .= "'$end_time', ";
				$query .= "'$venue', $category, $committee, '$incharge1', '$contact1', ";
				if (!empty($incharge2))
					$query .= "'$incharge2', '$contact2', ";
				$query .= "$cost, $refreshment, '$note', $manager_id)";
				mysqli_query($dbc, $query) or die(mysqli_error($dbc));

				if (!empty($_FILES['banner']['name'])) {
					// add file
					$uploadOk = 0;
					require(__DIR__ . '/../controls/upload.php');
				}

				if ($uploadOk)
					header('Location: manage.php');
			}
			else
				$err_msg = "Please provide the mandatory details.";
		}
	}

	// render header
	$title = 'Post Event';
	require_once(__DIR__ . '/../includes/header.php');
?>
<br>
<div class="container">
	<form id="eventForm" class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
	<div class="form-group">
		<p style="font-size: 15px; color: rgb(230,74,60);">&nbsp;<?php echo $err_msg; ?>&nbsp;</p>
		<!--event name-->
			<label class="contol-label">Event Name</label>
			<br>
			<div class="row">
			<div class="col-sm-4">
			<input class="form-control" type="text" name="event_name" value="<?php if(isset($event_name)) echo htmlspecialchars($event_name); ?>" required>
			</div>
			</div>
			<br>
		<!--description-->
			<label class="control-label">Description</label>
			<!-- Adjust the number of rows and columns as required-->
			<br>
			<div class="row">
			<div class="col-sm-4">
			<textarea name="description" class="form-control" id="description" rows="4" cols="50" placeholder="Describe your event"><?php if(isset($description)) echo htmlspecialchars($description); ?></textarea>
			</div>
			</div>
		<br>
		<!--schedule-->
			<label class="control-label">Schedule</label>
			<br>
			<label class="control-label" for="start">From: </label>
			<div class="row">
			<div class="col-sm-4">
			<div class="input-group input-append date calender">
			<input class="form-control" type="text" name="start_date" min="<?php echo date('Y-m-d'); ?>" value="<?php if(isset($start_date)) echo $start_date; ?>" id="start" required>
			<span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
            </div>
			</div>
			<div class="col-sm-4">
			<div class="input-group input-append time">
			<input class="form-control time" type="text" name="start_time" placeholder="hh:mm AM/PM"value="<?php if(isset($start_time)) echo $start_time; ?>" id="start" required>
			<span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
            </div>
			</div>
			</div>
			<br>
			<label class="control-label" for="end">To: </label>
			<div class="row">
			<div class="col-sm-4">
			<div class="input-group input-append date calender">
			<input class="form-control" type="text" name="end_date" min="<?php echo date('Y-m-d'); ?>" value="<?php if(isset($end_date)) echo $end_date; ?>" id="end">
			<span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
            </div>
			</div>
			<div class="col-sm-4">
			<div class="input-group input-append time">
			<input class="form-control time" type="text" name="end_time" placeholder="hh:mm AM/PM"value="<?php if(isset($end_time)) echo $end_time; ?>" id="end">
			<span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
			</div>
			</div>
			</div>
			<br>
			<label class="control-label" for="venue">Venue: </label>
			<div class="row">
			<div class="col-sm-4">
			<input class="form-control" type="text" name="venue" value="<?php if(isset($venue)) echo htmlspecialchars($venue); ?>" required>
			</div>
			</div>
			<br>
			<!--incharge-->
			<label class="control-label">Incharge</label>
			<span class="help-block">Who should be contacted for any queries?</span>
			<div class="row">
			<div class="col-sm-4">
			<input class="form-control" type="text" name="incharge1" placeholder="Incharge 1" value="<?php if(isset($incharge1)) echo htmlspecialchars($incharge1); ?>" required>
			</div>
			<div class="col-sm-4">
			<input class="form-control" type="text" name="contact1" placeholder="Contact number" value="<?php if(isset($contact1)) echo htmlspecialchars($contact1); ?>" required>
			</div>
			</div>

			<br>

			<div class="row">
			<div class="col-sm-4">
			<input class="form-control" type="text" name="incharge2" placeholder="Incharge 2" value="<?php if(isset($incharge2)) echo htmlspecialchars($incharge2); ?>">
			</div>
			<div class="col-sm-4">
			<input class="form-control" type="text" name="contact2" placeholder="Contact number" value="<?php if(isset($contact2)) echo htmlspecialchars($contact2); ?>">
			</div>
			</div>
			<br>

			<!--group-->
			<label class="control-label">Group</label>
			<br>
			<div class="row">
			<div class="col-sm-4">
			<label class="control-label" for="category">Category:</label>
			
			<select class="form-control" name="category">
				<?php
					$query = "SELECT category_id, category_name FROM categories";
					$categories = mysqli_query($dbc, $query);
					while ($category = mysqli_fetch_array($categories)) {
						echo '<option value="'.$category['category_id'].'">'.$category['category_name'].'</option>';
					}
				?>
			</select>
			</div>
			<div class="col-sm-4">
			<label class="control-label" for="committee">Committee:</label>

			<select class="form-control" name="committee">
				<?php
					$query = "SELECT committee_id, committee_name FROM committees";
					$committees = mysqli_query($dbc, $query);
					while ($committee = mysqli_fetch_array($committees))
						echo '<option value="'.$committee['committee_id'].'">'.$committee['committee_name'].'</option>';
				?>
			</select>
			</div>
			</div>
			<br>
		<!--details-->
		
			<label class="control-label">Details</label>
			<br>
			<br>
			<div class="row">
			<div class="col-sm-4">
			<label class="control-label" for="cost">Registration fee: ₹</label>
			<input class="form-conntrol" type="text" name="cost" value="<?php if(isset($cost)) echo $cost; else echo '0'?>">
			</div>
			</div>
			<br>
			
			<label class="control-label" for="refreshment">Refreshments: </label>
			<br>
			<div class="row">
			<div class="col-sm-4">
			<input type="radio" name="refreshment" value="1" id="y"><label for="y">Yes</label>
			</div>
			<div class="col-sm-4">
			<input type="radio" name="refreshment" value="0" checked id="n"><label for="n">No</label>
			</div>
			</div>
			<br>
			<!--note-->
			<label class="control-label">Note</label>
			<br>
			<label class="control-label">Any other relevant instruction?</label>
			<div class="row">
			<div class="col-sm-4">
			<input class="form-control" type="text" name="note" value="<?php if(isset($note)) echo htmlspecialchars($note); ?>">
			</div>
			</div>
			<br>
		    <input class="form-control" type="file" id="banner" name='banner'>
		    <br>
		<button class="btn btn-lg btn-success" type="submit" name="submit">Post Event</button>
	</form>
</div>
</form>
</div>
<script>
$('.calender').datepicker({dateFormat: 'yy-mm-dd'});
$('.time').timepicker();
</script>
<!--Render footer-->
<?php
	require_once(__DIR__ . '/../includes/footer.php');
?> 