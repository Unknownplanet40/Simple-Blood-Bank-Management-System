<?php
@include '../config.php';

function donation($bt)
{
    global $conn;
    $sql = "SELECT * FROM `blood_types` WHERE `blood_id` = 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $rval = null;

    $Aplus = $row['A_plus'];
    $Aminus = $row['A_minus'];
    $Bplus = $row['B_plus'];
    $Bminus = $row['B_minus'];
    $ABplus = $row['AB_plus'];
    $ABminus = $row['AB_minus'];
    $Oplus = $row['O_plus'];
    $Ominus = $row['O_minus'];

    switch ($bt) {
        case 'A+':
            if ($Aplus > 0) {
                $rval = $Aplus;
            } else {
                $rval = 0;
            }
            break;
        case 'A-':
            $rval = $Aminus;
            break;
        case 'B+':
            $rval = $Bplus;
            break;
        case 'B-':
            $rval = $Bminus;
            break;
        case 'AB+':
            $rval = $ABplus;
            break;
        case 'AB-':
            $rval = $ABminus;
            break;
        case 'O+':
            $rval = $Oplus;
            break;
        case 'O-':
            $rval = $Ominus;
            break;
        default:
            $rval = "No Data";
            break;
    }
    return $rval;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Stylesheet/Hp_Style.css">
    <link rel="shortcut icon" href="https://img.icons8.com/fluency/512/doctors-bag.png" type="image/x-icon">
    <title> BBMS | Home </title>


</head>

<body>
    <!--------hero section start------->
    <div class="hero">
        <nav>
            <h2 class="logo">Blood Bank <span>System</span></h2>
            <ul>
                <li><a href="#wdb">Why Become Donor</a></li>
                <li><a href="#DB">Donate Blood</a></li>
                <li><a href="#stat">Available Blood</a></li>
                <li><a href="#contact">Contact Us</a></li>

            </ul>
            <a href="../login.php" class="btn">Sign in</a>
        </nav>

        <div class="content">
            <h4 class="wel">Hello! Welcome to</h4>
            <h1>Blood <span>Bank</span></h1>
            <h3 class="tag">Give the Gift of Life Donate Blood</h3>
        </div>
    </div>
    <!----About Section Start---->
    <section class="about">
        <div class="main">
            <img style="border-radius: 10px;" src="../images/donation.png">
            <div class="about-text">
                <h2 id="wdb">Why Donate Blood</h2>
                <h5>Donate Blood Save Life's</h5>
                <p style="text-align: justify; color: white;"> A blood bank is a center where blood gathered as a result
                    of blood
                    donation is stored and preserved
                    for later use in blood transfusion. The term "blood bank" typically refers to a department of a
                    hospital usually within a Clinical Pathology laboratory where the storage of blood product occurs
                    and where pre-transfusion and Blood compatibility testing is performed. However, it sometimes refers
                    to a collection center, and some hospitals also perform collection. Blood banking includes tasks
                    related to blood collection, processing, testing, separation, and storage.</p>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="main">
            <img style="border-radius: 10px;" src="../images/blood.png">
            <div class="about-text">
                <h2 id="DB">Donate Blood Give Blood</h2>
                <h5>Donate Blood Save life's</h5>
                <p style="text-align: justify; color: white;"> So what is blood banking? The American Society of
                    Hematology defines it as “the process of
                    collecting, separating and storing blood.” The concept of harvesting human blood for medical
                    experiments — first known as “bloodletting” — can be traced back thousands of years to the ancient
                    Egyptians in 2500 BCE. Though as with most medical discoveries, the process has been drastically
                    refined in recent centuries. Its crude origins have little in common with the modern practice. Early
                    attempts at human-to-human blood transfusions were, as one Chicago Tribune reporter put it, a
                    “disaster.” But Austrian physician Karl Landsteiner was credited with a breakthrough in 1901 when he
                    grouped blood into types A, B and O, paving the way for transfusion medicine. World War II was the
                    inflection point that ushered in the establishment of blood banks in the U.S. and abroad. First, in
                    the 1930s, Soviet scientists recognized the need for blood to be preserved to retain its therapeutic
                    properties, storing it in refrigerators and widely distributing it to local hospitals.</p>
            </div>
        </div>
    </section>

    <!----Service Section Start---->
    <div class="service">
        <div class="title">
            <h2>Every blood donor is a LIFE SAVER</h2>
        </div>

        <div class="box" id="stat">
            <div class="card">
                <img width="50px" height="70px" style="border-radius: 5%;"
                    src="https://creazilla-store.fra1.digitaloceanspaces.com/icons/3271077/a-blood-type-icon-md.png">
                <div class="pra graph">
                    <p>Blood group A individuals have the A antigen on the surface of their RBCs, and blood serum
                        containing IgM antibodies against the B antigen.</p>

                    <p style="text-align: center;">
                        <a style="cursor: default;" class="button">
                            <?php echo donation('A+') . ' Donors available'; ?>
                        </a>
                    </p>
                </div>
            </div>

            <div class="card">
                <img width="50px" height="70px" style="border-radius: 5%;"
                    src="https://creazilla-store.fra1.digitaloceanspaces.com/icons/3271083/b-blood-type-icon-md.png">
                <div class="pra graph">
                    <p>Blood type B people are outgoing, take leadership, fun to talk with, and do things at their own
                        pace. Easy going and hardly get depressed for thinking too much about something. </p>
                    <p style="text-align: center;">
                        <a style="cursor: default;" class="button">
                            <?php echo donation('B+') . ' Donors available'; ?>
                        </a>
                    </p>
                </div>
            </div>

            <div class="card">
                <img width="50px" height="70px" style="border-radius: 5%;"
                    src="https://creazilla-store.fra1.digitaloceanspaces.com/icons/3271075/ab-blood-type-icon-md.png">
                <div class="pra graph">
                    <p>The Blood Type AB Individualized Lifestyle Type AB blood is rare – it’s found in less than five
                        percent of the population. And it is the 'newest' of the blood types. </p>
                    <p style="text-align: center;">
                        <a style="cursor: default;" class="button">
                            <?php echo donation('AB+') . ' Donors available'; ?>
                        </a>
                    </p>
                </div>
            </div>



            <div class="card">
                <img width="50px" height="70px" style="border-radius: 5%;"
                    src="https://creazilla-store.fra1.digitaloceanspaces.com/icons/3271074/0-blood-type-icon-md.png">
                <div class="pra graph">
                    <p>Type O+ blood type is the most common blood type in the world. It is found in about 40% of the
                        population. Type O+ individuals have the A and B antigens on the surface of their RBCs.
                    </p>
                    <p style="text-align: center;">
                        <a style="cursor: default;" class="button">
                            <?php echo donation('O+') . ' Donors available'; ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="card">
                <img width="50px" height="70px" style="border-radius: 5%;"
                    src="https://creazilla-store.fra1.digitaloceanspaces.com/icons/3271078/a-blood-type-icon-md.png">
                <div class="pra graph">
                    <p>Blood group A- individuals have the A antigen on the surface of their RBCs, and blood serum
                        containing IgM antibodies against the B antigen. </p>
                    <p style="text-align: center;">
                        <a style="cursor: default;" class="button">
                            <?php echo donation('A-') . ' Donors available'; ?>
                        </a>
                    </p>
                </div>
            </div>

            <div class="card">
                <img width="50px" height="70px" style="border-radius: 5%;"
                    src="https://creazilla-store.fra1.digitaloceanspaces.com/icons/3271084/b-blood-type-icon-md.png">
                <div class="pra graph">
                    <p>Blood type B- people are outgoing, take leadership, fun to talk with, and do things at their own
                        pace. Easy going and hardly get depressed for thinking too much about something.</p>
                    <p style="text-align: center;">
                        <a style="cursor: default;" class="button">
                            <?php echo donation('B-') . ' Donors available'; ?>
                        </a>
                    </p>
                </div>
            </div>

            <div class="card">
                <img width="50px" height="70px" style="border-radius: 5%;"
                    src="https://creazilla-store.fra1.digitaloceanspaces.com/icons/3271079/ab-blood-type-icon-md.png">
                <div class="pra graph">
                    <p>The Blood Type AB- Individualized Lifestyle Type AB- blood is rare – it’s found in less than five
                        percent of the population. And it is the 'newest' of the blood types. </p>
                    <p style="text-align: center;">
                        <a style="cursor: default;" class="button">
                            <?php echo donation('AB-') . ' Donors available'; ?>
                        </a>
                    </p>
                </div>
            </div>



            <div class="card">
                <img width="50px" height="70px" style="border-radius: 5%;"
                    src="https://creazilla-store.fra1.digitaloceanspaces.com/icons/3271076/0-blood-type-icon-md.png">
                <div class="pra graph">
                    <p>Type O- blood is given to patients more than any other blood type, which is why it’s considered
                        the most needed blood type. </p>
                    <p style="text-align: center;">
                        <a style="cursor: default;" class="button">
                            <?php echo donation('O-') . ' Donors available'; ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
</body>
<!----Contact---->
<div class="service contacts">
    <div class="title" id="contact">
        <h2 style="color: white;">Contact Us</h2>
    </div>
    <!-- Cards -->
    <div class="box">
        <div class="card">
            <img style="width: 70%; border-radius: 20px;" src="../images/ryan.jpg" class="card-img-top" alt="RJC">
            <div class="pra">
                <h4 style="font-size: 18px; padding-top: 10px;">Ryan James V. Capadocia</h4>
                <hr>
                <p>Hello my name is Ryan James From Cavite State University. </p>
                <p style="text-align: center;">
                    <a class="button" href="../Portfolio/Capadocia_Portfolio.php">See More</a>
                </p>
            </div>
        </div>

        <div class="card">
            <img style="width: 70%; border-radius: 20px;" src="../images/James.jpg" class="card-img-top" alt="JMV">
            <div class="pra">
                <h4 style="padding-top: 8px;">James Matthew Veloria</h4>
                <hr>
                <p>Hello my name is James Matthew From Cavite State University. </p>
                <p style="text-align: center;">
                    <a class="button" href="../Portfolio/Veloria_Portfolio.php">See More</a>
                </p>
            </div>
        </div>

        <div class="card">
            <img style="width: 70%; border-radius: 20px;" src="../images/juls.jpg" class="card-img-top" alt="JDC">
            <div class="pra">
                <h4 style="padding-top: 8px;">Julian Bragaiz</h4>
                <hr>
                <p> Hello my name is Julian Bragaiz From Cavite State University. </p>
                <p style="text-align: center;">
                    <a class="button" href="../Portfolio/Bragaiz_HP_Portfolio.php">See More</a>
                </p>
            </div>
        </div>

        <div class="card">
            <img style="width: 70%; border-radius: 20px;" src="../images/nico.jpg" class="card-img-top" alt="RJC">
            <div class="pra">
                <h4 style="font-size: 18px; padding-top: 10px;">Nico Aldrich Cano</h4>
                <hr>
                <p>Hello my name is Nico Aldrich From Cavite State University. </p>
                <p style="text-align: center;">
                    <a class="button" href="../Portfolio/Cano_HP_Portfolio.php">See More</a>
                </p>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="card">
            <img style="width: 70%; border-radius: 20px;" src="../images/joseph.jpg" class="card-img-top" alt="RJC">
            <div class="pra">
                <h4 style="font-size: 18px; padding-top: 10px;">Joseph Contador</h4>
                <hr>
                <p>Hello my name is Joseph Contador From Cavite State University. </p>
                <p style="text-align: center;">
                    <a class="button" href="../Portfolio/Contador_Portfolio.php">See More</a>
                </p>
            </div>
        </div>

        <div class="card">
            <img style="width: 70%; border-radius: 20px;" src="../images/cielo.jpg" class="card-img-top" alt="JDC">
            <div class="pra">
                <h4 style="padding-top: 8px;">Cielo Besonia</h4>
                <hr>
                <p> Hello my name is Cielo Besonia From Cavite State University. </p>
                <p style="text-align: center;">
                    <a class="button" href="../Portfolio/Besonia_Portfolio.php">See More</a>
                </p>
            </div>
        </div>

        <div class="card">
            <img style="width: 70%; border-radius: 20px;" src="../images/joms.jpg" class="card-img-top" alt="JMV">
            <div class="pra">
                <h4 style="padding-top: 8px;">Jomari Bautista</h4>
                <hr>
                <p>Hello my name is Jomari Bautista From Cavite State University.</p>
                <p style="text-align: center;">
                    <a class="button" href="../Portfolio/Bautista_Portfolio.php">See More</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!----footer---->
<footer>
    <div class="container">
        <div class="Conbox">
            <h3 style="color: white;">Sources</h3>
            <table>
                <tr>
                    <td>
                        <p style="color: white;">Bootstrap</p>
                        <p style="color: white;">jquery</p>
                        <p style="color: white;">SweetAlert2</p>
                        <p style="color: white;">Designs</p>
                        <p style="color: white;">Input Patterns</p>
                        <p style="color: white;">Sign in & Sign up Design</p>
                    </td>
                    <td>

                    </td>
                    <td>
                        <p><span><a href="https://getbootstrap.com/docs/5.2/getting-started/introduction/"
                                    target="_blank">getbootstrap.com</a></span></p>
                        <p><span><a href="https://cdnjs.com/libraries/jquery" target="_blank">cdnjs.com</a></span></p>
                        <p><span><a href="https://sweetalert2.github.io/#icons"
                                    target="_blank">sweetalert2.github.io</a></span></p>
                        <p><span><a href="https://freefrontend.com/" target="_blank">freefrontend.com</a></span></p>
                        <p><span><a href="https://regexr.com/" target="_blank">regexr.com</a></span></p>
                        <p><span><a href="https://codepen.io/fghty/pen/PojKNEG?editors=1001"
                                    target="_blank">codepen.io</a></span></p>
                        </p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="Conbox">
            <h3 style="color: white;"></h3>
            <table>
                <tr>
                    <td>
                        <p style="color: white;">Color gradient</p>
                        <p style="color: white;">Background animation</p>
                        <p style="color: white;">Error Page Designs</p>
                        <p style="color: #101010; cursor: default;">Error Page Design</p>
                        <p style="color: white;">Portfolio Designs</p>

                    </td>
                    <td>

                    </td>
                    <td>
                        <p><span><a href="https://uigradients.com/#SinCityRed"
                                    target="_blank">uigradients.com</a></span></p>
                        <p><span><a href="https://www.gradient-animator.com/ https://codepen.io/mohaiman/pen/MQqMyo"
                                    target="_blank">gradient-animator.com</a></span></p>
                        <p><span><a href="https://codepen.io/Unknownplanet40/pen/rNrxvmv" target="_blank">codepen.io |
                                    version 1</a></span></p>
                        <p><span><a href="https://codepen.io/sarazond/pen/jOKyjZ" target="_blank">codepen.io |
                                    version 2</a></span>
                        <p><span><a href="https://www.youtube.com/watch?v=zSRUtRsSNv0"
                                    target="_blank">Youtube.com</a></span>
                        </p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="Conbox">
            <h3 style="color: white;">Group 2 Members</h3>
            <table>
                <tr>
                    <td>
                        <div>
                            <p style="color: white;"><span><a href="https://www.facebook.com/Cappps.Lock"
                                        target="_blank">Ryan james V. Capadocia</a></span>
                            </p>
                            <p style="color: white;"><span><a href="https://www.facebook.com/james.veloria"
                                        target="_blank">James Matthew Veloria</a></span></p>
                            <p style="color: white;"><span><a href="https://www.facebook.com/nico.cano.37"
                                        target="_blank">Nico Aldrich Cano</a></span>
                            </p>
                            <p style="color: white;"><span><a href="https://www.facebook.com/Haruyt19"
                                        target="_blank">Joseph Contador</a></span></p>
                            <p style="color: white;"><span><a href="https://www.facebook.com/jomari.bautista.30"
                                        target="_blank">Jomari Bautista</a></span></p>
                            <p style="color: white;"><span><a href="https://www.facebook.com/chseylow"
                                        target="_blank">Cielo Besonia</a></span></p>
                            <p style="color: white;"><span><a href="https://www.facebook.com/julian.bragaiz"
                                        target="_blank">Julian Bragaiz</a></p>
                        </div>
                    </td>
                    <td>
                        <p><span><a href="https://github.com/Unknownplanet40" target="_blank">Github</a></span></p>
                        <p><span><a href="https://github.com/JamesVeloria16" target="_blank">Github</a></span></p>
                        <p><span><a style="color: #101010; pointer-events: none;">None</a></span></p>
                        <p><span><a style="color: #101010; pointer-events: none;">None</a></span></p>
                        <p><span><a style="color: #101010; pointer-events: none;">None</a></span></p>
                        <p><span><a style="color: #101010; pointer-events: none;">None</a></span></p>
                        <p><span><a style="color: #101010; pointer-events: none;">None</a></span></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br><br><br><br><br>
    <p class="end" style="text-align: center; color: whitesmoke; margin-top: 20px;">
        <span> A very significant note to keep in mind:</span> This is a school project and not a real blood bank.
        Please connect your computer to the internet <br>
        before using this website because this project uses a CDN (<span style="color: darkturquoise;">Content Delivery
            Network</span>) for its CSS and JS files.
        Thank you and enjoy! <br>
        <span style="color: dodgerblue; padding-top: 10px;">&copy; 2023 | All Rights Reserved | Project in DCIT-24A
            [Blood Bank Management System] | <a href="https://cvsu-imus.edu.ph/"><span
                    style="color: dodgerblue; padding-top: 10px;">Cavite State University Imus Campus</span></a>
        </span>
    </p>
</footer>

</body>

</html>