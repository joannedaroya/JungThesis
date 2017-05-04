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
  $pgender=$_POST['genderCategory'];

  $pprice = $_POST['price'];
  setlocale(LC_MONETARY,"en_US");            //money shit dont touch

  $pdes = $_POST['description'];
  $pqty = $_POST['qty'];

  $photo=$_FILES['fileToUpload']['name'];    //dont touch used to upload image property of khelly

  date_default_timezone_set('Asia/Manila');  // creating date_created
  $createdate =date('F j, Y g:i:a  ');



  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
      echo"<script>location.href='productAdd.php';</script>";
      $uploadOk = 0;
  }

    if ($uploadOk == 0) {
    echo "Sorry, you forgot to upload the image !";
    echo"<script>location.href='productAdd.php';</script>";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


  $stmt = $dbconn->prepare('SELECT * FROM products WHERE productName = ?');
  $stmt->bind_param('s', $porginal);
  $stmt->execute();
  $result = $stmt->get_result();

  if($rows = $result->fetch_assoc()){
    $stmt2 = $dbconn->prepare('UPDATE products SET productName = ?, productCategory = ?, genderCategory = ?, price = ?, shortDes = ?, productImage = ?, p_qty = ?, date_update = ? WHERE productName = ?');
    $stmt2->bind_param('sssdssiss', $ptitle, $pcategory, $pgender, $pprice, $pdes, $photo, $pqty, $createdate, $porginal);
    $stmt2->execute();

    echo"<script>window.alert('Product Updated Successfully !');</script>";
    echo"<script>location.href='productView.php';</script>";

  }else{

    echo "<script>alert('Update Failed Please, try again !');</script>";
  }
 }
 }

$dbconn->close();

?>
