<?php
session_start();
include 'connector.php';
$orderID = $_SESSION['orderID1'];

require_once 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'imarketbns.team@gmail.com';     // SMTP username
$mail->Password = 'igotyoubaby';                   // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('imarketbns.team@gmail.com', 'iMARKET B&S');
$mail->addReplyTo('imarketbns.team@gmail.com', 'iMARKET B&S');
$mail->isHTML(true);  // Set email format to HTML

$stmt = 'SELECT *
    FROM users INNER JOIN order_items
    ON users.user_ID = order_items.Seller_ID
    WHERE order_items.order_id = "'.$orderID.'"';

$res = @mysqli_query($dbconn, $stmt);
if($res) {
  while($row = @mysqli_fetch_array($res)) {
    $mail->AddBCC($row["email"]);
    $mail->Subject = 'iMARKET: Sales Order #' .$orderID;
    $mail->Body = '<h1>Hello!</h1><p>Someone just ordered a product from you.</p><p>Order Number: #' .$orderID. '</p><p>You can view and edit your sales by clicking <a href="http://localhost/THESIS/mySales.php">here</a>.</p>';


    if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
  }
}

 ?>
