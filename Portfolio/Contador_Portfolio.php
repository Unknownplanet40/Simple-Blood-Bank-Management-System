<?php
@include '../config.php';

$sql = "SELECT * FROM `portfolio_database` Where `lname` = 'Contador'";
$result = mysqli_query($conn, $sql);
$stat = false;

# Note: walang binigay na data sa database, kaya hindi naka display yung data sa portfolio

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['fname'] . " " . $row['lname'];
    $age = $row['age'];
    $email = $row['email'];
    $school = $row['school'];
    $branch = $row['branch'];
    $cAs = $row['course'] . " " . $row['section'];
    $syear = $row['school_year'];
    $flink = $row['fb_link'];
  }
} else {
  $stat = true;
}

?>


<!DOCTYPE html>
<html Lang="en">
<style>
body {
    background-image: url('../images/mountain.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JC | Portfolio</title>
</head>

<body>
    <br>
    <br>
    <?php

    if($stat){
        echo '<h2 align="center"> <font color=white>sorry for the inconvenience, but the data you are looking for is not available.</h2>';
        echo '<p align="left"><font color=white>Database connection status: Connected but no data found.</p>';
    } else{
      echo '<h2 align="center"> <font color=white> My Name is ' . $name . '</h2>';
      echo '<h2 align="center"> My Email is ' . $email . '</h2>';
      echo '<h2 align="center">My Age is ' . $age . '</h2>';
      echo '<h2 align="center"> My School is ' . $school . ' ' . $branch . ' Branch </h2>';
      echo '<h2 align="center"> My Course & Section is ' . $cAs . ' </h2>';
      echo '<h2 align="center"> My School Year is ' . $syear . '</h2>';
      echo '<h2 align="center"> My Facebook Link Is <a href="' . $flink . '">Click Here</a></h2>';
    }


  ?>
</body>

</html>