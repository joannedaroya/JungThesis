<link rel="stylesheet" href="css/design.css" />
<link rel="stylesheet" href="css/profile.css" />
<link rel="stylesheet" href="css/productsPages.css" />
<link rel="stylesheet" href="css/hover.css" />
<?php $glasstype = $_SESSION['user_ID'] ?>
<?php

$short = $_POST['ShortA'];


switch ($short) {
    case "high":

        $con=mysqli_connect('localhost','root','','imarketdatabase');
        $results = mysqli_query ($con,'SELECT * FROM products WHERE user_ID= "'.$glasstype.'" order by price DESC');
        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'
         <div class ="proBox1">

            <div class="PHOTOHOVER">
             <img src="productImages/' .$row['productImage']. '" class="image" height:80%">
             <div class="middle">
              <div class="text11">
                      <form class="buttons1" method="POST" action="productEdit1.php">
                        <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                        <input class="btn btn-warning" type="submit" value="Edit">
                      </form>
                    </br>
                      <form class="buttons1" method="POST" action="productDelete.php">
                          <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                          <input class="btn btn-danger" type="submit" value="Delete">
                       </form>
                      </div>
             </div>
            </div>

            <br>
            <b><a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
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

    case "low":

        $con=mysqli_connect('localhost','root','','imarketdatabase');
        $results = mysqli_query ($con,'SELECT * FROM products WHERE user_ID= "'.$glasstype.'" order by price ASC');
        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'

           <div class ="proBox1">

            <div class="PHOTOHOVER">
             <img src="productImages/' .$row['productImage']. '" class="image" height:80%">
             <div class="middle">
              <div class="text11">
                      <form class="buttons1" method="POST" action="productEdit1.php">
                        <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                        <input class="btn btn-warning" type="submit" value="Edit">
                      </form>
                    </br>
                      <form class="buttons1" method="POST" action="productDelete.php">
                          <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                          <input class="btn btn-danger" type="submit" value="Delete">
                       </form>
                      </div>
             </div>
            </div>

            <br>
            <b><a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>
            ';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);


        break;
    case "dateold":
        $con=mysqli_connect('localhost','root','','imarketdatabase');
        $results = mysqli_query ($con,'SELECT * FROM products WHERE user_ID= "'.$glasstype.'" order by date_created ASC');
        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'

            <div class ="proBox1">

            <div class="PHOTOHOVER">
             <img src="productImages/' .$row['productImage']. '" class="image" height:80%">
             <div class="middle">
              <div class="text11">
                      <form class="buttons1" method="POST" action="productEdit1.php">
                        <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                        <input class="btn btn-warning" type="submit" value="Edit">
                      </form>
                    </br>
                      <form class="buttons1" method="POST" action="productDelete.php">
                          <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                          <input class="btn btn-danger" type="submit" value="Delete">
                       </form>
                      </div>
             </div>
            </div>

            <br>
            <b><a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>
            ';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);
        break;

    case "datenew":
    	 $con=mysqli_connect('localhost','root','','imarketdatabase');
        $results = mysqli_query ($con,'SELECT * FROM products WHERE user_ID= "'.$glasstype.'" order by date_created DESC');
        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'

           <div class ="proBox1">

            <div class="PHOTOHOVER">
             <img src="productImages/' .$row['productImage']. '" class="image" height:80%">
             <div class="middle">
              <div class="text11">
                      <form class="buttons1" method="POST" action="productEdit1.php">
                        <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                        <input class="btn btn-warning" type="submit" value="Edit">
                      </form>
                    </br>
                      <form class="buttons1" method="POST" action="productDelete.php">
                          <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                          <input class="btn btn-danger" type="submit" value="Delete">
                       </form>
                      </div>
             </div>
            </div>

            <br>
            <b><a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>
            ';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);
        break;

        case "sold":

        echo " <h2> these product is soldout! </h2> <br>";

        $con=mysqli_connect('localhost','root','','imarketdatabase');
        $results = mysqli_query ($con,'SELECT * FROM products WHERE productStatus LIKE "soldOut"');
        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'

            <div class ="proBox1">

            <div class="PHOTOHOVER">
             <img src="productImages/' .$row['productImage']. '" class="image" height:80%">
             <div class="middle">
              <div class="text11">
                      <form class="buttons1" method="POST" action="productEdit1.php">
                        <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                        <input class="btn btn-warning" type="submit" value="Edit">
                      </form>
                    </br>
                      <form class="buttons1" method="POST" action="productDelete.php">
                          <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                          <input class="btn btn-danger" type="submit" value="Delete">
                       </form>
                      </div>
             </div>
            </div>

            <br>
            <b><a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>
            ';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);
        	break;

        case "sale":

        echo " <h2> these product are available and on sale! </h2> <br>";

        $con=mysqli_connect('localhost','root','','imarketdatabase');
        $results = mysqli_query ($con,'SELECT * FROM products WHERE productStatus LIKE "onSale" AND user_ID= "'.$glasstype.'"');
        if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
          echo'

            <div class ="proBox1">

            <div class="PHOTOHOVER">
             <img src="productImages/' .$row['productImage']. '" class="image" height:80%">
             <div class="middle">
              <div class="text11">
                      <form class="buttons1" method="POST" action="productEdit1.php">
                        <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                        <input class="btn btn-warning" type="submit" value="Edit">
                      </form>
                    </br>
                      <form class="buttons1" method="POST" action="productDelete.php">
                          <input type="hidden" name="PNAME" value="'.$row['productName'].'" />
                          <input class="btn btn-danger" type="submit" value="Delete">
                       </form>
                      </div>
             </div>
            </div>

            <br>
            <b><a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b> <br>
            '.$row['shortDes'].' <br />
          ₱ '.$row['price'].'
            <br>

            </div>
            ';
        }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);
        	break;

    default:

}
?>
