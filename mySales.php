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


    <script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","orderInfo1.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>


    </head>

<body>

  <?php
        session_start();
        require_once('connector.php');
        if(!$_SESSION['email']){
         header("need to be login", 404);
                  exit;}
    ?>


    <nav id="navbar-main">
      <!--Login System Embedded by Jung Start-->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
            </div>
            <div class="collapse navbar-collapse row" id="myNavbar">
                <ul class="pull-right">
                    <?php if(isset($_SESSION['email'])){ ?>
                      <?php if($types == 'student' || 'employee'){?>
                    <li class="upper-links"><a class="links" href="productAdd.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> SELL</a></li>
                    <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> NOTIFICATIONS</a></li>
                    <li class="upper-links"><a class="links" href="index_wishlist.php"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> WISHLIST</a></li>
                    <li class="upper-links"><a class="links" href="viewCart.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> CART</a></li>

                    <li class="upper-links dropdown"><a class="links">My Account</a>
                        <ul class="dropdown-menu">
                            <li class="profile-li"><a class="profile-links" href="#">My Order</a></li>
                            <li class="profile-li"><a class="profile-links" href="accountSetting.php">Account Setting</a></li>
                            <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
                            <li class="profile-li"><a class="profile-links" href="logout.php">logout</a></li>


                                    <?php }elseif($types == 'admin'){ ?>
                                    <li class="upper-links"><a class="links" href="productAdd.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> SELL</a></li>
                                    <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> NOTIFICATIONS</a></li>
                                    <li class="upper-links"><a class="links" href="index_wishlist.php"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> WISHLIST</a></li>
                                    <li class="upper-links"><a class="links" href="viewCart.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> CART</a></li>

                                    <li class="upper-links dropdown"><a class="links">My Account</a>
                                        <ul class="dropdown-menu">
                                            <li class="profile-li"><a class="profile-links" href="adminPart/adminDashboard.php">Admin Dashboard</a></li>
                                            <li class="profile-li"><a class="profile-links" href="accountSetting.php">Account Setting</a></li>
                                            <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
                                            <li class="profile-li"><a class="profile-links" href="logout.php">logout</a></li>


                            <?php }}else { ?>
                            <li class="upper-links dropdown"><a class="links">My Account</a>
                                <ul class="dropdown-menu">
                                    <li class="profile-li"><a class="profile-links" href="login.php">LOGIN</a></li>
                                    <li class="profile-li"><a class="profile-links" href="signUp.php">REGISTER</a></li>
                                    <?php } ?>


                                </ul>
                            </li>
                        </ul></ul></ul>
                </ul>
            </div>
        </div>
        <!--Login System Embedded by Jung End-->




        <div class="row">
            <!--Size-->
            <div class="col-sm-1">
            </div>
            <!--Size-->
            <div class="col-sm-1">
                <a href="index.php"><img src="image/logo.png" width="70px" height="70px"></a>
            </div>
            <div class="smallsearch col-sm-8 col-xs-11">
                <div class="row">
                  <form action="index_result.php" method="POST" role="search">
                    <input class="navbar-input col-xs-11" type="text" name="search" placeholder="Search for Products, Brands and more" name="">
                    <button class="navbar-button col-xs-1" type="submit">
                    <svg width="15px" height="15px">
                        <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                    </svg>
                </button>
              </form>
                </div>
            </div>

        </div>



        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mySecondbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
            </div>
            <!--Size-->
            <div class="col-sm-2">
                <div class="col-sm-8 col-xs-11">
                </div>
            </div>
            <!--Size-->
            <div class="collapse navbar-collapse row" id="mySecondbar">
                <ul class="nav navbar-nav fontnav">
                    <li><a href="productlocation/productview_latest.php">LATEST</a></li>
                    <li><a href="productlocation/productview_men.php">MEN</a></li>
                    <li><a href="productlocation/productview_women.php">WOMEN</a></li>
                    <li><a href="#">iACADEMY MERCHANDISE</a></li>
                    <li><a href="#">CUSTOMIZE</a></li>
                </ul>
                </li>
                </ul>
                </ul>
            </div>
        </div>
    </nav>

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
            <a class="user-side-menu_link" href="productView.php">
              <div class="user-side-menu_link-text">My Products</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link-selected" href="mySales.php">
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
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">

    <h3> Here are list of products you have been sold </br>
         Click the transaction ID to view the specific sales transaction </h3>
          <hr>

           <form action="salesResults.php" method="GET">
           <input type="text" name="Search1" placeholder="order number">
           <input type="submit" value="Search"> </br> </br>
          </form>



         <form method="POST" action="" style="float:right;">
                    <select class="form-control col-sm-2" name="ShortB" onchange="javascript: submit()">
                      <option value="" disabled selected>Sort by:</option>
                      <option value="datenew">Most Recent</option>
              </select>


                  </form>


     <form>
     <select name="users" onchange="showUser(this.value)">
       <option value="">Filter by:</option>
        <option value="Sold">Sold</option>
        <option value="Processing">Processing</option>
       </select>
     </form>
     <br>
     <div id="txtHint"><b>Order info:</b></div>



                  </br> </br>

      <!-- just testing will going to recode -->
      <?php $glasstype = $_SESSION['user_ID'] ?>


      <?php
         if(isset($_POST['ShortA']))
       {
          include 'orderStatustoDb.php';
       }
        if(isset($_POST['ShortB']))
       {
           include 'saleSort.php';

       }
       else
       {

        $querry = 'SELECT O.order_process, O.created, O.total_price,
        P.productName, P.productCategory, P.price, P.product_ID, I.product_ID, I.order_id
        FROM orders O
        JOIN order_items I ON O.id = I.order_id
        JOIN products P ON P.product_ID = I.product_ID
        WHERE I.Seller_ID = "' . $glasstype . '"  ';


        $response = @mysqli_query($dbconn, $querry);
              if($response) {

                echo "<table class='table'>";
                echo "<thead>
                          <tr>
                            <th>Order #</th>
                            <th>Product</th>
                            <th>Total</th>
                            <th>Catagory</th>
                            <th>Placed on </th>
                            <th>Order Status</th>
                          </tr>
                        </thead>
                      ";
               while ($row = @mysqli_fetch_array($response)) {
                echo "<tr><td>  ";
                echo "<b><a href='orderSummary.php?id=".$row['order_id']."'>" .$row['order_id']. "</a></b> </td><td>";
                echo $row['productName'].'</td><td>';
                echo "₱ ";
                echo $row['total_price'] . '</td><td>';
                echo $row['productCategory'] . '</td><td>';
                echo $row['created'] . '</td><td>';
                echo '<form method="POST" action="">
                      <select class="form-control col-sm-2" name="ShortA" onchange="javascript: submit()">
                      <option value="" disabled selected> '.$row['order_process'].' </option>
                      <option value="'.$row['order_id'].'">Sold</option>
                      </select>
                      </form> </td><td>';

             }
            echo "</table>";
           } else {
          echo "<h3>No products listed.</h3><br/>";
          echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
        }
          }
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
