<!DOCTYPE html>


<html lang="en">

<head>
    <title>My Wishlist</title>
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
    <link rel="stylesheet" href="css/productsPages.css" />


</head>

<body>

    <?php
        session_start();
        require_once('connector.php');
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
                        <?php if(isset($_SESSION['email'])&& $_SESSION['userType'] == 'employee'){ ?>
                        <li class="upper-links"><a class="links" href="productAdd.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> SELL</a></li>
                        <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> NOTIFICATIONS</a></li>
                        <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> WISHLIST</a></li>
                        <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> CART</a></li>

                        <li class="upper-links dropdown"><a class="links">My Account</a>
                            <ul class="dropdown-menu">
                                <li class="profile-li"><a class="profile-links" href="#">My Order</a></li>
                                <li class="profile-li"><a class="profile-links" href="accountSetting.php">Account Setting</a></li>
                                <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
                                <li class="profile-li"><a class="profile-links" href="logout.php">logout</a></li>

                                <?php }elseif(isset($_SESSION['email'])&& $_SESSION['userType'] == 'student'){ ?>
                                <li class="upper-links"><a class="links" href="productAdd.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> SELL</a></li>
                                <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> NOTIFICATIONS</a></li>
                                <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> WISHLIST</a></li>
                                <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> CART</a></li>

                                <li class="upper-links dropdown"><a class="links">My Account</a>
                                    <ul class="dropdown-menu">
                                        <li class="profile-li"><a class="profile-links" href="#">My Order</a></li>
                                        <li class="profile-li"><a class="profile-links" href="accountSetting.php">Account Setting</a></li>
                                        <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
                                        <li class="profile-li"><a class="profile-links" href="logout.php">logout</a></li>

                                        <?php }elseif(isset($_SESSION['email'])&& $_SESSION['userType'] == 'admin'){ ?>
                                        <li class="upper-links"><a class="links" href="productAdd.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> SELL</a></li>
                                        <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> NOTIFICATIONS</a></li>
                                        <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> WISHLIST</a></li>
                                        <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> CART</a></li>

                                        <li class="upper-links dropdown"><a class="links">My Account</a>
                                            <ul class="dropdown-menu">
                                                <li class="profile-li"><a class="profile-links" href="adminPart/adminDashboard.php">Admin Dashboard</a></li>
                                                <li class="profile-li"><a class="profile-links" href="accountSetting.php">Account Setting</a></li>
                                                <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
                                                <li class="profile-li"><a class="profile-links" href="logout.php">logout</a></li>


                                                <?php }else { ?>
                                                <li class="upper-links dropdown"><a class="links">My Account</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="profile-li"><a class="profile-links" href="login.php">LOGIN</a></li>
                                                        <li class="profile-li"><a class="profile-links" href="signUp.php">REGISTER</a></li>
                                                        <?php } ?>


                                                    </ul>
                                                </li>
                                            </ul>
                                    </ul>
                            </ul>
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
                        <input class="navbar-input col-xs-11" type="" placeholder="Search for Products, Brands and more" name="">
                        <button class="navbar-button col-xs-1">
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>
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

        <div class="container-fuild">
            <div class="row">
                <div class="col-md-12 col-centered formProduct1">

                    <h2> My Wishlist </h2>

                    <form method="POST" action="" style="float:right;">
                        <select name="ShortA" onchange="javascript: submit()">
                              <option value="" disabled selected>Sort by:</option>
                              <option value="high">higest to low price</option>
                              <option value="low">lowest to highest price</option>
                      </select>
                    </form>
                    
                    <?php $glasstype = $_SESSION['email'] ?>
                    

                    <?php 
         if(isset($_POST['ShortA'])) 
       {
          include 'productWishListSort.php';
       }
       else               
       {
   
        
               
                  
                      
            $querry = 'SELECT *
               FROM wishlist
               LEFT JOIN products
               ON wishlist.productName = products.productName
               WHERE wishlist.wishListActive=1 AND products.email LIKE "' . $glasstype . '"  ';

              $response = @mysqli_query($dbconn, $querry);

              if($response) {  

                $rowcount=mysqli_num_rows($response);
                printf(" You have %d Items in your wishlist.\n",$rowcount);
        
                echo "<table class='table'>";
                //echo "<tr><td> Brand Name </td><td> Brand Description </td><td> Brand Image </td>";

                echo "<thead>
                                         <tr>
                                            <th></th>
                                            <th>Product Name</th>
                                            <th></th>
                                            <th>Price</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                      ";



               while ($row = @mysqli_fetch_array($response)) {
                echo "<tr><td>";

                echo '<img src="productImages/' .$row['productImage']. '" width="70" height="70"> </td><td>';
                echo '<b><a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b></td><td>';
                echo $row['shortDes'] . '</td><td>';
                echo $row['price'] . '</td><td>';   
                echo $row['QTY'] . '</td><td>';
                
    
                echo '
                  <form method="POST" action="#">
                  <input type="hidden" name="idtest" value="" />
                  <input class="btn btn-info" type="submit" value="Add to Cart">
                  </form>
                  </td><td>
                  <form method="POST" action="#">
                  <input type="hidden" name="idtest" value="" />
                  <input class="btn btn-warning" type="submit" value="X">
                  </form></td><td> ';


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



        <?php include 'footer.php';?>

</body>

</html>