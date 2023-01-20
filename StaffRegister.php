<?php
@include 'config.php';
session_start();
# this will include the alert box function for error and success message in this page
include 'Popup_Alert.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $Cpword = $_POST['Cpassword'];

    $sql = "SELECT *  FROM `users` WHERE `name` LIKE '$name' OR `username` LIKE '$username' AND `types` = 2;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($row['name'] == $name) {
            $error[] = 'Name already exists';
        } elseif ($row['username'] == $username) {
            $error[] = 'Username already exists';
        } else {
            $error[] = 'Registration Failed! Please try again later.';
        }
    } elseif ($password != $Cpword) {
        $error[] = 'Password does not match';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error[] = 'Only letters and white space allowed in name';
    } else {
        $sql = "INSERT INTO `users` (`name`, `username`, `password`, `types`, `is_login`, isApproved) VALUES ('$name', '$username', '$password', '2', '0', '0')";
        $result = mysqli_query($conn, $sql);
        $result = true;
        if ($result) {
            $success[] = 'Registration Successful! You can now login.';
        } else {
            $error[] = 'Registration Failed! Please try again later.';
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Staff Registration</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../Blood Bank Management/Stylesheet/StaffReg_Style.css">
    <link rel="stylesheet" href="../Blood Bank Management/Stylesheet/login_aniBG.css">
    <script src='login.js'></script>
</head>

<body>
    <!-- Background animation -->
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
            <section>
                <form class="row g-3" action="" method="post">
                    <div class="social ">
                        <div>
                            <button type="button" class="btn-close" aria-label="Close"
                                onclick="location.href = '../Blood Bank Management/Home/HomePage.php'"></button>
                        </div>
                    </div>
                    <h3>Become a member of our team</h3>
                    <?php
                    if (isset($error)) {
                        foreach ($error as $error) {
                            unset($success);
                            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                        }
                    } elseif (isset($success)) {
                        foreach ($success as $success) {
                            unset($error);
                            echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
                        }
                    }
                    ?>
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Juan Dela Cruz" required>
                    </div>
                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username"
                            pattern="([a-z0-9]){8,}" required>
                    </div>
                    <div class="col-6">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password"
                            pattern="([a-z0-9]{8,}\d)" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="Cpassword" placeholder="Confirm Password"
                            pattern="([a-z0-9]{8,}\d)" required>
                    </div>
                    <div class="d-grid gap-2 my-20">
                        <button class="btn btn-primary" type="submit" name="submit">Sign Up</button>
                        <p>Already have a Account? <a class="reglink" href="login.php">Sign In here</a>.
                        </p>
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>