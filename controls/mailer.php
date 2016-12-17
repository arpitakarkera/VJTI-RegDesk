<?php

define('USER', 'regdesk.vjti@gmail.com');
define('PSWD', 'tingtong6102');
define('NAME', 'VJTI RegDesk');
define('ADMIN', 'regdesk.vjti@gmail.com');	// change it to .admin
define('REGISTRAR', 'regdesk.vjti@gmail.com'); // change it to .registration

require (__DIR__ . '/../PHPMailer/PHPMailerAutoload.php');

function singlemail($to, $from, $from_name, $subject, $body, $alt_body = 'The message can\'t be displayed') {
	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = USER;                 // SMTP username
	$mail->Password = PSWD;                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom($from, $from_name);
	$mail->addAddress($to);     // Add a recipient
	//$mail->addAddress('someone@example.com');               // Name is optional
	//$mail->addReplyTo($from, $from_name);
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = $body;
	$mail->AltBody = $alt_body;

	if(!$mail->send()) {
    	return false;
	} else {
    	return true;
	}
}
?>