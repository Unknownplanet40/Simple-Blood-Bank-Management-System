<?php
@include 'config.php';
session_start();

if (isset($_SESSION['current_username'])) {
    $username = $_SESSION['current_username'];
    $status = $_SESSION['current_types'];
    $AccID = $_SESSION['current_userID'];

    if (isset($_POST['submit'])) {
        $ID = $_POST['ID'];
        $name = $_POST['name'];
        $Uname = $_POST['username'];
        $Pword = $_POST['password'];

        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $old_name = $row['name'];
        $old_username = $row['username'];
        $old_password = $row['password'];

        if ($account_status == 2) {
            $_SESSION['message'] = "Your account is denied!";
            $_SESSION['icon'] = "error";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            // check if the data is the same as the old data
            if ($name == $old_name && $Uname == $old_username && $Pword == $old_password) {
                $_SESSION['message'] = "No changes have been made!";
                $_SESSION['icon'] = "info";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                # Check if the new data is already in the database
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
                } else {
                    $sql = "UPDATE `users` SET `name` = '$name', `username` = '$Uname', `password` = '$Pword' WHERE `user_id` = '$ID';";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {

                        if ($ID == $AccID) {
                            if ($status == 2) {
                                $_SESSION['message'] = "Your account has been successfully updated! But you need to re-login to see the changes.";
                                $_SESSION['icon'] = "success-login";
                                $_SESSION['isTrue'] = true;
                                $_SESSION['username'] = $Uname;
                                header("Location: " . $_SERVER['HTTP_REFERER']);
                            } else {
                                $_SESSION['message'] = "Your account Has been successfully updated! But you need to re-login to see the changes.";
                                $_SESSION['icon'] = "success-login";
                                $_SESSION['isTrue'] = true;
                                $_SESSION['username'] = $Uname;
                                header("Location: " . $_SERVER['HTTP_REFERER']);
                            }
                        } else {
                            $_SESSION['message'] = "Account has been successfully updated!";
                            $_SESSION['icon'] = "success";
                            $_SESSION['isTrue'] = true;
                            header("Location: " . $_SERVER['HTTP_REFERER']);
                        }
                    } else {
                        $_SESSION['message'] = "We encountered an error while updating your account! Please try again later.";
                        $_SESSION['icon'] = "error";
                        $_SESSION['isTrue'] = true;
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    }
                }
            }
        }
    }

} else {
    header("Location: ErrorPage.php?e=3");
}

echo "You can't access this page directly! you will be redirected to the Login page in a few seconds.";
#refresh the page after 3 seconds and redirect to the previous page

#check if the page is accessed from the previous page
if (isset($_SERVER['HTTP_REFERER'])) {
    header("refresh:3;url=$_SERVER[HTTP_REFERER]");
} else {
    header("refresh:3;url=Login.php");
}

?>