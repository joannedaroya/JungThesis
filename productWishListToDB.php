<?php require_once('connector.php');
    session_start();

    if(!isset($_SESSION['email'])){
     echo '<script type="text/javascript">alert("Log-in to view the product !");window.location.href="login.php"
        </script>';
     exit;}
    ?>



<?php

	$user = $_SESSION['user_ID'];
    $Pname = $_POST['pname'];
    $active = 1;

    date_default_timezone_set('Asia/Manila');  /// creating date_created
    $newdate =date('F j, Y g:i:a  ');          /// date_created format



    $query = "INSERT INTO wishlist (user_ID, productName, date_created, wishListActive)
	values ('" . $user . "','" . $Pname . "','" . $newdate . "','" . $active . "')";


	if(@mysqli_query($dbconn, $query)){
		echo "<script>location.href='index_wishlist.php';</script>";
		echo "Product Added to your wishlist whohohoo!";
	}else {
		echo mysqli_error($dbconn);
	}
?>
