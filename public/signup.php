<?php
	/*
	 * @author: Arpita Karkera, Sunaina Punyani
	 * @date: 5th December, 2016
	 * 
	 * Sign Up page and logic
	 *
	 */

	// authenticate
	require_once(__DIR__ . '/../includes/authenticate.php');

	// connect to database
	require_once(__DIR__ . '/../includes/dbconfig.php');

	$err_msg = '';

	if (!isset($_SESSION['user-id'])) {
		// user is not logged in
		if (isset($_POST['submit'])) {
			// grab the data
			$first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
			$last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
			//$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
			$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
			$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
			$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
			$contact = mysqli_real_escape_string($dbc, trim($_POST['contact']));
			$gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
			$id = mysqli_real_escape_string($dbc, trim($_POST['id']));
			$programme = mysqli_real_escape_string($dbc, trim($_POST['programme']));
			$year = mysqli_real_escape_string($dbc, trim($_POST['year']));
			$branch = mysqli_real_escape_string($dbc, trim($_POST['branch']));

			if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password1) && !empty($password2) && !empty($id)) {
				// make sure someone isn't registered with same email
				$query = "SELECT user_id FROM users WHERE email = '$email'";
				$result = mysqli_query($dbc, $query);
				if (mysqli_num_rows($result) == 0) {
					// email is unique
					if ($password1 != $password2) // passwords don't match
						$err_msg = 'The passwords don\'t match.';
					else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // email is invalid
						$err_msg = 'The email provided is invalid.';
					else if (!validate_contact($contact)) // contact is invalid
						$err_msg = 'The contact number provided is invalid.';
					else if (!validate_id($id)) // id is invalid
						$err_msg = 'The ID provided is invalid.';
					else if (!validate_name($first_name) || !validate_name($last_name)) // name is invalid
						$err_msg = "Invalid name! Is your name really $first_name $last_name?";
					else {
						$first_name = ucfirst(strtolower($first_name));
						$last_name = ucfirst(strtolower($last_name));
						$hash = password_hash($password1, PASSWORD_BCRYPT);

						// insert data into database
						$query = "INSERT INTO users (email, password, id, first_name, last_name, contact, gender, programme, year, branch, verified) VALUES ('$email', '$hash', '$id', '$first_name', '$last_name', '$contact', '$gender', $programme, $year, $branch, 0)";
        				if (mysqli_query($dbc, $query)) {
    					
							// send activation mail
							$query = "SELECT user_id FROM users WHERE email = '$email'";
							$result = mysqli_query($dbc, $query);
							$row = mysqli_fetch_array($result);
							$user_id = $row['user_id'];
							require_once(__DIR__ . '/../controls/mailer.php');
							$activation_link = dirname((isset($_SERVER['HTTPS'])?'https://':'http://').$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'])."/activate.php?id=".$user_id."&key=".md5(sha1($first_name.$last_name));
							$to = $email;
							$from = USER;
							$from_name = NAME;
							$subject = 'RegDesk Account Activation';
							$body = "Hello $first_name!<br>To activate your VJTI RegDesk account click on the following link.<br><br><a href='$activation_link'>Activate</a><br><br>You can login to your account after activation.";
							singlemail($to, $from, $from_name, $subject, $body);

							// display confirmation
							header('Location: confirmsignup.php');
						}
						else {
							echo mysqli_error($dbc);
						}
					}
				}
				else {
					// email exits. ask user for a different one.
					$err_msg = 'The email id has been used. Choose another one. <a href="forgot.php">Forgot password?</a>';
				}
			}
			else {
				$err_msg = 'Please fill the required fields.';
			}
		}
	}
	/*
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

	// function that validates id number. number should have 9 digits.
	function validate_id($id) {
		if (preg_match('/^\d{9}$/', $id))
			return true;

		return false;
	}

	function validate_name($name) {
		return preg_match("/^[a-zA-Z'-]+$/", $name);
	}
?>

	<!--Render header-->
	<?php
	$title = 'Sign Up';
	require_once(__DIR__ . '/../includes/header.php');
?>

		<div style="font-family: 'Raleway', sans-serif; padding-left: 6%; padding-top: 5%; padding-bottom: 3%; padding-right: 6%;">
			<h1 style="font-weight:bold;color:rgb(12,73,109);">Join VJTI RegDesk</h1>
			<h3 style="color:rgb(12,73,109);">Easy.&nbsp;&nbsp;Simple.&nbsp;&nbsp;Effective.</h3>
			<hr style="height: 2px;">
		</div>
		<div class="container">
			<h3 style="font-weight:bold;color:rgb(1,56,101);">Create your account</h3>
			<div class="form-group">
				<form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			</div>
			<div class="form-group" style="color: red;">
				<p>&nbsp;
					<?php echo $err_msg; ?>&nbsp;</p>
			</div>
			<!--name-->
			<div class="form-group">
				<label for="usr">Name</label>
				<br>
				<div class="row">
					<div class="col-sm-4">
						<input class="form-control" type="text" id="usr" placeholder="First" name="first_name" required value="<?php if(isset($first_name)) echo $first_name; ?>">
					</div>
					<div class="col-sm-4">
						<input class="form-control" type="text" id="usr" placeholder="Last" name="last_name" required value="<?php if(isset($last_name)) echo $last_name; ?>">
					</div>
				</div>
			</div>
			<br>
			<!--email-->
			<div class="form-group">
				<label for="email">Email</label>
				<br>
				<div class="row">
					<div class="col-sm-4">
						<input class="form-control" type="email" id="email" name="email" placeholder="Your email address" required value="<?php if(isset($email)) echo $email; ?>">
					</div>
				</div>
				<span class="help-block">This will be used for all further communications with you. If you don't have one, you should get one. Seriously.</span>
			</div>
			<br>
			<!--password-->
			<div class="form-group">
				<label for="pwd">Password</label>
				<br>
				<div class="row">
					<div class="col-sm-4">
						<input class="form-control" type="password" name="password1" id="pwd" placeholder="Create a password" required>
					</div>
					<div class="col-sm-4">
						<input class="form-control" type="password" name="password2" id="pwd" placeholder="Confirm password" required>
					</div>
				</div>
				<span class="help-block">No rules. Just make sure it's not easy to crack.</span>
			</div>
			<br>
			<!--contact-->
			<div class="form-group">
				<label for="cont">Contact</label>
				<br>
				<div class="row">
					<div class="col-sm-4">
						<input class="form-control" type="text" id="cont" name="contact" placeholder="Your mobile number" value="<?php if(isset($contact)) echo $contact; ?>">
					</div>
				</div>
			</div>
			<br>
			<!--gender-->
			<div class="form-group">
				<label>Gender:</label>
				<br>
				<div class="row">
					<div class="col-sm-4">
						<input type="radio" name="gender" value="M" id="M"><label for="M" class="radio-inline">Male</label>
					</div>
					<div class="col-sm-4">
						<input type="radio" name="gender" value="F" id="F"><label for="F" class="radio-inline">Female</label>
					</div>
				</div>
			</div>
			<br>
			<br>
			<!--id-->
			<div class="form-group">
				<label for="id">ID</label>
				<br>
				<div class="row">
					<div class="col-sm-4">
						<input class="form-control" type="text" name="id" id="id" placeholder="Your ID number" value="<?php if(isset($id)) echo $id; ?>">
					</div>
				</div>
			</div>
			<br>
			<!--prog and year-->
			<div class="form-group">
				<label>Course Details</label>
				<br><br>
				<div class="row">
					<div class="col-sm-4">
						<label for="programme">Programme:</label>

						<select class="form-control" name="programme">
				<?php
			$query = "SELECT programme_id, programme_name FROM programmes";
			$programmes = mysqli_query($dbc, $query);
			while ($programme = mysqli_fetch_array($programmes)) {
				echo '<option value="'.$programme['programme_id'].'">'.$programme['programme_name'].'</option>';
			}
		?>
			</select>

					</div>
					<div class="col-sm-4">
						<label for="year">Year:</label>

						<select class="form-control" name="year">
				<?php
			$years = array('First' => 1, 'Second' => 2, 'Third' => 3, 'Fourth' => 4);
			foreach ($years as $key => $value) {
				echo '<option value="'.$value.'">'.$key.'</option>';
			}
		?>
			</select>
					</div>
				</div>
				<br>
				<!--branch-->
				<div class="form-group">

					<div class="row">

						<div class="col-sm-4">
							<label for="branch">Branch:</label>
							<select class="form-control" name="branch">
			<?php
			$query = "SELECT branch_id, branch_name FROM branches";
			$branches = mysqli_query($dbc, $query);
			while($branch = mysqli_fetch_array($branches)) {
				echo '<option value="'.$branch['branch_id'].'">'.$branch['branch_name'].'</option>';
			}
		?>
		</select>
						</div>
					</div>
					<br>
					<br>
					<button class="btn btn-lg btn-success" type="submit" name="submit" value="Create an account">Create an account</button>
					</form>
				</div>
			</div>
			</form>
		</div>
		</form>
		</div>
		</div>
		<!--Render footer-->
		<?php
	require_once(__DIR__ . '/../includes/footer.php');
?>