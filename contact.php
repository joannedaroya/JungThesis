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
    <link rel="stylesheet" href="css/design.css" />

</head>

<body>




      <?php include ('mainheader.php'); ?>

        <!--First-->
    <div class="container-fluid">




        <div class="container">
            <h2>Contact Us</h2><br/>
            <div class="row">
                <div class="col-md-5">
                    <form>
                        <div class="control-group form-group">
                            <label>Full Name</label><br/>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="control-group form-group">
                            <label>Email Address</label><br/>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="control-group form-group">
                            <label>Message</label><br/>
                            <textarea rows="10" cols="54" id="message" name="message" maxlength="999"></textarea>
                        </div>
                        <button type="submit">Send</button> &nbsp;&nbsp;
                        <button type="reset">Clear</button>
                    </form>
                </div>

                <div class="col-md-7" id="contact">
                    <p>324 Se. Gil Puyat Avenue<br/>Bel-air, Makati City</p>
                    <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>: 09167737988<br/>
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>: <a href="#">sample@inquiry.com</a><br/><br/>
                    <iframe width="80%" height="270px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.8306954511957!2d121.01845665817463!3d14.561345997456918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTTCsDMzJzQwLjkiTiAxMjHCsDAxJzEwLjQiRQ!5e0!3m2!1sen!2sph!4v1481111170468"></iframe>
                </div>
            </div>
            <!-- div row -->
            <br/><br/>
            <hr>
        </div>
        <!-- div container for content -->

    </div>
    <!--div container -->
    <?php include('footer.php'); ?>


</body>

</html>
