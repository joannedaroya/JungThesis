<?php
//needs to be integrated to admin side:)
session_start();
require_once('connector.php');
$email=$_POST['email'];
$productName=$_POST['productName'];

$chars = "0";
$productActive = 0;

$stmt = $dbconn->prepare('UPDATE products SET productActive = ? WHERE email = ?');
$stmt->bind_param('is', $productActive ,$email);
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

$bodyContent = '<h1>Suspended</h1>';
$bodyContent .= '<p>This is iMARKET B&S Team.</p>';
$bodyContent .= '<p></p>';
$bodyContent .= '<p>bad ratings and reports</p>';
$bodyContent .= $productName;
$bodyContent .= '<p>reasons for suspension are classified ;)</p>';


$mail->Subject = 'iMARKET Suspend System';
$mail->Body    = $bodyContent;

if($mail->send()) {
  echo "<script>alert('Email sent.');</script>";
  header('Location: index.php');

} else {

  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>
