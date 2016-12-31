<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 5th December, 2016
	 * 
	 * This script authenticates the user, i.e., confirms if the user is logged in to access.
	 * If user is not logged in it redirects to index page.
	 *
	 */

	// start session
	session_start();

	if( ! ini_get('date.timezone') )
	{
	    date_default_timezone_set('Asia/Kolkata');
	}

	$free_pages = array('index.php', 'signup.php', 'confirmsignup.php', 'activate.php', 'forgot.php', 'reset.php');

	if (!in_array(basename($_SERVER['PHP_SELF']), $free_pages)) {
		// current page requires that user is logged in
		
		if (!isset($_SESSION['user_id'])) {
			// user is not logged in so redirect to index page
			header('Location: /VJTI-RegDesk/index.php');
		}

		$managerial_pages = array('addevent.php', 'download.php', 'manage.php');
		if (in_array(basename($_SERVER['PHP_SELF']), $managerial_pages)) {
			// current page is meant for only managers

			if (!isset($_SESSION['manager_id'])) {
				// user is not a manager do redirect to dashboard
				header('Location: /VJTI-RegDesk/public/dashboard.php');
			}
		}
	}
	else {
		// current page does not require user to log in

		if (isset($_SESSION['user_id'])) {
			// user is logged in
			header('Location: /VJTI-RegDesk/public/dashboard.php');
		}
	}
?>