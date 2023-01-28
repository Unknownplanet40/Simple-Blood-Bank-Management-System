<?php
@include 'config.php';
session_start();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $blood = $_POST['blood'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    # add 0 in front of the phone number
    if (strlen($phone) == 10) {
        $phone = "0" . $phone;
    }

    $sql = "SELECT *  FROM `users` WHERE `name` = '$name' OR `username` = '$username' OR `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($row['name'] == $name) {
            $error[] = 'Name already exists';
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $error[] = 'Only letters and white space allowed in name';
        } elseif ($row['username'] == $username) {
            $error[] = 'Username already exists';
        } elseif ($row['email'] == $email) {
            $error[] = 'Email already exists';
        } else {
            $error[] = 'Registration Failed! Please try again later.';
        }
    } else {
        $sql = "INSERT INTO `users` (`name`, `username`, `password`, `email`, `blood`, `address`, `phone`, `types`, `is_login`, isApproved) VALUES ('$name', '$username', '$password', '$email', '$blood', '$address', '$phone', '3', '0', '1')";
        $result = mysqli_query($conn, $sql);

        $result = true;
        if ($result) {
            $success[] = 'Registration Successful';
        } else {
            $error[] = 'Registration Failed';
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="./Stylesheet/bt_Register.css" rel="stylesheet">
    <link rel="stylesheet" href="./Stylesheet/register_Style.css">
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
                                onclick="location.href = './Home/HomePage.php'"></button>
                        </div>
                    </div>
                    <h3>Registration</h3>
                    <?php
                    if (isset($error)) {
                        foreach ($error as $error) {
                            unset($success);
                            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                        }
                    } elseif (isset($success)) {
                        foreach ($success as $success) {
                            unset($error);
                            echo '<div class="alert alert-success" role="alert">' . $success . ' <a class="reglink custom" style="text-decoration: none; color: #1845ad;" href="Login.php">Sign In here.</a></div>';
                        }
                    }
                    ?>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Juan Dela Cruz" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Example@domain.com"
                            pattern="([a-z0-9._+-]+@[a-z]+\.[a-z]{2,})" required>
                    </div>
                    <div class="col-6">
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
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="phone" placeholder="+63" pattern="(9+[0-9]{9,})"
                            required>
                    </div>
                    <div class="col-md-6">
                        <label for="blood" class="form-label">Blood Type</label>
                        <select name="blood" class="form-select" required>
                            <option value="" selected disabled hidden>Blood type</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" rows="2"></textarea>
                    </div>
                    <div class="d-grid gap-2 my-20">
                        <button class="btn btn-primary" type="submit" name="submit">Sign Up</button>
                        <p>Want to be part of our team? <a class="reglink" href="StaffRegister.php">Apply Here.</a>
                        </p>
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>