<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 6th December, 2016
	 * 
	 * Displays confirmation message on successful sign up
	 *
	 */

	// check if user has logged in
	require_once(__DIR__ . '/../includes/authenticate.php');

	// render header
	$title = 'Sign Up';
	require_once(__DIR__ . '/../includes/header.php');

?>

<!--Display confirmation message-->
<h3>Congratulations!</h3>
<p>
	You have successfully signed up! Head to your <a href="dashboard.php">Dashboard</a>.
</p>

<?php
	// render footer
	require_once(__DIR__ . '/../includes/footer.php');
?>