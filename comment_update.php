<?php
	require_once('connector.php');

	$bNo = $_POST['productID'];

	$coId = $_POST['users'];
	$coContent = $_POST['comment'];
	$rate = $_POST['rate'];
	$date = date('Y-m-d H:i:s');
	$sellerate = $_POST['ratese'];
	$sellerid = $_POST['sellerid'];

	$query = $dbconn->prepare('INSERT INTO rating (rate, user_ID, product_comment, product_ID, product_date, seller_id, seller_rate) VALUES (?, ?, ?, ?, ?, ?, ?)');
	$query->bind_param('issisii', $rate, $coId, $coContent, $bNo, $date, $sellerid, $sellerate);
	$query->execute();




	$coNo = $dbconn->insert_id;

	$sql = 'update rating set reply_id = id where id = ' . $coNo;

	$result = $dbconn->query($sql);
	if($result) {
?>
	<script>
		alert('Comment Successfully uploaded');
		location.replace("./productPage1.php?pname=<?php echo $bNo?>");
	</script>
<?php
	}else{echo "error";}
?>
