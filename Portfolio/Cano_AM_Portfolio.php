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
    <title>NAC Portfolio - About Me</title>
</head>

<body>
    <div class="container">
        <h1>About Me</h1>
        <h2>My all information About Me</h2>

        <div>


        </div>
        <p> My name is Nico Aldrich M. Cano i am 20 years old. i live in bacoor cavite. my motto in life is god is good
            all the time
        </p>
        <a href="../Portfolio/Cano_HP_Portfolio.php" class="btn">Home</a>
        <a href="../Portfolio/Cano_F_Portfolio.php" class="btn">My Family</a>
        <a href="../Portfolio/Cano_H_Portfolio.php" class="btn">My Hobbies</a>
    </div>

</body>

</html>