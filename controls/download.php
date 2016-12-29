<?php
	/*
	 *
	 * @author Arpita Karkera
	 * @date 19 December, 2016
	 *
	 * Downloads a csv file of containing registered users' data of an event
	 * event id is supplied using GET
	 *
	 */

	// authenticate - user must be logged in and a manager to access
	require_once(__DIR__ . '/../includes/authenticate.php');

	// connect to database
	require_once(__DIR__ . '/../includes/dbconfig.php');

	// get event details
	if (isset($_GET['event'])) {
		$event_id = mysqli_real_escape_string($dbc, trim($_GET['event']));
		$query = "SELECT events.event_name, events.manager, users.first_name, users.last_name FROM events INNER JOIN managers ON events.manager = managers.manager_id INNER JOIN users ON managers.user_id = users.user_id WHERE events.event_id = $event_id";
		$result = mysqli_query($dbc, $query) or die(mysqli_error());
		if (mysqli_num_rows($result) == 1) {
			$event_row = mysqli_fetch_array($result);
			// proceed only if the manager who is logged in posted the event
			if ($_SESSION['manager_id'] == $event_row['manager']) {
				// correct manager
				// get details of users who have registered for the event
				$query = "SELECT r.registration_id, u.first_name, u.last_name, u.email, u.id, u.contact, p.programme_name, u.year, b.branch_name FROM programmes p, branches b, registrations r INNER JOIN users u ON r.user_id = u.user_id WHERE r.event_id = $event_id AND p.programme_id = u.programme AND b.branch_id = u.branch";
				$result = mysqli_query($dbc, $query);

				// open file to be downloaded
				$out = fopen('php://output', 'w');
				// put deatils of event and manager on file
				fputcsv($out, array('Event Name:', $event_row['event_name']));
				fputcsv($out, array('Manager:', $event_row['first_name'].' '.$event_row['last_name']));
				fputcsv($out, array());
				fputcsv($out, array('Registration ID','Name', 'Email', 'ID', 'Contact', 'Programme', 'Year', 'Branch'));
				if (mysqli_num_rows($result) != 0) {
					while ($reg_row = mysqli_fetch_array($result)) {
						//echo str_pad($event_id, 3, '0', STR_PAD_LEFT).str_pad($reg_row['registration_id'], 5, '0', STR_PAD_LEFT);
						fputcsv($out, array(str_pad($event_id, 3, '0', STR_PAD_LEFT).str_pad($reg_row['registration_id'], 5, '0', STR_PAD_LEFT), $reg_row['first_name'].' '.$reg_row['last_name'], $reg_row['email'], $reg_row['id'], $reg_row['contact'], $reg_row['programme_name'], $reg_row['year'], $reg_row['branch_name']));
					}
				}
				header('Content-Type: application/csv');
				// tell the browser we want to save it instead of displaying it
    			header('Content-Disposition: attachment; filename="'.str_replace(' ','',strtolower($event_row['event_name'])).str_pad($event_id, 3, '0', STR_PAD_LEFT).'.csv";');
    			// make php send the generated csv lines to the browser
    			fpassthru($out);
				fclose($out);
			}
		}
	}
?>