<?php
@include 'config.php';
session_start();
// get the username from last page
$username = $_SESSION['username'];

// check if username is_login is set to 1
$sql = "SELECT * FROM `users` WHERE username = '$username' AND `is_login` = '1';";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
// current Users session
$_SESSION['current_userID'] = $row['user_id'];
$_SESSION['current_name'] = $row['name'];
$_SESSION['current_types'] = $row['types'];
$_SESSION['current_status'] = $row['isApproved'];
$_SESSION['current_username'] = $row['username'];
$_SESSION['current_password'] = $row['password'];

if (mysqli_num_rows($result) > 0) {
    if ($_SESSION['current_status'] == 1) {
        header("Location: Staff_bloodInventory.php");
    } else {
        header("Location: Staff_Status.php");
    }
} else {
    // if username is_login is not set to 1
    header("Location: login.php");
}
?>