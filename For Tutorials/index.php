<?php session_start();
error_reporting(E_ALL ^ E_NOTICE);
if (isset($_COOKIE['user'])) { ?>
<meta http-equiv="refresh" content="20">
<?php
    echo $_COOKIE['user'];
} else {
    ?>
<form action="" method="post">
    <input type="text" name="uid" placeholder="Enter UserID"><br><br>
    <button name="btn">Click Me</button>
</form>
<?php
    if (isset($_POST['btn'])) {
        if ($_POST['uid'] == "rjc") {
            echo "Welcome to My Website";
        } else {
            $_SESSION['u'] += 1;
            echo $_SESSION['u'];
            if ($_SESSION['u'] > 2) {
                header('location:time.php');
            }

        }
    }
}
?>