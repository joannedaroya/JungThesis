<!DOCTYPE html>
<html lang="en">
<head>
  <title>iACADEMY Market</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

<!--CSS-->
<link rel="stylesheet" href="css/design.css"/>
</head>
<body>

<div class="container-fluid">


  <div class="row">
    <div class="col-md-12 text-right" id="header">
      <a href="index.php"><img src="image/logo.png" id="logo"></a>
            <nav>
                <a href="#" id="menu-icon"></a>
                <ul>
                  <?php if(isset($_SESSION['email'])){ ?>
                    <li><a href="#"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> SELL</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> NOTIFICATIONS</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ACCOUNT</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> WISHLIST</a></li>
                    <li><a <href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> CART</a></li>
                  <?php } else { ?>
            <!--         <li><a href="login.html">REGISTER</a></li>
                    <li><a href="login.html">LOGIN</a></li> -->
                  <?php } ?>
                </ul>
            </nav>

      <div class="col-md-12 col-xs-12" id="menu">
            <ul id="augh1">
              <!--   <li><a href="inindex.html">LATEST</a></li>
                <li><a href="inindex.html">CLOTHES</a></li> -->
                <li><a href="inindex.html">iACADEMY MERCH</a></li>
                <li><button type="button" class="btn btn-default btn-xs">Start Business</button><li>

              <!--  <li><a href="inindex.html">CUSTOMIZE</a></li> -->
                <li><a href="login.html">REGISTER</a></li>
                <li><a href="login.html">LOGIN</a></li>
                <li style="float:right"><input type="text" name="search" placeholder="Search"></li>
            </ul>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-6">
      <h2>Contact Us</h2><br/>
      <form>
        <div class="control-group form-group">
          <div class="controls">
            <label>Full Name</label>
            <input type="text" id="name" required>
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Email Address</label>
            <input type="email" id="email" required>
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Message</label>
            <textarea rows="10" cols="104" id="message" maxlength=999></textarea>
          </div>
        </div>
        <input type="submit" value="Send"> &nbsp;&nbsp;
        <input type="reset" value="Clear">
      </form>
    </div>

    <div class="col-md-6" id="contact">
      <p>324 Sen. Gil Puyat Avenue<br/>Bel-air, Makati City</p>
      <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>: 09167737988<br/>
      <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>: <a href="#">sample@inquiry.com</a><br/><br/>

      <iframe width="80%" height="270px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.8306954511957!2d121.01845665817463!3d14.561345997456918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTTCsDMzJzQwLjkiTiAxMjHCsDAxJzEwLjQiRQ!5e0!3m2!1sen!2sph!4v1481111170468"></iframe>

    </div> <!--div col-md-6 -->
  </div> <!--div row -->


    <!--Smelly footer-->
    <footer class="footer1">
    <div class="container">

    <div class="row">
                    <div class="col-lg-3 col-md-3">
                    <ul class="list-unstyled clear-margins">
                            	<li class="widget-container widget_nav_menu">

                                    <h1 class="title-widget">About iMARKET</h1>

                                    <ul>
                                    	<li><a  href="#"><i class="fa fa-angle-double-right"></i> About Us</a></li>
                                        <li><a  href="contact.php"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                                        <li><a  href="#"><i class="fa fa-angle-double-right"></i> FAQ</a></li>

                                    </ul>

    							</li>

                            </ul>


                    </div>
                    <div class="col-lg-3 col-md-3">
                    <ul class="list-unstyled clear-margins">
                            	<li class="widget-container widget_nav_menu">
                                    <h1 class="title-widget">CATEGORIES</h1>
                                    <ul>
     									<li><a  href="#"><i class="fa fa-angle-double-right"></i>  WOMAN</a></li>
                                        <li><a  href="#"><i class="fa fa-angle-double-right"></i>  MAN</a></li>
                                        <li><a  href="#"><i class="fa fa-angle-double-right"></i>  MERCHANDISE</a></li>
                                        <li><a  href="#"><i class="fa fa-angle-double-right"></i>  CUSTOMIZE</a></li>
                                        <li><a  href="#"><i class="fa fa-angle-double-right"></i>  SHOES</a></li>
                                        <li><a  href="#"><i class="fa fa-angle-double-right"></i>  BEST</a></li>
                                        <li><a  href="#"><i class="fa fa-angle-double-right"></i>  LATEST</a></li>

                                    </ul>
    							</li>
                            </ul>
                    </div>
                    <div class="col-lg-3 col-md-3">
                    <ul class="list-unstyled clear-margins">
                            	<li class="widget-container widget_nav_menu">
                                    <h1 class="title-widget">Others</h1>
                                    <ul>
                       <li><a href="#"><i class="fa fa-angle-double-right"></i> Customer</a></li>
     				           <li><a href="#"><i class="fa fa-angle-double-right"></i> Online Test Service</a></li>
    				           <li><a href="#"><i class="fa fa-angle-double-right"></i> Developers</a></li>
    				           <li><a href="#"><i class="fa fa-angle-double-right"></i> Advertisement</a></li>
    				           <li><a href="#"><i class="fa fa-angle-double-right"></i> Smart Book</a></li>
    				           <li><a href="#"><i class="fa fa-angle-double-right"></i> Test Centres</a></li>
                       <li><a href="#"><i class="fa fa-angle-double-right"></i>  Admission Form</a></li>
    				           <li><a href="#"><i class="fa fa-angle-double-right"></i>  Computer Live Test</a></li>

                                    </ul>
                                  </li>
                            </ul>
    					</div>


                    <div class="col-lg-3 col-md-3">
                            <ul class="list-unstyled clear-margins">
                            	<li class="widget-container widget_recent_news">
                                    <h1 class="title-widget">Company Info </h1>
                                    <div class="footerp">
    									<h2 class="title-median">iMARKET.Co</h2>
    									<p><b>Email :</b> <a href="201501240@iacademy.edu.ph">201501240@iacademy.edu.ph</a></p>
    									<p><b>Contact Number</b>
    									<b style="color:#ffc106;"> (8AM to 10PM):</b>  +63 9167737988  </p>

        <p><b>Corp Office : </b></p> <p>324 iACADEMY Plaza Sen. Gil Puyat Avenue, Bel Air, Makati City 1234</p>
                                    </div>

                                    <div class="social-icons">

                                    	<ul class="nomargin">

                    <a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
    	            <a href="https://twitter.com/bootsnipp"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
    	            <a href="https://plus.google.com/+Bootsnipp-page"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>
    	            <a href="201501240@iacademy.com.ph"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>

                                        </ul>
                                    </div>
                        		</li>
                              </ul>
                           </div>
                    </div>
    </div>
    </footer>
    <!--header-->

    <div class="footer-bottom">
    	<div class="container">
    		<div class="row">
    			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    				<div class="copyright">
    					© 2017, iMARKET, All rights reserved
    				</div>

    			</div>
    			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    				<div class="design">
    					 <a href="#">iMARKET </a> |  <a target="_blank" href="#">Web Design & Development by iACADAMIT</a>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

</body>
</html>
