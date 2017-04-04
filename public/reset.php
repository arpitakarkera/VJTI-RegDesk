<?php
	/*
	 *
	 * @author Arpita Karkera
	 * @date 16 December, 2016
	 *
	 * If the user clicks 'Forgot password?' or 'change password', he/she will be redirected to forgot.php page for resetting
	 * A mail with reset link will be sent to registered email id.
	 * On clicking the mail, user will be redirected to this page for changeing the password
	 *
	 */

	// authenticate
	require_once(__DIR__ . '/../includes/authenticate.php');

	// connect to database
	require_once(__DIR__ . '/../includes/dbconfig.php');

	$title = 'Reset Password';
	$err_msg = '';

	if (isset($_POST['submit'])) {
		$user_id = $_SESSION['id'];
		$key = $_SESSION['key'];
		$pswd1 = mysqli_real_escape_string($dbc, trim($_POST['pswd1']));
		$pswd2 = mysqli_real_escape_string($dbc, trim($_POST['pswd2']));
		// just to make sure check the key again
		$confirm_query = "SELECT user_id, password, email FROM users WHERE user_id = $user_id LIMIT 1";
		$result = mysqli_query($dbc, $confirm_query);
		if ($pswd1 == $pswd2){
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$id = $row['user_id'];
			$pswd = $row['password'];
			$email = $row['email'];
			if (md5(sha1($id.$pswd.$email)) == $key) {
				// correct key. reset the password
				$hash = password_hash($pswd, PASSWORD_BCRYPT);
				$reset_query = "UPDATE users SET password = '$hash' WHERE user_id = $user_id LIMIT 1";
				mysqli_query($dbc, $reset_query);
				$msg = '<p>You have successfully reset your password!<br>Go ahead and <a href="../index.php">Sign In</a></p>';
				$_SESSION = array();
				session_destroy();
				// display message
				require_once(__DIR__ . '/../includes/header.php');
				echo '<div class="container-fluid">'.$msg.'</div>';
				echo '<div class="footer">';
				require_once(__DIR__ . '/../includes/footer.php');
				echo '</div>';
				exit();
			}
			else die('Invalid!');
		}
		else die('Invalid!');
		}
		else $err_msg = "Passwords don't match";
	}

	if (isset($_GET['id'])) {
		$id = mysqli_real_escape_string($dbc, trim($_GET['id']));
		if (isset($_GET['key'])) {
			$key = $_GET['key'];
			$query = "SELECT user_id, password, email FROM users WHERE user_id = $id LIMIT 1";
			$result = mysqli_query($dbc, $query);
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_array($result);
				$id = $row['user_id'];
				$pswd = $row['password'];
				$email = $row['email'];
				if (md5(sha1($id.$pswd.$email)) == $key) {
					// correct key. display password reset form
					$_SESSION['id'] = $id;
					$_SESSION['key'] = $key;
				}
				else die('Invalid!');
			}
			else die('Invalid!');
		}
		else die('Invalid!');
	}
	else die('Invalid!');

	// render header
	require_once(__DIR__ . '/../includes/header.php');
?>

<div class="container-fluid">
	<h2>Reset your password</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<p>&nbsp;<?php echo $err_msg; ?>&nbsp;</p>
		<input type="password" name="pswd1" placeholder="New password" required>
		<br>
		<input type="password" name="pswd2" placeholder="Confirm password" required>
		<br>
		<button class="btn btn-lg btn-default" type="submit" name="submit" value="Reset">Reset</button>
	</form>
</div>

<div class="footer">
<?php
	// render footer
	require_once(__DIR__ . '/../includes/footer.php');
?>
</div>