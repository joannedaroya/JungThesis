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
    <link rel="stylesheet" href="../css/design.css" />

</head>

<body>

    <?php include('proheader.php'); ?>

        <!--Code Starts Here (main)-->


        <div class="row">
           <div class="row list-group">
                    <?php
                    //get rows query
                    $query = $dbconn->query("SELECT * FROM products WHERE genderCategory='man' AND p_qty >= 1 ORDER BY product_ID");
                    if($query->num_rows > 0){
                        while($row = $query->fetch_assoc()){
                    ?>
                    <div class="item col-lg-4">
                        <div class="thumbnail">
                            <div class="caption">
                              <img src="../productImages/<?php echo $row["productImage"];?>" width="60%" height="60%"/>
                                <h4 class="list-group-item-heading"><a href="../productPage1.php?pname=<?php echo $row['product_ID']?>"><?php echo $row["productName"]; ?></a></h4>
                                <p class="list-group-item-text"><?php echo $row["shortDes"]; ?></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="lead"><?php echo '₱'.$row["price"]; ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-success" href="cartAction.php?action=addToCart&productCode=<?php echo $row["product_ID"]; ?>">Add to cart</a>

                                        <!---->
                                              <?php
                                              $ratetest='select sum(seller_rate) as rat from rating where seller_id='.$row["user_ID"];
                                              $query1 = $dbconn->query($ratetest) or die($dbconn->error);
                                              $ratecount = $query1->fetch_assoc();


                                              $countsell='select count(seller_id) as sat from rating where seller_id='.$row["user_ID"];
                                              $querysell = $dbconn->query($countsell) or die($dbconn->error);
                                              $seller = $querysell->fetch_assoc();


                                              if($ratecount['rat']==0 && $seller['sat']==0){
                                                $totalrate = 5;
                                              }else{

                                              $totalrate=($ratecount['rat']/$seller['sat']);
                                            }
                                              ?>

                                              <button type="button" class="btn btn-default btn-sm">
                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                <?php
                                                echo $totalrate;



                                                 ?>
                                              </button>
                                              <!---->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } }else{ ?>
                    <p>No products listed.</p><br/><br/><br/><br/>
                    <?php } ?>
                </div>
        </div>



<!--Footer-->

<?php include 'profooter.php';?>




</body>

</html>
