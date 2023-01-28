<?php

// variable 
$isCon = false;
$tempvar = null;
$user = null;

// connect to the database
$connection = mysqli_connect('localhost', 'root', '', 'testdb');


// check if the connection is successful
if ($connection) {
    $isCon = true;
} else {
    $isCon = false;
}

// check if the form is submitted
if (isset($_POST['submit'])) {
    // get the username and password from the form
    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];

    // check if the username and password is empty
    if (empty($username) || empty($password)) {
        $tempvar = "Username or Password is empty";
    } else {
        // check if the username and password is correct
        $sql = "SELECT `username`, `password` FROM `usertable` WHERE `username` = '$username' AND `password` = '$password'";
        // execute the query
        $result = mysqli_query($connection, $sql);

        // if the username and password is correct
        if (mysqli_num_rows($result) > 0) {
            $tempvar = "Username and Password is correct";
            $user = $username;
        } else {
            // if the username and password is incorrect
            $tempvar = "Username and Password is incorrect";
            $user = "No User Found";
        }

        // close the connection
        mysqli_close($connection);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Example</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="inputUsername"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="inputPassword"></td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="submit">Submit</button>
                </td>
            </tr>
            <tr>
        </table>
    </form>
    <?php
    // check if the connection is successful
    if ($isCon) {
        echo "Connected To Database <br>";
        echo "Status: $tempvar <br>";
        echo "User: $user <br>";
    } else {
        echo "Not Connected To Database";
    } ?>

</body>

</html>