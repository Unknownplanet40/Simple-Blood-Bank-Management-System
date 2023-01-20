<?php
@include 'config.php';
session_start();

if (isset($_GET['user_id'])) {
    $userID = $_GET['user_id'];

    //get the blood type and the amount of blood requested
    $sql = "SELECT * FROM `request` WHERE `user_id` = '$userID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $blood = $row['blood_type'];
    $amount = $row['requested'];
    $old_amount = $row['requested'];

    // get the available blood stock
    $sql = "SELECT * FROM `blood_types` WHERE `blood_id` = 2";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $A_plus = $row['A_plus'];
    $A_minus = $row['A_minus'];
    $B_plus = $row['B_plus'];
    $B_minus = $row['B_minus'];
    $AB_plus = $row['AB_plus'];
    $AB_minus = $row['AB_minus'];
    $O_plus = $row['O_plus'];
    $O_minus = $row['O_minus'];

    // Combine all compatible blood types to one variable for each blood type to check if there is enough blood in stock
    $New_AP = $A_plus + $A_minus + $O_plus + $O_minus;
    $New_AM = $A_minus + $O_minus;
    $New_BP = $B_plus + $B_minus + $O_plus + $O_minus;
    $New_BM = $B_minus + $O_minus;
    $New_AB = $AB_plus + $AB_minus + $A_plus + $A_minus + $B_plus + $B_minus + $O_plus + $O_minus;
    $New_ABM = $AB_minus + $A_minus + $B_minus + $O_minus;
    $New_OP = $O_plus + $O_minus;
    $New_OM = $O_minus;


    #Blood Type     You can give blood to   You can receive blood from
    #A+             A+, AB+                A+, A-, O+, O-
    #A-             A-, AB-                A-, O-
    #B+             B+, AB+                B+, B-, O+, O-
    #B-             B-, AB-                B-, O-
    #AB+            AB+                    A+, A-, B+, B-, AB+, AB-, O+, O-
    #AB-            AB-                    A-, B-, AB-, O-
    #O+             O+, O-                 O+, O-
    #O-             O-                     O-
    
    
    switch ($blood){
        case "A+": # A+ and A- and O+ and O-

            # check if there is enough blood in stock
            if ($amount > $New_AP) {
                $_SESSION['message'] = "Approve failed. There is not enough blood in stock";
                $_SESSION['icon'] = "info";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                # update the request table
                $sql = "UPDATE `request` SET `isapproved` = '1' WHERE `user_id` = '$userID'";
                mysqli_query($conn, $sql);
                
                # divide the amount of blood requested by 4 to get the amount of blood to deduct from each blood type
                $value = floor($amount / 4);

                # check if the blood type is 0, if it is 0 then set the value to 0
                # else deduct the value from the blood type
                if ($A_plus == 0) {
                    $ap = "UPDATE `blood_types` SET `A_plus` = `A_plus` = '0' WHERE `blood_id` = 2";
                } else {
                    $ap = "UPDATE `blood_types` SET `A_plus` = `A_plus` - '$value' WHERE `blood_id` = 2";
                }
                if ($A_minus == 0) {
                    $am = "UPDATE `blood_types` SET `A_minus` = `A_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $am = "UPDATE `blood_types` SET `A_minus` = `A_minus` - '$value' WHERE `blood_id` = 2";
                }
                if ($O_plus == 0) {
                    $op = "UPDATE `blood_types` SET `O_plus` = `O_plus` - '0' WHERE `blood_id` = 2";
                } else {
                    $op = "UPDATE `blood_types` SET `O_plus` = `O_plus` - '$value' WHERE `blood_id` = 2";
                }
                if ($O_minus == 0) {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '$value' WHERE `blood_id` = 2";
                }

                mysqli_query($conn, $ap);
                mysqli_query($conn, $am);
                mysqli_query($conn, $op);
                mysqli_query($conn, $om);

                $_SESSION['message'] = "Request approved, blood has been deducted from Blood type [A+, A-, O+, O-]";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            break;
        case "A-": # A- and O-
            if ($amount > $New_AM) {
                $_SESSION['message'] = "Approve failed. There is not enough blood in stock";
                $_SESSION['icon'] = "info";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $sql = "UPDATE `request` SET `isapproved` = '1' WHERE `user_id` = '$userID'";
                mysqli_query($conn, $sql);

                $value = floor($amount / 2);

                if ($A_minus == 0) {
                    $am = "UPDATE `blood_types` SET `A_minus` = `A_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $am = "UPDATE `blood_types` SET `A_minus` = `A_minus` - '$value' WHERE `blood_id` = 2";
                }
                if ($O_minus == 0) {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '$value' WHERE `blood_id` = 2";
                }

                mysqli_query($conn, $am);
                mysqli_query($conn, $om);

                $_SESSION['message'] = "Request approved, blood has been deducted from Blood type [A-, O-]";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            break;
        case "B+": # B+ and B- and O+ and O-
            if ($amount > $New_BP) {
                $_SESSION['message'] = "Approve failed. There is not enough blood in stock";
                $_SESSION['icon'] = "info";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $sql = "UPDATE `request` SET `isapproved` = '1' WHERE `user_id` = '$userID'";
                mysqli_query($conn, $sql);

                $value = floor($amount / 4);

                if ($B_plus == 0) {
                    $bp = "UPDATE `blood_types` SET `B_plus` = `B_plus` - '0' WHERE `blood_id` = 2";
                } else {
                    $bp = "UPDATE `blood_types` SET `B_plus` = `B_plus` - '$value' WHERE `blood_id` = 2";
                }
                if ($B_minus == 0) {
                    $bm = "UPDATE `blood_types` SET `B_minus` = `B_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $bm = "UPDATE `blood_types` SET `B_minus` = `B_minus` - '$value' WHERE `blood_id` = 2";
                }
                if ($O_plus == 0) {
                    $op = "UPDATE `blood_types` SET `O_plus` = `O_plus` - '0' WHERE `blood_id` = 2";
                } else {
                    $op = "UPDATE `blood_types` SET `O_plus` = `O_plus` - '$value' WHERE `blood_id` = 2";
                }
                if ($O_minus == 0) {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '$value' WHERE `blood_id` = 2";
                }

                mysqli_query($conn, $bp);
                mysqli_query($conn, $bm);
                mysqli_query($conn, $op);
                mysqli_query($conn, $om);

                $_SESSION['message'] = "Request approved, blood has been deducted from Blood type [B+, B-, O+, O-]";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            break;
        case "B-": # B- and O-
            if ($amount > $New_BM) {
                $_SESSION['message'] = "Approve failed. There is not enough blood in stock";
                $_SESSION['icon'] = "info";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $sql = "UPDATE `request` SET `isapproved` = '1' WHERE `user_id` = '$userID'";
                mysqli_query($conn, $sql);

                $value = floor($amount / 2);

                if ($B_minus == 0) {
                    $bm = "UPDATE `blood_types` SET `B_minus` = `B_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $bm = "UPDATE `blood_types` SET `B_minus` = `B_minus` - '$value' WHERE `blood_id` = 2";
                }
                if ($O_minus == 0) {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '$value' WHERE `blood_id` = 2";
                }

                mysqli_query($conn, $bm);
                mysqli_query($conn, $om);

                $_SESSION['message'] = "Request approved, blood has been deducted from Blood type [B-, O-]";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            break;
        case "AB+": # AB+ and AB- and A+ and A- and B+ and B- and O+ and O-
            if ($amount > $New_AB) {
                $_SESSION['message'] = "Approve failed. There is not enough blood in stock";
                $_SESSION['icon'] = "info";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $sql = "UPDATE `request` SET `isapproved` = '1' WHERE `user_id` = '$userID'";
                mysqli_query($conn, $sql);

                $value = floor($amount / 8);

                if ($AB_plus == 0) {
                    $abp = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` - '0' WHERE `blood_id` = 2";
                } else {
                    $abp = "UPDATE `blood_types` SET `AB_plus` = `AB_plus` - '$value' WHERE `blood_id` = 2";
                }
                if ($AB_minus == 0) {
                    $abm = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $abm = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` - '$value' WHERE `blood_id` = 2";
                }
                if ($A_plus == 0) {
                    $ap = "UPDATE `blood_types` SET `A_plus` = `A_plus` - '0' WHERE `blood_id` = 2";
                } else {
                    $ap = "UPDATE `blood_types` SET `A_plus` = `A_plus` - '$value' WHERE `blood_id` = 2";
                }
                if ($A_minus == 0) {
                    $am = "UPDATE `blood_types` SET `A_minus` = `A_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $am = "UPDATE `blood_types` SET `A_minus` = `A_minus` - '$value' WHERE `blood_id` = 2";
                }
                if ($B_plus == 0) {
                    $bp = "UPDATE `blood_types` SET `B_plus` = `B_plus` - '0' WHERE `blood_id` = 2";
                } else {
                    $bp = "UPDATE `blood_types` SET `B_plus` = `B_plus` - '$value' WHERE `blood_id` = 2";
                }
                if ($B_minus == 0) {
                    $bm = "UPDATE `blood_types` SET `B_minus` = `B_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $bm = "UPDATE `blood_types` SET `B_minus` = `B_minus` - '$value' WHERE `blood_id` = 2";
                }
                if ($O_plus == 0) {
                    $op = "UPDATE `blood_types` SET `O_plus` = `O_plus` - '0' WHERE `blood_id` = 2";
                } else {
                    $op = "UPDATE `blood_types` SET `O_plus` = `O_plus` - '$value' WHERE `blood_id` = 2";
                }
                if ($O_minus == 0) {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '$value' WHERE `blood_id` = 2";
                }

                mysqli_query($conn, $abp);
                mysqli_query($conn, $abm);
                mysqli_query($conn, $ap);
                mysqli_query($conn, $am);
                mysqli_query($conn, $bp);
                mysqli_query($conn, $bm);
                mysqli_query($conn, $op);
                mysqli_query($conn, $om);

                $_SESSION['message'] = "Request approved, blood has been deducted from Every Blood type";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            break;
        case "AB-": # AB- and A- and B- and O-
            if ($amount > $New_AB) {
                $_SESSION['message'] = "Approve failed. There is not enough blood in stock";
                $_SESSION['icon'] = "info";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $sql = "UPDATE `request` SET `isapproved` = '1' WHERE `user_id` = '$userID'";
                mysqli_query($conn, $sql);

                $value = floor($amount / 4);

                if ($AB_minus == 0) {
                    $abm = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $abm = "UPDATE `blood_types` SET `AB_minus` = `AB_minus` - '$value' WHERE `blood_id` = 2";
                }
                if ($A_minus == 0) {
                    $am = "UPDATE `blood_types` SET `A_minus` = `A_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $am = "UPDATE `blood_types` SET `A_minus` = `A_minus` - '$value' WHERE `blood_id` = 2";
                }
                if ($B_minus == 0) {
                    $bm = "UPDATE `blood_types` SET `B_minus` = `B_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $bm = "UPDATE `blood_types` SET `B_minus` = `B_minus` - '$value' WHERE `blood_id` = 2";
                }
                if ($O_minus == 0) {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '$value' WHERE `blood_id` = 2";
                }

                mysqli_query($conn, $abm);
                mysqli_query($conn, $am);
                mysqli_query($conn, $bm);
                mysqli_query($conn, $om);

                $_SESSION['message'] = "Request approved, blood has been deducted from Blood type [AB-, A-, B-, O-]";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            break;
        case "O+": # O+ and O-
            if ($amount > $New_O) {
                $_SESSION['message'] = "Approve failed. There is not enough blood in stock";
                $_SESSION['icon'] = "info";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $sql = "UPDATE `request` SET `isapproved` = '1' WHERE `user_id` = '$userID'";
                mysqli_query($conn, $sql);

                $value = floor($amount / 2);

                if ($O_plus == 0) {
                    $op = "UPDATE `blood_types` SET `O_plus` = `O_plus` - '0' WHERE `blood_id` = 2";
                } else {
                    $op = "UPDATE `blood_types` SET `O_plus` = `O_plus` - '$value' WHERE `blood_id` = 2";
                }
                if ($O_minus == 0) {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '$value' WHERE `blood_id` = 2";
                }

                mysqli_query($conn, $op);
                mysqli_query($conn, $om);

                $_SESSION['message'] = "Request approved, blood has been deducted from Blood type [O+, O-]";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            break;
        case "O-": # O-
            if ($amount > $New_O) {
                $_SESSION['message'] = "Approve failed. There is not enough blood in stock";
                $_SESSION['icon'] = "info";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                $sql = "UPDATE `request` SET `isapproved` = '1' WHERE `user_id` = '$userID'";
                mysqli_query($conn, $sql);

                $value = floor($amount / 2);

                if ($O_minus == 0) {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '0' WHERE `blood_id` = 2";
                } else {
                    $om = "UPDATE `blood_types` SET `O_minus` = `O_minus` - '$value' WHERE `blood_id` = 2";
                }

                mysqli_query($conn, $om);

                $_SESSION['message'] = "Request approved, blood has been deducted from Blood type [O-]";
                $_SESSION['icon'] = "success";
                $_SESSION['isTrue'] = true;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            break;
        default:
            $_SESSION['message'] = "What are you doing here? your not supposed to be here";
            $_SESSION['icon'] = "info";
            $_SESSION['isTrue'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
            break;
    } 
} else {
    $_SESSION['message'] = "It Cannot be approved because it is already approved or rejected or cancelled by the user or the user is not eligible to donate blood";
    $_SESSION['icon'] = "info";
    $_SESSION['isTrue'] = true;
    header("Location: " . $_SERVER['HTTP_REFERER']);
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