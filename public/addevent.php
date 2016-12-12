<?php
	/*
	 *
	 * @author Arpita Karkera
	 * @date 8 December, 2016
	 *
	 * Form to add an event
	 *
	 */

	// authenticate
	require_once(__DIR__ . '/../includes/authenticate.php');

	// grab database constants
	require_once(__DIR__ . '/../includes/dbconfig.php');

	// connect to database
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Could not connect to database');

	$err_msg = '';

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
				$incharge = $incharge1.','.$contact1.','.$incharge2.','.$contact2;
				$note = empty($note) ? NULL : $note;
				if (empty($end_date) || empty($end_time))
					$end_date = $end_time = NULL;

				$manager_id = $_SESSION['manager_id'];
				$query = "INSERT INTO events (event_name, description, start_date, start_time, end_date, end_time, venue, category, incharge, committee, cost, refreshment, note, manager) VALUES ('$event_name', '$description', '$start_date', '$start_time', '$end_date', '$end_time', '$venue', $category, '$incharge', $committee, $cost, $refreshment, '$note', $manager_id)";
				mysqli($dbc, $query);
			}
		}
	}

	// render header
	$title = 'Post Event';
	require_once(__DIR__ . '/../includes/header.php');
?>

<div>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<fieldset>
			<legend>Event Name</legend>
			<input type="text" name="event_name" value="<?php if(isset($event_name)) echo $event_name; ?>" required>
		</fieldset>
		<fieldset>
			<legend>Description</legend>
			<!-- Adjust the number of rows and columns as required-->
			<textarea id="description" rows="4" cols="50" placeholder="Describe your event"><?php if(isset($description)) echo $description; ?></textarea>
		</fieldset>
		<fieldset>
			<legend>Schedule</legend>
			<label for="start">From: </label>
			<input type="date" name="start_date" min="<?php echo date('Y-m-d'); ?>" value="<?php if(isset($start_date)) echo $start_date; ?>" id="start" required>
			<input type="time" name="start_time" value="<?php if(isset($start_time)) echo $start_time; ?>" id="start" required>
			<br>
			<label for="end">To:</label>
			<input type="date" name="end_date" min="<?php echo date('Y-m-d'); ?>" value="<?php if(isset($end_date)) echo $end_date; ?>" id="end">
			<input type="time" name="end_time" value="<?php if(isset($end_time)) echo $end; ?>" id="end">
			<br>
			<label for="venue">Venue:</label>
			<input type="text" name="venue" value="<?php if(isset($venue)) echo $venue; ?>" required>
		</fieldset>
		<fieldset>
			<legend>Incharge</legend>
			<p>Who should be contacted for any queries?</p>
			<input type="text" name="incharge1" placeholder="Incharge 1" value="<?php if(isset($incharge1)) echo $incharge1; ?>" required>
			<input type="text" name="contact1" placeholder="Contact number" value="<?php if(isset($contact1)) echo $contact1; ?>" required>
			<br>
			<input type="text" name="incharge2" placeholder="Incharge 2" value="<?php if(isset($incharge2)) echo $incharge2; ?>">
			<input type="text" name="contact2" placeholder="Contact number" value="<?php if(isset($contact2)) echo $contact2; ?>">
		</fieldset>
		<fieldset>
			<legend>Group</legend>
			<label for="category">Category:</label>
			<select name="category">
				<?php
					$categories = array('Event', 'Workshop', 'Competition', 'Lecture');
					foreach ($categories as $category) {
						echo '<option value="'.$category.'">'.$category.'</option>';
					}
				?>
			</select>
			<label for="committee">Committee</label>
			<select name="committee">
				<?php
					$query = "SELECT committee_id, committee_name FROM committees";
					$committees = mysqli_query($dbc, $query);
					while ($committee = mysqli_fetch_array($committees))
						echo '<option value="'.$committee['committee_id'].'">'.$committee['committee_name'].'</option>';
				?>
			</select>
		</fieldset>
		<fieldset>
			<legend>Details</legend>
			<label for="cost">Registration fee: ₹</label>
			<input type="text" name="cost" value="<?php if(isset($cost)) echo $cost; else echo '0'?>">
			<br>
			<label for="refreshment">Refreshments: </label>
			<input type="radio" name="refreshment" value="1" id="y"><label for="y">Yes</label>
			<input type="radio" name="refreshment" value="0" checked id="n"><label for="n">No</label>
		</fieldset>
		<fieldset>
			<legend>Note</legend>
			<p>Any other relevant instruction?</p>
			<input type="text" name="note" value="<?php if(isset($note)) echo $note; ?>">
		</fieldset>
		<input type="submit" name="submit" value="Post event">
	</form>
</div>

<!--Render footer-->
<?php
	require_once(__DIR__ . '/../includes/footer.php');
?>