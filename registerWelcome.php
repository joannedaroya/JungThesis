<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/design.css" />

</head>

<body>

  <?php include ('mainheader.php');
   ?>


        <div class="container">
	         <div class="row text-center">
             <div class="col-sm-6 col-sm-offset-3">
               <br><br> <h2 style="color:#0fad00">Success</h2>
               <img src="image/reg_true.jpg">
               <h3>Dear, Sir/Maam</h3>
                <p style="font-size:20px;color:#5C5C5C;">Thank you for registering in iMARKET Buy&Sell. A link will be sent to your email to activate your account.</p>
                            <a href="login.php" class="btn btn-success">     Log-in      </a>
                            <br><br>
                          </div>

	                       </div>
</div>


           <?php include 'footer.php';?>


</body>

</html>
