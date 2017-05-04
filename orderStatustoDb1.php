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


} else {
    echo "Error updating record: " . $conn->error;
}

?>