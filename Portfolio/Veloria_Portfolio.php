<?php
@include '../config.php';

$sql = "SELECT * FROM `portfolio_database` WHERE `lname` = 'Veloria'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['fname'];
    $last_name = $row['lname'];
    $Age = $row['age'];
    $Email = $row['email'];
    $School = $row['school'];
    $Branch = $row['branch'];
    $Course = $row['course'];
    $Section = $row['section'];
    $School_year = $row['school_year'];
    $Facebook = $row['fb_link'];
} else {
    header("Location: ../ErrorPage.php?e=5");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEYMSS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Stylesheet/Veloria_Style.css">

</head>

<body>
    <nav>
        <section class="header" id="home">
            <nav>
                <div class="logo">JEYMS</div>
                <div class="nav-links">
                    <ul>
                        <li><a href="#home">HOME</a></li>
                        <li><a href="#About">ABOUT</a></li>
                        <li><a href="#Education">EDUCATION</a></li>
                        <li><a href="../Home/HomePage.php">Back</a></li>
                    </ul>
                </div>
            </nav>
            <div class="Text-box">
                <br>
                <br>
                <h1>Welcome to my Personal page</h1>
                <p>Good day everyone, this website contains information about me. <br> To explore more about the content
                    of the page, just press the navigation bar at the top to access it. Enjoy!</p>
                <br>
                <br>
                <a href="#About" class="btn">Click here to know more about me</a>
            </div>
        </section>
    </nav>

    <!----About Me---->
    <section id="About">
        <h2>About Me</h2>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="grid">
                <div class="left">
                    <img src="../images/jeyms.jpg">
                </div>
                <div class="right">
                    <h4>Hey there!</h4>
                    <h1><?php echo 'My name is ' . $first_name . ' ' . $last_name;?></h1>
                    <h3><?php echo $Age . ' years old';?></h3>
                    <h3>Student programmer</h3>
                    <br>
                    <p><?php echo 'I am a sophomore student of ' . $School . ' ' . $Branch . ', ';?>
                        <?php echo ' and currently taking Bachelor of Science in Information Technology/'. $Course .  ' Section ' . $Section .',' . ' SY ' . $School_year . '.';?>
                        I also love to travel, I have been to various places in the Philippines such as Ilocos Norte,
                        Ilocos Sur,
                        Pagudpud, Baguio, Zambales, Bataan, and many more. I also have two siblings who both graduated.
                        and currently working</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!----Education---->
    <section id="Education">
        <h2>Education</h2>
        <div class="Educ">
            <div class="Tertiary">
                <H2>TERTIARY</H2>
                <FOnt size="4">Bachelor of Science in Information Technology</FOnt> <br>
                <font size="4">Cavite State University Imus Campus</font>
            </div>
            <div class="Secondary">
                <H2>SECONDARY</H2>
                <FOnt size="4"><b>Senior High School</b></FOnt> <br>
                <font size="4">Technical-Vocational-Livelihood Strand H.E</font> <br>
                <font size="4">University of Perpetual Help System DALTA – Molino Campus <font size-"4">2019 - 2021
                    </font>
                </font>

                <H2></H2>
                <FOnt size="4"><br><b>Junior High School</b></H2>
                </FOnt><br>
                <font size="4">City of Bacoor National Highschool - Georgetown </font>
                <font size-"4">2015 - 2019</font>
            </div>
            <div class="Primary">
                <H2>PRIMARY</H2>
                <FOnt size="4"><b>Junior High School</b></FOnt><br>
                <font size="4">St. John Fisher School - Bacoor </font>
                <font size-"4">2008 - 2015</font>
            </div>
        </div>
    </section>
    <br>

    <!----Footer---->
    <section class="footer">
        <h3>Email Me</h3>
        <p><?php echo 'To know more about me just email me at  ' . $Email;?></p>
        <ul class="socials">
            <li><a href="https://www.facebook.com/james.veloria"><i class="fa fa-facebook-square"></i></a></li>
        </ul>
        <br>
        <p>Copyright created by james Veloria</p>
    </section>
</body>

</html>