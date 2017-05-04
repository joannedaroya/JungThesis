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
    <link rel="stylesheet" href="../../css/adminOnly.css">
    <!--Javascript-->
    <script src="../../jsforAdmin/jsAdmin.js"></script>

</head>

<body>

    <?php include('ad_rate_header.php'); ?>

<!--Code Starts Here-->
<?php

$orderBy = "seller_rate";
$order = "asc";

if(!empty($_GET["orderby"])){
  $orderBy = $_GET["orderby"];
}
if(!empty($_GET["order"])){
  $order = $_GET["order"];
}

$sellerRate = "asc";
if($orderBy == "seller_rate" and $order == "asc") {
    $sellerRate = "desc";
     }

     $productRate = "asc";
     if($orderBy == "rate" and $order == "asc") {
         $productRate = "desc";
          }


 ?>

<div class="container">
     <table>
       <h1>Administrator User View</h1>
     <thead>
       <tr>
         <th>Comment No</th>
         <th>Buyer ID</th>
         <th>Comments/Feedback</th>
         <th>Product ID</th>
         <th>Comment Date</th>
         <th>Seller ID</th>
         <th><a href="?orderby=seller_rate&order=<?php echo $sellerRate ?>">Seller Rate</a></th>
         <th><a href="?orderby=rate&order=<?php echo $productRate ?>">Product Rate</a></th>

       </tr>
     </thead>
     <tbody>
<?php

        // Check connection
        if ($dbconn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

      $sql = "SELECT * FROM rating ORDER BY " . $orderBy ." " . $order;
      $result = $dbconn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo
            "<tr>";

            echo"
              <td>{$row['reply_id']}</td>";
            echo "<td>{$row['user_ID']}</td>";
            echo"
              <td>{$row['product_comment']}</td>";

              echo'<td><a href="../../productPage1.php?pname=' . $row['product_ID'] .'"> '. $row['product_ID'] . '</a></td>';
              echo"
              <td>{$row['product_date']}</td>";
              echo'<td><a href="../admin_user/adminView_spec.php?usersid=' . $row['seller_id'] . '">' . $row['seller_id'] . '</a></td>';
              echo"
              <td>{$row['seller_rate']}</td>
              <td>{$row['rate']}</td>
            </tr>\n";

          }

      } else {
          echo "<tr><td>0 results</td></tr>";
      }
?>
</tbody>
</table>
</div>
</div>





<!--Footer-->
     <?php include 'ad_rate_footer.php';?>


    </body>

    </html>
