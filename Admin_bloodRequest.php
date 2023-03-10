<?php
@include 'config.php';
session_start();

// get the username from last page
// if the username is not set then redirect to login page
if (isset($_SESSION['current_username'])) {
    $username = $_SESSION['current_username'];
    $status = $_SESSION['current_types'];

    if ($status == 1) {
        $name = $_SESSION['current_name'];
    } else {
        header("Location: Errorpage.php?e=3");
    }
} else {
    header("Location: Errorpage.php?e=2");
}

include 'Popup_Alert.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ADMIN - <?php echo $name; ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='./Stylesheet/Dashboard.css'>
    <link rel='stylesheet' href='./Stylesheet/Dashboard_aniBG.css'>
    <link rel="shortcut icon" href="https://img.icons8.com/fluency/512/doctors-bag.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./Stylesheet/bootstrap.css">
    <script src="./Scripts/jquery.js"></script>
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
                            <?php
                            echo $name;
                            echo NewAlertBox();
                            $_SESSION['isTrue'] = false;
                            ?>
                        </p>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'Admin_bloodInventory.php'">
                        <div class="icon-name">Inventory</div>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'Admin_bloodDonation.php'">
                        <div class="icon-name"><a>Blood Donation</a></div>
                    </div>
                    <div class="folder-icons Pressed-folder-icons">
                        <div class="icon-name">Blood Request</div>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'Admin_bloodHanded.php'">
                        <div class="icon-name">Hand Over</div>
                    </div>
                    <div class="folder-icons" onclick="location.href = 'Admin_Users.php'">
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
                    <h1 class="tabs-title">blood Request</h1>
                    <div class="container">
                        <table class="table caption-top table-dark table-striped ">
                            <caption>
                                <form class="d-flex mb-1 mt-2 justify-content-between" method="post">
                                    <input class="form-control" style="max-width: 770px;" type="search" name="search"
                                        placeholder="Search" id="search">
                                    <div class="d-flex justify-content-evenly mb-0 mt-0 bg-dark text-white "
                                        style="min-width: 200px; border-radius: 10px;">
                                        <div><button class="btn btn-sm btn-outline-success mb-2 mt-2" type="submit"
                                                name="submit">Search</button></div>
                                        <div><button class="btn btn-sm btn-outline-secondary mb-2 mt-2"
                                                type="submit">Reset</button></div>
                                        <div><button type="button" btn-sm class="btn btn-sm btn-light mb-2 mt-2"
                                                data-bs-toggle="modal" data-bs-target="#NewReq">Request</button></div>
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
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // if the search button is clicked
                                $fromSearch = false;
                                if (isset($_POST['submit'])) {
                                    $search = $_POST['search'];
                                    $sql = "SELECT * FROM `request` WHERE `user_id` LIKE '%$search%' OR `name` LIKE '%$search%' OR `email` LIKE '%$search%' OR `blood_type` LIKE '%$search%' OR `Address` LIKE '%$search%' AND NOT `isapproved` = '1'";
                                    $fromSearch = true;
                                } else {
                                    $sql = "SELECT * FROM `request` WHERE NOT `isapproved` = '1'";
                                }
                                //get only the pending & declined request
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
                                            echo "<a class='btn btn-secondary btn-sm mx-1' href='Admin_bloodRequest.php?page=" . $btn . "'>" . $btn . "</a>";
                                        }

                                        if (isset($_GET['page'])) {
                                            $page = $_GET['page'];
                                        } else {
                                            $page = 1;
                                        }

                                        $startinglimit = ($page - 1) * $number_pages;
                                        $sql = "SELECT * FROM `Request` WHERE NOT `isapproved` = '1' LIMIT  $startinglimit, $number_pages";
                                        $result = mysqli_query($conn, $sql);
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if (!empty($row['requested'])) {
                                            $requested = $row['requested'] / 1000;
                                        } else {
                                            $requested = 0;
                                        }

                                        if ($row['isapproved'] == 0) {
                                            $status = "Pending";
                                        } elseif ($row['isapproved'] == 1) {
                                            $status = "Approved";
                                        } else {
                                            $status = "Denied";
                                        }

                                        if ($row['isapproved'] != 1) {
                                            echo "<tr>
                                        <td scope='row'>" . $row['user_id'] . "</td>
                                        <td class='text-truncate' style='max-width: 150px; min-width: 120px'>" . $row['name'] . "</td>
                                        <td class='text-truncate' style='max-width: 150px; min-width: 100px'>" . $row['email'] . "</td>
                                        <td>" . $row['phone'] . "</td>
                                        <td class='text-truncate' style='max-width: 150px; min-width: 100px'>" . $row['Address'] . "</td>
                                        <td>" . $row['blood_type'] . "</td>
                                        <td class='text-truncate' style='max-width: 150px; min-width: 100px'>" . $requested . " Liters</td>
                                        <td>" . $status . "</td>
                                        <td>
                                        <div class='d-flex justify-content-evenly'>
                                        <button class='btn btn-primary me-1'><a class='text-light' style='text-decoration: none;' href='Approve.php?user_id=" . $row['user_id'] . "'><i class='bi bi-check-lg'></i></a></button>
                                        <button class='btn btn-danger me-1'><a class='text-light' style='text-decoration: none;' href='Denied.php?user_id=" . $row['user_id'] . "'><i class='bi bi-x-lg'></i></a></button>
                                        <button class='btn btn-warning'><a class='text-dark' style='text-decoration: none;' href='Reqdelete.php?user_id=" . $row['user_id'] . '&' . $row['blood_type'] . "'><i class='bi bi-trash-fill'></i></a></button>
                                        </div>
                                        </td>
                                        </tr>";
                                        }
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
                                                <div class='alert alert-warning' role='alert'>There are no pending requests!
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
<script src="./Scripts/BT_Bundle.js"></script>

</html>