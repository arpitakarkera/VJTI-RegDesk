<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 5th December, 2016
	 * 
	 * Sign Up page and logic
	 *
	 */

	// get the database constants
	require_once(__DIR__ . '/../includes/dbconfig.php');

	// start the session
	session_start();

	if (!isset($_SESSION['user-id'])) {
		// user is not logged in
		if (isset($_POST['submit'])) {
			// connect to the database
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			// grab the data
			$first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
			$last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
			$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
			$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
			$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
			$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
			$contact = mysqli_real_escape_string($dbc, trim($_POST['contact']));
			$gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
			$id = mysqli_real_escape_string($dbc, trim($_POST['id']));
			$programme = mysqli_real_escape_string($dbc, trim($_POST['programme']));
			$year = mysqli_real_escape_string($dbc, trim($_POST['year']));
			$branch = mysqli_real_escape_string($dbc, trim($_POST['branch']));

			if (!empty($first_name) && !empty($last_name) && !empty($username) && !empty($password1) && !empty($password2) && !empty($email) && !empty($id)) {
				// make sure someone isn't registered with same username
				$query = "SELECT user_id FROM users WHERE username = '$username'";
				$result = mysqli_query($dbc, $query);
				if (mysqli_num_rows($result) == 0) {
					// username is unique
					if ($password1 != $password2) // password don't match
						$err_msg = 'The passwords don\'t match.';
					if (!confirm_email($email)) // email is invalid
						$err_msg = 'The email provided is invalid.';
					if (!confirm_contact($contact)) // contact is invalid
						$err_msg = 'The contact number provided is invalid.';
					else {
						// insert data into database
						$query = "INSERT INTO users (username, password, id, first_name, last_name, email, contact, gender, programme, year, branch) VALUES ('$username', SHA('$password1'), '$id', '$first_name', '$last_name', '$email', '$contact', '$gender', '$programme', '$year', '$branch')";
        				mysqli_query($dbc, $query);
						$redirect_page = __DIR__ . '/dashboard.php';
						header('Location: ' . $redirect_page);

					}
				}
				else {
					// username exits. ask user for a different one.
					$err_msg = 'The username has been taken. Choose another one.';
				}
			}
			else {
				$err_msg = 'Please fill the required fields.';
			}
		}
	}
	else {
		// user is logged in so redirect to dashboard
		$redirect_page = __DIR__ . '/../view/dashboard.php';
		header('Location: ' . $redirect_page);
	}

	function confirm_email($email) {

	}

	function confirm_contact($contact) {

	}
?>

<!--Render header-->
<?php
	$title = 'Sign Up';
	require_once(__DIR__ . '/../includes/header.php');
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<fieldset>
		<legend>Name</legend>
		<input type="text" name="first_name" placeholder="First" required>
		<input type="text" name="last_name" placeholder="Last" required>
	</fieldset>

	<fieldset>
		<legend>Username</legend>
		<input type="text" name="username" placeholder="Pick a username" required>
	</fieldset>

	<fieldset>
		<legend>Password</legend>
		<input type="password" name="password1" placeholder="Create a password" required>
		<input type="password" name="password2" placeholder="Confirm password" required>
	</fieldset>

	<fieldset>
		<legend>e-mail</legend>
		<input type="text" name="e-mail" placeholder="Your email address" required>
	</fieldset>

	<fieldset>
		<legend>Contact</legend>
		<input type="text" name="contact">
	</fieldset>

	<!--Do the rest-->

	<input type="submit" name="submit" value="Create account">
</form>

<!--Render footer-->
<?php
	require_once(__DIR__ . '/../includes/footer.php');
?>