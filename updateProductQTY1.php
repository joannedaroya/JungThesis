<?php


$var1 = $_COOKIE['orderID'];

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


              $sql = 'UPDATE products
              INNER JOIN order_items
              ON products.product_ID = order_items.product_ID
              SET products.p_qty = products.p_qty - order_items.qty
              WHERE order_items.order_id = "'.$var1.'" ';



if ($conn->query($sql) === TRUE) {

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>