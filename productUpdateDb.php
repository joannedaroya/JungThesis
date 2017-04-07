<?php

  require_once('connector.php');



  $porginal = $_POST['hiddenPname'];
  //$target_dir = "uploads/"; unang directory
  $target_dir = "productImages/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  $ptitle = $_POST['title'];
  $pcategory = $_POST['category'];

  $pprice = $_POST['price'];
  setlocale(LC_MONETARY,"en_US");            //money shit dont touch

  $pdes = $_POST['description'];
  $pqty = $_POST['qty'];

  $photo=$_FILES['fileToUpload']['name'];    //dont touch used to upload image property of khelly

  date_default_timezone_set('Asia/Manila');  // creating date_created
  $createdate =date('F j, Y g:i:a  ');



  $stmt = $dbconn->prepare('SELECT * FROM products WHERE productName = ?');
  $stmt->bind_param('s', $porginal);
  $stmt->execute();
  $result = $stmt->get_result();
  if($rows = $result->fetch_assoc()){
    $stmt2 = $dbconn->prepare('UPDATE products SET productName = ?, productCategory = ?, price = ?, shortDes = ?, productImage = ?, QTY = ?, date_update = ? WHERE productName = ?');
    $stmt2->bind_param('ssdsisss', $ptitle, $pcategory, $pprice, $pdes, $photo, $pqty, $createdate, $porginal);
    $stmt2->execute();

    echo"<script>window.alert('Product Updated Successfully !');</script>";
    echo"<script>location.href='productView.php';</script>";

  }else{

    echo "<script>alert('Update Failed Please, try again !');</script>";
    echo"<script>location.href='productView.php';</script>";
  }
?>
