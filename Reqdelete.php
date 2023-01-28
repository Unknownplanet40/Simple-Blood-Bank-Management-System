<?php
@include 'config.php';
session_start();

if (isset($_GET['user_id'])) {
    $userID = $_GET['user_id'];

    $sql = "DELETE FROM `request` WHERE `user_id` = '$userID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['message'] = "The request has been deleted!";
        $_SESSION['icon'] = "success";
        $_SESSION['isTrue'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "We could not delete the request!";
        $_SESSION['icon'] = "warning";
        $_SESSION['isTrue'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
?>