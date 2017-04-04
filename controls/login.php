<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 5th December, 2016
	 * 
	 * Login logic. To be included in index page
	 *
	 */

	// connect to database
	require_once(__DIR__ . '/../includes/dbconfig.php');

	// if the user isn't logged in, try to login
	if (!isset($_SESSION['user_id'])) {
		// if the user tried to login
		if (isset($_POST['submit'])) {

			// grab the login data entered by user
			$user_email = mysqli_real_escape_string($dbc, trim($_POST['user_email']));
			$user_password = mysqli_real_escape_string($dbc, trim($_POST['user_password']));

			// query the database if email and password are not empty
			if (!empty($user_email) && !empty($user_password)) {
				// look up email and password in the database
				$query = "SELECT user_id, password, first_name, last_name, verified from users WHERE email = '$user_email'";
				$result = mysqli_query($dbc,$query);
				//echo "'$user_email'\n'$user_password'\n$query";

				if (mysqli_num_rows($result) == 1) {
					$row = mysqli_fetch_array($result);
					if (password_verify($user_password, $row['password'])) {
						$verified = $row['verified'];
						if ($verified) {
							$_SESSION['user_id'] = $row['user_id'];
							$_SESSION['first_name'] = $row['first_name'];
							$_SESSION['last_name'] = $row['last_name'];
							// check if the user is a manager
							$query = "SELECT manager_id FROM managers WHERE user_id = ".$row['user_id'];
							$result = mysqli_query($dbc, $query);
							if (mysqli_num_rows($result) == 1) {
								$row = mysqli_fetch_array($result);
								$_SESSION['manager_id'] = $row['manager_id'];
							}
							header('Location: public/dashboard.php');
						}
						else {
							// account is not activated yet
							$err_msg = "You have not activated your account yet.";
						}
					}
				}
				else {
					// email or password was incorrect so set the error message
					$err_msg = "E-mail or password is incorrect.";
				}
			}
			else
				$err_msg = "E-mail or password missing.";
		}
	}
	/*
	else {
		// user is logged in do redirect to dashboard
		header('Location: public/dashboard.php');
	}*/
?>