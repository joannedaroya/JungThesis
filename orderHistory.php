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
    <link rel="stylesheet" href="css/profile.css" />
    <link rel="stylesheet" href="css/productsPages.css" />
    <link rel="stylesheet" href="css/hover.css" />


    </head>

<body>


<?php include ('mainheader.php');
      if(!$_SESSION['email']){
          header("Location: login.php", 404);
          exit;}
 ?>

    <!--First-->

  <div class="container">
    <h2>My profile</h2><br/>
    <div class="row">
      <div class="col-md-3">
        <ul class="user-side-menu">
          <div class="user-side-menu_bg">
            <div class="user-side-menu_name">
              <?php
                $email = $_SESSION['email'];
                $query = $dbconn->query("SELECT * FROM users WHERE email='$email'");
                if($query->num_rows > 0){
                  while($row = $query->fetch_assoc()) {
                    echo $row['firstName']. " " .$row['lastName'];
                  }
                }
              ?>
            </div>
          </div>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link" href="accountSetting.php">
              <div class="user-side-menu_link-text">Account Settings</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link" href="#">
              <div class="user-side-menu_link-text">Notifications</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link-selected" href="orderHistory.php">
              <div class="user-side-menu_link-text">My Orders</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link" href="productView.php">
              <div class="user-side-menu_link-text">My Products</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link" href="mySales.php">
              <div class="user-side-menu_link-text">My Sales</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link" href="salesReport.php">
              <div class="user-side-menu_link-text">Sales Report</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link" href="productInventory.php">
              <div class="user-side-menu_link-text">Inventory System</div>
            </a>
          </li>
        </ul>
      </div>
    <div class="col-md-9">
    <div class="page-wrapper">


   <?php $glasstype = $_SESSION['user_ID'] ?>

     <h2> Order History </h2>
     <p> List of items you have been purchased from other user </p>
          <hr>
      <!-- just testing will going to recode -->
      <?php
        $query = 'SELECT *
        FROM orders
        LEFT JOIN users
        ON orders.user_ID = users.user_ID
        WHERE orders.status=1 AND orders.user_ID LIKE "' . $glasstype . '"
        ORDER BY orders.id DESC';
        $response = @mysqli_query($dbconn, $query);
        if($response) { ?>
          <table class="table table-hover">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Placed on</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
              <?php while ($row = @mysqli_fetch_array($response)) {
                $id = $row['id']; ?>
                <tr>
                  <td><?php echo "<a href='orderSuccess.php?id=".$id."'>" .$row['id']. "</a>" ?></td>
                  <td><?php echo $row['created'] ?></td>
                  <td><?php echo $row['total_price'] ?></td>
                  <td><?php echo $row['order_process'] ?></td>
                </tr>


      <?php  }
      echo "</tbody>";
      echo "</table>";
    } else {
        echo "<p>You have no previous transactions.</p>";
     } ?>
    </div>
  </div>
  </div>
  </div>
  <br/><hr style="width:80%;"><br/>

    <?php include 'footer.php';?>

</body>
</html>
