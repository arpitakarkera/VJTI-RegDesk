<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 6th December, 2016
	 * 
	 * Dashboard
	 *
	 */

	// authenticate user
	require_once(__DIR__ . '/../includes/authenticate.php');

	$title = 'Dashboard';
	require_once(__DIR__ . '/../includes/header.php');
?>

<p>
	This is Dashboard! <?php echo $_SESSION['username']; ?>
</p>

<?php
	require_once(__DIR__ . '/../includes/footer.php');
?>