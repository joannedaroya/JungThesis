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

    <?php include ('mainheader.php'); ?>

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

                    <?php $glasstype = $_SESSION['user_ID'] ?>


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
               WHERE wishlist.wishListActive=1 AND wishlist.user_ID LIKE "' . $glasstype . '"  ';

              $response = @mysqli_query($dbconn, $querry);
              if($response) {
                $rowcount=mysqli_num_rows($response);
                printf(" You have %d Items in your wishlist.\n",$rowcount);

                echo "<table class='table'>";
                //echo "<tr><td> Brand Name </td><td> Brand Description </td><td> Brand Image </td>";
                echo "<thead>
                                        <tr>
                                            <th colspan='3'>Product Name</th>
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
                echo $row['p_qty'] . '</td><td>';


                echo'
                  <form method="POST" action="#">
                  <input type="hidden" name="idtest" value=""/>
                  <input class="btn btn-info" type="submit" value="Add to Cart">
                  </form>
                  </td><td>';

                  echo'
                  <form method="POST" action="productWishListDeactivate.php">
                  <input type="hidden" name="PNAME" value="'.$row['productName'].'"/>
                  <input class="btn btn-warning" type="submit" value="X">
                  </form>
                  </td><td>';
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
