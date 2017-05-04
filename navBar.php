<?php echo '<nav id="navbar-main">
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
                                              <li class="profile-li"><a class="profile-links" href="adminPart/adminDashboard.php">Admin Dashboard</a></li>
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
          <!--Login System Embedded by Jung End-->'; ?>