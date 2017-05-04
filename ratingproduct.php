<?php

session_start();
require_once('connector.php');

if (isset($_POST['rate']) && !empty($_POST['rate'])) {

    $rate = $dbconn->real_escape_string($_POST['rate']);
    $customer=$_SESSION['email'];
// check if user has already rated
    $sql = "SELECT `id` FROM `rating` WHERE `user_id`= '?' ";
    $result = $dbconn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        echo $row['id'];
    } else {

        $sql = "INSERT INTO `rating` ( `rate`, `user_id`) VALUES ('" . $rate . "', '" . $customer . "'); ";
        if (mysqli_query($dbconn, $sql)) {
            echo "0";
        }
    }
}
$conn->close();
?>
