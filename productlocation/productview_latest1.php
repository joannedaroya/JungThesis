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
    <link rel="stylesheet" href="../css/design.css" />

</head>

<body>

    <?php include('proheader.php'); ?>

    <!--Code Starts Here (main)-->

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                </br>

                <form method="POST" action="" style="float:right;">
                    <select class="form-control col-sm-2" name="categoryA" onchange="javascript: submit()">
                      <option value="" disabled selected>Select Category by:</option>
                      <option value="Mobile Phones Accessories">Mobile Phones Accessories</option>
                      <option value="Clothing and Accessories">Clothing and Accessories</option>
                      <option value="Bags and Accessories">Bags and Accessories</option>
                      <option value="Services">Services</option>
                      <option value="Collectibles">Collectibles</option>
                      <option value="Books & Arts">Books & Arts</option>
                      <option value="Hobbies, Sports">Hobbies, Sports</option>
                      <option value="Toys Stuffs">Toys Stuffs</option>
                      <option value="Merchandise">Merchandise</option>
                      <option value="Food">Food</option>
                      <option value="Custom">Custom</option>
              </select>


                </form>
                
               <form method="POST" action="" > 
                <select class="pricerangeA" name="pricerangeA" size="1" onchange="javascript: submit()">
                      <option value="">Price Range&nbsp;</option>
                      <option value="1">₱&nbsp;100.00 - 200.00</option>
                      <option value="2">₱&nbsp;200.00 - 500.00</option>
                      <option value="3">₱&nbsp;500.00 - 1000.00</option>
                      <option value="4">₱&nbsp;1000.00 - 10000.00</option>
                      <option value="5">₱1 - 100</option>
                  </select> 
                  </form>


                </br>
                </br>
                </br>
                </br>
                </br>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php

       if(isset($_POST['categoryA']))
       {
          include '../categorySort.php';
       }
       if(isset($_POST['pricerangeA']))
       {
          include '../priceSort2.php';
       }
       else
       {

        $con=mysqli_connect('localhost','root','','imarketdatabase');

        $results = mysqli_query ($con,'SELECT * FROM products WHERE productActive = 1 ORDER BY product_ID DESC');


        if($results->num_rows > 0) {

        while($row = mysqli_fetch_array($results)){
          echo'

            <div class ="proBox1">


            <div class="PHOTOHOVER" style="float:left">
             <img src="../productImages/' .$row['productImage']. '" class="image" width="50px" height="50px">

            <br>
            <b><a href="../productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            </br>

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
        </div>
    </div>


    </br>
    </br>
    </br>
    <div class="row">
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>



    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>



    <!--Footer-->
    <?php include 'profooter.php';?>




</body>

</html>
