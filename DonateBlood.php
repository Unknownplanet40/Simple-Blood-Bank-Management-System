<?php
@include 'config.php';
session_start();

function SM()
{
    $_SESSION['message'] = "Thank you for donating blood";
    $_SESSION['icon'] = "success";
    $_SESSION['isTrue'] = true;
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['Donate'])) {
    $donor_id = $_POST['id'];
    $Blood_Amount = $_POST['blood'];
    $BT = $_POST['blood_type'];
    $user = $_SESSION['user_id'];

    $sql = "SELECT `blood_unit` FROM `donation` WHERE `user_id` = '$donor_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $unit = $row['blood_unit'];


    if ($Blood_Amount > $unit) {
        $_SESSION['message'] = "For your own safety, you can no longer donate blood";
        $_SESSION['icon'] = "info";
        $_SESSION['isTrue'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $unit = $unit - $Blood_Amount;
        $sql = "UPDATE `donation` SET `blood_unit` = '$unit' WHERE `user_id` = '$donor_id';";
        # mysli_query($conn, $sql) means that it will execute the query and return the result of the query to the variable $result 
        $result = mysqli_query($conn, $sql);

        $ismulti = false;

        # ap - A+
        # am - A-
        # bp - B+
        # bm - B-
        # abp - AB+
        # abm - AB-
        # op - O+
        # om - O-
        # r - results

        if ($result) {
            switch ($BT) {
                case 'A+': //A+ and AB+

                    # Gusto ko sana mag add ng code na kung mag donate ka ng blood, 
                    # 1/4 ng amount na yun is mapupunta sa other blood types na compatible sa blood type mo

                    # example
                    # 450 ml of blood donated by A+
                    # quarter of 450 ml = 112.5 ml
                    # if the value has a decimal, round it up to the nearest whole number
                    # 112.5 ml = 113 ml
                    # now minus the quarter from the blood amount
                    # 450 ml - 113 ml = 337 ml
                    # the new amount is 337 ml will be added to Blood Bank A+
                    # the quarter is 113 ml will be added to compatible blood types
                    # like A- and AB- and A+ and AB+

                    # nahhhhh! nakakatamad hahahahha comment ko nlang muna incase lang na gamitin.
                    # floor function is used to round down the value to the nearest whole number
                    #$Quarter_Amount = floor($Blood_Amount / 4);
                    #$New_Amount = $Blood_Amount - $Quarter_Amount;

                    # I don't know how to use multi query in php so i used this method instead
                    $ap = "UPDATE `blood_types` SET `A_plus` = `A_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $abp = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $donated = "UPDATE `blood_types` SET `A_plus` = `A_plus` + $Blood_Amount WHERE `blood_id` = 3";

                    $r = mysqli_query($conn, $ap);
                    $r1 = mysqli_query($conn, $abp);
                    $r2 = mysqli_query($conn, $donated);

                    if ($r && $r1 && $r2) {
                        SM();
                    } else {
                        $_SESSION['message'] = "We are sorry, We cannot process your request at this time. [A+]";
                        $_SESSION['icon'] = "error";
                        $_SESSION['isTrue'] = true;
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    }
                    break;
                case 'A-': //A- and AB- and A+ and AB+
                    $am = "UPDATE `blood_types` SET `A_minus` = `A_minus` + $Blood_Amount WHERE `blood_id` = 2";
                    $abm = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` + $Blood_Amount WHERE `blood_id` = 2";
                    $ap = "UPDATE `blood_types` SET `A_plus` = `A_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $abp = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $donated = "UPDATE `blood_types` SET `A_minus` = `A_minus` + $Blood_Amount WHERE `blood_id` = 3";


                    $r = mysqli_query($conn, $am);
                    $r1 = mysqli_query($conn, $abm);
                    $r2 = mysqli_query($conn, $ap);
                    $r3 = mysqli_query($conn, $abp);
                    $r4 = mysqli_query($conn, $donated);

                    if ($r && $r1 && $r2 && $r3 && $r4) {
                        SM();
                    } else {
                        $_SESSION['message'] = "We are sorry, We cannot process your request at this time. [A-]";
                        $_SESSION['icon'] = "error";
                        $_SESSION['isTrue'] = true;
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    }
                    break;
                case 'B+': //B+ and AB+
                    $bp = "UPDATE `blood_types` SET `B_plus` = `B_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $abp = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $donated = "UPDATE `blood_types` SET `B_plus` = `B_plus` + $Blood_Amount WHERE `blood_id` = 3";

                    $r = mysqli_query($conn, $bp);
                    $r1 = mysqli_query($conn, $abp);
                    $r2 = mysqli_query($conn, $donated);

                    if ($r && $r1 && $r2) {
                        SM();
                    } else {
                        $_SESSION['message'] = "We are sorry, We cannot process your request at this time. [B+]";
                        $_SESSION['icon'] = "error";
                        $_SESSION['isTrue'] = true;
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    }
                    break;
                case 'B-': //B- and AB- and B+ and AB+
                    $bm = "UPDATE `blood_types` SET `B_minus` = `B_minus` + $Blood_Amount WHERE `blood_id` = 2";
                    $abm = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` + $Blood_Amount WHERE `blood_id` = 2";
                    $bp = "UPDATE `blood_types` SET `B_plus` = `B_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $abp = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $donated = "UPDATE `blood_types` SET `B_minus` = `B_minus` + $Blood_Amount WHERE `blood_id` = 3";


                    $r = mysqli_query($conn, $bm);
                    $r1 = mysqli_query($conn, $abm);
                    $r2 = mysqli_query($conn, $bp);
                    $r3 = mysqli_query($conn, $abp);
                    $r4 = mysqli_query($conn, $donated);

                    if ($r && $r1 && $r2 && $r3 && $r4) {
                        SM();
                    } else {
                        $_SESSION['message'] = "We are sorry, We cannot process your request at this time. [B-]";
                        $_SESSION['icon'] = "error";
                        $_SESSION['isTrue'] = true;
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    }
                    break;
                case 'AB+': //AB+
                    $sql = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $donated = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + $Blood_Amount WHERE `blood_id` = 3";

                    $r = mysqli_query($conn, $sql);
                    $r1 = mysqli_query($conn, $donated);

                    if ($r && $r1) {
                        SM();
                    } else {
                        $_SESSION['message'] = "We are sorry, We cannot process your request at this time. [AB+]";
                        $_SESSION['icon'] = "error";
                        $_SESSION['isTrue'] = true;
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    }
                    break;
                case 'AB-': //AB- and AB+
                    $abm = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` + $Blood_Amount WHERE `blood_id` = 2";
                    $abp = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $donated = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` + $Blood_Amount WHERE `blood_id` = 3";

                    $r = mysqli_query($conn, $abm);
                    $r1 = mysqli_query($conn, $abp);
                    $r2 = mysqli_query($conn, $donated);

                    if ($r && $r1 && $r2) {
                        SM();
                    } else {
                        $_SESSION['message'] = "We are sorry, We cannot process your request at this time. [AB-]";
                        $_SESSION['icon'] = "error";
                        $_SESSION['isTrue'] = true;
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    }
                    break;
                case 'O+': //O+ and A+ and B+ and AB+
                    $op = "UPDATE `blood_types` SET `O_plus` = `O_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $ap = "UPDATE `blood_types` SET `A_plus` = `A_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $bp = "UPDATE `blood_types` SET `B_plus` = `B_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $abp = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $donated = "UPDATE `blood_types` SET `O_plus` = `O_plus` + $Blood_Amount WHERE `blood_id` = 3";


                    $r = mysqli_query($conn, $op);
                    $r1 = mysqli_query($conn, $ap);
                    $r2 = mysqli_query($conn, $bp);
                    $r3 = mysqli_query($conn, $abp);

                    if ($r && $r1 && $r2 && $r3) {
                        SM();
                    } else {
                        $_SESSION['message'] = "We are sorry, We cannot process your request at this time. [O+]";
                        $_SESSION['icon'] = "error";
                        $_SESSION['isTrue'] = true;
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    }
                    break;
                case 'O-': //O- and O+ and A- and A+ and B- and B+ and AB- and AB+
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` + $Blood_Amount WHERE `blood_id` = 2";
                    $op = "UPDATE `blood_types` SET `O_plus` = `O_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $am = "UPDATE `blood_types` SET `A_minus` = `A_minus` + $Blood_Amount WHERE `blood_id` = 2";
                    $ap = "UPDATE `blood_types` SET `A_plus` = `A_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $bm = "UPDATE `blood_types` SET `B_minus` = `B_minus` + $Blood_Amount WHERE `blood_id` = 2";
                    $bp = "UPDATE `blood_types` SET `B_plus` = `B_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $abm = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` + $Blood_Amount WHERE `blood_id` = 2";
                    $abp = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` + $Blood_Amount WHERE `blood_id` = 2";
                    $donated = "UPDATE `blood_types` SET `O_minus` = `O_minus` + $Blood_Amount WHERE `blood_id` = 3";

                    $r = mysqli_query($conn, $om);
                    $r1 = mysqli_query($conn, $op);
                    $r2 = mysqli_query($conn, $am);
                    $r3 = mysqli_query($conn, $ap);
                    $r4 = mysqli_query($conn, $bm);
                    $r5 = mysqli_query($conn, $bp);
                    $r6 = mysqli_query($conn, $abm);
                    $r7 = mysqli_query($conn, $abp);
                    $r8 = mysqli_query($conn, $donated);

                    if ($r && $r1 && $r2 && $r3 && $r4 && $r5 && $r6 && $r7 && $r8) {
                        SM();
                    } else {
                        $_SESSION['message'] = "We are sorry, We cannot process your request at this time. [O-]";
                        $_SESSION['icon'] = "error";
                        $_SESSION['isTrue'] = true;
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    }
                    break;
                default:
                    # this is just a default case just in case the user tries to input a wrong blood type that is not in the database
                    $_SESSION['message'] = "How did you get here? if you are a hacker, you are not welcome here";
                    $_SESSION['icon'] = "error";
                    $_SESSION['isTrue'] = true;
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    break;
            }
        } else {
            $_SESSION['message'] = "There was an error updating your Data";
            $_SESSION['icon'] = "error";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}