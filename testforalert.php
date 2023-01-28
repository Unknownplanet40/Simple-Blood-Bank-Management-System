<?php
include 'Popup_Alert.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Stylesheet/bootstrap.css">
    <script src="./Scripts/jquery.js"></script>
    <script src="./Scripts/sweetalert2.js"></script>
</head>

<body>
    <?php

    //This page is for testing the alert box only and it will be deleted later [maybe]
    $Test_the_Alert = 6;

    if ($Test_the_Alert == 1){
        $_SESSION['message'] = "Testing for success Alert Box";
        $_SESSION['icon'] = "success";
        $_SESSION['isTrue'] = "true";

        echo NewAlertBox();
    } else if ($Test_the_Alert == 2){
        $_SESSION['message'] = "Testing for question Alert Box";
        $_SESSION['icon'] = "question";
        $_SESSION['isTrue'] = "true";

        echo NewAlertBox();
    } else if ($Test_the_Alert == 3){
        $_SESSION['message'] = "Testing for error Alert Box";
        $_SESSION['icon'] = "error";
        $_SESSION['isTrue'] = "true";

        echo NewAlertBox();
    } else if ($Test_the_Alert == 4){
        $_SESSION['message'] = "Testing for warning Alert Box";
        $_SESSION['icon'] = "warning";
        $_SESSION['isTrue'] = "true";

        echo NewAlertBox();
    } else if ($Test_the_Alert == 5){
        $_SESSION['message'] = "Testing for info Alert Box";
        $_SESSION['icon'] = "info";
        $_SESSION['isTrue'] = "true";

        echo NewAlertBox();
    } else if ($Test_the_Alert == 6){
        $_SESSION['message'] = "Testing for others Alert Box";
        $_SESSION['icon'] = "others";
        $_SESSION['isTrue'] = "true";

        echo NewAlertBox();
    }
    ?>

</body>

</html>