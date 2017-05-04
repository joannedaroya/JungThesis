<?php
  session_start();
  require_once('connector.php');

  $email=$_POST['email'];
  $password=$_POST['password'];
  $userStatus = 0;

  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      	echo "<script>alert('Email is Invalid.');history.back();</script>";
   		exit;
  }

  $sql = $dbconn->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
  $sql->bind_param('ss', $email, $password);
  $sql->execute();
  $result = $sql->get_result();

  if($rows = $result->fetch_assoc()) {
    $stmt = $dbconn->prepare('UPDATE users SET userStatus = ? WHERE email = ?');
    $stmt->bind_param('is', $userStatus, $email);
    $stmt->execute();

    echo "<script>window.alert('Account deactivated.');</script>";
    session_destroy();
    echo "<script>location.href='index.php';</script>";
  } else {
    echo "<script>window.alert('Email Address/Password Incorrect.');</script>";
    echo "<script>location.href='deactivatePage.php';</script>";
  }
?>
