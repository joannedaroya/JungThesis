

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


$sql = 'SELECT *
    FROM users INNER JOIN order_items
    ON users.user_ID = order_items.Seller_ID
    WHERE order_items.order_ID = "179"';


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["user_ID"]. " - Name: " . $row["email"];
    }
} else {
    echo "0 results";
}



$conn->close();
?>
