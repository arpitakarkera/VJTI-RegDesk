<?php
	/*
	 *
	 * @author Arpita Karkera,Sunaina Punyani
	 * @date 16 December, 2016
	 *
	 * If the user clicks 'Forgot password?' or 'change password', he/she will be redirected to this page for resetting
	 * A mail with reset link will be sent to registered email id.
	 * On clicking the mail, user will be redirected to reset.php page for changeing the password
	 *
	 */

	// connect to database
	require_once(__DIR__ . '/../includes/dbconfig.php');

	if (isset($email))
		$title = 'Change Password';
	else
		$title = 'Account Recovery';

	if (isset($_POST['submit']) || isset($email)) {
		if (!isset($email))
			$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
		// get the user id, password of the user
		$query = "SELECT user_id, password FROM users WHERE email = '$email' LIMIT 1";
		$result = mysqli_query($dbc, $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$user_id = $row['user_id'];
			$password = $row['password'];
			$reset_link = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/reset.php?id=".$user_id."&key=".md5(sha1($user_id.$password.$email));
			// send the mail
			require_once(__DIR__ . '/../controls/mailer.php');
			$to = $email;
        	$from = USER;
        	$from_name = NAME;
        	$subject = isset($_POST['submit']) ? 'RegDesk Account Recovery': 'RegDesk Password Change';
        	$body = "To reset your VJTI RegDesk account password click on the following link.<br><br><a href='$reset_link'>Reset Password</a><br><br>";
        	$sent = singlemail($to, $from, $from_name, $subject, $body);
        	if ($sent)
        		$msg = "<p>The reset link has been mailed to the provided email id. Click on the link to reset password.</p>";
        	else
        		$msg = "<p>Sorry, the mail couldn't be sent.</p>";
		}
		else
			$msg = "<p>The account does not exist.</p>";

		// display the msg
		require_once(__DIR__ . '/../includes/header.php');
		echo '<div class="container-fluid">'.$msg.'</div>';
		echo '<div class="footer">';
		require_once(__DIR__ . '/../includes/footer.php');
		echo '</div>';
		exit();
	}

	// render header
	require_once(__DIR__ . '/../includes/header.php');
?>

<div class="container-fluid">
	<h2>Recover your account</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<p>Enter your email below and we will send you a link to reset your password</p>
		<br>
		<div class="form-group row">
		<div class="col-sm-5">
		</div>
		<div class="col-sm-2">
		<input  class="form-control" type="email" name="email" required>
		</div>
		<div class="col-sm-2">
		</div>
		</div>
		<br>
		<div class="form-group">
		<button class="btn btn-lg btn-success" type="submit" name="submit" value="Send password reset instructions">Send password reset instructions</button>
	</div>
	</form>

</div>


<?php
	// render footer
	require_once(__DIR__ . '/../includes/footer.php');
?>
