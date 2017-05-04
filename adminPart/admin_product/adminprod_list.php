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

    <?php include('ad_pro_header.php'); ?>

<!--Code Starts Here-->




<div class="col-md-10 content">

          <div>
          <div class="panel panel-primary">
          <div class="panel-heading">
              <span class="glyphicon glyphicon-list"></span>Product Lists
              <div class="pull-right action-buttons">
                  <div class="btn-group pull-right">
                      <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                          <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
                      </button>
                      <ul class="dropdown-menu slidedown">
                          <li><a href="#"><span class="glyphicon glyphicon-pencil"></span>Edit</a></li>
                          <li><a href="#"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
                          <li><a href="#"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="panel-body">
            <?php
                $query = $dbconn->query("SELECT * FROM products WHERE p_qty >= 1 AND productActive = 1 ORDER BY product_ID DESC");
                if($query->num_rows > 0){
                  while($row = $query->fetch_assoc()){
            ?>
              <ul class="list-group">
                  <li class="list-group-item">
                      <div class="checkbox">
                          <input type="checkbox" id="checkbox" />
                          <label for="checkbox"><a href="../../productPage1.php?pname=<?php echo $row['product_ID']?>"><?php echo $row["productName"]; ?></a>
                          </label>
                      </div>
                      <div class="pull-right action-buttons">
                          <a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
                          <a href="#" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                          <a href="#" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                      </div>
                  </li>
                  <?php } }else{ ?>
                  <p>Product(s) not found.....</p>
                  <?php } ?>

              </ul>
          </div>
      </div>
          </div>

        </div>

</div>
</div>


<!-- Code Ends Here-->

     <?php include 'ad_pro_footer.php';?>


    </body>

    </html>
