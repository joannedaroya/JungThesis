<?php

session_start();




if(!$_SESSION['email']){
 header("need to be login", 404);
          exit;}
?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title><?php echo $_GET['pname']; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



        <!--Script for rating-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
                        $(document).ready(function () {
                            $("#demo1 .stars").click(function () {

                                $.post('rating.php',{rate:$(this).val()},function(d){
                                    if(d>0)
                                    {
                                        alert('You already rated');
                                    }else{
                                        alert('Thanks For Rating');
                                    }
                                });
                                $(this).attr("checked");
                            });
                        });

                        $(document).ready(function () {
                            $("#demo2 .stars").click(function () {

                                $.post('ratingproduct.php',{rate:$(this).val()},function(d){
                                    if(d>0)
                                    {
                                        alert('You already rated');
                                    }else{
                                        alert('Thanks For Rating');
                                    }
                                });
                                $(this).attr("checked");
                            });
                        });
                    </script>

        <link rel="stylesheet" href="css/login.css" />
        <link rel="stylesheet" href="css/design.css" />
        <link rel="stylesheet" href="css/productsPages.css" />
        <style>
        @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

                    fieldset, label { margin: 0; padding: 0; }

                    .rating {
                        border: none;
                        float: left;
                    }

                    .rating > input { display: none; }
                    .rating > label:before {
                        margin: 5px;
                        font-size: 1.25em;
                        font-family: FontAwesome;
                        display: inline-block;
                        content: "\f005";
                    }

                    .rating > .half:before {
                        content: "\f089";
                        position: absolute;
                    }

                    .rating > label {
                        color: #ddd;
                        float: right;
                    }

                    .rating > input:checked ~ label,
                    .rating:not(:checked) > label:hover,
                    .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

                    .rating > input:checked + label:hover,
                    .rating > input:checked ~ label:hover,
                    .rating > label:hover ~ input:checked ~ label,
                    .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
        </style>


    </head>

    <body>

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
                      <li class="upper-links"><a class="links" href="index_wishlist.php"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> WISHLIST</a></li>
                      <li class="upper-links"><a class="links" href="index_shopcart.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> CART</a></li>

                      <li class="upper-links dropdown"><a class="links">My Account</a>
                          <ul class="dropdown-menu">
                              <li class="profile-li"><a class="profile-links" href="#">My Order</a></li>
                              <li class="profile-li"><a class="profile-links" href="accountSetting.php">Account Setting</a></li>
                              <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
                              <li class="profile-li"><a class="profile-links" href="logout.php">logout</a></li>

                              <?php }elseif(isset($_SESSION['email'])&& $_SESSION['userType'] == 'student'){ ?>
                              <li class="upper-links"><a class="links" href="productAdd.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> SELL</a></li>
                              <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> NOTIFICATIONS</a></li>
                              <li class="upper-links"><a class="links" href="index_wishlist.php"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> WISHLIST</a></li>
                              <li class="upper-links"><a class="links" href="index_shopcart.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> CART</a></li>

                              <li class="upper-links dropdown"><a class="links">My Account</a>
                                  <ul class="dropdown-menu">
                                      <li class="profile-li"><a class="profile-links" href="#">My Order</a></li>
                                      <li class="profile-li"><a class="profile-links" href="accountSetting.php">Account Setting</a></li>
                                      <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
                                      <li class="profile-li"><a class="profile-links" href="logout.php">logout</a></li>

                                      <?php }elseif(isset($_SESSION['email'])&& $_SESSION['userType'] == 'admin'){ ?>
                                      <li class="upper-links"><a class="links" href="productAdd.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> SELL</a></li>
                                      <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> NOTIFICATIONS</a></li>
                                      <li class="upper-links"><a class="links" href="index_wishlist.php"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> WISHLIST</a></li>
                                      <li class="upper-links"><a class="links" href="index_shopcart.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> CART</a></li>

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

      <!--Main code starts-->

        <div class="container-fuild">
            <div class="row">
                <div class="col-md-12 col-centered">
                    <div class="row">
                        <h2> <b> <?php echo $_GET['pname']; ?> </b> </h2>
                        <!-- just testing will going to recode -->
                        <hr>
                    </div>
                    <div class="row">

                     <?php
                             $email = $_SESSION['email'];
                             $pNAME = $_GET['pname'];
                             $con=mysqli_connect('localhost','root','','imarketdatabase');
                             $results = mysqli_query ($con,'SELECT * FROM products WHERE productActive LIKE 1 AND productName LIKE "' . $pNAME . '"');

                             while($row = mysqli_fetch_array($results)){

                                 echo'
                                   <div class="col-md-4">
                                      <img id="prodImg" src="productImages/' .$row['productImage']. '" width="80%" height="80%"/>
                                      ';?>
                                   </div>
                                   <div id="myModal" class="modal">
                                    <span class="close">&times;</span>
                                    <img class="modal-content" id="img01">
                                   </div>
                                   <div class="col-md-4">
                                    <b><?php echo $row['productName'] ?></b> <br />
                                    <b><?php echo $row['shortDes'] ?></b> <br />
                                    ₱ <?php echo $row['price']?> <br />

                                    <br/><br>
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a data-toggle="tab" href="#home">Product Details</a></li>
                                      <li><a data-toggle="tab" href="#menu1"> Reviews</a></li>
                                      <li><a data-toggle="tab" href="#menu2"> Seller Details </a></li>

                                    </ul>

                                    <div class="tab-content">
                                      <div id="home" class="tab-pane fade in active">
                                        <h3>Description</h3>
                                        <p><?php echo $row['shortDes']?></p>
                                      </div>
                                      <!--Review implements-->

                                      <div id="menu1" class="tab-pane fade">
                                        <div class="form-group">

                                          <h3>Leave a Comment</h3>

                                          <form action="#" method="post">

                                            <label for="comment_author" class="required">Your email</label>
                                            <?php echo $row['email']?>
                                            <br>
                                            <label for="comment" class="required">Your message</label>
                                            <textarea class="form-control" rows="5" id="comment" required="required"></textarea>
                                            <input name="submit" type="submit"  class="btn btn-info" value="Submit comment" />

                                          </form>

                                        </div>
                                      </div>

                                      <div id="menu2" class="tab-pane fade">
                                        <h3>Seller Details</h3>
                                        <p><?php echo $row['shortDes'] ?></p>



                                        <div id='demo1' class="rating">
                                          <p>RATE SELLER : </p>
                                          <input class="stars" type="radio" id="star5" name="rating" value="5" />
                                          <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                          <input class="stars" type="radio" id="star4" name="rating" value="4" />
                                          <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                          <input class="stars" type="radio" id="star3" name="rating" value="3" />
                                          <label class = "full" for="star3" title="Meh - 3 stars"></label>
                                          <input class="stars" type="radio" id="star2" name="rating" value="2" />
                                          <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                          <input class="stars" type="radio" id="star1" name="rating" value="1" />
                                          <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        </div>

                                        <div id='demo2' class="rating">
                                          <p>RATE PRODUCT : </p>
                                          <input class="stars" type="radio" id="star5" name="rating" value="5" />
                                          <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                          <input class="stars" type="radio" id="star4" name="rating" value="4" />
                                          <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                          <input class="stars" type="radio" id="star3" name="rating" value="3" />
                                          <label class = "full" for="star3" title="Meh - 3 stars"></label>
                                          <input class="stars" type="radio" id="star2" name="rating" value="2" />
                                          <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                          <input class="stars" type="radio" id="star1" name="rating" value="1" />
                                          <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        </div>
                                     </div>

                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                     <form>
                                       <div class="control-group form-group">
                                         <div class="controls">
                                           <h3>Size</h3>
                                           <select class="form-control col-sm-2" style="width:50%;" name="size" required>
                                             <option value="XS">XS</option>
                                             <option value="S">S</option>
                                             <option value="M">M</option>
                                             <option value="L">L</option>
                                             <option value="XL">XL</option>
                                             <option value="XXL">XXL</option>
                                           </select>
                                         </div>
                                       </div><br/><br/>
                                         <p>Not sure? <a href="#" class="size">See size details</a></p>
                                         <div class="control-group form-group">
                                           <div class="controls">
                                             <h3>Quantity</h3>
                                             <input type="number" class="form-control" name="qty" required style="width:50%;" min="1" max="100">
                                           </div>
                                         </div>
                                         <?php echo "<p>". $row['QTY']. " pieces available.</p>"; ?>
                                         <input type="submit" value="ADD TO BAG" class="btn btn-info"><br/>
                                         <a href="#"><span class="glyphicon glyphicon-heart-empty heart" aria-hidden="true"></span> Add to Wishlist</a>
                                     </form>
                                   </div>
                                   <?php



                             }
                             mysqli_close($con);

                         ?>

                      </div>
                    </div>
            </div>
        </div>

        <?php include 'footer.php';?>

        <script>
          var modal = document.getElementById('myModal');
          var img = document.getElementById('prodImg');
          var modalImg = document.getElementById('img01');

          img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
          }

          var span = document.getElementsByClassName("close")[0];
          span.onclick = function() {
            modal.style.display = "none";
          }
        </script>


    </body>

    </html>
