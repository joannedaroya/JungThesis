<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
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


<?php include ('mainheader.php'); ?>

<!-- Code Starts Here -->

        <div class="container-fluid">
            <br><br><br><br>

            <div class="title" id="title1">
                <h2>Retrieve your password</h2>
            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <form class="form" id="form1" method="post" action="forgotpwProcess.php">
                        <br>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control input-lg" placeholder="example: user@gmail.com" name="email">
                        </div>

                        <label class="radio"><input type="radio" name="userType" id="userType" value="student">Student</label>
                        <label class="radio"><input type="radio" name="userType" id="userType" value="employee">Employee</label>

                        <div class="form-group">
                            <div>
                                <button class="btn btn-primary" name="submit" type="submit">
             Send
            </button>
                                <button type="reset" class="btn btn-default">Clear</button> <br/><br/>
                                <span><a href="login.php">Already have an account? Login Here</a></span>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="col-md-6">
                    <h1> Dont have account yet?</h1>
                    <h3> Register so you can: </h3> <br>
                    <p> Manage your iACADAMIT account </p>
                    <p> Sell your shit / Buy your shit </p>
                    <p> Add products to your whishlist </p>
                    </br>

                    <div class="form-group">
                        <a href="signUp.php" class="btn btn-info" role="button">Sign Up!</a>
                    </div>
                    </form>

                </div>
            </div><br/>
            <hr/><br/>
        </div>
    <?php include 'footer.php';?>

</body>

</html>
