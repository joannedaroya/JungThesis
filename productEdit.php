    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Edit Product</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="css/login.css" />
        <link rel="stylesheet" href="css/design.css" />
        <link rel="stylesheet" href="css/productsPages.css" />
        <script src="jsmain/jsmain.js"></script>

    </head>

    <body>

      <?php include ('mainheader.php');
            if(!$_SESSION['email']){
                header("Location: login.php", 404);
                exit;}
       ?>


      <!--Code Starts here (main)-->
        <div class="container-fuild">
            <div class="row">
                <div class="col-md-12 col-centered formProduct1">
                    <div class="row">
                        <h2> Edit are your product: <b> <?php echo $_POST['PNAME'] ?> </b> </h2>
                        <hr>
                    </div>
                    <div class="row">


                         <?php $glasstype = $_SESSION['email'];
                                 $pinfo   = $_POST['PNAME'];
                          ?>
      <?php

        $con=mysqli_connect('localhost','root','','imarketdatabase');
        $results = mysqli_query ($con,'SELECT * FROM products WHERE productName LIKE "' . $pinfo . '" LIMIT 1');
        if($results->num_rows > 0) {

        while($row = mysqli_fetch_array($results)){
          echo'

            <form class="form" action="productUpdateDb.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputname">Rename your Product:</label>
                                <input type="text" class="form-control" placeholder='.$row['productName'].' name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="sel1">Change the Product Category:</label>
                                <select class="form-control" name="category" id="category" onChange="onSelectChange()" required>
                                   <option value="" selected disabled>'.$row['productCategory'].'</option>
                                   <option value="Mobile Phones Accessories">Mobile Phones Accessories</option>
                                   <option value="Clothing and Accessories">Clothing and Accessories</option>
                                   <option value="Bags and Accessories">Bags and Accessories</option>
                                   <option value="Services">Services</option>
                                   <option value="Collectibles">Collectibles</option>
                                   <option value="Books & Arts">Books & Arts</option>
                                   <option value="Hobbies, Sports">Hobbies, Sports</option>
                                   <option value="Toys Stuffs">Toys Stuffs</option>
                                </select>

                                <select class="form-control" id="gender" name="genderCategory">
                                  <option value="man">Man</option>
                                  <option value="woman">Woman</option>
                                </select>

                            </div>

                    </div>
                    <div class="form-group">
                        <label for="inputname">Product Price: </label>
                        <input type="number" class="form-control" placeholder=" &#8369 '.$row['price'].'" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Product Description:</label>
                        <textarea class="form-control" rows="5" name="description" placeholder='.$row['shortDes'].'  required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputname">Product Quantity:</label>
                        <input type="number" class="form-control" name="qty" placeholder='.$row['p_qty'].' required>
                    </div>
                    <div class="form-group">

                    <label for="inputname">Your Product Image:</label> <br>
                    <img src="productImages/' .$row['productImage']. '" width="15%" height="15%"/>
                    </div>
                    <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" name="fileToUpload">
                        <p class="help-block">Example "Recomended Image Size in pixel 400 X 300"</p>
                    </div>



                    <input type="hidden" name="hiddenPname" value="'.$row['productName'].'">

                    <div class="form-group">
                        <div>
                            <button class="btn btn-primary" name="submit" type="submit">Edit Product WHohoo!</button>
                            <button type="reset" class="btn btn-warning">Clear</button>
                        </div>
                    </div>
                    </form>

            ';
        }
      } else {

      }
        mysqli_close($con);
        ?>






                    </div>
                        <hr>
            </div>
        </div>
    <?php include 'footer.php';?>

    </body>

    </html>
