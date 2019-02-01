<?php

include "connection.php";
session_start();
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$address = $_REQUEST['address'];
$password = $_REQUEST['password'];
$country = $_REQUEST['country'];
$registeringcountry = $_REQUEST['registeringcountry'];
$cover_photo = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
$size = $_FILES['photo']['size'];
$path = 'user_uploads/' . $cover_photo;
$ext = pathinfo($cover_photo, PATHINFO_EXTENSION);

if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
    move_uploaded_file($tmp, $path);
    echo "File Name is " . $cover_photo . "<br>";
    echo "Size of the File is " . $size;
    $s = "insert into insurance(name,email,phone,address,country,registeringcountry,photo,password) VALUES('" . $name . "','" . $email . "','" . $phone . "','" . $address . "','" . $country . "','" . $registeringcountry . "','" . $path . "','" . $password . "')";
    mysqli_query($conn, $s);
    echo $s;
     $s = "select MAX(inid) as max from insurance";
    $result = mysqli_query($conn, $s);


    while ($row = mysqli_fetch_array($result)) {

        $_SESSION["insemail"] = $_REQUEST["email"];
        $_SESSION["inid"] =  $row["inid"];
    }
    header("Location:insurancedashboard.php?er=Insurance Added Successfully. you can sign in now");
}
else {
    header("Location:insurace.php?er=Error in Registering Try again!");
}

