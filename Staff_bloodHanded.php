<?php
@include 'config.php';
session_start();

if (isset($_SESSION['current_username'])) {
    $username = $_SESSION['current_username'];
    $status = $_SESSION['current_types'];
} else {
    $status = 0;
}

include 'Popup_Alert.php';
// check if username is_login is set to 1
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
    <title>Staff - <?php echo $name ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='../Blood Bank Management/Stylesheet/Dashboard.css'>
    <link rel='stylesheet' href='../Blood Bank Management/Stylesheet/Dashboard_aniBG.css'>
    <link rel="shortcut icon" href="https://img.icons8.com/fluency/512/doctors-bag.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
                    <div class="folder-icons" onclick="location.href = 'Staff_bloodInventory.php'">
                        <div class="icon-name">Inventory</div>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'Staff_bloodDonation.php'">
                        <div class="icon-name"><a>Blood Donation</a></div>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'Staff_bloodRequest.php'">
                        <div class="icon-name">Blood Request</div>
                    </div>
                    <div class="folder-icons Pressed-folder-icons">
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
                    <h1 class="tabs-title">Approved Blood Requests</h1>
                    <div class="container">
                        <table class="table caption-top table-dark table-striped">
                            <caption>
                                <form class="d-flex p-2 mb-0 bg-dark text-white justify-content-between"
                                    style="border-radius: 10px;" method="post">
                                    <h4 class="m-1">Handed out blood</h4>
                                    <div class="d-flex">
                                        <input class="form-control me-2" type="search" name="search"
                                            placeholder="Search" id="search">
                                        <button class="btn btn-outline-success me-1" type="submit"
                                            name="submit">Search</button>
                                        <button class="btn btn-outline-secondary" type="submit">Reset</button>
                                    </div>
                                </form>
                            </caption>
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Blood Type</th>
                                    <th scope="col">Requested</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fromSearch = false;
                                if (isset($_POST['submit'])) {
                                    $search = $_POST['search'];
                                    $fromSearch = true;
                                    $sql = "SELECT * FROM `request` WHERE `name` LIKE '%$search%' OR `email` LIKE '%$search%' OR `phone` LIKE '%$search%' OR `Address` LIKE '%$search%' OR `blood_type` LIKE '%$search%' AND isapproved = '1'";
                                } else {
                                    $sql = "SELECT * FROM `request` WHERE isapproved = '1'";
                                }
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $num = mysqli_num_rows($result);

                                    //the page above the table will only show if the data is greater than or equal to 6
                                    if ($num >= 6) {
                                        # for Pagination
                                        $number_pages = 5;
                                        $total_pages = ceil($num / $number_pages);

                                        for ($btn = 1; $btn <= $total_pages; $btn++) {
                                            //Page Button
                                            echo "<a class='btn btn-secondary btn-sm mx-1' href='Staff_bloodHanded.php?page=" . $btn . "'>" . $btn . "</a>";
                                        }

                                        if (isset($_GET['page'])) {
                                            $page = $_GET['page'];
                                        } else {
                                            $page = 1;
                                        }

                                        $startinglimit = ($page - 1) * $number_pages;
                                        $sql = "SELECT * FROM `request` WHERE isapproved = 1 LIMIT $startinglimit, $number_pages";
                                        $result = mysqli_query($conn, $sql);
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        # Converting the requested blood to Liters
                                        if ($row['requested'] >= 1000) {
                                            $contoL = $row['requested'] / 1000 . " L";
                                        } else {
                                            $contoL = $row['requested'] . " ML";
                                        }
                                        echo "<tr>
                                        <td scope='row' >" . $row['user_id'] . "</td>
                                        <td class='text-truncate' style='max-width: 150px; min-width: 150px'>" . $row['name'] . "</td>
                                        <td class='text-truncate' style='max-width: 150px; min-width: 130px'>" . $row['email'] . "</td>
                                        <td>" . $row['phone'] . "</td>
                                        <td class='text-truncate' style='max-width: 150px; min-width: 120px'>" . $row['Address'] . "</td>
                                        <td>" . $row['blood_type'] . "</td>
                                        <td>" . $contoL . "</td>
                                        </tr>";
                                    }
                                } else {
                                    if ($fromSearch) {
                                        echo "<tr>
                                            <td colspan='9'>
                                                <div class='alert alert-warning' role='alert'>We're sorry, but \"$search\" is not found!
                                                </div>
                                            </td>
                                        </tr>";
                                    } else {
                                        echo "<tr>
                                            <td colspan='9'>
                                                <div class='alert alert-warning' role='alert'>We're sorry, but there are no blood requests!
                                                </div>
                                            </td>
                                        </tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</html>