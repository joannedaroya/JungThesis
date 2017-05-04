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


</head>

<body>

  <?php include ('mainheader.php');
        if(!$_SESSION['email']){
            header("Location: login.php", 404);
            exit;}
   ?>

        <!--First-->

        <div class="container">
            <h2>Your Sales Report</h2><br/>
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
                            <a class="user-side-menu_link" href="mySales.php">
                                <div class="user-side-menu_link-text">My Sales</div>
                            </a>
                        </li>
                        <li class="user-side-menu_link-wrapper user-side-menu_link-wrapper-selected">
                            <a class="user-side-menu_link-selected" href="salesReport.php">
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




                        </div>



                    </div>
                </div>
            </div>
        </div>
        </div>
        <br/>
        <hr style="width:80%;"><br/>

        <?php include 'footer.php';?>

</body>

</html>
