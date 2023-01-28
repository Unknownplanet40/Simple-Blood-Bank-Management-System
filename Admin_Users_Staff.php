<?php
@include 'config.php';
session_start();

// get the username from last page
// if the username is not set then redirect to login page
if (isset($_SESSION['current_username'])) {
    $username = $_SESSION['current_username'];
    $status = $_SESSION['current_types'];
} else {
    die("<script>location.href = 'login.php';</script>");
}

include 'Popup_Alert.php';
$_SESSION['User_status'] = "Staff";

// check if username is_login is set to 1
if ($status == 1) {
    $name = $_SESSION['current_name'];
} else {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ADMIN -
        <?php echo $name; ?>
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="./Stylesheet/MUsers.css">
    <link rel="stylesheet" href="./Stylesheet/MUsers_aniBG.css">
    <link rel="shortcut icon" href="https://img.icons8.com/fluency/512/doctors-bag.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./Stylesheet/bootstrap.css">
    <script src="./Scripts/jquery.js"></script>
    <script src="./Scripts/A_MUsers_Script.js"></script>
    <script src="./Scripts/sweetalert2.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <h3 class="navbar-brand">Admin Dashboard</h3>
                <h3 class="navbar-brand">|</h3>
                <h3 class="navbar-brand" style="text-transform: uppercase;">
                    <?php echo $name ?>
                </h3>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="Admin_Users.php">Administrator Accounts</a>
                        <a class="nav-link active" aria-current="page">Staff Members Accounts</a>
                        <a class="nav-link" href="Admin_Users_Users.php">Users Accounts</a>
                        <a class="nav-link" href="Admin_Dashboard.php">Dashboard</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section>
            <table class="table table-dark table-hover table-striped caption-top table-bordered">
                <caption>
                    <?php include 'modals.php'; ?>
                    <form class="d-flex mb-1 mt-2 justify-content-between" method="post">
                        <input class="form-control" style="max-width: 760px;" type="search" name="search"
                            placeholder="Search & Press Enter..." id="search">
                        <div class="d-flex justify-content-evenly mb-0 mt-0 bg-dark text-white "
                            style="min-width: 240px; border-radius: 10px;">
                            <div style="display: none;"><button class="btn btn-sm btn-outline-success mb-2 mt-2"
                                    type="submit" name="submit">Search</button></div>
                            <div><button class="btn btn-sm btn-outline-secondary mb-2 mt-2" type="submit">Reset
                                    Search</button>
                            </div>
                            <div><button type="button" btn-sm class="btn btn-sm btn-light mb-2 mt-2"
                                    data-bs-toggle="modal" data-bs-target="#StaffAdd">Add Account</button></div>
                        </div>
                    </form>
                </caption>
                <thead class="table-dark">
                    <tr>
                        <th style="display: none;">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Login</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo NewAlertBox();
                    $_SESSION['isTrue'] = false;
                    $fromSearch = false;
                    // if the search button is clicked
                    if (isset($_POST['submit'])) {
                        $search = $_POST['search'];
                        $fromSearch = true;
                        //ignore case sensitive
                        if (strtolower($search) == "approved") {
                            $sql = "SELECT * FROM `users` WHERE `isApproved` LIKE 1 AND `types` = 2";
                        } else if (strtolower($search) == "pending") {
                            $sql = "SELECT * FROM `users` WHERE `isApproved` LIKE 0 AND `types` = 2";
                        } else if (strtolower($search) == "denied") {
                            $sql = "SELECT * FROM `users` WHERE `isApproved` LIKE 2 AND `types` = 2";
                        } else {
                            $sql = "SELECT * FROM `users` WHERE `types` = 2 AND `name` LIKE '%$search%' OR `username` LIKE '%$search%'";
                        }
                    } else {
                        $sql = "SELECT * FROM `users` WHERE `types` = 2";
                    }
                    //get only the pending & declined request
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $num = mysqli_num_rows($result);

                        if ($num >= 7) {
                            # for Pagination
                            $number_pages = 5;
                            $total_pages = ceil($num / $number_pages);

                            for ($btn = 1; $btn <= $total_pages; $btn++) {
                                //Page Button
                                echo "<a class='btn btn-secondary btn-sm mx-1' href='Admin_Users_Staff.php?page=" . $btn . "'>" . $btn . "</a>";

                            }

                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }

                            $startinglimit = ($page - 1) * $number_pages;
                            $sql = "SELECT * FROM `users` WHERE `types` = '2' LIMIT " . $startinglimit . ',' . $number_pages;
                            $result = mysqli_query($conn, $sql);
                        }

                        //convert password to asterisk
                        function convert($password, $enable)
                        {
                            if ($enable) {
                                return $password;
                            } else {
                                $length = strlen($password);
                                $asterisk = "";
                                for ($i = 0; $i < $length; $i++) {
                                    $asterisk .= "<i class='bi bi-dot'></i>";
                                }
                                return $asterisk;
                            }
                        }

                        while ($row = mysqli_fetch_assoc($result)) {

                            if ($row['types'] == 1) {
                                $status = "Admin";
                            } else if ($row['types'] == 2) {
                                $status = "Staff Member";
                            } else {
                                $status = "User";
                            }

                            if ($row['isApproved'] == 1) {
                                $isApproved = "Approved";
                                $tcolorS = "text-success";
                            } else if ($row['isApproved'] == 2) {
                                $isApproved = "Denied";
                                $tcolorS = "text-danger";
                            } else {
                                $isApproved = "Pending";
                                $tcolorS = "text-warning";
                            }

                            if ($row['is_login'] == 1) {
                                $Login = "Signed In";
                                $tcolorL = "text-success";
                            } else {
                                $Login = "Signed Out";
                                $tcolorL = "text-danger";
                            }

                            if ($row['types'] == 2) {
                                echo "<tr>
                                        <td style='display: none;'>" . $row['user_id'] . "</td>
                                        <td class='text-truncate' style='max-width: 150px; min-width: 120px'>" . $row['name'] . "</td>
                                        <td style='max-width: 150px; min-width: 100px'>" . $row['username'] . "</td>
                                        <td style='max-width: 150px; min-width: 100px'>" . convert($row['password'], true) . "</td>
                                        <td>" . $status . "</td>
                                        <td class='$tcolorS'>" . $isApproved . "</td>
                                        <td class='$tcolorL'>" . $Login . "</td>
                                        <td>
                                        <div class='d-flex justify-content-evenly'>
                                        <button type='button' class='btn btn-primary me-1 btnEdit text-light'><i class='bi bi-person-gear'></i></button>
                                        <button class='btn btn-success me-1'><a class='text-light' style='text-decoration: none;' href='staff_approval.php?user_id=" . $row['user_id'] . "'><i class='bi bi-check-lg'></i></a></button>
                                        <button class='btn btn-danger me-1'><a class='text-light' style='text-decoration: none;' href='Staff_Denied.php?user_id=" . $row['user_id'] . "'><i class='bi bi-x-lg'></i></a></button>
                                        <button class='btn btn-warning'><a class='text-dark' style='text-decoration: none;' href='RemoveUser.php?user_id=" . $row['user_id'] . "'><i class='bi bi-trash-fill'></i></a></button>
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
                                        <div class='alert alert-warning' role='alert'>We're sorry, but there are no users!
                                        </div>
                                    </td>
                                 </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
<script src="./Scripts/BT_Bundle.js"></script>

</html>