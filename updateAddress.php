<?php
  session_start();
  require_once('connector.php');

  $email=$_SESSION['email'];
  $houseNum=$_POST['houseNum'];
  $street=$_POST['street'];
  $bldg=$_POST['building'];
  $subd=$_POST['subd'];
  $brgy=$_POST['brgy'];
  $city=$_POST['city'];
  $province=$_POST['province'];
  $zipCode=$_POST['zipCode'];

  $sql = $dbconn->prepare('SELECT * FROM users WHERE email=?');
  $sql->bind_param('s', $email);
  $sql->execute();
  $result = $sql->get_result();
  if($rows = $result->fetch_assoc()) {
    $stmt = $dbconn->prepare('SELECT * FROM address WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($rows = $result->fetch_assoc()) {
      $querr = $dbconn->prepare('UPDATE address SET houseNum=?, street=?, building=?, subd=?, brgy=?, city=?, province=?, zipCode=? WHERE email=?');
      $querr->bind_param('sssssssis', $houseNum, $street, $bldg, $subd, $brgy, $city, $province, $zipCode, $email);
      $querr->execute();

      echo "<script>window.alert('Account updated.');</script>";
      echo "<script>location.href='accountSetting.php';</script>";
    } else {
      $querr2 = $dbconn->prepare('INSERT INTO address (email, houseNum, street, building, subd, brgy, city, province, zipCode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
      $querr2->bind_param('sssssssis', $email, $houseNum, $street, $bldg, $subd, $brgy, $city, $province, $zipCode);
      $querr2->execute();

      echo "<script>window.alert('Account updated.');</script>";
      echo "<script>location.href='accountSetting.php';</script>";
    }
  } else {
    echo "<script>alert('Email invalid.');history.back();</script>";
  }



?>
