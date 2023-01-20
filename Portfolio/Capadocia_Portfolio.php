<?php
@include '../config.php';

$sql = "SELECT * FROM `portfolio_database` WHERE `lname` = 'Capadocia'";
$result = mysqli_query($conn, $sql);

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
    header("Location: ../ErrorPage.php?e=5");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Stylesheet/Capadocia_Style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="shortcut icon" href="https://github.githubassets.com/images/mona-loading-dark.gif" type="image/x-icon">
    <title>RJC Portfolio</title>

</head>

<body>
    <!-- Navbar -->
    <header>
        <a href="#home" class="logo">

            <div class="con">
                <div class="log"><svg class="svg-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1056.81 1056.31">
                        <polygon points="414.51 285.86 455.58 417.16 541.95 390.26 501.09 258.95 414.51 285.86" />
                        <polygon points="348.41 628.93 378.81 715.88 240.2 763.98 210.61 676.73 348.41 628.93" />
                        <polygon points="731.36 733.68 661.22 792.81 738.08 882.05 808.22 822.94 731.36 733.68" />
                        <polygon points="650.96 411.14 832.99 177.94 905.99 235.87 723.79 469.23 650.96 411.14" />
                        <ellipse cx="424.74" cy="165.98" rx="122.91" ry="121.19" />
                        <circle cx="120.92" cy="756.39" r="120.92" />
                        <ellipse cx="844.27" cy="936.41" rx="122.64" ry="119.9" />
                        <circle cx="936.48" cy="120.33" r="120.33" />
                        <circle cx="561.51" cy="603.56" r="215.95" />
                    </svg></div>
                <div class="logtitle">RJC</div>
            </div>
        </a>

        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#Edu">Education</a></li>
            <li><a href="#Social">Social</a></li>
            <li><a href="#portfolio">Projects</a></li>
            <li><a href="../Home/HomePage.php">Back</a></li>
        </ul>
    </header>
    <!-- Home -->

    <section class="home" id="home">
        <div class="social">
            <a><i></i></a>
            <a><i></i></a>
            <a><i></i></a>
        </div>
        <div class="home-img">
            <img src="../images/Profile.png" alt="">
        </div>
        <div class="home-text">
            <span>Hello, I'm</span>
            <h1>
                <?php echo $name; ?>
            </h1>
            <h2>information Technology Student | <?php echo $cAs; ?></h2>
            <?php echo "<p>Currently, I am a student at the <strong> $branch  Campus</strong> of <strong> $school</strong>
                at the age of <strong> $age </strong> Years Old.</p> "; ?>
        </div>

    </section>
    <!-- About -->
    <section class="about" id="about">
        <div class="heading">
            <h2>About Me</h2>
            <span>Introduction</span>
        </div>
        <!-- About Content -->
        <div class="about-container">
            <div class="about-img">
                <img src="../images/Ab_Me.png" alt="">
            </div>
            <div class="about-text">
                <p>I am currently a sophomore in college learning Java, C# , Visual Basic.NET, Web Development and
                    Python. My understanding
                    of each language is quite basic to intermediate, however I have a strong desire to further my
                    knowledge and gain more
                    insight. I am familiar with the following tools: Github, Eclipse, Visual Studio Code, Sublime Text,
                    Xampp, Apache
                    Netbeans, and more. I'm very driven and enthusiastic towards learning new technologies and other
                    languages.</p>
                <div class="information">
                    <!-- Box 1 -->
                    <div class="info-box">
                        <i class='bx bxs-user'></i>
                        <span style="text-transform: uppercase;">
                            <?php echo $name ?>
                        </span>
                    </div>
                    <!-- Box 2 -->
                    <div class="info-box">
                        <i class='bx bxs-phone'></i>
                        <span>+63 922 765 3422</span>
                    </div>
                    <!-- Box 3 -->
                    <div class="info-box">
                        <i class='bx bxs-envelope'></i>
                        <span><?php echo "<a href='mailto:" . $email . "'>$email</a>" ?> </span>
                    </div>
                    <!-- Box 4 -->
                    <div class="info-box">
                        <i class='bx bxs-calendar'></i>
                        <span>Academic Year: <?php echo $syear ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Education -->
    <section class="services" id="Edu">
        <div class="heading">
            <h2>Education</h2>
            <span>Academic background</span>
        </div>
        <div class="services-content">
            <!-- Box 1 -->
            <div class="services-box sb2">
                <h2>Elementary</h2>
                <br>
                <span>Calvary Baptist Academy of Pontevedra, Inc.</span>
                <p>2013 - 2014</p>
            </div>
            <!-- Box 2 -->
            <div class="services-box sb2">
                <h2>High School</h2>
                <br>
                <span>Villa Maria Annex - Bacoor National High School</span>
                <p>2014 - 2018</p>
            </div>
            <!-- Box 3 -->
            <div class="services-box sb2">
                <h2>Senior High</h2>
                <br>
                <span>AMA Computer College Las-Piñas</span>
                <p>2018 - 2020</p>
            </div>

            <div class="services-box sb2">
                <h2>College</h2>
                <br>
                <span>Cavite State University Imus-Campus</span>
                <p>2021 - Present</p>
            </div>
        </div>
    </section>
    <!-- Services -->
    <section class="services" id="Social">
        <div class="heading">
            <h2>Socials</h2>
            <span>Social Media Accounts</span>
        </div>
        <div class="services-content">
            <!-- Box 1 -->
            <div class="services-box">
                <i class='bx bxl-facebook-circle'></i>
                <h3>Facebook</h3>
                <?php echo "<a href='" . $flink . "' target='_blank'>Learn More</a>"; ?>
            </div>
            <!-- Box 2 -->
            <div class="services-box">
                <i class='bx bxl-linkedin'></i>
                <h3>Linkedin</h3>
                <a href="https://www.linkedin.com/in/rj45" target="_blank">Learn More</a>
            </div>
            <!-- Box 3 -->
            <div class="services-box">
                <i class='bx bxl-github'></i>
                <h3>Github</h3>
                <a href="https://github.com/Unknownplanet40" target="_blank">Learn More</a>
            </div>

            <div class="services-box">
                <i class='bx bxl-instagram'></i>
                <h3>Instagram</h3>
                <a href="https://www.instagram.com/cappps.lock/" target="_blank">Learn More</a>
            </div>
        </div>
    </section>
    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
        <div class="heading">
            <h2>Projects</h2>
            <span>My Recent Work</span>
        </div>
        <div class="portfolio-content">
            <div class="portfolio-img">
                <a href="https://github.com/Unknownplanet40/Simple-Hulk-Buster-PixelArt-Project-Java-Applet"
                    target="_blank" rel="noopener noreferrer"><img width="600px"
                        src="https://github.com/Unknownplanet40/Simple-Hulk-Buster-PixelArt-Project---Java-Applet/raw/356c73835083a1e5f656c141979a8ca893f90b82/Preview.png"
                        alt="pixel Art Hulk buster"></a>
            </div>
            <div class="portfolio-img">
                <a href="https://github.com/Unknownplanet40/Point-Of-Sale-P.O.S-Java-Project" target="_blank"
                    rel="noopener noreferrer"><img width="600px"
                        src="https://github.com/Unknownplanet40/Point-Of-Sale-P.O.S-Java-Project/raw/21f5d99b88956f1091a68d1e601a9196f8e6fc0a/Program%20Demo.gif"
                        alt="POS using java console"></a>
            </div>
            <div class="portfolio-img">
                <a href="https://github.com/Unknownplanet40/Profile-Page" target="_blank" rel="noopener noreferrer"><img
                        width="600px"
                        src="https://github.com/Unknownplanet40/Profile-Page/raw/8aa7d3ec43256034e99a657cafac5c3fae25bb0b/Output%201.png"
                        alt="POS using java console"></a>
            </div>
            <div class="portfolio-img">
            </div>
            <a href="https://github.com/Unknownplanet40?tab=repositories" target="_blank" style="text-align: center;"
                class="btn">See
                More</a>
            <div class="portfolio-img">
            </div>
        </div>
    </section>
    <!-- footer -->
    <div class="copyright">
        <h2>RJ45</h2>
        <p>Create By <a href="https://github.com/Unknownplanet40" target="_blank">Unknownplanet40</a> | All Right
            Reserved.</p>
    </div>
</body>

</html>