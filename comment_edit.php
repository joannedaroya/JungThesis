<?php
    session_start();
    require_once('connector.php');

  $editid=$_GET['id'];
  $email =$_SESSION['email'];
 ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

  <?php
  $userget = 'select * from rating where id ='.$editid;
  $usercom = $dbconn->query($userget);
  while($row = $usercom->fetch_assoc())
  {
    if($email == $row['user_ID']){
      ?>
  <input type="hidden" name="sellerid" value="<?php echo $row['user_ID']?>" />
  <form action="comment_process.php" method="POST">
    <textarea class="form-control" rows="5" id="recomment" name="recomment" required="required"></textarea>
    <input type="hidden" name="foot" id="foot" value="<?php echo $row['id']; ?>" />
    <input type="submit">
  </form>


<?php }else{echo "error";}} ?>
</body>
</html>
