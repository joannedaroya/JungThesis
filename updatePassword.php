<?php
	session_start();
	require_once('connector.php');

	$userID=$_POST['userID'];
	$oldPassword=$_POST['oldPassword'];
	$newPassword=$_POST['newPassword'];
	$confirmpw=$_POST['confirmpw'];

	$stmt = $dbconn->prepare('SELECT * FROM users WHERE user_ID = ? AND password = ?');
	$stmt->bind_param('is', $userID, $oldPassword);
	$stmt->execute();
	$result = $stmt->get_result();

	if($rows = $result->fetch_assoc()){
		if($newPassword == $confirmpw){
			$stmt2 = $dbconn->prepare('UPDATE users SET password =? WHERE user_ID = ?');
			$stmt2->bind_param('si', $newPassword, $userID);
			$stmt2->execute();

			echo "<script>window.alert('Password updated.');</script>";
			echo"<script>location.href='accountSetting.php';</script>";
		}else{
			echo "<script>alert('Password Dont Match.');history.back();</script>";
		}
	}else{
		header("Content-Type: text/html; charset=UTF-8");
		echo "<script>alert('Old password incorrect.');history.back();</script>";
		$stmt->close();
		exit;
	}
?>
