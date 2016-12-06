<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 5th December, 2016
	 * 
	 * Index page.
	 *
	 */

	// authenticate
	require_once(__DIR__ . '/includes/authenticate.php');

	$user_username = $err_msg = "";
	
	// grab login logic
	require_once(__DIR__ . '/controls/login.php');
?>

<!--Render header-->
<?php
	$title = 'Sign In';
	require_once(__DIR__ . '/includes/header.php');
?>

<div>
	<p><?php echo $err_msg; ?></p>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<input type="text" name="user_username" placeholder="Username" required value="<?php if(isset($user_username)) echo $user_username; ?>">
		<br>
		<input type="password" name="user_password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required>
		<br>
		<input type="submit" name="submit" value="Sign In">
		<br>
		<a href="forgot.php">Forgot?</a>
		<p>
			Don't have an account?
			<br>
			<a href="public/signup.php"><button type="button">Sign Up!</button></a>
		</p>
	</form>
</div>

<!---Render footer-->
<?php require_once(__DIR__ . '/includes/footer.php'); ?>