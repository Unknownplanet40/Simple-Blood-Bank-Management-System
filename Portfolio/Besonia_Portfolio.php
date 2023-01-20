<?php
@include '../config.php';


$sql = "SELECT * FROM `portfolio_database` WHERE `lname` = 'Besonia'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['fname'];
    $last_name = $row['lname'];
    $email = $row['email'];
    $age = $row['age'];
    $shool = $row['school'];
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Stylesheet/Besonia_Style.css">
    <title>CB | Portfolio</title>
</head>

<body>
    <div>
        <img src="../images/me111.jpg" width="300" height="300">
        <?php
    echo '<h2><br><p style="color:Salmon; font-family:courier; background-color:PeachPuff;"> I am ' . $first_name .' ' . $last_name . '. I am ' . $age . '. I study at ' . $shool . ' ' . $branch . '. I am taking ' . $course . ' and my section is ' . $section . '. I am in the current ' . $SY . '  school year. </br><br> You can email me on <u>' . $email . '</u>. You can also contact me on Facebook <a href="' . $link . '">click here</a>.</br></p></h2>';
    ?>
    </div>
</body>

</html>