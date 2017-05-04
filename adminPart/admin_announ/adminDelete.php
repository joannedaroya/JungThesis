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


if(isset($bNo)) {
				$sql = 'select count(board_no) as cnt from announcement where board_no = ' . $bNo;
				$result = $dbconn->query($sql);
				$row = $result->fetch_assoc();
				if(empty($row['cnt'])) {
		?>
    <script>
			alert('The Post is not exist.');
			history.back();
		</script>
		<?php
			exit;
				}

				$sql = 'select board_title from announcement where board_no = ' . $bNo;
				$result = $dbconn->query($sql);
				$row = $result->fetch_assoc();
		?>

<div class="container">
	<div class="row">

	    <div class="col-md-8 col-md-offset-2">

    		<h1>DELETE POST</h1>

        <form action="admindelete_update.php" method="POST">
				<input type="hidden" name="bno" value="<?php echo $bNo?>">
				<table>
					<caption class="readHide">ANNOUNCEMENT POST DELETE</caption>

					<tbody>
						<tr>
							<th scope="row">POST TITLE</th>
							<td><?php echo $row['board_title']?></td>
						</tr>
						<tr>
							<th scope="row"><label for="bPassword">PASSWORD : </label></th>
							<td><input type="password" name="bPassword" id="bPassword"></td>
						</tr>
					</tbody>
				</table>

				<div class="btnSet">
					<button type="submit" class="btn btn-warning">DELETE</button>
					<a href="adminAnnoun.php" class="btn btn-info" role="button">LIST</a>
				</div>
			</form>

      <?php
		//$bno is not available = error
		} else {
	?>
		<script>
			alert('This post is not available');
			history.back();
		</script>
	<?php
			exit;
		}
	?>
		</div>

	</div>
</div>








  	</div>

    <?php include 'ad_an_footer.php';?>


    </body>

    </html>
