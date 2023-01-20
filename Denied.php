<?php
@include 'config.php';
session_start();

if (isset($_GET['user_id'])) {
    $userID = $_GET['user_id'];

    $sql = "UPDATE request SET isapproved = '2' WHERE `user_id` = '$userID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "your request was cancelled due to an error in the database connection ";
        $_SESSION['icon'] = "error";
        $_SESSION['isTrue'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
?>