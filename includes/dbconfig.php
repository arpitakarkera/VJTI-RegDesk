<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 5th December, 2016
	 * 
	 * This file defines database constants.
	 *
	 */

	define('DB_HOST', 'localhost: 3306');
	define('DB_USER', 'root');
	define('DB_PASSWORD','');
	define('DB_NAME', 'vjti_regdesk');

	// connect to the database
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(mysqli_error());
?>