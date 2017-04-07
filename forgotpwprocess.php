<?php
session_start();
require_once('connector.php');
$email=$_POST['email'];

$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
$password = substr( str_shuffle( $chars ), 0, 8 );

$stmt = $dbconn->prepare('UPDATE users SET password = ? WHERE email = ?');
$stmt->bind_param('ss', $password ,$email);
$stmt->execute();

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'imarketbns.team@gmail.com';          // SMTP username
$mail->Password = 'igotyoubaby'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('imarketbns.team@gmail.com', 'iMARKET B&S');
$mail->addReplyTo('imarketbns.team@gmail.com', 'iMARKET B&S');
$mail->addAddress($email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Hello!</h1>';
$bodyContent .= '<p>This is iMARKET B&S Team.</p>';
$bodyContent .= '<p>Your email address:</p>';
$bodyContent .= $email;
$bodyContent .= '<p>Your new password:</p>';
$bodyContent .= $password;
$bodyContent .= "<p>Login using the following email and password. Immediately update your password once you have logged in to your account.</p>";

$mail->Subject = 'iMARKET Password Recovery System';
$mail->Body    = $bodyContent;

if($mail->send()) {
  echo "<script>alert('Email sent.');</script>";
  header('Location: index.php');

} else {

  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>
