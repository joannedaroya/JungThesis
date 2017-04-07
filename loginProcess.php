<?php

	session_start();
	require_once('connector.php');

	$userType=$_POST['userType'];
	$userName=$_POST['email'];
	$password=$_POST['password'];

	if(!filter_var($userName, FILTER_VALIDATE_EMAIL)) {
      	echo "<script>alert('Email is Invalid.');history.back();</script>";
   		exit;
    }

	if ($userType == "student") {
		$stmt = $dbconn->prepare('SELECT * FROM users WHERE email = ? AND password = ? AND userType = ?');
		$stmt->bind_param('sss', $userName, $password, $userType);
		$stmt->execute();
		$result = $stmt->get_result();

		if($rows = $result->fetch_assoc()){
			$_SESSION['email']=$rows['email'];
			$_SESSION['password']=$rows['password'];
			$_SESSION['userType']=$rows['userType'];
			echo"<script>location.href='index.php';</script>";
			echo mysqli_error($dbconn);
		}else{
			echo"<script>window.alert('Email Address/Password/Usertype Incorrect');</script>";
			echo"<script>location.href='index.php';</script>";
		}
	}

	else if ($userType == "employee") {
		$stmt = $dbconn->prepare('SELECT * FROM users WHERE email = ? AND password = ? AND userType = ?');
		$stmt->bind_param('sss', $userName, $password, $userType);
		$stmt->execute();
		$result = $stmt->get_result();

		if($rows = $result->fetch_assoc()){
			$_SESSION['email']=$rows['email'];
			$_SESSION['password']=$rows['password'];
			$_SESSION['userType']=$rows['userType'];
			echo"<script>location.href='index.php';</script>";
		}else{
			echo"<script>window.alert('Email Address/Password/Usertype Incorrect');</script>";
			echo"<script>location.href='index.php';</script>";
			echo mysqli_error($dbconn);
		}
	}

	else if ($userType == "admin") {
		$stmt = $dbconn->prepare('SELECT * FROM users WHERE email = ? AND password = ? AND userType = ?');
		$stmt->bind_param('sss', $userName, $password, $userType);
		$stmt->execute();
		$result = $stmt->get_result();

		if($rows = $result->fetch_assoc()){
			$_SESSION['email']=$rows['email'];
			$_SESSION['password']=$rows['password'];
			$_SESSION['userType']=$rows['userType'];
			echo"<script>window.alert('Welcome Administrator :)');</script>";
			echo"<script>location.href='index.php';</script>";
		}else{
			echo"<script>window.alert('Email Address/Password/Usertype Incorrect');</script>";
			echo"<script>location.href='index.php';</script>";
			echo mysqli_error($dbconn);
		}
	}
?>
