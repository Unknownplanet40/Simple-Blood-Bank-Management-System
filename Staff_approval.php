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

    # For user to be approved
    $sql = "SELECT * FROM `users` WHERE `user_id` = '$userID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $status = $row['isApproved'];


    if ($User_type == 1) {
        if ($status == 1) {
            $_SESSION['message'] = "The account has been already approved!";
            $_SESSION['icon'] = "info";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $sql = "UPDATE `users` SET `isApproved` = '1' WHERE `user_id` = '$userID'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['message'] = "The account has been successfully approved!";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['message'] = "Something went wrong!";
                $_SESSION['icon'] = "error";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    } else {
        if ($Current_status == 2) {
            header("Location: ErrorPage.php?e=4");
        } else {
            # check if user id is same as db user id
            if ($userID == $db_UserID) {
                $_SESSION['message'] = "You can\'t approve your own account!";
                $_SESSION['icon'] = "info";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                if ($status == 1) {
                    $_SESSION['message'] = "The account has been already approved!";
                    $_SESSION['icon'] = "info";
                    $_SESSION['isTrue'] = true;
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } else {
                    $sql = "UPDATE `users` SET `isApproved` = '1' WHERE `user_id` = '$userID'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $_SESSION['message'] = "The account has been successfully approved!";
                        $_SESSION['icon'] = "success";
                        $_SESSION['isTrue'] = true;
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
    }
}
?>