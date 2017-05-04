<link rel="stylesheet" href="css/design.css" />
<link rel="stylesheet" href="css/profile.css" />
<link rel="stylesheet" href="css/productsPages.css" />
<link rel="stylesheet" href="css/hover.css" />



<?php $glasstype = $_SESSION['user_ID'] ?>

<?php

$pricerange=$_POST['pricerangeA'];

switch ($pricerange) {
    case 1:
        
        $con=mysqli_connect('localhost','root','','imarketdatabase');

        $results = mysqli_query ($con,'SELECT * FROM products WHERE price BETWEEN 100.00 AND 200.00 ');

        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'
         <div class ="proBox1">

            <div class="PHOTOHOVER" style="float:left">
             <img src="../productImages/' .$row['productImage']. '" class="image" width="50px" height="50px">
           
            </div>

            <br>
            <b><a href="../productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);

        break;

    case 2:
        
        $con=mysqli_connect('localhost','root','','imarketdatabase');

        $results = mysqli_query ($con,'SELECT * FROM products where price BETWEEN 200.00 AND 500.00 ');

        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'
         <div class ="proBox1">

            <div class="PHOTOHOVER" style="float:left">
             <img src="../productImages/' .$row['productImage']. '" class="image" width="50px" height="50px">
           
            </div>

            <br>
            <b><a href="../productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);

        break;
     
     case 3:
        
        $con=mysqli_connect('localhost','root','','imarketdatabase');

        $results = mysqli_query ($con,'SELECT * FROM products where price BETWEEN 500.00 AND 1000.00 ');

        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'
         <div class ="proBox1">

            <div class="PHOTOHOVER" style="float:left">
             <img src="../productImages/' .$row['productImage']. '" class="image" width="50px" height="50px">
           
            </div>

            <br>
            <b><a href="../productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);

        break;

            case 4:
        
        $con=mysqli_connect('localhost','root','','imarketdatabase');

        $results = mysqli_query ($con,'SELECT * FROM products where price BETWEEN 1000.00 AND 10000.00 ');

        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'
         <div class ="proBox1">

            <div class="PHOTOHOVER" style="float:left">
             <img src="../productImages/' .$row['productImage']. '" class="image" width="50px" height="50px">
           
            </div>

            <br>
            <b><a href="../productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);

        break;        

    case 5:
        
        $con=mysqli_connect('localhost','root','','imarketdatabase');

        $results = mysqli_query ($con,'SELECT * FROM products where price BETWEEN 1.00 AND 100.00 ');

        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'
         <div class ="proBox1">

            <div class="PHOTOHOVER" style="float:left">
             <img src="../productImages/' .$row['productImage']. '" class="image" width="50px" height="50px">
           
            </div>

            <br>
            <b><a href="../productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);

        break;

    default:
        

        $con=mysqli_connect('localhost','root','','imarketdatabase');

        $results = mysqli_query ($con,'SELECT * FROM products WHERE productCategory = "'.$short.'" ');

        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'
         <div class ="proBox1">

            <div class="PHOTOHOVER" style="float:left">
             <img src="../productImages/' .$row['productImage']. '" class="image" width="50px" height="50px">
           
            </div>

            <br>
            <b><a href="../productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);

}
?>