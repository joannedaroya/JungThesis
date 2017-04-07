<?php
	require_once('../connector.php');

  //$_POST['boardno'] called
	if(isset($_POST['boardnum'])) {
		$boardNum = $_POST['boardnum'];
    $msg = 'wrong password';
    ?>
  		<script>
  			alert("<?php echo $msg?>");
  			history.back();
  		</script>
  	<?php
	}

	//boardno non
	if(empty($boardNum)) {
    $bUser=$_POST['boardUser'];
  	$date = date('Y-m-d H:i:s');
	}


	$bTitle = $_POST['boardTitle'];
	$bContent = $_POST['boardContent'];
  $bPassword = $_POST['boardPassword'];

if(isset($boardNum)) {


  //수정 할 글의 비밀번호가 입력된 비밀번호와 맞는지 체크
	$sql = 'SELECT count(boardPass) as cnt from announcement WHERE boardPass=password("' . $bPassword . '") and boardNum = ' . $boardNum;
	$result = $dbconn->query($sql);
	$row = $result->fetch_assoc();

	//비밀번호가 맞다면 업데이트 쿼리 작성
	if($row['cnt']) {
		$sql = 'UPDATE announcement set boardTitle="' . $bTitle . '", boardContent="' . $bContent . '" where boardNum = ' . $boardNum;
		$msgState = 'Fixed';
	//틀리다면 메시지 출력 후 이전화면으로
	} else {
		$msg = 'wrong password';
	?>
		<script>
			alert("<?php echo $msg?>");
			history.back();
		</script>
	<?php
		exit;
	}

  //post upload
} else {

	$sql = 'INSERT INTO announcement (boardNum, boardTitle, boardContent, boardUser, boardDate, boardHit) VALUES (null, "' . $bTitle . '", "' . $bContent . '", "' . $bUser . '", "' . $date . '", 0)';
}

if(empty($msg)) {
	$result = $dbconn->query($sql);
	if($result) {
		$msg = "Announcement Succefully posted !";
    if(empty($bNo)) {
		$boardNum = $dbconn->insert_id;
  }
    $replaceURL = './adminAnnoun_view.php?boardNum=' . $boardNum;
	} else {
		$msg = "The Server is busy. Please try again later !";
?>
		<script>
			alert("<?php echo $msg?>");
      history.back();
		</script>
<?php
exit;
	}
}
?>
<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>
