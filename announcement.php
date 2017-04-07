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

    <?php
        session_start();
        require_once('connector.php');
    ?>


        <nav id="navbar-main">
          <!--Login System Embedded by Jung Start-->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
                </div>
                <div class="collapse navbar-collapse row" id="myNavbar">
                    <ul class="pull-right">
                        <?php if(isset($_SESSION['email'])&& $_SESSION['userType'] == 'employee'){ ?>
                        <li class="upper-links"><a class="links" href="productAdd.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> SELL</a></li>
                        <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> NOTIFICATIONS</a></li>
                        <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> WISHLIST</a></li>
                        <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> CART</a></li>

                        <li class="upper-links dropdown"><a class="links">My Account</a>
                            <ul class="dropdown-menu">
                                <li class="profile-li"><a class="profile-links" href="#">My Order</a></li>
                                <li class="profile-li"><a class="profile-links" href="accountSetting.php">Account Setting</a></li>
                                <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
                                <li class="profile-li"><a class="profile-links" href="logout.php">logout</a></li>

                                <?php }elseif(isset($_SESSION['email'])&& $_SESSION['userType'] == 'student'){ ?>
                                <li class="upper-links"><a class="links" href="productAdd.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> SELL</a></li>
                                <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> NOTIFICATIONS</a></li>
                                <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> WISHLIST</a></li>
                                <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> CART</a></li>

                                <li class="upper-links dropdown"><a class="links">My Account</a>
                                    <ul class="dropdown-menu">
                                        <li class="profile-li"><a class="profile-links" href="#">My Order</a></li>
                                        <li class="profile-li"><a class="profile-links" href="accountSetting.php">Account Setting</a></li>
                                        <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
                                        <li class="profile-li"><a class="profile-links" href="logout.php">logout</a></li>

                                        <?php }elseif(isset($_SESSION['email'])&& $_SESSION['userType'] == 'admin'){ ?>
                                        <li class="upper-links"><a class="links" href="productAdd.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> SELL</a></li>
                                        <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> NOTIFICATIONS</a></li>
                                        <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> WISHLIST</a></li>
                                        <li class="upper-links"><a class="links" href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> CART</a></li>

                                        <li class="upper-links dropdown"><a class="links">My Account</a>
                                            <ul class="dropdown-menu">
                                                <li class="profile-li"><a class="profile-links" href="#">My Order</a></li>
                                                <li class="profile-li"><a class="profile-links" href="accountSetting.php">Account Setting</a></li>
                                                <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
                                                <li class="profile-li"><a class="profile-links" href="logout.php">logout</a></li>


                                <?php }else { ?>
                                <li class="upper-links dropdown"><a class="links">My Account</a>
                                    <ul class="dropdown-menu">
                                        <li class="profile-li"><a class="profile-links" href="login.php">LOGIN</a></li>
                                        <li class="profile-li"><a class="profile-links" href="signUp.php">REGISTER</a></li>
                                        <?php } ?>


                                    </ul>
                                </li>
                            </ul></ul></ul>
                    </ul>
                </div>
            </div>
            <!--Login System Embedded by Jung End-->



            <div class="row">
                <!--Size-->
                <div class="col-sm-1">
                </div>
                <!--Size-->
                <div class="col-sm-1">
                    <a href="index.php"><img src="image/logo.png" width="70px" height="70px"></a>
                </div>
                <div class="smallsearch col-sm-8 col-xs-11">
                    <div class="row">
                        <input class="navbar-input col-xs-11" type="" placeholder="Search for Products, Brands and more" name="">
                        <button class="navbar-button col-xs-1">
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>
                    </div>
                </div>

            </div>


            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mySecondbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
                </div>
                <!--Size-->
                <div class="col-sm-2">
                    <div class="col-sm-8 col-xs-11">
                    </div>
                </div>
                <!--Size-->
                <div class="collapse navbar-collapse row" id="mySecondbar">
                    <ul class="nav navbar-nav fontnav">
                        <li><a href="#">LATEST</a></li>
                        <li><a href="#">MEN</a></li>
                        <li><a href="#">WOMEN</a></li>
                        <li><a href="#">iACADEMY MERCHANDISE</a></li>
                        <li><a href="#">CUSTOMIZE</a></li>
                    </ul>
                    </li>
                    </ul>
                    </ul>
                </div>
            </div>
        </nav>





        <!--Footer-->
        <footer class="footer1">
            <div class="container">

                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="list-unstyled clear-margins">
                            <li class="widget-container widget_nav_menu">

                                <h1 class="title-widget">About iMARKET</h1>

                                <ul>
                                    <li><a href="aboutus.php"><i class="fa fa-angle-double-right"></i> About Us</a></li>
                                    <li><a href="contact.php"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> FAQ</a></li>

                                </ul>

                            </li>

                        </ul>


                    </div>
                    <div class="col-lg-3 col-md-3">
                        <ul class="list-unstyled clear-margins">
                            <li class="widget-container widget_nav_menu">
                                <h1 class="title-widget">CATEGORIES</h1>
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i>  WOMEN</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i>  MEN</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i>  MERCHANDISE</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i>  CUSTOMIZE</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i>  LATEST</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <ul class="list-unstyled clear-margins">
                            <li class="widget-container widget_nav_menu">
                                <h1 class="title-widget">Customer Care</h1>
                                <ul>
                                    <li><a href="announcement.php"><i class="fa fa-angle-double-right"></i> Announcement</a></li>
                                    <li><a href="termsnpolicy.php"><i class="fa fa-angle-double-right"></i> Terms & Policy</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Developers</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Advertisement</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Smart Book</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Test Centres</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i>  Announcement</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i>  Computer Live</a></li>

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
                                        <b style="color:#ffc106;"> (8AM to 10PM):</b> +63 9167737988 </p>

                                    <p><b>Corp Office : </b></p>
                                    <p>324 iACADEMY Plaza Sen. Gil Puyat Avenue, Bel Air, Makati City 1234</p>
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
                            <a href="#">iMARKET </a> | <a target="_blank" href="#">Web Design & Development by iACADAMIT</a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>
