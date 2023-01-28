<?php
@include 'config.php';

# this is the modals of all the functions used in the project if this file is not included in the project it will not work

function AvailableDonor($blood)
{ # this function is used to count the number of available donors for a particular blood type
    global $conn;
    $sql = "SELECT COUNT(*) FROM `donation` WHERE `blood_type` = '$blood'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $total = $row['COUNT(*)'];

    if ($total <= 0) {
        return 'No Donors Available';
    } else {
        return $total;
    }
}

function HandedOut($B_type)
{ # this function is used to count the number of blood bags handed out for a particular blood type
    global $conn;
    $sql = "SELECT COUNT(*) FROM `request` WHERE `blood_type` = '$B_type' AND `isapproved` = 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $total = $row['COUNT(*)'];

    if ($total <= 0) {
        return 'No Record Found';
    } else {
        return $total;
    }
}

function PendingRequest($type)
{ # this function is used to count the number of pending requests for a particular blood type
    global $conn;
    $sql = "SELECT COUNT(*) FROM `request` WHERE `blood_type` = '$type' AND `isapproved` = 0;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $total = $row['COUNT(*)'];

    if ($total <= 0) {
        return 'No Request';
    } else {
        return $total;
    }
}

function Avail_Btype($bloodT)
{ # this function is used to count the number of available blood for a particular blood type
    global $conn;
    $sql = "SELECT * FROM `blood_types` WHERE `blood_id` = 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $Aplus = $row['A_plus'];
    $Aminus = $row['A_minus'];
    $Bplus = $row['B_plus'];
    $Bminus = $row['B_minus'];
    $ABplus = $row['AB_plus'];
    $ABminus = $row['AB_minus'];
    $Oplus = $row['O_plus'];
    $Ominus = $row['O_minus'];

    // for return value of the function [prevent unreachable code warning]
    $rvalue = null;

    switch ($bloodT) {
        case 'A+':
            if ($Aplus <= 0) {
                $rvalue = 'No Blood Available';
            } else {
                $rvalue = $Aplus;
            }
            break;
        case 'A-':
            if ($Aminus <= 0) {
                $rvalue = 'No Blood Available';
            } else {
                $rvalue = $Aminus;
            }
            break;
        case 'B+':
            if ($Bplus <= 0) {
                $rvalue = 'No Blood Available';
            } else {
                $rvalue = $Bplus;
            }
            break;
        case 'B-':
            if ($Bminus <= 0) {
                $rvalue = 'No Blood Available';
            } else {
                $rvalue = $Bminus;
            }
            break;
        case 'AB+':
            if ($ABplus <= 0) {
                $rvalue = 'No Blood Available';
            } else {
                $rvalue = $ABplus;
            }
            break;
        case 'AB-':
            if ($ABminus <= 0) {
                $rvalue = 'No Blood Available';
            } else {
                $rvalue = $ABminus;
            }
            break;
        case 'O+':
            if ($Oplus <= 0) {
                $rvalue = 'No Blood Available';
            } else {
                $rvalue = $Oplus;
            }
            break;
        case 'O-':
            if ($Ominus <= 0) {
                $rvalue = 'No Blood Available';
            } else {
                $rvalue = $Ominus;
            }
            break;
    }
    return $rvalue;
}

