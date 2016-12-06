<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 5th December, 2016
	 * 
	 * Login logic. To be included in index page
	 *
	 */

	// get the database constants
	require_once(__DIR__ . '/../includes/dbconfig.php');

	// if the user isn't logged in, try to login
	if (!isset($_SESSION['username'])) {
		// if the user tried to login
		if (isset($_POST['submit'])) {
			// connect to database
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error connecting to database.');

			// grab the login data entered by user
			$user_username = mysqli_real_escape_string($dbc, trim($_POST['user_username']));
			$user_password = mysqli_real_escape_string($dbc, trim($_POST['user_password']));

			// query the database if username and password are not empty
			if (!empty($user_username) && !empty($user_password)) {
				// look up username and password in the database
				$query = "SELECT user_id, username from users WHERE username = '$user_username' AND password = SHA('$user_password')";
				$result = mysqli_query($dbc,$query);

				if (mysqli_num_rows($result) == 1) {
					// login credentials were ok so login the user and redirect to dashboard
					$row = mysqli_fetch_array($result);
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['username'] = $row['username'];
					header('Location: public/dashboard.php');
				}
				else {
					// username or password was incorrect so set the error message
					$err_msg = "Username or password is incorrect.";
				}
			}
			else
				$err_msg = "Username or password missing.";
		}
	}/*
	else {
		// user is logged in do redirect to dashboard
		header('Location: public/dashboard.php');
	}*/
?>