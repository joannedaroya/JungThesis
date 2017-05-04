<?php

  require_once('connector.php');


  $porginal = $_POST['PNAME'];
  $pStats = 0;


  $stmt = $dbconn->prepare('SELECT * FROM products WHERE productName = ?');
  $stmt->bind_param('s', $porginal);
  $stmt->execute();
  $result = $stmt->get_result();
  if($rows = $result->fetch_assoc()){
    $stmt2 = $dbconn->prepare('UPDATE products SET productActive = ? WHERE productName = ?');
    $stmt2->bind_param('is', $pStats, $porginal);
    $stmt2->execute();

    echo "<script>alert('product deleted.');</script>";
    echo"<script>location.href='productView.php';</script>";

  }else{

    echo "<script>alert('Update Failed.');</script>";
    echo"<script>location.href='productView.php';</script>";

  }
?>
