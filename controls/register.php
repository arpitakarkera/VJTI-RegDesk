<?php
	/*
	 *
	 * @author Arpita Karkera
	 * @date 17 December, 2016
	 *
	 * When user clicks register on an event, this script executes.
	 * Event id is passed through url and registration is added to registrations table
	 * User is then directed to event page
	 *
	 */

	// authenticate
	require_once(__DIR__ . '/../includes/authenticate.php');

	// connect to database
	require_once(__DIR__ . '/../includes/dbconfig.php');

	if (isset($_GET['event'])) {
		$event_id = mysqli_real_escape_string($dbc, trim($_GET['event']));
		$user_id = $_SESSION['user_id'];
		// insert them into registrations table only if user is not registered
		$check_query = "SELECT * FROM registrations WHERE user_id = $user_id AND event_id = $event_id";
		$result = mysqli_query($dbc, $check_query);
		if (mysqli_num_rows($result) == 0) {
			// user has not registered so insert
			$insert_query = "INSERT INTO registrations (user_id, event_id) VALUES ($user_id, $event_id)";
			mysqli_query($dbc, $insert_query);
			// update number of registered users for event in events
			$update_query = "UPDATE events SET registered = registered + 1 WHERE event_id = $event_id";
			mysqli_query($dbc, $update_query);

			// get data to be included in mail
			$reg_query = "SELECT registration_id from registrations WHERE user_id = $user_id AND event_id = $event_id";
			$result = mysqli_query($dbc, $reg_query);
			$reg_data = mysqli_fetch_array($result);
			$user_query = "SELECT first_name, last_name, email FROM users WHERE user_id = $user_id";
			$result = mysqli_query($dbc, $user_query);
			$user_data = mysqli_fetch_array($result);
			$event_query = "SELECT * FROM events WHERE event_id = $event_id";
			$result = mysqli_query($dbc, $event_query);
			$event_data = mysqli_fetch_array($result);

			$event_url = dirname(dirname((isset($_SERVER['HTTPS'])?'https://':'http://').$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'])).'/public/event.php?event='.$event_id;
			$date = empty($event_data['end_date']) ? (date('d M, Y', strtotime($event_data['start_date']))) : (date('d M, Y', strtotime($event_data['start_date'])).' - '.date('d M, Y', strtotime($event_data['end_date'])));
			$time = empty($event_data['end_time']) ? (date('H:i A', strtotime($event_data['start_time']))) : (date('H:i A', strtotime($event_data['start_time'])).' - '.date('H:i A', strtotime($event_data['end_time'])));
			$incharge = empty($event_data['incharge2_name']) ? ($event_data['incharge1_name'].' - '.$event_data['incharge1_contact']) : ($event_data['incharge1_name'].' - '.$event_data['incharge1_contact'].'<br>'.$event_data['incharge2_name'].' - '.$event_data['incharge2_contact']);

			// send confirmation mail
			require_once(__DIR__ . '/mailer.php');
			$to = $user_data['email'];
        	$from = REGISTRAR;
        	$from_name = NAME;
        	$subject = $event_data['event_name'].' Registration Confirmation | '.NAME;
        	$body = "<p>Hello ".$user_data['first_name'].' '.$user_data['last_name']."!</p>".
			"<p>Congratulations, you have successfully registered for <b>".$event_data['event_name']."</b>.<br>Your registration details are as below:</p>".
			"<p>Registration ID: REG".(str_pad($event_id, 3, '0', STR_PAD_LEFT)).(str_pad($reg_data['registration_id'], 5, '0', STR_PAD_LEFT))."<br>Event Name: ".$event_data['event_name']."<br>Date: ".$date."<br>Time: ".$time."<br>Venue: ".$event_data['venue']."<br></p>".
			'<p>You may check further details about the event at <a href="'.$event_url.'">'.$event_data['event_name'].'</a></p>'.
			"<p>For any queries please feel free to contact event incharge(s):<br>".$incharge."</p>".
			"<p>Thanks for registering!</p>";
        	$sent = singlemail($to, $from, $from_name, $subject, $body);
		}

		// redirect to event page
		header('Location: ../public/event.php?event='.$event_id);
	}
?>