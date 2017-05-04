<?php $glasstype = $_SESSION['user_ID'] ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imarketdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$short = $_POST['ShortA'];


$sql = 'UPDATE orders SET order_process="Sold" WHERE id="'.$short.'"';

if ($conn->query($sql) === TRUE) {

    $_COOKIE['orderID'] = $short;

    include 'updateProductQTY.php';
    require 'PHPMailer/PHPMailerAutoload.php';

    $stmt = 'SELECT users.email, order_items.product_ID, order_items.Seller_ID, products.product_ID, products.p_qty, products.productName
        FROM order_items
        JOIN users ON order_items.Seller_ID = users.user_ID
        JOIN products ON products.product_ID = order_items.product_ID
        WHERE order_items.order_id = "'.$var1.'" ';
    $res = @mysqli_query($dbconn, $stmt);
    if($res) {
      while($row = @mysqli_fetch_array($res)) {
        if($row['p_qty'] == 0) {
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
    			$mail->addAddress($row['email']);   // Add a recipient
    			//$mail->addCC('cc@example.com');
    			//$mail->addBCC('bcc@example.com');

    			$mail->isHTML(true);  // Set email format to HTML

    			$mail->Subject = "iMARKET: Product Update";

    			$bodyContent = "<h2>Greetings from iMARKET!</h2>";
    			$bodyContent .= "<p>Your product " .$row['productName']. " has sold out! You can manage your products <a href='http://localhost/THESIS/productView.php'>here</a>.</p>";

    			$mail->Body = $bodyContent;

          if(!$mail->send()) {
    					echo 'Message could not be sent.';
    					echo 'Mailer Error: ' . $mail->ErrorInfo;
    			}
        }
      }
    }



} else {
    echo "Error updating record: " . $conn->error;
}

?>
