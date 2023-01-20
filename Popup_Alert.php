<?php

function NewAlertBox()
{
    if (isset($_SESSION['message'])) {
        if ($_SESSION['isTrue']) {

            $title = "";
            $login = false;
            $icon = $_SESSION['icon'];

            switch ($_SESSION['icon']) {
                case 'success':
                    $title = "Success";
                    break;
                case 'info':
                    $title = "Information";
                    break;
                case 'question':
                    $title = "Attention";
                    break;
                case 'warning':
                    $title = "There\'s something wrong!";
                    break;
                case 'error':
                    $title = "Oops... Something went wrong!";
                    break;
                case 'success-login':
                    $title = "Change has been saved!";
                    $icon = "success";
                    $login = true;
                    break;
                default:
                    $title = "Oops... We\'re sorry! <hr>";
                    break;
            }

            /* return "<script>
            Swal.fire({
            icon: '". $_SESSION['icon'] ."',
            title: '". $title ."',
            text: '" . $_SESSION['message'] . "',
            showConfirmButton: false,
            timer: 2600
            });</script>"; */

            if ($login) {
                return "<script>
            Swal.fire({
                icon: '" . $icon . "',
                title: '" . $title . "',
                text: '" . $_SESSION['message'] . "',
                showConfirmButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Log Out'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php';
                    }
                })</script>";
            } else {
                return "<script>
            Swal.fire({
                icon: '" . $_SESSION['icon'] . "',
                title: '" . $title . "',
                text: '" . $_SESSION['message'] . "'
            });</script>";
            }
        }
    }
}
?>