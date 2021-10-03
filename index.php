<?php
/*##########Script Information#########
  # Purpose: Send mail Using PHPMailer#
  #          & Gmail SMTP Server 	  #
  # Created: 24-11-2019 			  #
  #	Author : Hafiz Haider			  #
  # Version: 1.0					  #
  # Website: www.BroExperts.com 	  #
  #####################################*/

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	require('includes/routeros_api.class.php');

	$API = new RouterosAPI();
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

if ($API->connect('10.10.10.32', 'admin', 'lpprriyk45')) {
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "rahmaamita25@gmail.com";
//Set gmail password
	$mail->Password = "Elektro1234!";
//Email subject
	$mail->Subject = "Test email using PHPMailer";
//Set sender email
	$mail->setFrom('rahmaamita25@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	$mail->addAttachment('img/attachment.png');
//Email body
	$name = $_POST['name'];
	$email= $_POST['email'];
	$message= $_POST['message'];
	$mail->Body = "<h1>PESAN DARI PUBLIK</h1></br><p>
	<li> Name = ".$name." </li>
	<li> Email = ".$email." </li>
	<li> Message = ".$message."</li>
	</p>";

//Add recipient
	$mail->addAddress('rahmaamita25@gmail.com');
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo "Error...!";
	}
//Closing smtp connection
	$mail->smtpClose();
}
?>