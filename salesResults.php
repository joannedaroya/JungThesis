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
    <link rel="stylesheet" href="css/profile.css" />
    <link rel="stylesheet" href="css/productsPages.css" />
    <link rel="stylesheet" href="css/hover.css" />


    <script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","orderInfo1.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>


    </head>

<body>

  <?php include ('mainheader.php');
        if(!$_SESSION['email']){
            header("Location: login.php", 404);
            exit;}
   ?>

    <!--First-->

  <div class="container">
    <h2>My profile</h2><br/>
    <div class="row">
      <div class="col-md-3">
        <ul class="user-side-menu">
          <div class="user-side-menu_bg">
            <div class="user-side-menu_name">
              <?php
                $email = $_SESSION['email'];
                $query = $dbconn->query("SELECT * FROM users WHERE email='$email'");
                if($query->num_rows > 0){
                  while($row = $query->fetch_assoc()) {
                    echo $row['firstName']. " " .$row['lastName'];
                  }
                }
              ?>
            </div>
          </div>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link" href="accountSetting.php">
              <div class="user-side-menu_link-text">Account Settings</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link" href="#">
              <div class="user-side-menu_link-text">Notifications</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link" href="orderHistory.php">
              <div class="user-side-menu_link-text">My Orders</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link" href="productView.php">
              <div class="user-side-menu_link-text">My Products</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link-selected" href="mySales.php">
              <div class="user-side-menu_link-text">My Sales</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link" href="salesReport.php">
              <div class="user-side-menu_link-text">Sales Report</div>
            </a>
          </li>
          <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
            <a class="user-side-menu_link" href="productInventory.php">
              <div class="user-side-menu_link-text">Inventory System</div>
            </a>
          </li>
        </ul>
      </div>
    <div class="col-md-9">
    <div class="page-wrapper">


    <div class="divhehe">

    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">ALL</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">

    <h3> Here are list of products you have been sold </br>
         Click the transaction ID to view the specific sales transaction </h3>
          <hr>




          <form action="salesResults.php" method="GET">
           <input type="text" name="Search1" placeholder="order number">
           <input type="submit" value="Search"> </br> </br>
          </form>

                  </br> </br>

      <!-- just testing will going to recode -->
      <?php $glasstype = $_SESSION['user_ID'] ?>


     <?php

    $query = $_GET['Search1'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imarketdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT O.order_process, O.created, O.total_price,
        P.productName, P.productCategory, P.price, P.product_ID, I.product_ID, I.order_id
        FROM orders O
        JOIN order_items I ON O.id = I.order_id
        JOIN products P ON P.product_ID = I.product_ID
        WHERE I.Seller_ID = '$glasstype'
        AND I.order_id ='$query' ";



$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


        echo "<h2> Here are the results for Order Number: " . $row["order_id"]. " </h2>";
        echo "id: " . $row["order_id"]. " - Name: " . $row["productName"]. " " . $row["total_price"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>


    </div>

  </div>



   </div>
   </div>
   </div>
   </div>
    </div>
  <br/><hr style="width:80%;"><br/>

    <?php include 'footer.php';?>

</body>
</html>
