<?php
session_start();
require_once('../../connector.php');

$editemail=$_POST['userID'];
$admin = $_SESSION['email'];

$sql = 'select * from users where email = '.$editemail;
$result = $dbconn->query($sql);
$row = $result->fetch_assoc();


    if($admin == $_SESSION['email']) {
      $sql = 'UPDATE users SET userStatus = 1 where user_ID = ' . $editemail;
      $result = $dbconn->query($sql);
      $msgState = 'The User is Activated';
      ?>
      <script>
        alert("<?php echo $msgState?>");
        history.back();
      </script>
    <?php

    } else {
        $msg = 'Wrong ID Please Try again.';
      ?>
        <script>
          alert("<?php echo $msg?>");
          history.back();
        </script>
      <?php
        exit;
      }
      ?>
