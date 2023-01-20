<?php
@include 'config.php';
session_start();

// get the username from last page
// if the username is not set then redirect to login page
if (isset($_SESSION['current_username'])) {
    $status = $_SESSION['current_types'];
} else {
    $status = 0;
}

include 'Popup_Alert.php';
// check if username is_login is set to 1
if ($status == 3) {
    $name = $_SESSION['current_name'];

    $sql = "SELECT * FROM `users` WHERE `name` = '$name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $pid = $row['user_id'];
    $pname = $row['name'];
    $puname = $row['username'];
    $ppword = $row['password'];
    $pemail = $row['email'];
    $pphone = $row['phone'];
    $paddress = $row['address'];
    $pblood = $row['blood'];




} else {
    header("Location: ErrorPage.php?e=3");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='../Blood Bank Management/Stylesheet/Dashboard.css'>
    <link rel='stylesheet' href='../Blood Bank Management/Stylesheet/Dashboard_aniBG.css'>
    <link rel='stylesheet' href='../Blood Bank Management/Stylesheet/Profile.css'>
    <link rel="shortcut icon" href="https://img.icons8.com/fluency/512/doctors-bag.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../Blood Bank Management/Scripts/Profile_Script.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php include 'modals.php'; ?>
    <div class="dashboard">
        <div class="left">
            <div class="navigation">
                <div class="wrapper2">
                    <div class="Logo-Image">
                        <!--<img src="https://via.placeholder.com/321x124" />-->
                        <img src="../Blood Bank Management/images/Tagline.png" />
                        <p style="text-transform: uppercase;">
                            <?php
                            echo $name;
                            echo NewAlertBox();
                            $_SESSION['isTrue'] = false;
                            ?>
                        </p>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'User_bloodDonation.php'">
                        <div class="icon-name"><a>Blood Donation</a></div>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'User_bloodRequest.php'">
                        <div class="icon-name">Blood Request</div>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'User_bloodHanded.php'">
                        <div class="icon-name">Hand Over</div>
                    </div>
                    <div class="folder-icons Pressed-folder-icons">
                        <div class="icon-name">Profile</div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" area">
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <div class="right-side">
                <div class="layout" style="display: block;">
                    <h1 class="tabs-title">Profile</h1>
                    <div class="container">
                        <div class="box1">
                            <form class="row g-3">
                                <div class="col-12">
                                    <input hidden type="text" class="form-control" id="pid" value="<?php echo $pid; ?>">
                                    <label for="pname" class="form-label plabel">Name</label>
                                    <input disabled type="text" class="form-control" id="pname"
                                        value="<?php echo $pname; ?>">
                                </div>
                                <div class="col-12">
                                    <label for="pemail" class="form-label plabel">Email</label>
                                    <input disabled type="email" class="form-control" id="pemail"
                                        value="<?php echo $pemail; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="pusername" class="form-label plabel">UserName</label>
                                    <input disabled type="text" class="form-control" id="pusername"
                                        value="<?php echo $puname; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="ppassword" class="form-label plabel">Password</label>
                                    <input disabled type="text" class="form-control" id="ppassword"
                                        value="<?php echo $ppword; ?>">
                                </div>
                                <div class="col-6">
                                    <label for="paddress" class="form-label plabel">Address</label>
                                    <input type="text" class="form-control" id="paddress"
                                        value="<?php echo $paddress; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="pphone" class="form-label plabel">Phone</label>
                                    <input disabled type="tel" class="form-control" id="pphone"
                                        value="<?php echo $pphone; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="blood" class="form-label plabel">Blood type</label>
                                    <input disabled type="text" class="form-control" id="pblood"
                                        value="<?php echo $pblood; ?>">
                                </div>
                                <div class="col-10">
                                    <button type="button" class="btn btn-primary Probtn" data-bs-toggle='modal'
                                        data-bs-target='#UpUserAct'>Sign in</button>
                                </div>
                                <div class="col-2">
                                    <button class='btn btn-danger me-1'><a class='text-light'
                                            style='text-decoration: none;' href="./logout.php">Log Out</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<!-- This script is for the modal if removed the modal will not work -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</html>