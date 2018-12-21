<?php

header('Access-Control-Allow-Methods: GET, POST');
try {
    include "connection.php";
    session_start();

    $fname = $_REQUEST['fname'];
    $mname = $_REQUEST['mname'];
    $lname = $_REQUEST['lname'];
    $dateofbirth = $_REQUEST['dateofbirth'];
    $email = $_SESSION['email'];
    $mobileno = $_REQUEST['mobileno'];
    $address = $_REQUEST['address'];
    $country = $_REQUEST['country'];
    $gender = $_REQUEST['gender'];
    $password = $_REQUEST['password'];

    $s = "update stu_reg set fname='" . $fname . "',mname='" . $mname . "',lname='" . $lname . "',dateofbirth='" . $dateofbirth . "',mobileno='" . $mobileno . "',address='" . $address . "',country='" . $country . "',gender='" . $gender . "' where email='" . $email . "'";
    mysqli_query($conn, $s);
          header("Location:studentdashboard.php?er=Edited Successfully");

    
} catch (Exception $e) {
              header("Location:studentdashboard.php?er=Error in Editing");

}
?>