<?php
  session_start();
  require_once('connector.php');

  $email=$_POST['email'];
  $firstName=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $contactNum=$_POST['contactNum'];
  $birthDate=$_POST['birthDate'];

  if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
    echo "<script>alert('Only letters and white space allowed.');history.back();</script>";
    exit;
  }

  if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
    echo "<script>alert('Only letters and white space allowed.');history.back();</script>";
    exit;
  }

  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Email is Invalid.');history.back();</script>";
  } else {
    $stmt = $dbconn->prepare('UPDATE users SET firstName=?, lastName=?, contactNum=?, birthDate=? WHERE email=?');
    $stmt->bind_param('sssss', $firstName, $lastName, $contactNum, $birthDate, $email);

    if($stmt->execute()) {
      echo "<script>window.alert('Account updated.');</script>";
      echo "<script>location.href='accountSetting.php';</script>";
    } else {
      echo mysqli_error($dbconn);
    }
    $stmt->close();
    $dbconn->close();
  }
?>
