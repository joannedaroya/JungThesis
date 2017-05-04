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

    <?php

        $link = mysqli_connect("localhost", "root", "", "imarketdatabase");

        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        include 'mainheader.php';
    ?>


        

        <!--First-->

        <div class="container">
            <!-- search body results - khelly -->

            <?php

        $query = $_POST['search'];

        $min_length = 4;

        if(strlen($query) >= $min_length){

        $query = htmlspecialchars($query);

        $query = mysqli_real_escape_string($link,$query);
        // for SQL injection

        $query1 = mysqli_query($link, "SELECT * FROM products
        WHERE (`productName` LIKE '%".$query."%') OR (`shortDes` LIKE '%".$query."%') OR (`email` = '%".$query."%')");


        if(mysqli_num_rows($query1) > 0){

        while($results = mysqli_fetch_array($query1)){?>
          <div class="item col-lg-4">
              <div class="thumbnail">
                  <div class="caption">
                    <img src="productImages/<?php echo $results["productImage"];?>" width="250px" height="250px"/>
                      <h4 class="list-group-item-heading"><a href="productPage1.php?pname=<?php echo $results['product_ID']?>"><?php echo $results["productName"]; ?></a></h4>
                      <p class="list-group-item-text"><?php echo $results["shortDes"]; ?></p>
                      <div class="row">
                          <div class="col-md-6">
                              <p class="lead"><?php echo '₱'.$results["price"]; ?></p>
                          </div>
                          <div class="col-md-6">
                              <a class="btn btn-success" href="../cartAction.php?action=addToCart&productCode=<?php echo $results["product_ID"]; ?>">Add to cart</a>
                              <!---->
                                    <?php
                                    $ratetest='select * from rating where product_ID='.$results["product_ID"];
                                    $query1 = $link->query($ratetest) or die($link->error);
                                    $rowi = $query1->fetch_assoc();
                                    ?>

                                    <button type="button" class="btn btn-default btn-sm">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span><?php echo $rowi["rate"]; ?>
                                    </button>
                                    <!---->
                          </div>

                      </div>
                  </div>
              </div>
          </div><?php
        }

        }
        else{
        echo "No results found";
        }

        }
        else{
        echo "<p>Minimum length is ".$min_length. " Please search for another word</p>";
        }
        ?>
                <!-- search body results - khelly -->
        </div>
        </div>







        </div>
    <?php include 'footer.php';?>

</body>

</html>
