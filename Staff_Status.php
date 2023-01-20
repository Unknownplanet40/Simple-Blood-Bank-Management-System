<?php
@include 'config.php';
session_start();

# refresh page after 20 seconds to see if the status is changed
header("Refresh: 20; url=Staff_Status.php");

if (isset($_SESSION['current_username'])) {

    $username = $_SESSION['current_username'];

    //check for update
    $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `is_login` = '1';";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    // current Users session
    $_SESSION['login'] = $row['is_login'];
    $_SESSION['status'] = $row['isApproved'];

    $status = $_SESSION['status'];

    if ($status == 1) {
        header("Location: Staff_BloodInventory.php");
    }

} else {
    //if $_SESSION['current_status'] is not set
    header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://img.icons8.com/fluency/512/doctors-bag.png" type="image/x-icon">
    <title>Account Status</title>
    <style>
    @import url(https://fonts.googleapis.com/css?family=opensans:500);

    :root {
        <?php if ($status==0) {
            echo "--bg: #33cc99;";
            echo "--tcolor: #0083B0;";
            echo "--cloud: #FFF;";

        }

        else if ($status==2) {
            echo "--bg: #ED213A;";
            echo "--tcolor: #fff;";
            echo "--cloud: #282a36;";
        }

        ?>
    }

    body {
        background: var(--bg);
        color: #fff;
        font-family: 'Open Sans',
            sans-serif;
        max-height: 700px;
        overflow: hidden;
    }

    .c {
        text-align: center;
        display: block;
        position: relative;
        width: 80%;
        margin: 100px auto;
    }

    ._404 {
        color: var(--tcolor);
        font-size: 220px;
        position: relative;
        display: inline-block;
        z-index: 2;
        height: 250px;
        letter-spacing: 15px;
    }

    ._1 {
        text-align: center;
        display: block;
        position: relative;
        letter-spacing: 12px;
        font-size: 4em;
        line-height: 80%;
    }

    ._2 {
        text-align: center;
        display: block;
        position: relative;
        font-size: 10px;
    }

    .text {
        font-size: 70px;
        text-align: center;
        position: relative;
        display: inline-block;
        margin: 19px 0px 0px 0px;
        /* top: 256.301px; */
        z-index: 3;
        width: 100%;
        line-height: 1.2em;
        display: inline-block;
    }


    .btn {
        background-color: rgb(255, 255, 255);
        position: relative;
        display: inline-block;
        width: 358px;
        padding: 5px;
        z-index: 5;
        font-size: 25px;
        margin: 0 auto;
        color: var(--bg);
        text-decoration: none;
        margin-right: 10px
    }

    .right {
        float: right;
        width: 60%;
    }

    hr {
        padding: 0;
        border: none;
        border-top: 5px solid #fff;
        color: #fff;
        text-align: center;
        margin: 0px auto;
        width: 420px;
        height: 10px;
        z-index: -10;
    }

    hr:after {
        content: "\2022";
        display: inline-block;
        position: relative;
        top: -0.75em;
        font-size: 2em;
        padding: 0 0.2em;
        background: var(--bg);
    }

    .cloud {
        width: 350px;
        height: 120px;

        background: var(--cloud);
        background: linear-gradient(top, var(--cloud) 100%);
        background: -webkit-linear-gradient(top, var(--cloud) 100%);
        background: -moz-linear-gradient(top, var(--cloud) 100%);
        background: -ms-linear-gradient(top, var(--cloud) 100%);
        background: -o-linear-gradient(top, var(--cloud) 100%);

        border-radius: 100px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;

        position: absolute;
        margin: 120px auto 20px;
        z-index: -1;
        transition: ease 1s;
    }

    .cloud:after,
    .cloud:before {
        content: '';
        position: absolute;
        background: var(--cloud);
        z-index: -1
    }

    .cloud:after {
        width: 100px;
        height: 100px;
        top: -50px;
        left: 50px;

        border-radius: 100px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
    }

    .cloud:before {
        width: 180px;
        height: 180px;
        top: -90px;
        right: 50px;

        border-radius: 200px;
        -webkit-border-radius: 200px;
        -moz-border-radius: 200px;
    }

    .x1 {
        top: -50px;
        left: 100px;
        -webkit-transform: scale(0.3);
        -moz-transform: scale(0.3);
        transform: scale(0.3);
        opacity: 0.9;
        -webkit-animation: moveclouds 15s linear infinite;
        -moz-animation: moveclouds 15s linear infinite;
        -o-animation: moveclouds 15s linear infinite;
    }

    .x1_5 {
        top: -80px;
        left: 250px;
        -webkit-transform: scale(0.3);
        -moz-transform: scale(0.3);
        transform: scale(0.3);
        -webkit-animation: moveclouds 17s linear infinite;
        -moz-animation: moveclouds 17s linear infinite;
        -o-animation: moveclouds 17s linear infinite;
    }

    .x2 {
        left: 250px;
        top: 30px;
        -webkit-transform: scale(0.6);
        -moz-transform: scale(0.6);
        transform: scale(0.6);
        opacity: 0.6;
        -webkit-animation: moveclouds 25s linear infinite;
        -moz-animation: moveclouds 25s linear infinite;
        -o-animation: moveclouds 25s linear infinite;
    }

    .x3 {
        left: 250px;
        bottom: -70px;

        -webkit-transform: scale(0.6);
        -moz-transform: scale(0.6);
        transform: scale(0.6);
        opacity: 0.8;

        -webkit-animation: moveclouds 25s linear infinite;
        -moz-animation: moveclouds 25s linear infinite;
        -o-animation: moveclouds 25s linear infinite;
    }

    .x4 {
        left: 470px;
        botttom: 20px;

        -webkit-transform: scale(0.75);
        -moz-transform: scale(0.75);
        transform: scale(0.75);
        opacity: 0.75;

        -webkit-animation: moveclouds 18s linear infinite;
        -moz-animation: moveclouds 18s linear infinite;
        -o-animation: moveclouds 18s linear infinite;
    }

    .x5 {
        left: 200px;
        top: 300px;

        -webkit-transform: scale(0.5);
        -moz-transform: scale(0.5);
        transform: scale(0.5);
        opacity: 0.8;

        -webkit-animation: moveclouds 20s linear infinite;
        -moz-animation: moveclouds 20s linear infinite;
        -o-animation: moveclouds 20s linear infinite;
    }

    @-webkit-keyframes moveclouds {
        0% {
            margin-left: 1000px;
        }

        100% {
            margin-left: -1000px;
        }
    }

    @-moz-keyframes moveclouds {
        0% {
            margin-left: 1000px;
        }

        100% {
            margin-left: -1000px;
        }
    }

    @-o-keyframes moveclouds {
        0% {
            margin-left: 1000px;
        }

        100% {
            margin-left: -1000px;
        }
    }
    </style>
</head>

<body>
    <div id="clouds">
        <div class="cloud x1"></div>
        <div class="cloud x1_5"></div>
        <div class="cloud x2"></div>
        <div class="cloud x3"></div>
        <div class="cloud x4"></div>
        <div class="cloud x5"></div>
    </div>
    <div class='c'>
        <?php
        if ($status == 0) {
            echo "<div class='_404'>PENDING</div>";
            echo "<hr>";
            echo "<img
                src='https://readme-typing-svg.demolab.com?font=opensans&weight=700&size=25&pause=1000&color=000000&center=true&width=720&height=100&lines=YOUR+ACCOUNT+IS+NOW+VERIFYING+BY+OUR+ADMINISTRATORS;PLEASE+WAIT+FOR+A+WHILE' alt='Pending' />";
        } else if ($status == 2) {
            echo "<div class='_404'>DENIED</div>";

            echo "<hr>";
            echo "<img src='https://readme-typing-svg.demolab.com?font=opensans&weight=700&size=25&pause=1000&color=000000&center=true&width=900&height=100&lines=YOUR+ACCOUNT+IS+DENIED+BY+OUR+ADMINISTRATORS;WE+ARE+SORRY+FOR+THE+INCONVENIENCE' alt='Denied' />";
        }
        ?>
        <br>
        <a class='btn' href='../Blood Bank Management/logout.php'>BACK</a>
    </div>
</body>

</html>