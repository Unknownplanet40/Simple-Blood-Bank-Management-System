<?php
@include 'config.php';
session_start();

$username = $_SESSION['username'];

$sql = "SELECT * FROM `users` WHERE username = '$username' AND `is_login` = '1';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $sql = "UPDATE `users` SET `is_login` = '0' WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        session_destroy();
        session_unset();
        mysqli_close($conn);
        header("Location: login.php");
    } else {
        $_SESSION['message'] = "we are facing some technical issue. Please try again later.";
        $_SESSION['icon'] = "error";
        $_SESSION['isTrue'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

} else {
    header("Location: login.php");
}
?>