<?php

include "connection.php";
session_start();

$email = $_SESSION['uniemail'];

$cover_photo = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
$size = $_FILES['photo']['size'];
$path = 'user_uploads/' . $cover_photo;

$ext = pathinfo($cover_photo, PATHINFO_EXTENSION);

if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
    move_uploaded_file($tmp, $path);
    echo "File Name is " . $cover_photo . "<br>";
    echo "Size of the File is " . $size;
    $s = "update uni_reg set photo='" . $path . "' where email='" . $email . "'";
    mysqli_query($conn, $s);
    echo $s;
    header("Location:universitydashboard.php?er=Photo Updated");
} else {
    header("Location:universitydashboard.php?er=Error in Uploading photo");
}

