<?php
@include 'config.php';
session_start();

if (isset($_GET['user_id'])) {
    $userID = $_GET['user_id'];
    $blood = $_GET['blood_type'];

    $sql = "SELECT `blood_type` FROM `donation` WHERE `user_id` = '$userID';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $old_blood = $row['blood_type'];

    if ($old_blood == $blood) {
        $sql = "DELETE FROM donation WHERE `user_id` = '$userID'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['message'] = "Error Occurred while deleting the record";
            $_SESSION['icon'] = "error";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    } else {
        $sql = "DELETE FROM donation WHERE `user_id` = '$userID'";
        $result = mysqli_query($conn, $sql);

        $ismultiple = false;

        if ($result) {
            switch ($old_blood) {
                case 'A+':
                    $sql = "UPDATE `blood_types` SET `A_plus` = `A_plus` - 1 WHERE `blood_id` = 1";
                    $sql1 = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` - 1 WHERE `blood_id` = 1";
                    $ismultiple = true;
                    break;
                case 'A-':
                    $sql = "UPDATE `blood_types` SET `A_minus` = `A_minus` - 1 WHERE `blood_id` = 1";
                    $sql1 = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` - 1 WHERE `blood_id` = 1";
                    $ismultiple = true;
                    break;
                case 'B+':
                    $sql = "UPDATE `blood_types` SET `B_plus` = `B_plus` - 1 WHERE `blood_id` = 1";
                    $sql1 = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` - 1 WHERE `blood_id` = 1";
                    $ismultiple = true;
                    break;
                case 'B-':
                    $sql = "UPDATE `blood_types` SET `B_minus` = `B_minus` - 1 WHERE `blood_id` = 1";
                    $sql1 = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` - 1 WHERE `blood_id` = 1";
                    $ismultiple = true;
                    break;
                case 'AB+':
                    $sql = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` - 1 WHERE `blood_id` = 1";
                    break;
                case 'AB-':
                    $sql = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` - 1 WHERE `blood_id` = 1";
                    break;
                case 'O+':
                    $sql = "UPDATE `blood_types` SET `O_plus` = `O_plus` - 1 WHERE `blood_id` = 1";
                    $sql1 = "UPDATE `blood_types` SET `O_minus` = `O_minus` - 1 WHERE `blood_id` = 1";
                    $ismultiple = true;
                    break;
                case 'O-':
                    $sql = "UPDATE `blood_types` SET `O_minus` = `O_minus` - 1 WHERE `blood_id` = 1";
                    break;
            }

            if ($ismultiple) {
                $res1 = mysqli_query($conn, $sql);
                $res2 = mysqli_query($conn, $sql1);

                if ($res1 && $res2) {
                    $ismultiple = false;
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } else {
                    $_SESSION['message'] = "We are sorry, but we couldn't update the blood bank.";
                    $_SESSION['icon'] = "error";
                    $_SESSION['isTrue'] = true;
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }
            } else {
                $res = mysqli_query($conn, $sql);

                if ($res) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } else {
                    $_SESSION['message'] = "We are sorry, but we couldn't update the blood bank.";
                    $_SESSION['icon'] = "error";
                    $_SESSION['isTrue'] = true;
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            $_SESSION['message'] = "Error: " . mysqli_error($conn);
            $_SESSION['icon'] = "error";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}
?>