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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Stylesheet/Cano_Style.css">
    <title>NAC Portfolio - My Family</title>
</head>

<body>
    <div class="container">
        <h1>My Family</h1>
        <h2>This is my loving and caring Family</h2>

        <div>

        </div>
        <p> I have 4 members in my family, my mother, my father, my sister and me. The work of my father is a driver
            while my mother is a house wife because of her sickness. My sister is a crew ship.
        </p>
        <a href="../Portfolio/Cano_HP_Portfolio.php" class="btn">Home</a>
        <a href="../Portfolio/Cano_H_Portfolio.php" class="btn">My Hobbies</a>
        <a href="../Portfolio/Cano_AM_Portfolio.php" class="btn">About Me</a>
    </div>

</body>

</html>