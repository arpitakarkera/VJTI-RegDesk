<?php
	/*
	 *
	 * @author Arpita Karkera
	 * @date 12 December, 2016
	 *
	 * For admin to confirm or reject manager requests.
	 *
	 */

	// include admin
	require_once(__DIR__ . '/../includes/admin.php');
	// code for admin authentication
	if (!isset($_SERVER['PHP_AUTH_USER'])) {
    	header('WWW-Authenticate: Basic realm="Admin Control"');
    	header('HTTP/1.0 401 Unauthorized');
    	echo 'Sorry, you are not authorised to access this';
    	exit;
    }
    else {
    	if (($_SERVER['PHP_AUTH_USER'] != ADMIN_USER) || ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) {
    		header('WWW-Authenticate: Basic realm="My Realm"');
    		header('HTTP/1.0 401 Unauthorized');
    		echo 'Sorry, you are not authorised to access this';
    		exit;
    	}
    }

	// connect to database
	require_once(__DIR__ . '/../includes/dbconfig.php');

	// grab the user id and details of users who have applied for manager
	$query = "SELECT users.user_id, users.first_name, users.last_name, users.email
				FROM requests LEFT JOIN users ON requests.user_id = users.user_id";
	$result = mysqli_query($dbc,$query);

	if (isset($_POST['submit'])) {
		while ($row = mysqli_fetch_array($result)) {
			$response = filter_var($_POST[$row['user_id']], FILTER_SANITIZE_STRING);
			if ($response == "true") {
				// manager status confirmed

				// add user to managers
				$add_query = "INSERT INTO managers (user_id) VALUES (".$row['user_id'].")";
				mysqli_query($dbc, $add_query);

				// send a confirmation mail
				require_once(__DIR__ . '/../controls/mailer.php');
				$to = $row['email'];
        		$from = USER;
        		$from_name = NAME;
        		$subject = "Manager Request Confirmed";
        		$body = "<p>Hello ".$row['first_name'].' '.$row['last_name']."!</p>".
        				"<p>Your request for manager status has been confirmed. You are now eligible to post new events from the 'Post Event' tab.</p>";
        		singlemail($to, $from, $from_name, $subject, $body);
			}
			// remove user from responses
			$del_query = "DELETE FROM requests WHERE user_id = ".$row['user_id'];
			mysqli_query($dbc, $del_query);
		}
	}

	if (mysqli_num_rows($result) == 0) {
		echo "No requests";
	}
	else {
		echo '<form method="POST" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'">';
		echo '<table>';
		echo '<tr><td>User ID</td><td>Name</td><td>E-mail</td><td>Response</td></tr>';
		while ($row = mysqli_fetch_array($result)) {
			echo '<tr>';
			echo "<td>".$row['user_id']."</td>
				  <td>".$row['first_name'].' '.$row['last_name']."</td>
				  <td>".$row['email']."</td>
				  <td>
				  	<input type='radio' name='".$row['user_id']."' value='true' id='c'><label for='c'>Confirm</label>
				  	<input type='radio' name='".$row['user_id']."' value='false' id='r'><label for='r'>Reject</label>
				  </td>";
			echo '</tr>';
		}
		echo '</table>';
		echo '<br><input type="submit" name="submit" value="Done">';
		echo '</form>';
	}
?>