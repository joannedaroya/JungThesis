<!DOCTYPE html>
<html lang="en">

<head>
    <title>:::iMARKET:::</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../../css/adminOnly.css">
    <!--Javascript-->
    <script src="../../jsforAdmin/jsAdmin.js"></script>

</head>

<body>

    <?php include('ad_an_header.php'); ?>




<!--Code Starts Here-->

<?php

$bno = $_GET['bno'];
$sql = 'select board_title, board_content, board_date, board_hit, board_admin from announcement where board_no = ' . $bno;
$result = $dbconn->query($sql);
$row = $result->fetch_assoc();
?>

<article class="boardArticle">
<h3>Announcement Board</h3>
<div id="boardView">
<h3 id="boardTitle"><?php echo $row['board_title']?></h3>
<div id="boardInfo">
<span id="boardUser">Author: <?php echo $row['board_admin']?></span>
<span id="boardDate">Date: <?php echo $row['board_date']?></span>
<span id="boardHit">Hit: <?php echo $row['board_hit']?></span>
</div>
<div id="boardContent"><?php echo $row['board_content']?></div>
<div class="btnSet">
				<a href="./adminWrite.php?bno=<?php echo $bno?>">Write</a>
				<a href="./adminDelete.php?bno=<?php echo $bno?>">Delete</a>
				<a href="./adminAnnoun.php">List</a>
			</div>
</div>
</article>


  	</div>

    <?php include 'ad_an_footer.php';?>



    </body>

    </html>
