<?php
	/*
	 *
	 * @author Arpita Karkera,Sunaina Punyani
	 * @date 10 December, 2016
	 *
	 * Send a request to admin to make the user a manager
	 *
	 */

	// authenticate
	require_once(__DIR__ . '/../includes/authenticate.php');

	// connect to database
	require_once(__DIR__ . '/../includes/dbconfig.php');


	if (!isset($_SESSION['manager_id'])) {
		// user is not a manager so mail the admin to grant managerial status

		// query database to get user's name and email
		$user_id = $_SESSION['user_id'];
		$first_name = $_SESSION['first_name'];
		$query = "SELECT last_name, email FROM users WHERE user_id = $user_id";
		$result = mysqli_query($dbc, $query);
		if (mysqli_num_rows($result) == 1) {
			$data = mysqli_fetch_array($result);
			$last_name = $data['last_name'];
			$email = $data['email'];
		}
		else
			die('Unknown Error');

		require_once(__DIR__ . '/../controls/mailer.php');

		$confirm_link = dirname((isset($_SERVER['HTTPS'])?'https://':'http://').$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']).'/confirm.php';

		$to = ADMIN;
        $from = USER;
        $from_name = NAME;
        $subject = "Manager Request";
        $body = "<p>Manager request from $first_name $last_name</p>".
        		"<p>User ID : $user_id<br>
        		Name : $first_name $last_name<br>
        		E-mail : $email</p>".
        		"<p><a href='$confirm_link'><button>Go to confirmation page -></button></a></p>";
        $sent = singlemail($to, $from, $from_name, $subject, $body);

        // render header
        require_once(__DIR__ . '/../includes/header.php');

        if ($sent) {
        	// insert user_id in requests table
        	$query = "INSERT INTO requests (user_id) VALUES ($user_id)";
        	mysqli_query($dbc, $query);

        	echo "<div class='container-fluid'>Your request has been recorded. We'll get back to you soon.</div>";
        }
        else
        	echo "<div class='container-fluid'>Sorry. The request could not be sent.</div>";
	}
?>

<?php
	// render footer
	require_once(__DIR__ . '/../includes/footer.php');
?>