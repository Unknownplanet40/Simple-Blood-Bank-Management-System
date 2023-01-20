<?php
@include '../config.php';

$sql = "SELECT * FROM `portfolio_database`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
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
    <title>NAC Portfolio</title>
</head>

<body>
    <div class="container">
        <h1>Nico Aldrich Cano</h1>
        <h2>2nd Year College at CVSU Imus</h2>

        <div>


        </div>
        <p> Hi I am a student from CvSu (Cavite State University) in Imus Branch. My course is Bachelor of Science in
            Information Technology. I am 2nd year college this year. And i hope i will gradiate in this campus.
        </p>
        <a href="../Portfolio/Cano_F_Portfolio.php" class="btn">My Family</a>
        <a href="../Portfolio/Cano_H_Portfolio.php" class="btn">My Hobbies</a>
        <a href="../Portfolio/Cano_AM_Portfolio.php" class="btn">About Me</a>
        <a href="../Home/HomePage.php" class="btn">Back</a>
    </div>



</body>

</html>