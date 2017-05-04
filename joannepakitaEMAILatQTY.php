
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


$sql = 'SELECT users.email, order_items.product_ID, order_items.Seller_ID, products.product_ID, products.p_qty
        FROM order_items
        JOIN users ON order_items.Seller_ID = users.user_ID
        JOIN products ON products.product_ID = order_items.product_ID
        WHERE order_items.order_id = "'.$var1.'" ';


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["email"]. " - quantity: " . $row["p_qty"]. "  <br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>4