<?php
  session_start();
  require_once('connector.php');

  $userID=$_POST['userID'];
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
    echo "<script>alert('Email is Invalid. Please try again !');history.back();</script>";
  } else {
    $stmt = $dbconn->prepare('UPDATE users SET email=?, firstName=?, lastName=?, contactNum=?, birthDate=? WHERE user_ID= ?');
    $stmt->bind_param('sssssi', $email, $firstName, $lastName, $contactNum, $birthDate, $userID);

    if($stmt->execute()) {
      echo "<script>window.alert('Your Account is updated.');</script>";
      echo "<script>history.back();</script>";
    } else {
      echo mysqli_error($dbconn);
    }
    $stmt->close();
    $dbconn->close();
  }
?>
