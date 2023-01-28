<?php
@include 'config.php';
session_start();

if (isset($_SESSION['current_username'])) {
    $username = $_SESSION['current_username'];
    $status = $_SESSION['current_types'];
} else {
    $status = 0;
}

if ($status == 2) {
    $name = $_SESSION['current_name'];
} else {
    header("Location: ErrorPage.php?e=3");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>STAFF - <?php echo $name ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='./Stylesheet/Dashboard.css'>
    <link rel='stylesheet' href='./Stylesheet/Dashboard_aniBG.css'>
    <link rel="shortcut icon" href="https://img.icons8.com/fluency/512/doctors-bag.png" type="image/x-icon">
    <link rel="stylesheet" href="./Stylesheet/bootstrap.css">
    <script src="./Scripts/jquery.js"></script>
    <script src='./Scripts/admin_Script.js'></script>
    <script src="./Scripts/sweetalert2.js"></script>
</head>

<body>
    <?php include 'modals.php'; ?>
    <div class="dashboard">
        <div class="left">
            <div class="navigation">
                <div class="wrapper2">
                    <div class="Logo-Image">
                        <!--<img src="https://via.placeholder.com/321x124" />-->
                        <img src="./images/Tagline.png" />
                        <p style="text-transform: uppercase;">
                            <?php echo $name ?>
                        </p>
                    </div>
                    <div class="folder-icons Pressed-folder-icons">
                        <div class="icon-name">Inventory</div>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'Staff_bloodDonation.php'">
                        <div class="icon-name"><a>Blood Donation</a></div>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'Staff_bloodRequest.php'">
                        <div class="icon-name">Blood Request</div>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'Staff_bloodHanded.php'">
                        <div class="icon-name">Hand Over</div>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'Staff_Users.php'">
                        <div class="icon-name">Manage Users</div>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'logout.php'">
                        <div class="icon-name">Log out</div>
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
                    <h1 class="tabs-title">Blood Inventory</h1>
                    <div>
                        <div class="row row-cols-1 row-cols-md-4 g-4 ">
                            <div class="col" data-bs-toggle="modal" data-bs-target="#A-plus">
                                <div class="card h-80">
                                    <img src="https://www.blood.ca/sites/default/files/icon/blood-types_a-positive_blood-drop.jpg"
                                        class="card-img-top w-75 mx-auto d-block" alt="A-positive">
                                    <!-- <img src="https://nhsbtdbe.blob.core.windows.net/az766967/2/2/a/e/1/a/22ae1a6e0e0aa1b1d45d92894fc43cfcec0f06a1.png"
                                        class="card-img-top" alt="A-positive"> -->
                                    <div class="card-body">
                                        <h5 class="card-title">A-Positive
                                            <?php
                                            if (Avail_Bstock('A+') != "No Stock Available") {
                                                echo '<span class="badge text-bg-success">' . Avail_Bstock('A+') . '</span>';
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col" data-bs-toggle="modal" data-bs-target="#B-plus">
                                <div class="card h-80">
                                    <img src="https://www.blood.ca/sites/default/files/icon/blood-types_b-positive_blood-drop.jpg"
                                        class="card-img-top w-75 mx-auto d-block" alt=" B-positive">
                                    <!-- <img src="https://nhsbtdbe.blob.core.windows.net/az766967/6/7/9/5/1/a/67951a38c4ea387b8f039421ed7e8529f74b13bf.png"
                                        class="card-img-top" alt="B-positive"> -->
                                    <div class="card-body">
                                        <h5 class="card-title">B-Positive
                                            <?php
                                            if (Avail_Bstock('B+') != "No Stock Available") {
                                                echo '<span class="badge text-bg-success">' . Avail_Bstock('B+') . '</span>';
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col" data-bs-toggle="modal" data-bs-target="#AB-plus">
                                <div class="card h-80">
                                    <img src="https://www.blood.ca/sites/default/files/icon/blood-types_ab-positive_blood-drop.jpg"
                                        class="card-img-top w-75 mx-auto d-block" alt=" AB-Positive">
                                    <!-- <img src="https://nhsbtdbe.blob.core.windows.net/az766967/a/1/1/6/9/d/a1169d0ce91bf7e2de65a4c8928c7be4e0c4338d.png"
                                        class="card-img-top" alt="AB-Positive"> -->
                                    <div class="card-body">
                                        <h5 class="card-title">AB-Positive
                                            <?php
                                            if (Avail_Bstock('AB+') != "No Stock Available") {
                                                echo '<span class="badge text-bg-success">' . Avail_Bstock('AB+') . '</span>';
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col" data-bs-toggle="modal" data-bs-target="#O-plus">
                                <div class="card h-80">
                                    <img src="https://www.blood.ca/sites/default/files/icon/blood-types_o-positive_blood-drop.jpg"
                                        class="card-img-top w-75 mx-auto d-block" alt=" o-positive">
                                    <!-- <img src="https://nhsbtdbe.blob.core.windows.net/az766967/6/b/2/2/a/f/6b22af0a9947574e2c9dac9cf6e753332fcc14e5.png"
                                        class="card-img-top" alt="o-positive"> -->
                                    <div class="card-body">
                                        <h5 class="card-title">O-Positive
                                            <?php
                                            if (Avail_Bstock('O+') != "No Stock Available") {
                                                echo '<span class="badge text-bg-success">' . Avail_Bstock('O+') . '</span>';
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col" data-bs-toggle="modal" data-bs-target="#A-minus">
                                <div class="card h-80">
                                    <img src="https://www.blood.ca/sites/default/files/icon/blood-types_a-negative_blood-drop.jpg"
                                        class="card-img-top w-75 mx-auto d-block" alt=" A-negative">
                                    <!-- <img src="https://nhsbtdbe.blob.core.windows.net/az766967/8/4/f/9/1/1/84f911bcb4c6f40fa1bfb6ea362a4d3fa52c1c56.png"
                                        class="card-img-top" alt="A-negative"> -->
                                    <div class="card-body">
                                        <h5 class="card-title">A-Negative
                                            <?php
                                            if (Avail_Bstock('A-') != "No Stock Available") {
                                                echo '<span class="badge text-bg-success">' . Avail_Bstock('A-') . '</span>';
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col" data-bs-toggle="modal" data-bs-target="#B-minus">
                                <div class="card h-80">
                                    <img src="https://www.blood.ca/sites/default/files/icon/blood-types_b-negative_blood-drop.jpg"
                                        class="card-img-top w-75 mx-auto d-block" alt=" B-negative">
                                    <!-- <img src="https://nhsbtdbe.blob.core.windows.net/az766967/4/d/9/b/c/f/4d9bcf782aaf41f2f65d9479347d6bc697db4495.png"
                                        class="card-img-top" alt="B-negative"> -->
                                    <div class="card-body">
                                        <h5 class="card-title">B-Negative
                                            <?php
                                            if (Avail_Bstock('B-') != "No Stock Available") {
                                                echo '<span class="badge text-bg-success">' . Avail_Bstock('B-') . '</span>';
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col" data-bs-toggle="modal" data-bs-target="#AB-minus">
                                <div class="card h-80">
                                    <img src="https://www.blood.ca/sites/default/files/icon/blood-types_ab-negative_blood-drop.jpg"
                                        class="card-img-top w-75 mx-auto d-block" alt=" AB-Negative">
                                    <!-- <img src="https://nhsbtdbe.blob.core.windows.net/az766967/1/e/f/f/7/3/1eff732ab0f4227f556d884a7d85c33e78a48140.png"
                                        class="card-img-top" alt="AB-Negative"> -->
                                    <div class="card-body">
                                        <h5 class="card-title">AB-Negative
                                            <?php
                                            if (Avail_Bstock('AB-') != "No Stock Available") {
                                                echo '<span class="badge text-bg-success">' . Avail_Bstock('AB-') . '</span>';
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col" data-bs-toggle="modal" data-bs-target="#O-minus">
                                <div class="card h-80">
                                    <img src="https://www.blood.ca/sites/default/files/icon/blood-types_o-negative_blood-drop.jpg"
                                        class="card-img-top w-75 mx-auto d-block" alt=" o-negative">
                                    <!-- <img src="https://nhsbtdbe.blob.core.windows.net/az766967/7/e/e/3/b/a/7ee3ba72347ef5401ded559ea56d00555ab2ed51.png"
                                        class="card-img-top" alt="o-negative"> -->
                                    <div class="card-body">
                                        <h5 class="card-title">O-Negative
                                            <?php
                                            if (Avail_Bstock('O-') != "No Stock Available") {
                                                echo '<span class="badge text-bg-success">' . Avail_Bstock('O-') . '</span>';
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./Scripts/BT_Bundle.js"></script>

</html>