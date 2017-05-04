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

    <?php include ('mainheader.php'); ?>

        <!--First-->
        <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="image/slider/slider001.jpg" alt="Image">
        <div class="carousel-caption">
          <p><a class="links" href="productAdd.php">Sell button</a></p>
        </div>
      </div>

      <div class="item">
        <img src="image/slider/slider002.jpg" alt="Image">
        <div class="carousel-caption">
          <p><a class="links" href="productlocation/productview_latest.php">Buy button</a></p>
        </div>
      </div>
    </div> </div>


        <div class="col-md-12 text-center">
            <br><br> Product list first line
            <br><br><br><br><br><br><br>
        </div>
        <div class="col-md-12 text-center">
            Product list second line
            <br><br><br><br><br><br><br>
        </div>

        <div class="row">
            <div class="col-md-6 text-center">
                <h3>Column 1</h3> Best prod or man prod
                <br><br><br><br><br><br><br>

            </div>
            <div class="col-md-6 text-center">
                <h3>Column 2</h3> woman prod
                <br><br><br><br><br><br><br>

            </div>

        </div>


        </div>
    <?php include 'footer.php';?>

</body>

</html>
