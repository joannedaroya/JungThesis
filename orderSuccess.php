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

  <?php include ('mainheader.php');
        if(!$_SESSION['email']){
            header("Location: login.php", 404);
            exit;}
   ?>

        <!--Code Starts Here (main)-->
<div class="container">
  <?php
    $orderID = $_GET['id'];
    $query = $dbconn->query('SELECT * FROM users WHERE email="'.$_SESSION['email'].'"');
    if($query->num_rows > 0){
      while($row = $query->fetch_assoc()) {
    ?>
    <h1>Order #<?php echo $orderID ?></h1><hr>
    <div class="row">
      <div class="col-md-5">
        <h3>Order Details</h3>
        <p><?php echo $row['firstName']. " " .$row['lastName'] ?></p>
        <p><?php echo $row['email'] ?></p>
        <p><?php echo $row['contactNum'] ?></p>
      </div>
      <div class="col-md-6">
        <h3>Date Ordered</h3>
        <?php
          $stmt = $dbconn->query('SELECT * FROM orders WHERE id="'.$orderID.'"');
          if($stmt->num_rows > 0) {
            while($row = $stmt->fetch_assoc()) {
              echo "<p>" .$row['created']. "</p>";
              echo "<h3>Order Status</h3>";
              echo "<p>".$row['order_process']."</p>";
            }
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
    <?php
    }
     ?>

  <?php
  }
  ?>
</div>
    <?php include 'footer.php';?>
</body>
</html>
