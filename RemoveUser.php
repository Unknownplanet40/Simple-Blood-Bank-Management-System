<?php
@include 'config.php';
session_start();

//only for admin

$Current_User = $_SESSION['current_userID'];


if (isset($_GET['user_id'])) {
    $ID = $_GET['user_id'];

    $sql = "SELECT `types`, `is_login` FROM `users` WHERE `user_id` = '$ID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $isLogin = $row['is_login'];

    if ($ID == $Current_User) {
        $_SESSION['message'] = "It is not possible to delete your own account";
        $_SESSION['icon'] = "info";
        $_SESSION['isTrue'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else if ($isLogin == 1) {
        $_SESSION['message'] = "It is not possible to delete an account that is currently logged in";
        $_SESSION['icon'] = "info";
        $_SESSION['isTrue'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $sql = "DELETE FROM `users` WHERE `user_id` = '$ID'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['message'] = "The account has been successfully deleted!";
            $_SESSION['icon'] = "success";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            SWW();
        }
    }
} else {
    SWW();
}

function SWW()
{
    $_SESSION['message'] = "Oops! Something went wrong!";
    $_SESSION['icon'] = "error";
    $_SESSION['isTrue'] = true;
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
?>