function Avail_Bstock($BloodS)
{ # this function is used to count the number of available blood bags for a particular blood type
    global $conn;
    $sql = "SELECT * FROM `blood_types` WHERE `blood_id` = '2';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $Aplus = $row['A_plus'];
    $Aminus = $row['A_minus'];
    $Bplus = $row['B_plus'];
    $Bminus = $row['B_minus'];
    $ABplus = $row['AB_plus'];
    $ABminus = $row['AB_minus'];
    $Oplus = $row['O_plus'];
    $Ominus = $row['O_minus'];

    $rvalue = null;

    switch ($BloodS) {
        case 'A+':
            if ($Aplus <= 0) {
                $rvalue = 'No Stock Available';
            } else {
                //convert to liters
                if ($Aplus >= 1000) {
                    $rvalue = $Aplus = $Aplus / 1000 . ' L';
                } else {
                    $rvalue = $Aplus = $Aplus . ' ML';
                }
            }
            break;
        case 'A-':
            if ($Aminus <= 0) {
                $rvalue = 'No Stock Available';
            } else {
                if ($Aminus >= 1000) {
                    $rvalue = $Aminus = $Aminus / 1000 . ' L';
                } else {
                    $rvalue = $Aminus = $Aminus . ' ML';
                }
            }
            break;
        case 'B+':
            if ($Bplus <= 0) {
                $rvalue = 'No Stock Available';
            } else {
                if ($Bplus >= 1000) {
                    $rvalue = $Bplus = $Bplus / 1000 . ' L';
                } else {
                    $rvalue = $Bplus = $Bplus . ' ML';
                }

            }
            break;
        case 'B-':
            if ($Bminus <= 0) {
                $rvalue = 'No Stock Available';
            } else {
                if ($Bminus >= 1000) {
                    $rvalue = $Bminus = $Bminus / 1000 . ' L';
                } else {
                    $rvalue = $Bminus = $Bminus . ' ML';
                }
            }
            break;
        case 'AB+':
            if ($ABplus <= 0) {
                $rvalue = 'No Stock Available';
            } else {
                if ($ABplus >= 1000) {
                    $rvalue = $ABplus = $ABplus / 1000 . ' L';
                } else {
                    $rvalue = $ABplus = $ABplus . ' ML';
                }
            }
            break;
        case 'AB-':
            if ($ABminus <= 0) {
                $rvalue = 'No Stock Available';
            } else {
                if ($ABminus >= 1000) {
                    $rvalue = $ABminus = $ABminus / 1000 . ' L';
                } else {
                    $rvalue = $ABminus = $ABminus . ' ML';
                }
            }
            break;
        case 'O+':
            if ($Oplus <= 0) {
                $rvalue = 'No Stock Available';
            } else {
                if ($Oplus >= 1000) {
                    $rvalue = $Oplus = $Oplus / 1000 . ' L';
                } else {
                    $rvalue = $Oplus = $Oplus . ' ML';
                }
            }
            break;
        case 'O-':
            if ($Ominus <= 0) {
                $rvalue = 'No Stock Available';
            } else {
                if ($Ominus >= 1000) {
                    $rvalue = $Ominus = $Ominus / 1000 . ' L';
                } else {
                    $rvalue = $Ominus = $Ominus . ' ML';
                }
            }
            break;
        default:
            $rvalue = 'Loading...';
            break;
    }
    return $rvalue;
}

# for Donation and Request
function totalDonation()
{ # this function is used to count the total number of donations made by all users in the system
    global $conn;
    $sql = "SELECT (SUM(A_plus) + SUM(A_minus) + SUM(B_plus) + SUM(B_minus) + SUM(AB_plus) + SUM(AB_minus) + SUM(O_plus) + SUM(O_minus)) AS total FROM blood_types WHERE `blood_id` = '3'";
    $result = mysqli_query($conn, $sql);
    $values = mysqli_fetch_assoc($result);
    $num_rows = $values['total'];

    if ($num_rows == 0) {
        return 'No Donations Yet!';
    } else {
        # 1 liter = 1000 ml
        if ($num_rows >= 1000) {
            $num_rows = $num_rows / 1000;
            return $num_rows . ' Liters';
        } else {
            return $num_rows . ' Milliliters';
        }
    }
}
function totalRequest()
{ # this function is used to count the total number of requests made by all users in the system
    global $conn;
    $sql = "SELECT SUM(requested) AS total FROM request WHERE `isapproved` = '1'";
    $result = mysqli_query($conn, $sql);
    $values = mysqli_fetch_assoc($result);
    $num_rows = $values['total'];

    if ($num_rows == 0) {
        return 'No Requests Yet!';
    } elseif ($num_rows >= 1000) {
        $num_rows = $num_rows / 1000;
        return $num_rows . ' Liters';
    } else {
        return $num_rows . ' Milliliters';
    }
}

?>
<!-- Modal -->
<!-- Add New Donor -->
<div class="modal fade" id="NewEntry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add new Donor</h1>
            </div>
            <div class="modal-body">
                <form action="NewDonor.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" name="name" placeholder="Juan Dela Cruz" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Example@ddomain.com"
                            required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" name="phone" placeholder="+63" required>
                        <label for="phone">Phone Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="address" placeholder="Current Address" required>
                        <label for="address">Address</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" name="blood" required>
                            <option selected hidden value="unknown">Select your Blood Type Here</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <label for="blood">Blood Type</label>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#WHO'>Back</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Update Donor -->
