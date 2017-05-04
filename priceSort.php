<?php

  //if(isset($_POST['submit'])){
  //if(isset($_GET['user-entry'])){

  //if(preg_match("/^[a-zA-Z0-9]+/", $_POST['user-entry'])){

  //$short = $_POST['categoryA'];

  $cob=$_POST['user-entry'];
  $pricerange=$_POST['pricerangeA'];


  $con=mysqli_connect('localhost','root','','imarketdatabase');


  //connect to the database
  $con=mysqli_connect('localhost','root','','imarketdatabase');

  //-select the database to use
 

  if($pricerange == 0) $pricerange = 1;

  switch ($pricerange) {
  case 1  :  $pricerange = " where price BETWEEN 100.00 AND 200.00 ";  break; 
  case 2  :  $pricerange = " where price BETWEEN 200.00 AND 500.00 ";  break;  
  case 3  :  $pricerange = " where price BETWEEN 500.00 AND 1000.00 ";  break;   
  case 4  :  $pricerange = " where price BETWEEN 1000.00 AND 10000.00 ";  break;    
  case 5  :  $pricerange = " where price > 100.00 ";  break;           
  }

  //-query the database table

  //-run  the query against the mysql query function
 $results = mysqli_query ($con,' SELECT  *
    FROM products WHERE price =  ');

  //-create  while loop and loop through result set

 if($results->num_rows > 0) {
        while($row = mysqli_fetch_array($results)){
    $ProductName=$row['productName'];
    $ShortDes=$row['shortDes'];
    $Price=$row['price'];
 

    //-display the result of the array
echo  "<ul>\n";
echo  "<li>" . $ProductName . "</li>\n";
echo  "<li>" . $ShortDes . "</li>\n";
echo  "<li>" . $Price . "</li>\n";

//echo  "<li>" . "<a href=" . $Price .  ">" . "$" . $Price . "</a></li>\n";

echo  "</ul>";
   }
      } else {
        echo "<h3>No products listed.</h3><br/>";
        echo "<a href='productAdd.php' class='btn btn-primary'>Add new product</a>";
      }
        mysqli_close($con);

?>