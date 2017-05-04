<?php
	require_once("../../connector.php");

	//$_POST['bno'] exist or not
	if(isset($_POST['bno'])) {
		$bNo = $_POST['bno'];
	}

	$bPassword = $_POST['bPassword'];

// Post Delete
if(isset($bNo)) {
	//Check password
	$sql = 'select count(board_password) as cnt from announcement where board_password=password("' . $bPassword . '") and board_no = ' . $bNo;
	$result = $dbconn->query($sql);
	$row = $result->fetch_assoc();

	//query delete
	if($row['cnt']) {
		$sql = 'delete from announcement where board_no = ' . $bNo;
	//if its wrong
	} else {
		$msg = 'Your password is incorrect. Please try again !';
	?>
		<script>
			alert("<?php echo $msg?>");
			history.back();
		</script>
	<?php
		exit;
	}
}

	$result = $dbconn->query($sql);

//query work
if($result) {
	$msg = 'The post delete successfully !';
	$replaceURL = 'adminAnnoun.php';
} else {
	$msg = 'Oops. Something went wrong. Please try again !';
?>
	<script>
		alert("<?php echo $msg?>");
		history.back();
	</script>
<?php
	exit;
}


?>
<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>