<div class="modal fade" id="UpdateUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Donor Data</h1>
            </div>
            <div class="modal-body">
                <form action="DonorUpdate.php" method="post">
                    <input type="hidden" id="update_id" name="id">
                    <div class="form-floating mb-3">
                        <input type="text" id="update_name" class="form-control" name="name"
                            placeholder="Juan Dela Cruz" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="update_email"
                            placeholder="Example@ddomain.com" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" name="phone" id="update_phone" placeholder="+63"
                            required>
                        <label for="phone">Phone Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="address" id="update_address"
                            placeholder="Current Address" required>
                        <label for="address">Address</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" name="blood" id="update_blood" required>
                            <option selected hidden value="unknown">Select your Blood Type Here</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <label for="blood">Blood Type</label>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="update">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p>Changing your blood type after you have donated blood will not change your donated blood</p>
            </div>
        </div>
    </div>
</div>
<!-- Donate Blood -->
<div class="modal fade" id="DonateBlood" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Donate Unit of Blood</h1>
            </div>
            <div class="modal-body">
                <form action="DonateBlood.php" method="post">
                    <input type="hidden" id="donor_id" name="id">
                    <input type="hidden" id="donor_type" name="blood_type">
                    <div class="form-floating">
                        <select class="form-select" name="blood" id="Amount" required>
                            <option selected disabled hidden>Donate Blood Amount</option>
                            <option value="450">450 ml</option>
                            <option value="600">600 ml</option>
                            <option value="1000">2 unit</option>
                            <option value="1500">3 unit</option>

                        </select>
                        <label for="blood">Blood Type</label>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="Donate">Donate</button>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <p>For health reasons, you are only allowed to donate 8 units of blood or 4.05 liters of
                                blood
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="WHO" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Who can I Give blood?</h1>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item active" aria-current="true">NOTES</li>
                    <li class="list-group-item">Once it has been submitted, it can't be Change.</li>
                    <li class="list-group-item">Each person is only allowed to donate up to 6 units of blood</li>
                    <li class="list-group-item">All compatible blood types will receive donor blood separately</li>
                </ul>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <img src="https://nhsbtdbe.blob.core.windows.net/umbraco-assets-corp/15095/29720-000np-know-your-type-web-buttons-600px-sq-aplus.png?width=300&height=300"
                            class="rounded mx-auto d-block w-50" alt="A+">
                    </li>
                    <li class="list-group-item">
                        <img src="https://nhsbtdbe.blob.core.windows.net/umbraco-assets-corp/15092/29720-000np-know-your-type-web-buttons-600px-sq-bplus.png?width=301&height=301"
                            class="rounded mx-auto d-block w-50" alt="B+">
                    </li>
                    <li class="list-group-item">
                        <img src="https://nhsbtdbe.blob.core.windows.net/umbraco-assets-corp/15094/29720-000np-know-your-type-web-buttons-600px-sq-abplus.png?width=301&height=301"
                            class="rounded mx-auto d-block w-50" alt="AB+">
                    </li>
                    <li class="list-group-item">
                        <img src="https://nhsbtdbe.blob.core.windows.net/umbraco-assets-corp/15090/29720-000np-know-your-type-web-buttons-600px-sq-oplus.png?width=300&height=300"
                            class="rounded mx-auto d-block w-50" alt="O+">
                    </li>
                    <li class="list-group-item">
                        <img src="https://nhsbtdbe.blob.core.windows.net/umbraco-assets-corp/15096/29720-000np-know-your-type-web-buttons-600px-sq-a.png?width=300&height=300"
                            class="rounded mx-auto d-block w-50" alt="A-">
                    </li>
                    <li class="list-group-item">
                        <img src="https://nhsbtdbe.blob.core.windows.net/umbraco-assets-corp/15093/29720-000np-know-your-type-web-buttons-600px-sq-b.png?width=300&height=300"
                            class="rounded mx-auto d-block w-50" alt="B-">
                    </li>
                    <li class="list-group-item">
                        <img src="https://nhsbtdbe.blob.core.windows.net/umbraco-assets-corp/15089/29720-000np-know-your-type-web-buttons-600px-sq-ab.png?width=350&height=350"
                            class="rounded mx-auto d-block w-50" alt="AB-">
                    </li>
                    <li class="list-group-item">
                        <img src="https://nhsbtdbe.blob.core.windows.net/umbraco-assets-corp/15091/29720-000np-know-your-type-web-buttons-600px-sq-o.png?width=296&height=296"
                            class="rounded mx-auto d-block w-50" alt="O-">
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-toggle='modal'
                    data-bs-target='#NewEntry'>Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- New Request -->
