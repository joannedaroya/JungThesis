<?php
// Start the session
session_start();
$orderID = $_SESSION['orderID1'];
$userID = $_SESSION['user_ID'];
?>



<?php

            require_once 'PHPMailer/PHPMailerAutoload.php';
            include 'connector.php';

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
            $mail->isHTML(true);  // Set email format to HTML

            $stmt = 'SELECT * FROM users WHERE user_ID = "'.$userID.'"';


            $res = @mysqli_query($dbconn, $stmt);
            if($res) {
              while($row = @mysqli_fetch_array($res)) {
                $mail->AddAddress($row['email']);
                $mail->Subject = 'iMARKET: Order #' .$orderID;
                $mail->Body = '<h1>Hello!</h1><p>Your order #' .$orderID. ' is <b>processing</b>.</p><p>You can view your invoice by clicking <a href="http://localhost/THESIS/orderSuccess.php?id='.$orderID.'">here</a></p>';


                if(!$mail->Send()) {
                  echo "Mailer Error: " . $mail->ErrorInfo;
                }
              }
            }




 ?>
