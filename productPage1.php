<!DOCTYPE html>
    <html lang="en">

    <head>
        <title>:::iMARKET:::</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="dist/js/lightbox-plus-jquery.js"></script>


        <!--Script for rating-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <link rel="stylesheet" href="css/login.css" />
        <link rel="stylesheet" href="css/design.css" />
        <link rel="stylesheet" href="css/productsPages.css" />
        <link href="dist/css/lightbox.css" rel="stylesheet">
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
                    .rating1 > input { display: none; }
                    .rating1 > label:before {
                        margin: 5px;
                        font-size: 1.25em;
                        font-family: FontAwesome;
                        display: inline-block;
                        content: "\f005";
                    }
                    .rating1 > .half:before {
                        content: "\f089";
                        position: absolute;
                    }
                    .rating1 > label {
                        color: #ddd;
                        float: right;
                    }
                    .rating1 > input:checked ~ label,
                    .rating1:not(:checked) > label:hover,
                    .rating1:not(:checked) > label:hover ~ label { color: #FFD700;  }
                    .rating1 > input:checked + label:hover,
                    .rating1 > input:checked ~ label:hover,
                    .rating1 > label:hover ~ input:checked ~ label,
                    .rating1 > input:checked ~ label:hover ~ label { color: #FFED85;  }
        </style>


    </head>

    <body>

      <?php
      include 'mainheader.php';
      if(!$_SESSION['email']){
          header("Location: index.php", 404);
          exit;}
      ?>





      <!--Main code starts-->

      <!--To get the Name of product-->
      <?php
      $prodtest='SELECT * FROM products WHERE product_ID ='.$_GET['pname'];
      $dbcon=mysqli_connect('localhost','root','','imarketdatabase');
      $query = $dbcon->query($prodtest) or die($dbcon->error);
      $row = $query->fetch_assoc();
      ?>
        <div class="container-fuild">
            <div class="row">
                <div class="col-md-12 col-centered">
                    <div class="row">
                        <h2> <b> <?php echo $row['productName']; ?> </b> </h2>
                        <!-- just testing will going to recode -->
                        <hr>
                    </div>
                    <div class="row">

                     <?php
                             $email = (isset($_SESSION['email']));
                             $pNAME = $_GET['pname'];
                             $con=mysqli_connect('localhost','root','','imarketdatabase');
                             $results = mysqli_query ($con,'SELECT * FROM products WHERE productActive LIKE 1 AND product_ID LIKE "' . $pNAME . '"');
                             while($row = mysqli_fetch_array($results)){
                                 echo'
                                   <div class="col-md-4">
                                      <a href="productImages/' .$row['productImage']. '" data-lightbox="image-1"><img id="prodImg" src="productImages/' .$row['productImage']. '" width="80%" height="80%"/><a/>
                                      ';
                                      //<a href="images/image-1.jpg" data-lightbox="image-1" data-title="My caption">Image #1</a>?>
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
                                      <li><a data-toggle="tab" href="#menu1"> Seller Details</a></li>
                                      <li><a data-toggle="tab" href="#menu2"> Reviews </a></li>

                                    </ul>

                                    <div class="tab-content">
                                      <div id="home" class="tab-pane fade in active">
                                        <h3>Description</h3>
                                        <p><?php echo $row['shortDes']?></p>
                                      </div>

                                      <!-- Start of  Review -->

                                      <!--To get the data of the User-->
                                      <?php
                                      $usertest='SELECT * FROM users WHERE user_ID ='.$row['user_ID'];
                                      $query = $con->query($usertest) or die($con->error);
                                      $row = $query->fetch_assoc();
                                      ?>




                                      <div id="menu1" class="tab-pane fade">
                                        <h3>Seller Details</h3>
                                        <p>Seller Email : <?php echo $row['email'] ?></p>
                                        <p>Seller Name : <?php echo $row['lastName'] ?> <?php echo $row['firstName'] ?></p>
                                        <p>Seller Contact : <?php echo $row['contactNum'] ?></p>




                                     </div>
                                     <!-- End of Review-->

                                     <!--Review implements-->

                                     <div id="menu2" class="tab-pane fade">
                                       <div class="form-group">

                                       </div>
                                     </div>
                                     <!--End of review-->
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                     <form>

                                       <!--BEEP BEEP BEEP -->
                                       <?php
                                       $prodtest='SELECT * FROM products WHERE product_ID ='.$_GET['pname'];
                                       $dbcon=mysqli_connect('localhost','root','','imarketdatabase');
                                       $query = $dbcon->query($prodtest) or die($dbcon->error);
                                       $row = $query->fetch_assoc();
                                       if($row['productCategory'] == 'Clothing and Accessories'){
                                       ?>
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
                                       <?php
                                          echo "Not sure? <a href='productImages/productSize/".$row['productSize']."' data-lightbox='image-2' data-title='Size Chart'>See Size details</a>";
                                        }
                                       ?>
                                         <!--beep beep beep-->

                                         <div class="control-group form-group">
                                           <div class="controls">
                                             <h3>Quantity</h3>
                                             <input type="number" class="form-control" name="qty"  style="width:50%;" min="1" max="100">
                                           </div>
                                         </div>
                                         <?php echo "<p>". $row['p_qty']. " pieces available.</p>"; ?>
                                         <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["product_ID"]; ?>">Add to cart</a>





                                         <a href="productWishListToDB.php?pname= <?php echo $row['productName']?>" style="color:black; text-decoration:none;"  class="btn btn-default"><span class="glyphicon glyphicon-heart-empty heart" aria-hidden="true"></span> Add to My Wishlist </a>

                                    <!--     <a href="#"><span class="glyphicon glyphicon-heart-empty heart" aria-hidden="true"></span> Add to My Wishlist</a>  -->
                                     </form>

                                     </br> </br>

                                     <form method="POST" action="productWishListToDB.php">
                                            <input type="hidden" name="pname" value="<?php echo $row['productName']?>" />
                                            <input type="submit" value="Add to My Wishlist">
                                          </form>

                                           </br> </br>
                                            <!--will be fixing this lol-->
                                            <h6>REPORT:</h6>

                                   </div>



                                   <!--====================Review (comment with rate) box will do here=======================-->
                                   <div id="boardComment">
                                   			<?php require_once('product_comment.php') ?>
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


    </body>

    </html>
