<?php

//putek gumana ka rin naiiyak na ako huhuhu rak na ituh

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imarketdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



  // prepare and bind time fck


  //$target_dir = "uploads/"; unang directory
  $target_dir = "productImages/"; // dont touch used to upload image property of khelly
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);  // dont touch used to upload image property of khelly

  $ptitle = $_POST['title'];
  $powner = $_POST['ownerEmail'];
  //$pcategory = $_POST['category'];

  $pcategory = $_POST['category'];

  //pricepart dont touch
  $pprice = $_POST['price'];
  setlocale(LC_MONETARY,"en_US");            //money shit dont touch

  $pdes = $_POST['description'];
  $pstats = 1;
  $pqty = $_POST['qty'];

  $photo=$_FILES['fileToUpload']['name'];    //dont touch used to upload image property of khelly

  date_default_timezone_set('Asia/Manila');  // creating date_created
  $createdate =date('F j, Y g:i:a  ');          // date_created format




  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
      echo"<script>location.href='productAdd.php';</script>";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, you forgot to upload the image !";
    echo"<script>location.href='productAdd.php';</script>";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

      $stmt = $conn->prepare("INSERT INTO products (productName, owner_email, price, shortDes, productCategory, productImage, QTY, date_created, productStatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

      $stmt->bind_param("ssdsssisi", $ptitle, $powner, $pprice, $pdes, $pcategory, $photo, $pqty, $createdate, $pstats);

      $stmt->execute();
      $stmt->close();

      echo"<script>window.alert('Post uploaded Successfully !');</script>";
      echo"<script>location.href='productAdd.php';</script>";
			} else {
          echo"<script>window.alert('Sorry, there was an error uploading your file.');</script>";
		      echo"<script>location.href='index.php';</script>";
			}
		}




$conn->close();
?>