<div class="modal fade" id="NewReq" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Request for Blood</h1>
            </div>
            <div class="modal-body">
                <p class="text-center">
                    <strong>Ensure you select the correct unit as changes cannot be made once it has been
                        submitted.</strong>
                </p>
                <form action="NewRequest.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" name="rname" placeholder="Juan Dela Cruz" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="remail" placeholder="Example@ddomain.com"
                            required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" name="rphone" placeholder="+63" required>
                        <label for="phone">Phone Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="raddress" placeholder="Current Address" required>
                        <label for="address">Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="rblood" required>
                            <option selected disabled hidden>Select your Blood Type Here</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <label for="blood">Blood Type</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" name="runit" required>
                            <option selected disabled hidden>Unit</option>
                            <option value="450">450 ml</option>
                            <option value="600">600 ml</option>
                            <option value="1000">2 unit</option>
                            <option value="1500">3 unit</option>
                        </select>
                        <label for="blood">Unit of Blood</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- A+ -->
<div class="modal fade" id="A-plus" tabindex="-1" aria-labelledby="BTAP" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="BTAP">A-Positive</h1>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <h4>Available Blood</h4>
                            </td>
                            <td>
                                <?php echo Avail_Btype('A+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Donors</h4>
                            </td>
                            <td>
                                <?php echo AvailableDonor('A+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Blood Request</h4>
                            </td>
                            <td>
                                <?php echo PendingRequest('A+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Liters</h4>
                            </td>
                            <td>
                                <?php echo Avail_Bstock('A+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Handed Over</h4>
                            </td>
                            <td>
                                <?php echo HandedOut('A+') ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- A- -->
<div class="modal fade" id="A-minus" tabindex="-1" aria-labelledby="BTAM" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="BTAM">A-Negative</h1>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <h4>Available Blood</h4>
                            </td>
                            <td>
                                <?php echo Avail_Btype('A-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Donors</h4>
                            </td>
                            <td>
                                <?php echo AvailableDonor('A-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Blood Request</h4>
                            </td>
                            <td>
                                <?php echo PendingRequest('A-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Liters</h4>
                            </td>
                            <td>
                                <?php echo Avail_Bstock('A-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Handed Over</h4>
                            </td>
                            <td>
                                <?php echo HandedOut('A-') ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- B+ -->
<div class="modal fade" id="B-plus" tabindex="-1" aria-labelledby="BTBP" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="BTBP">B-Positive</h1>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <h4>Available Blood</h4>
                            </td>
                            <td>
                                <?php echo Avail_Btype('B+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Donors</h4>
                            </td>
                            <td>
                                <?php echo AvailableDonor('B+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Blood Request</h4>
                            </td>
                            <td>
                                <?php echo PendingRequest('B+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Liters</h4>
                            </td>
                            <td>
                                <?php echo Avail_Bstock('B+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Handed Over</h4>
                            </td>
                            <td>
                                <?php echo HandedOut('B+') ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- B- -->
<div class="modal fade" id="B-minus" tabindex="-1" aria-labelledby="BTBM" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="BTBM">B-Negative</h1>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <h4>Available Blood</h4>
                            </td>
                            <td>
                                <?php echo Avail_Btype('B-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Donors</h4>
                            </td>
                            <td>
                                <?php echo AvailableDonor('B-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Blood Request</h4>
                            </td>
                            <td>
                                <?php echo PendingRequest('B-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Liters</h4>
                            </td>
                            <td>
                                <?php echo Avail_Bstock('B-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Handed Over</h4>
                            </td>
                            <td>
                                <?php echo HandedOut('B-') ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- AB+ -->
<div class="modal fade" id="AB-plus" tabindex="-1" aria-labelledby="BTABP" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="BTABP">AB-Positive</h1>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <h4>Available Blood</h4>
                            </td>
                            <td>
                                <?php echo Avail_Btype('AB+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Donors</h4>
                            </td>
                            <td>
                                <?php echo AvailableDonor('AB+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Blood Request</h4>
                            </td>
                            <td>
                                <?php echo PendingRequest('AB+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Liters</h4>
                            </td>
                            <td>
                                <?php echo Avail_Bstock('AB+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Handed Over</h4>
                            </td>
                            <td>
                                <?php echo HandedOut('AB+') ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- AB- -->
<div class="modal fade" id="AB-minus" tabindex="-1" aria-labelledby="BTABM" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="BTABM">AB-Negative</h1>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <h4>Available Blood</h4>
                            </td>
                            <td>
                                <?php echo Avail_Btype('AB-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Donors</h4>
                            </td>
                            <td>
                                <?php echo AvailableDonor('AB-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Blood Request</h4>
                            </td>
                            <td>
                                <?php echo PendingRequest('AB-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Liters</h4>
                            </td>
                            <td>
                                <?php echo Avail_Bstock('AB-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Handed Over</h4>
                            </td>
                            <td>
                                <?php echo HandedOut('AB-') ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- O+ -->
<div class="modal fade" id="O-plus" tabindex="-1" aria-labelledby="BTOP" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="BTOP">O-Positive</h1>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <h4>Available Blood</h4>
                            </td>
                            <td>
                                <?php echo Avail_Btype('O+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Donors</h4>
                            </td>
                            <td>
                                <?php echo AvailableDonor('O+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Blood Request</h4>
                            </td>
                            <td>
                                <?php echo PendingRequest('O+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Liters</h4>
                            </td>
                            <td>
                                <?php echo Avail_Bstock('O+') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Handed Over</h4>
                            </td>
                            <td>
                                <?php echo HandedOut('O+') ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- O- -->
<div class="modal fade" id="O-minus" tabindex="-1" aria-labelledby="BTOM" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="BTOM">O-Negative</h1>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <h4>Available Blood</h4>
                            </td>
                            <td>
                                <?php echo Avail_Btype('O-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Donors</h4>
                            </td>
                            <td>
                                <?php echo AvailableDonor('O-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Blood Request</h4>
                            </td>
                            <td>
                                <?php echo PendingRequest('O-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Available Liters</h4>
                            </td>
                            <td>
                                <?php echo Avail_Bstock('O-') ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Handed Over</h4>
                            </td>
                            <td>
                                <?php echo HandedOut('O-') ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Admin Accounts -->
<div class="modal fade" id="AdminAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">New Admin Account</h1>
            </div>
            <div class="modal-body">
                <form action="NewUser.php" method="post">
                    <input type="hidden" class="form-control" name="Utype" id="Utype" disabled>
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" name="name" placeholder="Name" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" placeholder="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="password" placeholder="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="Cpassword" placeholder="Cpassword" required>
                        <label for="Cpassword">Confirm Password</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="StaffAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">New Staff Account</h1>
            </div>
            <div class="modal-body">
                <form action="NewUser.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" name="name" placeholder="Name" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" placeholder="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="password" placeholder="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="Cpassword" placeholder="Cpassword" required>
                        <label for="Cpassword">Confirm Password</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="UserAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">New User Account</h1>
            </div>
            <div class="modal-body">
                <form action="NewUser.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" name="name" placeholder="Name" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" placeholder="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="password" placeholder="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="Cpassword" placeholder="Cpassword" required>
                        <label for="Cpassword">Confirm Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" placeholder="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" name="phone" placeholder="phone" required>
                        <label for="phone">Phone</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="address" class="form-control" name="address" placeholder="address" required>
                        <label for="address">Address</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" name="blood" required>
                            <option selected disabled hidden>Select your Blood Type Here</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <label for="blood">Blood Type</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Update Account -->
<div class="modal fade" id="UpAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Data</h1>
            </div>
            <div class="modal-body">
                <form action="AccountUpdate.php" method="post">
                    <input type="hidden" class="form-control" name="ID" id="user_id">
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" name="name" id="name" placeholder="Name" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="username"
                            required>
                        <label for="username">Username</label>
                    </div>
                    <?php
                    # show password for admin and hide for other users
                    if ($_SESSION['current_types'] == 1) {
                        echo "<div class='form-floating mb-3'>
                        <input type='text' class='form-control' name='password' id='password' placeholder='password'
                            required>
                        <label for='password'>Password</label>
                    </div>";
                    } else {
                        echo "<div class='form-floating mb-3'>
                        <input type='password' class='form-control' name='password' id='password' placeholder='password'
                            required>
                        <label for='password'>Password</label>
                    </div>";
                    }
                    ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="submit">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="UpUserAct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update User Data</h1>
            </div>
            <div class="modal-body">
                <form action="AccountUserupdate.php" method="post">
                    <input type="hidden" class="form-control" name="ID" id="UID">
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" name="name" id="Upname" placeholder="Name" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="uname" placeholder="username"
                            required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="password" id="pword" placeholder="password"
                            required>
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="mail" placeholder="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" name="phone" id="tel" placeholder="phone" required>
                        <label for="phone">Phone</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="address" class="form-control" name="address" id="add" placeholder="address"
                            required>
                        <label for="address">Address</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" name="blood" id="UpBtypes" required>
                            <option selected disabled hidden>Select your Blood Type Here</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <label for="blood">Blood Type</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="submit">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>