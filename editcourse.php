<?php

include "connection.php";


session_start();
$cid = $_REQUEST['cid'];
$coursename = $_REQUEST['coursename'];
$courseduration = $_REQUEST['courseduration'];
$coursefees = $_REQUEST['coursefees'];
$coursetype = $_REQUEST['coursetype'];




$s = "update course set coursename='" . $coursename . "',courseduration='" . $courseduration . "',type='" . $coursetype . "',coursefees='" . $coursefees . "' where cid=" . $cid . "";
mysqli_query($conn, $s);
echo $s;
header("Location:universitydashboard.php?er=Course Updated Successfully");







