<table>
  <thead>
    <tr>

      <td>User</td>
      <td>Comments</td>
      <td>Date</td>
      <td>rate </td>
      <td>Buttons</td>
    </tr>

  </thead>
      <tbody>
<?php
     $sql = 'select * from rating where product_ID =' .$pNAME;
     $result = $con->query($sql);
     while($row = $result->fetch_assoc())
     {
       $datetime = explode(' ', $row['product_date']);
       $date = $datetime[0];
       $time = $datetime[1];
       if($date == Date('Y-m-d'))
       $row['product_date'] = $time;
       else
       $row['product_date'] = $date;
       ?>

       <tr>
         <td><?php echo $row['user_ID']?></td>
         <td><?php echo $row['product_comment']?></td>
         <td><?php echo $row['product_date']?></td>
         <td><?php $startest= $row['rate'];
           if($startest == 5){?>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <?php }elseif($startest == 4){ ?>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <?php }elseif($startest == 3){ ?>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <?php }elseif($startest == 2){ ?>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <?php }else{ ?>
           <span class="glyphicon glyphicon-star" aria-hidden="true" style="color:yellow"></span>
           <?php } ?></td>
           <?php
           if($_SESSION['email'] == $row['user_ID'] ){?>
           <td><div class="commentBtn">
           <?php echo "<a href='comment_edit.php?id=" . $row['id'] . "' target='_blank'>Edit</a>" ?>
           <?php echo "<a href='comment_delete.php?id=" . $row['id'] . "'>Delete</a>" ?>
           </div></td>
           <?php } ?>
       </tr>
       <?php
     }
     ?>
   </tbody>
 </table>




<form action="comment_update.php" method="post">
  <?php $userGet = $_SESSION['email']; ?>
  <input type="hidden" name="productID" id="productID" value="<?php echo $pNAME?>">
  <input type="hidden" name="users" id="users" value="<?php echo $userGet?>">
  <?php
  $test = 'select * from products where product_ID ='.$pNAME;
  $testt = $con->query($test);
  while($row = $testt->fetch_assoc())
  {?>
  <input type="hidden" name="sellerid" value="<?php echo $row['user_ID']?>" />
<?php } ?>

  <table>
    <tr>
      <td>
        <div class="rating">
         <p>Rate the Product : </p>
         <input class="stars" type="radio" id="star5" name="rate" value="5" />
         <label class = "full" for="star5" title="Awesome - 5 stars"></label>
         <input class="stars" type="radio" id="star4" name="rate" value="4" />
         <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
         <input class="stars" type="radio" id="star3" name="rate" value="3" />
         <label class = "full" for="star3" title="Meh - 3 stars"></label>
         <input class="stars" type="radio" id="star2" name="rate" value="2" />
         <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
         <input class="stars" type="radio" id="star1" name="rate" value="1" />
         <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
        </div>

        <div class="rating1">
         <p>Rate the Seller : </p>
         <input class="stars" type="radio" id="sell5" name="ratese" value="5" />
         <label class = "full" for="sell5" title="Awesome - 5 stars"></label>
         <input class="stars" type="radio" id="sell4" name="ratese" value="4" />
         <label class = "full" for="sell4" title="Pretty good - 4 stars"></label>
         <input class="stars" type="radio" id="sell3" name="ratese" value="3" />
         <label class = "full" for="sell3" title="Meh - 3 stars"></label>
         <input class="stars" type="radio" id="sell2" name="ratese" value="2" />
         <label class = "full" for="sell2" title="Kinda bad - 2 stars"></label>
         <input class="stars" type="radio" id="sell1" name="ratese" value="1" />
         <label class = "full" for="sell1" title="Sucks big time - 1 star"></label>
        </div>
      </td>
      <td><textarea class="form-control" rows="5" id="comment" name="comment" required="required"></textarea></td>
      <td><input name="submit" type="submit"  class="btn btn-info" value="Submit comment" />
      </tr>

    </table>
</form>
