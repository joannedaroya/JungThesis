<?php
	require_once('../connector.php');

  //$_POST['boardno'] called
	if(isset($_POST['bno'])) {
		$bNo = $_POST['bno'];
	}

	//boardno non
	if(empty($bNo)) {
		$bID = $_POST['bID'];
		$date = date('Y-m-d H:i:s');
	}

  $bPassword = $_POST['bPassword'];
	$bTitle = $_POST['bTitle'];
	$bContent = $_POST['bContent'];


if(isset($bNo)) {

	$sql = 'select count(board_password) as cnt from announcement where board_password=password("' . $bPassword . '") and board_no = ' . $bNo;
	$result = $dbconn->query($sql);
	$row = $result->fetch_assoc();


		if($row['cnt']) {
			$sql = 'update announcement set board_title="' . $bTitle . '", board_content="' . $bContent . '" where board_no = ' . $bNo;
			$msgState = 'Fix';
		} else {
				$msg = 'Wrong Password Please Try again.';
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
	$sql = 'insert into announcement (board_no, board_title, board_content, board_date, board_hit, board_admin, board_password) values(null, "' . $bTitle . '", "' . $bContent . '", "' . $date . '", 0, "' . $bID . '", password("' . $bPassword . '"))';
	$msgState = 'Post';
}

if(empty($msg)) {
	$result = $dbconn->query($sql);
	if($result) {
		$msg = "Announcement Succefully posted !";

		require '../PHPMailer/PHPMailerAutoload.php';
		$stmt = 'SELECT * FROM users WHERE userStatus=1';
		$result = @mysqli_query($dbconn, $stmt);

		function sendEmail($email) {
			$mail = new PHPMailer;

			$mail->isSMTP();                                   // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                            // Enable SMTP authentication
			$mail->Username = 'imarketbns.team@gmail.com';          // SMTP username
			$mail->Password = 'igotyoubaby'; // SMTP password
			$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                 // TCP port to connect to

			$mail->setFrom('imarketbns.team@gmail.com', 'iMARKET B&S');
			$mail->addReplyTo('imarketbns.team@gmail.com', 'iMARKET B&S');
			$mail->addAddress($email);   // Add a recipient
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			$mail->isHTML(true);  // Set email format to HTML

			$mail->Subject = "iMARKET Admin Announcement";

			$bodyContent = "<h2>Greetings from iMARKET!</h2>";
			$bodyContent .= "<p>There is a new announcement posted in iMARKET. Check it out by clicking the link below:</p>";
			$bodyContent .= "http://localhost/THESIS/announcement.php";

			$mail->Body = $bodyContent;

			if(!$mail->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				header("Location: $replaceURL");
			}
		}

		if($result) {
			while($row = @mysqli_fetch_array($result)) {
				$email = $row['email'];
				sendEmail($email);
			}
		}




    if(empty($bNo)) {
		$bNo = $dbconn->insert_id;
  }
    $replaceURL = './admin_announ/adminAnnoun_view.php?bno=' . $bNo;
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
