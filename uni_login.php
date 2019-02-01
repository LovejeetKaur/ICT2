<?php

header('Access-Control-Allow-Methods: GET, POST');
include "connection.php";
$name = $_REQUEST["email"];
$password = $_REQUEST["password"];
$s = "select * from uni_reg";
$uid = 0;
$name1 = "";
$result = mysqli_query($conn, $s);
$flag = 0;
while ($row = mysqli_fetch_array($result)) {
    if ($row['email'] == $name && $row['password'] == $password) {
        $flag = 1;
        $uid = $row["uid"];
        $name1 = $row["universityname"];
        break;
    }
}
if ($flag == 1) {

    session_start();
    $_SESSION["uniemail"] = $_REQUEST["email"];
    $_SESSION["name"] = $name1;
    $_SESSION["uid"] = $uid;
    echo "success";
} else {
    echo "fail";
}
?>