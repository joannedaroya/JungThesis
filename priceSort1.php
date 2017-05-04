<?php


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


        ?>