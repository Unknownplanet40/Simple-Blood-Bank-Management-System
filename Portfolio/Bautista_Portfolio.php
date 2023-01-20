<?php
@include '../config.php';

$sql = "SELECT * FROM `portfolio_database` WHERE `lname` = 'Bautista'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $Fname = $row['fname'];
  $Lname = $row['lname'];
  $Age = $row['age'];
  $Email = $row['email'];
  $School = $row['school'];
  $Branch = $row['branch'];
  $Course = $row['course'];
  $Section = $row['section'];
  $School_yr = $row['school_year'];
  $Fb_link = $row['fb_link'];
} else {
  echo "0 result";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <script src="https://use.fontawesome.com/d1341f9b7a.js"></script>
    <link rel="stylesheet" href="../Stylesheet/Bautista_Style.css">
    <title>Portfolio| JBAUTISTA</title>
</head>

<body>
    <div class="box">
        <img src="../images/joms.jpg" alt="" class="box-img">

        <h5>
            <?php 
            echo ' Hi, Im ' . $Fname . ' ' . $Lname . ' and I am ' . $Age . 'years old Im in My second year of college in ' . $School . '  ' . $Branch . ' Majoring in ' . $Course . ' section ' . $Section . ' And I am in ' . $School_yr . ' school year. My Email Address is ' . $Email;
            echo '<a href="../Home/HomePage.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>';
            ?>
        </h5>
        <ul>
            <?php
            echo '<li><a href="' . $Fb_link . '"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
            ?>
        </ul>
    </div>
    </div>


</body>

</html>