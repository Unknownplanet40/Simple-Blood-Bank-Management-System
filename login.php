<?php
@include 'config.php';
session_start();

// get the username and password from the form
if (isset($_POST['submit'])) {
    // if username and password is empty
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error[] = 'Username or Password is empty';
    } else {
        // if username and password is not empty
        $username = $_POST['username'];
        $password = $_POST['password'];

        // this will remove all special characters from username and password and prevent from sql injection
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
        $result = mysqli_query($conn, $sql);

        // if username and password is correct
        if (mysqli_num_rows($result) > 0) {
            $sql_islogin = "UPDATE `users` SET `is_login` = '1' WHERE `username` = '$username'";
            $update = mysqli_query($conn, $sql_islogin);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['types'] = $row['types'];
            $_SESSION['is_login'] = $row['is_login'];
            
            switch ($_SESSION['types']) {
                case '1':
                    header("Location: Admin_Dashboard.php");
                    break;
                case '2':
                    header("Location: Staff_Dashboard.php");
                    break;
                default:
                    header("Location: Users_Dashboard.php");
                    break;
            }
        } else {
            // if username and password is incorrect

            $error[] = 'Username or Password is incorrect';
        }
        mysqli_close($conn); // Closing Connection
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Main style -->
    <link rel="stylesheet" href="../Blood Bank Management/Stylesheet/login_Style.css">
    <!-- For background Animation-->
    <link rel="stylesheet" href="../Blood Bank Management/Stylesheet/login_aniBG.css">
    <!-- Custom Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom Script Libraries -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Main Script -->
    <script src='../Blood Bank Management/Scripts/login_Script.js'></script>
</head>

<body>
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <main>
            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>
            </div>
            <form action="" method="post">
                <div class="social">
                    <div><a href="../Blood Bank Management/Home/HomePage.php">Back</a></div>
                </div>
                <h3>LOG IN</h3>

                <label for="username">Username</label>
                <input type="text" placeholder="Username" name="username">
                <label for="password">Password</label>
                <input type="password" placeholder="Password" name="password">

                <div>
                    <?php
                    # this will print error if username and password is incorrect or empty
                    if (isset($error)) {
                        foreach ($error as $error) {
                            echo '<h2 class="Error-msg">' . $error . '</h2>';
                        }
                    }
                    ?>
                </div>
                <button type="submit" name="submit">Sign In</button>
                <p>Don't have an account? <a class="reglink" href="register.php">Sign up</a></p>
            </form>
        </main>
    </div>
</body>

</html>