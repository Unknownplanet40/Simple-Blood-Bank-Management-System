<?php
@include 'config.php';
session_start();

# incase user forgot to input blood type before updating this will refresh
# the page to update the blood type
$refresh0 = false;
$refresh1 = false;

//get id from last page
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $blood = $_POST['blood'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    //old data
    $sql = "SELECT *  FROM `donation` WHERE `user_id` = '$id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $old_blood = $row['blood_type'];

    if ($blood == $old_blood) {
        $sql = "UPDATE `donation` SET `name` = '$name', `email` = '$email', `blood_type` = '$blood', `address` = '$address', `phone` = '$phone' WHERE `user_id` = '$id';";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['message'] = "Data not updated due to an error";
            $_SESSION['icon'] = "error";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }else {
        updateOldBlood($old_blood);
        updateNewBlood($blood);

        if ($refresh0 && $refresh1) {
            //refresh page
            header("Refresh: 0; url=DonorUpdate.php");
        } else {
            $sql = "UPDATE `donation` SET `name` = '$name', `email` = '$email', `blood_type` = '$blood', `address` = '$address', `phone` = '$phone' WHERE `user_id` = '$id';";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['message'] = "Data not updated due to an error in the database connection";
                $_SESSION['icon'] = "error";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}
function updateOldBlood($old_blood)
{
    include('config.php');
    $disabled = false;
    switch ($old_blood) {
        case 'A+':
            $sql = "UPDATE `blood_types` SET `A_plus` = `A_plus` - 1 WHERE `blood_id` = 1";
            break;
        case 'A-':
            $sql = "UPDATE `blood_types` SET `A_minus` = `A_minus` - 1 WHERE `blood_id` = 1";
            break;
        case 'B+':
            $sql = "UPDATE `blood_types` SET `B_plus` = `B_plus` - 1 WHERE `blood_id` = 1";
            break;
        case 'B-':
            $sql = "UPDATE `blood_types` SET `B_minus` = `B_minus` - 1 WHERE `blood_id` = 1";
            break;
        case 'AB+':
            $sql = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` - 1 WHERE `blood_id` = 1";
            break;
        case 'AB-':
            $sql = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` - 1 WHERE `blood_id` = 1";
            break;
        case 'O+':
            $sql = "UPDATE `blood_types` SET `O_plus` = `O_plus` - 1 WHERE `blood_id` = 1";
            break;
        case 'O-':
            $sql = "UPDATE `blood_types` SET `O_minus` = `O_minus` - 1 WHERE `blood_id` = 1";
            break;
        default:
            $disabled = true;
            break;  
    }
    if (!$disabled){
        $result = mysqli_query($conn, $sql);
    } else {
        $refresh0 = true;
    }
}

function updateNewBlood($new_blood)
{
    include('config.php');
    $disabled = false;
    switch ($new_blood) {
        case 'A+':
            $sql = "UPDATE `blood_types` SET `A_plus` = `A_plus` + 1 WHERE `blood_id` = 1";
            break;
        case 'A-':
            $sql = "UPDATE `blood_types` SET `A_minus` = `A_minus` + 1 WHERE `blood_id` = 1";
            break;
        case 'B+':
            $sql = "UPDATE `blood_types` SET `B_plus` = `B_plus` + 1 WHERE `blood_id` = 1";
            break;
        case 'B-':
            $sql = "UPDATE `blood_types` SET `B_minus` = `B_minus` + 1 WHERE `blood_id` = 1";
            break;
        case 'AB+':
            $sql = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + 1 WHERE `blood_id` = 1";
            break;
        case 'AB-':
            $sql = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` + 1 WHERE `blood_id` = 1";
            break;
        case 'O+':
            $sql = "UPDATE `blood_types` SET `O_plus` = `O_plus` + 1 WHERE `blood_id` = 1";
            break;
        case 'O-':
            $sql = "UPDATE `blood_types` SET `O_minus` = `O_minus` + 1 WHERE `blood_id` = 1";
            break;
        default:
            $disabled = true;
            break;
    }
    if (!$disabled){
        $result = mysqli_query($conn, $sql);
    }else {
        $refresh1 = true;
    }
}


?>