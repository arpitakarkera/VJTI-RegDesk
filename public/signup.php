<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 5th December, 2016
	 * 
	 * Sign Up page and logic
	 *
	 */

	// authenticate
	require_once(__DIR__ . '/../includes/authenticate.php');

	// get the database constants
	require_once(__DIR__ . '/../includes/dbconfig.php');

	// connect to the database
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	$err_msg = '';

	if (!isset($_SESSION['user-id'])) {
		// user is not logged in
		if (isset($_POST['submit'])) {
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
					if ($password1 != $password2) // passwords don't match
						$err_msg = 'The passwords don\'t match.';
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // email is invalid
						$err_msg = 'The email provided is invalid.';
					if (!validate_contact($contact)) // contact is invalid
						$err_msg = 'The contact number provided is invalid.';
					else {
						// insert data into database
						$query = "INSERT INTO users (username, password, id, first_name, last_name, email, contact, gender, programme, year, branch) VALUES ('$username', SHA('$password1'), '$id', '$first_name', '$last_name', '$email', '$contact', '$gender', '$programme', '$year', '$branch')";
        				mysqli_query($dbc, $query);
        				// login the user
        				$query = "SELECT user_id FROM users WHERE username = '$username'";
        				$result = mysqli_query($dbc, $query);
        				$row = mysqli_fetch_array($result);
        				$_SESSION['user_id'] = $row['user_id'];
        				$_SESSION['username'] = $username;

        				// redirect to confirmation page
						header('Location: confirmsignup.php');

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
	}/*
	else {
		// user is logged in so redirect to dashboard
		header('Location: dashboard.php');
	}*/

	// function that validates mobile number. number should begin with 7, 8 or 9 and have 10 digits.
	function validate_contact($contact) {
		if (preg_match('/^[789]\d{9}$/', $contact))
			return true;

		return false;
	}
?>

<!--Render header-->
<?php
	$title = 'Sign Up';
	require_once(__DIR__ . '/../includes/header.php');
?>

<h1>Join VJTI-RegDesk</h1>
<h3>Easy. Simple. Effective.</h3>

<div>
<h3>Create your account</h3>
<p><?php echo $err_msg; ?></p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<fieldset>
		<legend>Name</legend>
		<input type="text" name="first_name" placeholder="First" required value="<?php if(isset($first_name)) echo $first_name; ?>">
		<input type="text" name="last_name" placeholder="Last" required value="<?php if(isset($last_name)) echo $last_name; ?>">
	</fieldset>

	<fieldset>
		<legend>Username</legend>
		<input type="text" name="username" placeholder="Pick a username" required value="<?php if(isset($username)) echo $username; ?>">
	</fieldset>

	<fieldset>
		<legend>Password</legend>
		<input type="password" name="password1" placeholder="Create a password" required>
		<input type="password" name="password2" placeholder="Confirm password" required>
	</fieldset>

	<fieldset>
		<legend>e-mail</legend>
		<input type="text" name="email" placeholder="Your email address" required value="<?php if(isset($email)) echo $email; ?>">
	</fieldset>

	<fieldset>
		<legend>Contact</legend>
		<input type="text" name="contact" placeholder="Your mobile number" value="<?php if(isset($contact)) echo $contact; ?>">
	</fieldset>

	<fieldset>
		<legend>Gender</legend>
		<input type="radio" name="gender" value="M" id="Male"><label for="Male">Male</label>
		<input type="radio" name="gender" value="F" id="Female"><label for="Female">Female</label>
	</fieldset>

	<fieldset>
		<legend>ID</legend>
		<input type="text" name="id" placeholder="Your ID number" value="<?php if(isset($id)) echo $id; ?>">
	</fieldset>

	<fieldset>
		<legend>Programme and Year</legend>
		<label for="programme">Programme:</label>
		<select name="programme">
		<?php
			$programmes = array('B.Tech.', 'M.Tech.', 'M.C.A.', 'PhD', 'Diploma');
			foreach ($programmes as $programme) {
				echo '<option value="'.$programme.'">'.$programme.'</option>';
			}
		?>
		</select>
		<label for="year">Year:</label>
		<select name="year">
		<?php
			$years = array('First', 'Second', 'Third', 'Fourth');
			foreach ($years as $year) {
				echo '<option value="'.$year.'">'.$year.'</option>';
			}
		?>
		</select>
	</fieldset>

	<fieldset>
		<legend>Branch</legend>
		<select name="branch">
		<?php
			$query = "SELECT branch_id, branch_name FROM branches";
			$rows = mysqli_query($dbc, $query);
			while($row = mysqli_fetch_array($rows)) {
				echo '<option value="'.$row['branch_id'].'">'.$row['branch_name'].'</option>';
			}
		?>
		</select>
	</fieldset>

	<!--Do the rest-->
	<br>
	<input type="submit" name="submit" value="Create account">
</form>
</div>

<!--Render footer-->
<?php
	require_once(__DIR__ . '/../includes/footer.php');
?>