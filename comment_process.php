<?php
session_start();
require_once('connector.php');

$editid=$_POST['foot'];
$email =$_SESSION['email'];
$recom = $_POST['recomment'];


  $sql = "select * from rating where id = " . $editid;
  $result = $dbconn->query($sql);
  $row = $result->fetch_assoc();

    if($email == $row['user_ID']) {
      $sql = 'UPDATE rating SET product_comment = "'. $recom .'" where id = ' . $editid;
      $result = $dbconn->query($sql);
      $msgState = 'Fix';
      ?>
      <script>
        alert("<?php echo $msgState?>");
        window.close();
      </script>
    <?php

    } else {
        $msg = 'Wrong ID Please Try again.';
      ?>
        <script>
          alert("<?php echo $msg?>");
          window.close();
        </script>
      <?php
        exit;
      }
      ?>
