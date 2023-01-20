<?php
@include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    $Uname = $_POST['username'];
    $Pword = $_POST['password'];
    $mail = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $blood = $_POST['blood'];

    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $old_name = $row['name'];
    $old_username = $row['username'];
    $old_password = $row['password'];
    $old_email = $row['email'];
    $old_phone = $row['phone'];
    $old_blood = $row['blood'];


    if ($name == $old_name && $Uname == $old_username && $Pword == $old_password && $mail == $old_email && $phone == $old_phone) {
        $_SESSION['message'] = "No changes have been made!";
        $_SESSION['icon'] = "info";
        $_SESSION['isTrue'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        if ($name == $old_name) {
            $_SESSION['message'] = $name . " already exists! Please try another name.";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else if ($Uname == $old_username) {
            $_SESSION['message'] = "Username already exists! Please try another username.";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else if ($mail == $old_email) {
            $_SESSION['message'] = "Email already exists! Please try another email.";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else if ($phone == $old_phone) {
            $_SESSION['message'] = "Phone number already exists! Please try another phone number.";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }else {
            $sql = "UPDATE `users` SET `name` = '$name', `username` = '$Uname', `password` = '$Pword', `email` = '$mail', `phone` = '$phone', `address` = '$address', `blood` = '$blood'  WHERE `user_id` = '$ID';";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['message'] = "Your account Has been successfully updated!";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['message'] = "We encountered an error while updating your account! Please try again later.";
                $_SESSION['icon'] = "error";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}


?>