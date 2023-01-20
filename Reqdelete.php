<?php
@include 'config.php';
session_start();

if (isset($_GET['user_id'])) {
    $userID = $_GET['user_id'];

    $sql = "DELETE FROM request WHERE `user_id` = '$userID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        
    } else {
        die("Could not connect to mysql Please Contact the Administrator" . mysqli_error($conn));
    }
}
?>