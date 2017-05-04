<?php
  include 'connector.php';

  $deleteid=$_GET['id'];



  $sql = "delete  from rating where id =" .$deleteid ;

  if (mysqli_query($dbconn, $sql)) {

      echo "<script>window.alert('Comment Successfully Deleted ! ');</script>";
      echo "<script>history.back();</script>";
  } else {
      echo "Error deleting record: " . mysqli_error($dbconn);
  }

  mysqli_close($dbconn);



 ?>
