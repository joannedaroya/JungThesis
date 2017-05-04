    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Sell your Item</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!--JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="css/login.css" />
        <link rel="stylesheet" href="css/design.css" />
        <link rel="stylesheet" href="css/productsPages.css" />
        <script src="jsmain/jsmain.js"></script>

    </head>

    <body>

      <?php

      include 'mainheader.php';

      if(!$_SESSION['email']){
       header("need to be login", 404);
                exit;}
      ?>





      

      <!-- Main code starts -->

        <div class="container-fuild">
            <div class="row">
                <div class="col-md-12 col-centered formProduct1">
                    <div class="row">
                        <h2> Sell an Item </h2>
                        <!-- just testing will going to recode -->
                        <hr>
                    </div>
                    <div class="row">
                        <form class="form" action="productTODb.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="inputname">What are you selling?</label>
                                <input type="text" class="form-control" placeholder="Enter product name/title" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="sel1">Whats your Product Category:</label>
                                <select class="form-control" name="category" id="category" onChange="onSelectChange()" required>
                                   <option value="" selected disabled>Choose One</option>
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

                                <select class="form-control" id="gender" name="gender">
                                  <option value="0" selected>Choose One</option>
                                  <option value="man">Man</option>
                                  <option value="woman">Woman</option>
                                </select><br/>

                              <div id="sizeChart">
                                <label>Size Chart</label>
                                <input type="file" name="sizeChart">
                                <p class="help-block">Example "Recomended Image Size in pixel 400 X 300"</p>
                              </div>
                            </div>

                    <div class="form-group">
                        <label for="inputname">Product Price: </label>
                        <input type="number" class="form-control" placeholder=" &#8369 1,000" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Product Description:</label>
                        <textarea class="form-control" rows="5" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputname">Product Quantity:</label>
                        <input type="number" class="form-control" name="qty" required>
                    </div>
                    <!--    <div class="form-group">
                    <label for="inputname">Upload Your Product Image:</label>

                </div>  need to put code to upload pictures here lol -->


                    <div class="form-group">
                        <label>product image</label>
                        <input type="file" multiple="multiple" name="fileToUpload"  >
                        <p class="help-block">Recomended Image Size in pixel 500 X 500</p>
                    </div>

                    <input type="hidden" name="ownerID" value="<?php echo $_SESSION['user_ID']; ?>">


                    <div class="form-group">
                        <div>
                            <button class="btn btn-primary" name="submit" type="submit">Add Product WHohoo!</button>
                            <button type="reset" class="btn btn-warning">Clear</button>
                        </div>
                    </div>
                    </form>


                    <hr>

                </div>
            </div>
        </div>

    <?php include 'footer.php';?>

    </body>

    </html>
