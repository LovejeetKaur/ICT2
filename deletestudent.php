<?php

include "connection.php";

session_start();
$cid = $_REQUEST['email'];

$s = "delete from stu_reg where email='" . $cid . "'";
mysqli_query($conn, $s);
echo $s;
header("Location:studentinformation.php?er=Deleted Successfully");



