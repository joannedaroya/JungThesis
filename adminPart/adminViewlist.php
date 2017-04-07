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
    <link rel="stylesheet" href="../css/adminOnly.css">
    <!--Javascript-->
    <script src="../jsforAdmin/jsAdmin.js"></script>

</head>

<body>

    <?php
        session_start();
        require_once('../connector.php');
    ?>
    <nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
    	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
			MENU
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="adminDashboard.php">
				Administrator
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<form class="navbar-form navbar-left" method="GET" role="search">
				<div class="form-group">
					<input type="text" name="q" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../index.php">Back to main</a></li>
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						Account
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
              <?php if(isset($_SESSION['email'])&& $_SESSION['userType'] == 'admin'){ ?>
							<li class="dropdown-header">SETTINGS</li>
              <li class="profile-li"><a class="profile-links" href="adminDashboard.php">Admin Dashboard</a></li>
              <li class="profile-li"><a class="profile-links" href="../accountSetting.php">Account Setting</a></li>
              <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
              <li class="profile-li"><a class="profile-links" href="../logout.php">logout</a></li>
							<li class="divider"></li>

              <?php }else { ?>
                      <li class="profile-li"><a class="profile-links" href="../login.php">LOGIN</a></li>
                      <li class="profile-li"><a class="profile-links" href="../signUp.php">REGISTER</a></li>
                      <?php } ?>



						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

<!--Top end-->
<div class="container-fluid main-container">
    <div class="col-md-2 sidebar">
         <div class="row">
            <!-- uncomment code for absolute positioning tweek see top comment in css -->
             <div class="absolute-wrapper"> </div>
              <!-- Menu -->
               <div class="side-menu">
                   <nav class="navbar navbar-default" role="navigation">
                        <!-- Main Menu -->
                           <div class="side-menu-container">
                                 <ul class="nav navbar-nav">
                                        <li class="active"><a href="adminDashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li> <!--Dashboard = main -->


                                             <li class="panel panel-default" id="dropdown">  <!-- Dropdown for register-->
                                                   <a data-toggle="collapse" href="#dropdown-lvl1">
                                                          <span class="glyphicon glyphicon-user"></span> User list <span class="caret"></span>
                                                  </a>

                                        <!-- Dropdown level 1 -->
                                        <div id="dropdown-lvl1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                        <li><a href="adminViewlist.php">View All List</a></li>
                                        <li><a href="#">Soon to be</a></li>
                                        <li><a href="#">Soon to be</a></li>

                                      </ul>
                                    </div>
                                  </div>
                                </li><!--End of dropdown for register-->


                             <li class="panel panel-default" id="dropdown"><!--Dropdown for product-->
                                   <a data-toggle="collapse" href="#dropdown-lvl2">
                                          <span class="glyphicon glyphicon-user"></span> Product Settings <span class="caret"></span>
                                  </a>

      <!-- Dropdown level 1 -->
      <div id="dropdown-lvl2" class="panel-collapse collapse">
        <div class="panel-body">
          <ul class="nav navbar-nav">
            <li><a href="adminprodAdd.php">Add product</a></li>
            <li><a href="adminprodEdit.php">Edit product</a></li>
            <li><a href="adminprodDel.php">Delete product</a></li>


          </ul>
        </div>
      </div>
    </li><!--End of Dropdown for product-->
    <li><a href="adminAnnoun.php"><span class="glyphicon glyphicon-plane"></span> Announcement</a></li>
         <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Notification</a></li>
    <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

  </ul>
</div><!-- /.navbar-collapse -->
</nav>

</div>
</div>  		</div>



<!--2ndMain starts (table for user) - Jung-->
<!--<div class="form-group">
    <select class="form-control" name="usercat" required>
       <option value="" selected disabled>Choose</option>
       <option value="admin">Admin</option>
       <option value="employee">Employee</option>
       <option value="student">Student</option>
    </select>
</div>-->

<div class="container">
     <table>
       <h1>ADMIN</h1>
     <thead>
       <tr>
         <th>Email_Address</th>
         <th>firstname</th>
         <th>lastname</th>
         <th>Contact_Number</th>
         <th>Birthdate</th>
         <th>Usertype</th>
       </tr>
     </thead>
     <tbody>
       <?php

               // Check connection
               if ($dbconn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
               }

             $sql = "SELECT * FROM users WHERE userType='admin'";
             $result = $dbconn->query($sql);

             if ($result->num_rows > 0) {
                 // output data of each row
                 while($row = $result->fetch_assoc()) {
                   echo
                   "<tr>
                     <td>{$row['email']}</td>
                     <td>{$row['firstName']}</td>
                     <td>{$row['lastName']}</td>
                     <td>{$row['contactNum']}</td>
                     <td>{$row['birthDate']}</td>
                     <td>{$row['userType']}</td>
                   </tr>\n";
                 }

             } else {
                 echo "0 results";
             }





       ?>
     </tbody>
   </table>

   <table>
     <h1>Employee</h1>
   <thead>
     <tr>
       <th>Email_Address</th>
       <th>firstname</th>
       <th>lastname</th>
       <th>Contact_Number</th>
       <th>Birthdate</th>
       <th>Usertype</th>
     </tr>
   </thead>
   <tbody>
     <?php

             // Check connection
             if ($dbconn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
             }

           $sql = "SELECT * FROM users WHERE userType='employee'";
           $result = $dbconn->query($sql);

           if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
                 echo
                 "<tr>
                   <td>{$row['email']}</td>
                   <td>{$row['firstName']}</td>
                   <td>{$row['lastName']}</td>
                   <td>{$row['contactNum']}</td>
                   <td>{$row['birthDate']}</td>
                   <td>{$row['userType']}</td>
                 </tr>\n";
               }

           } else {
               echo "0 results";
           }





     ?>
   </tbody>
 </table>

 <table>
   <h1>Student</h1>
 <thead>
   <tr>
     <th>Email_Address</th>
     <th>firstname</th>
     <th>lastname</th>
     <th>Contact_Number</th>
     <th>Birthdate</th>
     <th>Usertype</th>
   </tr>
 </thead>
 <tbody>

   <?php

           // Check connection
           if ($dbconn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
           }

         $sql = "SELECT * FROM users WHERE userType='student'";
         $result = $dbconn->query($sql);

         if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
               echo
               "<tr>
                 <td>{$row['email']}</td>
                 <td>{$row['firstName']}</td>
                 <td>{$row['lastName']}</td>
                 <td>{$row['contactNum']}</td>
                 <td>{$row['birthDate']}</td>
                 <td>{$row['userType']}</td>
               </tr>\n";
             }

         } else {
             echo "0 results";
         }





   ?>
 </tbody>
</table>
</div>

  	</div>

    <!--Footer-->
    <footer class="footer1">
        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <ul class="list-unstyled clear-margins">
                        <li class="widget-container widget_nav_menu">

                            <h1 class="title-widget">About iMARKET</h1>

                            <ul>
                                <li><a href="../aboutus.php"><i class="fa fa-angle-double-right"></i> About Us</a></li>
                                <li><a href="../contact.php"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
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
