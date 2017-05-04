
<link rel="stylesheet" href="css/design.css" />
<link rel="stylesheet" href="css/profile.css" />
<link rel="stylesheet" href="css/productsPages.css" />
<link rel="stylesheet" href="css/hover.css" />

<?php

$short = $_POST['ShortA'];

switch ($short) {
	case "high":

	   $querry = 'SELECT *
               FROM wishlist
               LEFT JOIN products
               ON wishlist.productName = products.productName
               WHERE wishlist.wishListActive=1
               ORDER BY products.price DESC ';

              $response = @mysqli_query($dbconn, $querry);

              if($response) {

                $rowcount=mysqli_num_rows($response);
                printf(" You have %d Items in your wishlist.\n",$rowcount);

                echo "<table class='table'>";
                //echo "<tr><td> Brand Name </td><td> Brand Description </td><td> Brand Image </td>";

                echo "<thead>
                                        <tr>
                                            <th></th>
                                            <th>Product Name</th>
                                            <th></th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                      ";

               while ($row = @mysqli_fetch_array($response)) {
                echo "<tr><td>";

                echo '<img src="productImages/' .$row['productImage']. '" width="70" height="70"> </td><td>';
                echo '<b><a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b></td><td>';
                echo $row['shortDes'] . '</td><td>';
                echo $row['price'] . '</td><td>';
                echo $row['qty'] . '</td><td>';


                echo '
                  <form method="POST" action="#">
                  <input type="hidden" name="idtest" value="" />
                  <input class="btn btn-info" type="submit" value="Add to Cart">
                  </form>
                  </td><td>
                  <form method="POST" action="#">
                  <input type="hidden" name="idtest" value="" />
                  <input class="btn btn-warning" type="submit" value="X">
                  </form></td><td> ';


             }
            echo "</table>";

           } else {
            echo "No records to display from Product Database";
           }

            break;

            case "low":

	   $querry = 'SELECT *
               FROM wishlist
               LEFT JOIN products
               ON wishlist.productName = products.productName
               WHERE wishlist.wishListActive=1
               ORDER BY products.price ASC';

              $response = @mysqli_query($dbconn, $querry);

              if($response) {

                $rowcount=mysqli_num_rows($response);
                printf(" You have %d Items in your wishlist.\n",$rowcount);

                echo "<table class='table'>";
                //echo "<tr><td> Brand Name </td><td> Brand Description </td><td> Brand Image </td>";

                echo "<thead>
                                        <tr>
                                            <th></th>
                                            <th>Product Name</th>
                                            <th></th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                      ";

               while ($row = @mysqli_fetch_array($response)) {
                echo "<tr><td>";

                echo '<img src="productImages/' .$row['productImage']. '" width="70" height="70"> </td><td>';
                echo '<b><a href="productPage1.php?pname='.$row['product_ID'].'" style="color:black; text-decoration:none;";>'.$row['productName'].'</a></b></td><td>';
                echo $row['shortDes'] . '</td><td>';
                echo $row['price'] . '</td><td>';
                echo $row['qty'] . '</td><td>';


                echo '
                  <form method="POST" action="#">
                  <input type="hidden" name="idtest" value="" />
                  <input class="btn btn-info" type="submit" value="Add to Cart">
                  </form>
                  </td><td>
                  <form method="POST" action="#">
                  <input type="hidden" name="idtest" value="" />
                  <input class="btn btn-warning" type="submit" value="X">
                  </form></td><td> ';


             }
            echo "</table>";

           } else {
            echo "No records to display from Product Database";
           }

            break;


    default:
       echo "pakers di gumagana";
}
?>
