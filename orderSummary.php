<?php
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>:::iMARKET:::</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="css/design.css" />

</head>

<body>

    <?php include 'mainheader.php'; ?>
        <!--Code Starts Here (main)-->
<div class="container">




<?php

           $orderID = $_GET['id'];




            $querry = 'SELECT * FROM orders
              LEFT JOIN users
              ON users.user_ID = orders.user_ID
              WHERE orders.id="'.$orderID.'"';


              $response = @mysqli_query($dbconn, $querry);
              if($response) {

                echo "<h2> <b> order # $orderID </b> </h2>";


                while ($row = @mysqli_fetch_array($response)) {

                    echo "</br>";
                    echo " <h3> Buyer Details </br> </h3>";
                    echo "</br>";
                    echo $row['firstName']. " " .$row['lastName']; echo "</br>";
                    echo $row['email'] ; echo "</br>";
                    echo $row['contactNum']  ; echo "</br>";

                    echo " <h2>Date Ordered </h2>";
                    echo "<p>" .$row['created']. "</p>";
                    echo "<h3>Order Status</h3>";
                    echo "<p>".$row['order_process']."</p>";

          }
           } else {
          echo "<h3>Record Not Found.</h3><br/>";
                }


?>


      </div>
    </div><br/>
    <?php
        $sql = 'SELECT * FROM products LEFT JOIN order_items ON order_items.product_ID = products.product_ID WHERE order_items.order_id="'.$orderID.'"';
        $res = @mysqli_query($dbconn, $sql);
        if($res) {
        ?>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>PRODUCTS</th>
              <th>PRICE</th>
              <th>QTY</th>
              <th>TOTAL</th>
            </tr>
          </thead>

        <?php
          while ($row = @mysqli_fetch_array($res)) {
    ?>

        <tr>
          <td><?php echo '<img src="productImages/' .$row['productImage']. '" width="70" height="70">'; echo ' <a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a>';?> </td>
          <td>₱ <?php echo $row['price']; ?></td>
          <td><?php echo $row['qty']; ?></td>
          <td>₱ <?php echo $row['price'] * $row['qty']; ?></td>
        </tr>
      </tbody>


    <?php
        }
      }
    ?>
    <tbody>
    <tfoot>
        <tr>
            <td colspan="2"></td>
            <?php
            $stmt = 'SELECT * FROM orders WHERE id="'.$orderID.'"';
            $result = @mysqli_query($dbconn, $stmt);
            if($result) {
              while ($row = @mysqli_fetch_array($result)) {
                echo "<td colspan='2' class='text-center'><strong>TOTAL " .$row['total_price']. "</strong></td>";
              }
            }
             ?>
        </tr>
    </tfoot>
    </table>

</div>
    <?php include 'footer.php';?>
</body>
</html>
