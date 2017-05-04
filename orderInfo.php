<?php


$q = intval($_GET['q']);

$glasstype = $_SESSION['user_ID'] 

$con = mysqli_connect('localhost','root','','imarketdatabase');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");


$sql="SELECT O.order_process, O.created, O.total_price,
        P.productName, P.productCategory, P.price, P.product_ID, I.product_ID, I.order_id 
        FROM orders O 
        JOIN order_items I ON O.id = I.order_id
        JOIN products P ON P.product_ID = I.product_ID
        WHERE  O.order_process ='$q' AND I.Seller_ID = '$glasstype'  ";


$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Order #</th>
<th>Product</th>
<th>Total</th>
<th>Placed on</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" .$row['order_id']. "</td>";
    echo "<td>" . $row['productName'] . "</td>";
    echo "<td>" . $row['total_price'] . "</td>";
    echo "<td>" . $row['created'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>

