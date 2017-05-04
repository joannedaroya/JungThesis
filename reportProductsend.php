<?php
session_start();
require_once('connector.php');
$reportedEmail=$_POST['reportedEmail'];
$reporterEmail=$_POST['reporterEmail'];
$reason=$_POST['productViolation'];
$admin= 'imarketbns.team@gmail.com'; //This wil receive the Email change to desired email
$reasonBox=$_POST['reasonBox'];

$chars = "1";
$prohibited = 1;
$offensive = 1;
$defective = 1;
$falseA = 1;
$wrong = 1;

if($reason == 'prohibited') {
  $prohibited = 1;
}
elseif ($reason == 'offensive') {
  $offensive = 1;
}
elseif ($reason == 'defective') {
  $defective = 1;
}
elseif ($reason == 'falseA') {
  $falseA = 1;
}
elseif ($reason == 'wrong') {
  $wrong = 1;
}

//not yet saving to database

$stmt = $dbconn->prepare('UPDATE report_product SET prohibited=?, offensive=?, defective=?, falseA=?, wrong=? WHERE reportedEmail=?');
$stmt->bind_param('iiiiis', $prohibited, $offensive, $defective, $falseA, $wrong, $reportedEmail);
$stmt->execute();

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                 // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'imarketbns.team@gmail.com';          // SMTP username
$mail->Password = 'igotyoubaby'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('imarketbns.team@gmail.com', 'iMARKET B&S');
$mail->addReplyTo('imarketbns.team@gmail.com', 'iMARKET B&S');
$mail->addAddress($admin);   // Add a recipient This wil receive the Email change to desired email
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Product Violation Report</h1>';
$bodyContent .= 'Reported by: ';
$bodyContent .= $reporterEmail;
$bodyContent .= '<br/><br/>';
$bodyContent .= '<p>The product of ';
$bodyContent .= $reportedEmail;
$bodyContent .= " was reported for $reason.</p>";
$bodyContent .=$reasonBox;

$mail->Subject = 'iMARKET Product Violation Report';
$mail->Body    = $bodyContent;

if($mail->send()) {
  echo "<script>alert('Email sent.');</script>";
  header('Location: index.php');

} else {

  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>
