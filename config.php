<?php
try {
    # Ican't Figure out why my current session for Username is root then i check the config file and i find $username = "root"
    # so I change the name to $DBusername and it works fine now. baka kabobohan ko lang yun kung bakit $username yung nilagay ko dito lol.

    # Use this if below code doesn't work for you
    # Default XAMPP MySQL Connection
    $hostname = "localhost";
    $DBusername = "root";
    $DBpassword = "";
    $database = "bloodbank_management";
    $conn = mysqli_connect($hostname, $DBusername, $DBpassword, $database);
    
    

    # Custom User MySQL Account for Connection 
    # Having some issues with this one, mySQL keeps shutting down when I try to connect to it.
    # nevermind, I'll just use the default XAMPP MySQL Connection
    
    // $conn = mysqli_connect('localhost', 'administrator', 'pwordfordb_bbm.2022', 'bloodbank_management');


} catch (\Throwable $th) {
    # Redirect to Error Page with Error Code 1 if Connection Fails / Can't Connect to Database
    header("Location: ../ErrorPage.php?e=1");
}
?>