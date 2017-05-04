<?php
    session_start();
    require_once('../../connector.php');
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
  <a class="navbar-brand" href="../adminDashboard.php">
    Administrator
  </a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <form class="navbar-form navbar-left" action="../adminResults.php" method="POST" role="search">
    <div class="form-group">
      <input type="text" name="search" class="form-control" placeholder="Search">
    </div>
    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
  </form>



  <ul class="nav navbar-nav navbar-right">
    <li><a href="../../index.php">Back to main</a></li>
    <li class="dropdown ">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        Account
        <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <?php if(isset($_SESSION['email'])&& $_SESSION['userType'] == 'admin'){ ?>
          <li class="dropdown-header">SETTINGS</li>
          <li class="profile-li"><a class="profile-links" href="../adminDashboard.php">Admin Dashboard</a></li>
          <li class="profile-li"><a class="profile-links" href="../../accountSetting.php">Account Setting</a></li>
          <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
          <li class="profile-li"><a class="profile-links" href="../../logout.php">logout</a></li>
          <li class="divider"></li>

          <?php }else {
              header("Location: ../../index.php", 404);
              exit;
           } ?>



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
                                    <li class="active"><a href="../adminDashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li> <!--Dashboard = main -->


                                         <li class="panel panel-default" id="dropdown">  <!-- Dropdown for register-->
                                               <a data-toggle="collapse" href="#dropdown-lvl1">
                                                      <span class="glyphicon glyphicon-user"></span> User list <span class="caret"></span>
                                              </a>

                                    <!-- Dropdown level 1 -->
                                    <div id="dropdown-lvl1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                    <li><a href="../admin_user/adminViewlist.php">View All List</a></li>
                                    <li><a href="../admin_user/adminView_suspend.php">View Suspends</a></li>
                                    <li><a href="../admin_user/adminView_blocklist.php">View Blocklists</a></li>

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
        <li><a href="adminprod_list.php">List product</a></li>
        <li><a href="adminprodAdd.php">Add product</a></li>


      </ul>
    </div>
  </div>
</li><!--End of Dropdown for product-->
<li><a href="../adminAnnoun.php"><span class="glyphicon glyphicon-plane"></span> Announcement</a></li>
     <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Notification</a></li>
<li><a href="../admin_rate/adminView_ratelist.php"><span class="glyphicon glyphicon-signal"></span> Rating</a></li>

</ul>
</div><!-- /.navbar-collapse -->
</nav>

</div>
</div>  		</div>
