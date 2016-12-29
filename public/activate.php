<?php
	/*
	 * @author: Arpita Karkera,Sunaina Punyani
	 * @date: 8th December, 2016
	 * 
	 * Verifies user. This link is sent to user for activation.
	 *
	 */

	// authenticate
	require_once(__DIR__ . '/../includes/authenticate.php');

	// connect to database
	require_once(__DIR__ . '/../includes/dbconfig.php');

	$display_msg = "<div class='container-fluid'><h1>Invalid Activation!</h1><p>Sorry, it seems you have an invalid activation link. Check the link sent to you or try again.<br>If the problem persists, mail us at regdesk.vjti@gmail.com.</p></div>";

	if (!empty($_GET['id'])) {
		$id = mysqli_real_escape_string($dbc, trim($_GET['id']));
	}
	if (!empty($_GET['key'])) {
		$key = mysqli_real_escape_string($dbc, trim($_GET['key']));
	}
	if (isset($id) && isset($key)) {

		// get the first and last name of user
		$query = "SELECT first_name, last_name from users WHERE user_id = '$id'";
		$result = mysqli_query($dbc, $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$db_key = md5(sha1($row['first_name'].$row['last_name']));
			if ($key == $db_key) {
				// account verified
				$_SESSION['user_id'] = $id;
				$_SESSION['first_name'] = $row['first_name'];
				$_SESSION['last_name'] = $row['last_name'];
				$query = "UPDATE users SET verified = 1 WHERE user_id = $id LIMIT 1";
				mysqli_query($dbc, $query);
				$display_msg = '<div class="container-fluid"><h1>Congatulations!</h1><p><b>Your account is activated.</b><br>Go explore! Head to your <a href="dashboard.php">Dashboard</a></p></div>';
			}
		}
	}

	// render header
	$title = 'Activate';
	require_once(__DIR__ . '/../includes/header.php');

	echo $display_msg;
?>

	
	
<div class="footer">
<?php	
	require_once(__DIR__ . '/../includes/footer.php');
	
?>
</div>