<!--report send-->

<?php
session_start();
require_once('connector.php');
$reportedEmail=$_POST['reportedEmail'];
$reporterEmail=$_POST['reporterEmail'];
$reason=$_POST['userViolation'];
$admin= 'imarketbns.team@gmail.com'; //This wil receive the Email change to desired email
$reasonBox=$_POST['reasonBox'];
/*$adminreport=$_POST['adminreport'];*/

$chars = "1";
$scam = 1;
$spam = 1;
$agree = 1;
$showU = 1;

if($reason == 'scam') {
  $scam = 1;
}
elseif ($reason == 'spam') {
  $spam = 1;
}
elseif ($reason == 'agree') {
  $agree = 1;
}
elseif ($reason == 'showU') {
  $showU = 1;
}
//not yet saving to database
$stmt = $dbconn->prepare('UPDATE report SET scam=?, spam=?, agree=?, showU=? WHERE reportedEmail=?');
$stmt->bind_param('iiiis', $scam, $spam, $agree, $showU ,$reporetedEmail);
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

$bodyContent = '<h1>User Violation Report</h1>';
$bodyContent .= 'Reported by: ';
$bodyContent .= $reporterEmail;
$bodyContent .= '<br/><br/>';
$bodyContent .= '<p>The account ';
$bodyContent .= $reportedEmail;
$bodyContent .= " was reported for $reason.</p>";
$bodyContent .=$reasonBox;

$mail->Subject = 'iMARKET User Violation Report';
$mail->Body    = $bodyContent;

if($mail->send()) {
  echo "<script>alert('Email sent.');</script>";
  header('Location: index.php');

} else {

  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>

<!--$userViolation ="userViolation";

$productViolation ="productViolation";

$message ="reasonBox";

$mail_from="email";

$header ="from: $name<$mail_from>";

$to = "imperialezekiel@gmail.com"
//mail not working derp
mail($to, $userViolation, $productViolation, $message, $header);




if($reportsend){
  echo "Report will be reviewed."
}
else{

echo"Unable to Send";

}



session_start();
require_once('connector.php');
$reportUserE=$_POST['reportUserE'];

$stmt = $dbconn->prepare('UPDATE report SET scam = ? spam = ? agree = ? showU = ? WHERE reportUserE = ?');
$stmt->bind_param('siiii', $reportUserE ,$scam ,$spam ,$agree ,$showU);
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

$bodyContent = '<h1>Reported User</h1>';
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
}-->
