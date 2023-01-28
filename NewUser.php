<?php
@include 'config.php';
session_start();

if (isset($_SESSION['User_status'])) {
    $types = $_SESSION['User_status'];
} else {
    $types = "Why did you open this page?";
}

if ($types == "Admin") {
    Admin();
} elseif ($types == "Staff") {
    Staff();
} elseif ($types == "User") {
    User();
} else {
    header("Location: login.php");
}

function Admin()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $Uname = $_POST['username'];
        $Pword = $_POST['password'];
        $CPword = $_POST['Cpassword'];

        $sql = "SELECT * FROM `users` WHERE `username` = '$Uname' OR `name` = '$name'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if (empty($name) || empty($Uname) || empty($Pword) || empty($CPword)) {
            $_SESSION['message'] = "You have left some fields empty";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($row['username'] == $Uname) {
            $_SESSION['message'] = "The Username you entered already exists. Please choose a different one";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($row['name'] == $name) {
            $_SESSION['message'] = "There is already a name called " . $name . ". It would be better to use a different one.";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($Pword != $CPword) {
            $_SESSION['message'] = "There is a mismatch in the password";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $sql = "INSERT INTO `users`(`name`, `username`, `password`, `types`, `isApproved`) VALUES ('$name','$Uname','$Pword','1','1')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['message'] = "You have successfully created a new user";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['message'] = "There was an error creating a new user";
                $_SESSION['icon'] = "error";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}

function Staff()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $Uname = $_POST['username'];
        $Pword = $_POST['password'];
        $CPword = $_POST['Cpassword'];

        $sql = "SELECT * FROM `users` WHERE `username` = '$Uname' OR `name` = '$name'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if (empty($name) || empty($Uname) || empty($Pword) || empty($CPword)) {
            $_SESSION['message'] = "You have left some fields empty";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($row['username'] == $Uname) {
            $_SESSION['message'] = "The Username you entered already exists. Please choose a different one";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($row['name'] == $name) {
            $_SESSION['message'] = "There is already a name called " . $name . ". It would be better to use a different one.";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($Pword != $CPword) {
            $_SESSION['message'] = "There is a mismatch in the password";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $sql = "INSERT INTO `users`(`name`, `username`, `password`, `types`, `isApproved`) VALUES ('$name','$Uname','$Pword','2','1')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['message'] = "You have successfully created a new user";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['message'] = "There was an error creating a new user";
                $_SESSION['icon'] = "error";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}

function User()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $Uname = $_POST['username'];
        $Pword = $_POST['password'];
        $CPword = $_POST['Cpassword'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $blood = $_POST['blood'];

        $sql = "SELECT * FROM `users` WHERE `username` = '$Uname' OR `name` = '$name' or `email` = '$email' or `phone` = '$phone'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if (empty($name) || empty($Uname) || empty($Pword) || empty($CPword) || empty($email) || empty($phone) || empty($address) || empty($blood)) {
            $_SESSION['message'] = "You have left some fields empty";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($row['username'] == $Uname) {
            $_SESSION['message'] = "The Username you entered already exists. Please choose a different one";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($row['name'] == $name) {
            $_SESSION['message'] = "There is already a name called " . $name . ". It would be better to use a different one.";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($row['email'] == $email) {
            $_SESSION['message'] = "Email already exists. Please choose a different one";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($row['phone'] == $phone) {
            $_SESSION['message'] = "Phone number already exists. Please choose a different one";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($Pword != $CPword) {
            $_SESSION['message'] = "There is a mismatch in the password";
            $_SESSION['icon'] = "warning";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $sql = "INSERT INTO `users`(`name`, `username`, `password`, `types`, `isApproved`, `email`, `phone`, `address`, `blood`) VALUES ('$name','$Uname','$Pword','3','1','$email','$phone','$address','$blood')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['message'] = "You have successfully created a new user";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['message'] = "There was an error creating a new user";
                $_SESSION['icon'] = "error";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}
?>