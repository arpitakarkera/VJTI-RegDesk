<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 5th December, 2016
	 * 
	 * This script authenticates the user, i.e., confirms if the user is logged in to access.
	 * If user is not logged in it redirects to index page.
	 *
	 */

	if (basename($_SERVER['PHP_SELF']) != 'index.php' && basename($_SERVER['PHP_SELF']) != 'signup.php') {
		// current page is not the index or signup page
		
		if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
			// user is not logged in so redirect to index page
			$home = __DIR__ . '/../index.php';
			header('Location: ' . $home);
		}
	}
?>