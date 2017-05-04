<link rel="stylesheet" href="css/design.css" />
<link rel="stylesheet" href="css/profile.css" />
<link rel="stylesheet" href="css/productsPages.css" />
<link rel="stylesheet" href="css/hover.css" />
<?php $glasstype = $_SESSION['user_ID'] ?>
<?php

$short = $_POST['ShortB'];


switch ($short) {
    case "datenew":

    $con = mysqli_connect('localhost','root','','imarketdatabase');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

    	$sql="SELECT O.order_process, O.created, O.total_price,
        P.productName, P.productCategory, P.price, P.product_ID, I.product_ID, I.order_id 
        FROM orders O 
        JOIN order_items I ON O.id = I.order_id
        JOIN products P ON P.product_ID = I.product_ID
        WHERE I.Seller_ID = '$glasstype'
        ORDER BY O.created desc ";

        
                    
       $result = mysqli_query($con,$sql);

echo "Here are the recent sales you made";
echo "<table>
<tr>
<th>Order #</th>
<th>Product</th>
<th>Total</th>
<th>Placed on</th>
<th>Order Status</th>
</tr>";


while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" .$row['order_id']. "</td>";
    echo "<td>" . $row['productName'] . "</td>";
    echo "<td> ₱ " . $row['total_price'] . "</td>";
    echo "<td>" . $row['created'] . "</td>";
    echo '<td> <form method="POST" action="">
                      <select class="form-control col-sm-2" name="ShortA" onchange="javascript: submit()">
                      <option value="" disabled selected> '.$row['order_process'].' </option>
                      <option value="'.$row['order_id'].'">Sold</option>
                      </select>
                      </form> </td>';
    echo "</tr>";
}
echo "</table>";

        break;

       
    default: echo "hi";
 
}
?>
