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
    <script>
    function goBack() {
      window.history.back();
    }
    </script>

</head>

<body>

    <?php include('ad_an_header.php'); ?>




<!--Code Starts Here-->

<?php
//$_GET['boardNum'] setting - Jung
if(isset($_GET['bno'])) {
  $bNo = $_GET['bno'];
}

if(isset($bNo)) {
  $sql = 'select board_title, board_content, board_admin from announcement where board_no = ' . $bNo;
  $result = $dbconn->query($sql);
  $row = $result->fetch_assoc();
}
?>

<div class="container">
	<div class="row">

	    <div class="col-md-8 col-md-offset-2">

    		<h1>Create post</h1>

    		<form action="adminwrite_update.php" method="POST">

          <?php
				      if(isset($bNo)) {
					           echo '<input type="hidden" name="bno" value="' . $bNo . '">';
				               }
				?>
        <label for="bID"></label>
          <input type="hidden" class="form-control" name="bID" value="admin">


    		    <div class="form-group">
    		        <label for="bTitle">Title <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="bTitle" id="bTitle"  value="<?php echo isset($row['board_title'])?$row['board_title']:null?>" />
    		    </div>

            <div class="form-group">
    		        <label for="bPassword">Password <span class="require">*</span></label>
    		        <input type="password" class="form-control" name="bPassword" id="bPassword"  />
    		    </div>

    		    <div class="form-group">
    		        <label for="boardContent">Description</label>
    		        <textarea rows="5" class="form-control" name="bContent" id="bContent" ><?php echo isset($row['board_content'])?$row['board_content']:null?></textarea>
    		    </div>

    		    <div class="form-group">
    		        <p><span class="require">*</span> - required fields</p>
    		    </div>

    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            <?php echo isset($bnum)?'Rewrite':'Write'?>
    		        </button>
    		        <button class="btn btn-default" onclick="goBack()">
    		            <a href="adminAnnoun.php">Cancel</a>
    		        </button>
    		    </div>

    		</form>
		</div>

	</div>
</div>








  	</div>
    <!--Footers-->
  <?php include 'ad_an_footer.php';?>


    </body>

    </html>
