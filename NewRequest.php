<?php
@include 'config.php';
session_start();
if (isset($_POST['submit'])) {
    $name = $_POST['rname'];
    $email = $_POST['remail'];
    $blood = $_POST['rblood'];
    $address = $_POST['raddress'];
    $phone = $_POST['rphone'];
    $unit = $_POST['runit'];

    $user = $_SESSION['current_username'];

    $sql = "SELECT *  FROM `request` WHERE `email` = '$email';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        //echo '<script>alert("There is already an email address. Please use a different email address")</script>';
        $_SESSION['message'] = "Please use a different email address since the one you entered already exists";
        $_SESSION['icon'] = "error";
        $_SESSION['isTrue'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {

        if (empty($blood) || empty($name) || empty($email) || empty($address) || empty($phone) || empty($unit)) {
            $_SESSION['message'] = "You cannot leave any field empty";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else{
            $sql = "INSERT INTO `request`(`user_id`, `name`, `email`, `blood_type`, `phone`, `Address`, `isapproved`, `requested`, `cby`, `again`) VALUES (NULL,'$name','$email','$blood','$phone','$address','0','$unit', '$user', '0')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['message'] = "Your request has been submitted successfully";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['message'] = "We are sorry, but we are unable to process your request at this time. Please try again later.";
                $_SESSION['icon'] = "error";
                $_session['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}
?>