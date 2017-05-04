<?php
  session_start();
  require_once('connector.php');

  $userID=$_POST['userID'];
  $houseNum=$_POST['houseNum'];
  $street=$_POST['street'];
  $bldg=$_POST['building'];
  $subd=$_POST['subd'];
  $brgy=$_POST['brgy'];
  $city=$_POST['city'];
  $province=$_POST['province'];
  $zipCode=$_POST['zipCode'];

  $sql = $dbconn->prepare('SELECT * FROM users WHERE user_ID=?');
  $sql->bind_param('i', $userID);
  $sql->execute();
  $result = $sql->get_result();
  if($rows = $result->fetch_assoc()) {
    $stmt = $dbconn->prepare('SELECT * FROM address WHERE user_ID = ?');
    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    if($rows = $result->fetch_assoc()) {
      $querr = $dbconn->prepare('UPDATE address SET houseNum=?, street=?, building=?, subdivision=?, barangay=?, city=?, province=?, zipCode=? WHERE user_ID=?');
      $querr->bind_param('sssssssii', $houseNum, $street, $bldg, $subd, $brgy, $city, $province, $zipCode, $userID);
      $querr->execute();

      echo "<script>window.alert('Account updated.');</script>";
      echo "<script>location.href='accountSetting.php';</script>";
    } else {
      $querr2 = $dbconn->prepare('INSERT INTO address (user_ID, houseNum, street, building, subdivision, barangay, city, province, zipCode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
      $querr2->bind_param('isssssssi', $userID, $houseNum, $street, $bldg, $subd, $brgy, $city, $province, $zipCode);
      $querr2->execute();

      echo "<script>window.alert('Account updated.');</script>";
      echo "<script>location.href='accountSetting.php';</script>";
    }
  } else {
    echo "<script>alert('Email invalid.');history.back();</script>";
  }



?>
