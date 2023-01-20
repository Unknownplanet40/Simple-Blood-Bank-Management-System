<?php
@include '../config.php';

$sql = "SELECT * FROM `portfolio_database`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['fname'];
    $last_name = $row['lname'];
    $email = $row['email'];
    $age = $row['age'];
    $school = $row['school'];
    $branch = $row['branch'];
    $course = $row['course'];
    $section = $row['section'];
    $SY = $row['school_year'];
    $link = $row['fb_link'];
} else {
    echo "0 results";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title> Home </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Stylesheet/Bragaiz_HP_Style.css">
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <a href="#home"><img width="140px" height="100px" style="border-radius 5%;" src="../images/Apex.png"
                    class="logo"></a>
            <ul>
                <li><a href="../Portfolio/Bragaiz_F_Portfolio.php">Family</a></li>
                <li><a href="../Portfolio/Bragaiz_AM_Portfolio.php">About Me</a></li>
                <li><a href="../Portfolio/Bragaiz_H_Portfolio.php">Hobbies</a></li>
                <li><a href="../Home/HomePage.php">Back</a></li>
            </ul>
        </div>

        <div class="content" id="home">
            <h1>Hi! I'm Julian R. Bragaiz </h1>
            <p>From BSIT-2B</p>
            <div>
                <button type="button"><span></span>FACEBOOK</button>
                <button type="button"><span></span>INSTAGRAM</button>
                <button type="button"><span></span>TWITTER</button>
            </div>

        </div>

    </div>

</body>

</html>