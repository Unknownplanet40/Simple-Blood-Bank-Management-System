<?php
@include 'config.php';
session_start();

if (isset($_GET['user_id'])) {
    $ID = $_GET['user_id'];

    $sql = "SELECT `isapproved`, `again`, `name` FROM `request` WHERE `user_id` = '$ID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $status = $row['isapproved'];
    $rerequest = $row['again'];
    $name = $row['name'];

    if ($status == 1) {
        if ($rerequest < 3) {
            $sql = "UPDATE `request` SET `again` = `again` + 1, `isapproved` = 0 WHERE `user_id` = '$ID'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['message'] = "You\'ve successfully sent a request again! Please wait for the approval of your request.";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['message'] = "We are sorry, but we are unable to process your request at this time. Please try again later.";
                $_SESSION['icon'] = "error";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        } else {
            $_SESSION['message'] = "You\'ve reached the maximum number of requests.";
            $_SESSION['icon'] = "info";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }

} else {
    header("Location: ErrorPage.php?e=3");
}

?>