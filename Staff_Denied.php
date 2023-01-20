<?php
@include 'config.php';
session_start();

if (isset($_SESSION['current_username'])) {
    $uname = $_SESSION['current_username'];
} else {
    header("Location: login.php");
}

# For Current User
$sql = "SELECT * FROM `users` WHERE `username` = '$uname'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$User_type = $row['types'];
$db_UserID = $row['user_id'];
$Current_status = $row['isApproved'];

if (isset($_GET['user_id'])) {
    $userID = $_GET['user_id'];

    if($Current_status == 2){
        header("Location: ErrorPage.php?e=4");
    } else {
        if ($db_UserID == $userID) {
            $_SESSION['message'] = "You can\'t Deny your own account!";
            $_SESSION['icon'] = "info";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $sql = "UPDATE `users` SET `isApproved` = '2' WHERE `user_id` = '$userID'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['message'] = "Something went wrong!";
                $_SESSION['icon'] = "error";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}
?>