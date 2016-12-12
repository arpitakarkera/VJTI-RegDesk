<?php
	/*
	 *
	 * @author Arpita Karkera
	 * @date 12 December, 2016
	 *
	 * For admin to confirm or reject manager requests.
	 *
	 */

	// code for admin authentication
	// TODO

	// get database constants
	require_once(__DIR__ . '../includes/dbconfig.php');
	// connect to database
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// grab the user id and details of users who have applied for manager
	$query = "SELECT users.user_id, users.first_name, users.last_name, users.email
				FROM requests LEFT JOIN users WHERE requests.user_id = users.user_id";
	$result = mysqli_query($dbc, $query);
	if (mysqli_num_rows($result) != 0) {
		echo '<form method="POST" action="'.$_SERVER['PHP_SELF'].'">';
		echo '<table>';
		while ($row = mysqli_fetch_array($result)) {
			echo '<tr>';
			echo "<td>$row['user_id']</td>
				  <td>$row['first_name']</td>
				  <td>$row['last_name']</td>
				  <td>$row['email']</td>
				  <td>
				  	<input type='radio' name='$user_id' value='c' id='c'><label for='c'>Confirm</label>
				  	<input type='radio' name='$user_id' value='r' id='r'><label for='r'>Reject</label>
				  </td>";
			echo '</tr>';
		}
		echo '</table>';
		echo '<input type="submit" name="submit" value="Done">';
		echo '</form>';
	}
	else {
		echo "No requests.";
	}