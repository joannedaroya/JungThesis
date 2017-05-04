
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



   <?php include ('mainheader.php'); ?>

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
            <a class="user-side-menu_link" href="orderHistory.php">
              <div class="user-side-menu_link-text">My Orders</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link-selected" href="productView.php">
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


    <div class="divhehe">

    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">ALL</a></li>
    <li><a data-toggle="tab" href="#menu1">On Sale</a></li>
    <li><a data-toggle="tab" href="#menu2">Sold Out</a></li>

  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">


     <h2> Here are your available products </h2>
          <hr>



         <form method="POST" action="" style="float:right;">
                    <select class="form-control col-sm-2" name="ShortA" onchange="javascript: submit()">
                      <option value="" disabled selected>Sort by:</option>
                      <option value="high">Higest to Lowest price</option>
                      <option value="low">Lowest to Highest price</option>
                      <option value="datenew">Most Recent</option>
              </select>


                  </form>




                  </br> </br>

      <!-- just testing will going to recode -->
      <?php $glasstype = $_SESSION['user_ID'] ?>


      <?php
         if(isset($_POST['ShortA']))
       {
          include 'productSort1.php';
       }
       else
       {

        $con=mysqli_connect('localhost','root','','imarketdatabase');

        $results = mysqli_query ($con,'SELECT * FROM products WHERE productActive LIKE 1 AND user_ID = "'.$glasstype.'"');


        if($results->num_rows > 0) {

        while($row = mysqli_fetch_array($results)){
          echo'
            <div class ="proBox1">

            <div class="PHOTOHOVER">
             <img src="productImages/' .$row['productImage']. '" class="image" width="50%" height="50%">
             <div class="middle">
              <div class="text11">
                      <form class="buttons1" method="POST" action="productEdit.php">
                        <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                        <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                      </form>
                      <br>
                      <form class="buttons1" method="POST" action="productDelete.php">
                          <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                          <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                       </form>
                      </div>
             </div>
            </div>

            <br>
            <b><a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>
            ';
          }
        } else {
          echo "<h3>No products listed.</h3><br/>";
          echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
        }
          mysqli_close($con);
        }
     ?>
    </div>
    <div id="menu1" class="tab-pane fade">

      <?php
          echo " <h2> these product are available and on sale! </h2> <br>";

        $con=mysqli_connect('localhost','root','','imarketdatabase');
        $results = mysqli_query ($con,'SELECT * FROM products WHERE productStatus LIKE "onSale" AND productActive LIKE 1 AND user_ID LIKE "' . $glasstype . '" ');

        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'

            <div class ="proBox1">

            <div class="PHOTOHOVER">
             <img src="productImages/' .$row['productImage']. '" class="image" height:80%">
             <div class="middle">
              <div class="text11">
                       <form class="buttons1" method="POST" action="productEdit.php">
                        <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                        <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                      </form>
                      <br>
                      <form class="buttons1" method="POST" action="productDelete.php">
                          <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                          <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                       </form>
                      </div>
             </div>
            </div>

            <br>
            <b><a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>
            ';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);


      ?>

      </div>
    <div id="menu2" class="tab-pane fade">

      <?php

        echo " <h2> these product is soldout! </h2> <br>";

        $con=mysqli_connect('localhost','root','','imarketdatabase');
        $results = mysqli_query ($con,'SELECT * FROM products WHERE productStatus LIKE "soldOut" AND email LIKE "' . $glasstype . '" ');

        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'

            <div class ="proBox1">

            <div class="PHOTOHOVER">
             <img src="productImages/' .$row['productImage']. '" class="image" height:80%">
             <div class="middle">
              <div class="text11">
                      <form class="buttons1" method="POST" action="productEdit.php">
                        <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                        <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                      </form>
                      <br>
                      <form class="buttons1" method="POST" action="productDelete.php">
                          <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                          <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                       </form>
                      </div>
             </div>
            </div>

            <br>
            <b><a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>
            ';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);
      ?>

    </div>

  </div>



   </div>
   </div>
   </div>
   </div>
    </div>
  <br/><hr style="width:80%;"><br/>

    <?php include 'footer.php';?>

</body>
</html>
