<?php
@include 'config.php';
session_start();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $blood = $_POST['blood'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $Usertype = $_SESSION['types'];
    $date = date("Y-m-d");

    $uname = $_SESSION['current_username'];

    $sql = "SELECT *  FROM `donation` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $_SESSION['message'] = "Please use a different email address since the one you entered already exists";
        $_SESSION['icon'] = "info";
        $_SESSION['isTrue'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } elseif ($blood == "unknown") {
        $_SESSION['message'] = "Please select a blood type from the dropdown menu before submitting";
        $_SESSION['icon'] = "info";
        $_SESSION['isTrue'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $sql = "INSERT INTO `donation`(`name`, `email`, `blood_type`, `address`, `phone`, `who_create`, `blood_unit`, `datecreated`) VALUES ('$name','$email','$blood','$address','$phone', '$uname', '4050', '$date')";
        $result = mysqli_query($conn, $sql);

        $ismulti = false;

        if ($result) {
            switch ($blood) {

                case 'A+':
                    $sql = "UPDATE `blood_types` SET `A_plus` = `A_plus` + 1 WHERE `blood_id` = 1";
                    $sql1 = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + 1 WHERE `blood_id` = 1";
                    $ismulti = true;
                    break;
                case 'A-':
                    $sql = "UPDATE `blood_types` SET `A_minus` = `A_minus` + 1 WHERE `blood_id` = 1";
                    $sql1 = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` + 1 WHERE `blood_id` = 1";
                    $ismulti = true;
                    break;
                case 'B+':
                    $sql = "UPDATE `blood_types` SET `B_plus` = `B_plus` + 1 WHERE `blood_id` = 1";
                    $sql1 = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + 1 WHERE `blood_id` = 1";
                    $ismulti = true;
                    break;
                case 'B-':
                    $sql = "UPDATE `blood_types` SET `B_minus` = `B_minus` + 1 WHERE `blood_id` = 1";
                    $sql1 = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` + 1 WHERE `blood_id` = 1";
                    $ismulti = true;
                    break;
                case 'AB+':
                    $sql = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + 1 WHERE `blood_id` = 1";
                    break;
                case 'AB-':
                    $sql = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` + 1 WHERE `blood_id` = 1";
                    break;
                case 'O+':
                    $sql = "UPDATE `blood_types` SET `O_plus` = `O_plus` + 1 WHERE `blood_id` = 1";
                    $sql1 = "UPDATE `blood_types` SET `O_minus` = `O_minus` + 1 WHERE `blood_id` = 1";
                    $ismulti = true;
                    break;
                case 'O-':
                    $sql = "UPDATE `blood_types` SET `O_minus` = `O_minus` + 1 WHERE `blood_id` = 1";
                    break;
            }

            if ($ismulti) {
                $result = mysqli_query($conn, $sql);
                $result1 = mysqli_query($conn, $sql1);
                $ismulti = false;
            } else {
                $result = mysqli_query($conn, $sql);
            }
            if ($result) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['message'] = "There was an error Adding your Data";
                $_SESSION['icon'] = "error";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                //echo '<script>alert("Blood type not updated")</script>';
            }

            /* if ($conn->multi_query($sql) === TRUE) {
            $_SESSION['message'] = "Account Added Successfully";
            $_SESSION['icon'] = "success";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
            $result = mysqli_query($conn, $sql);
            if ($result) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
            $_SESSION['message'] = "There was an error Adding your Data";
            $_SESSION['icon'] = "error";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
            //echo '<script>alert("Blood type not updated")</script>';
            }
            } */
        } else {
            $_SESSION['message'] = "Account not Added ";
            $_SESSION['icon'] = "error";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}
?>