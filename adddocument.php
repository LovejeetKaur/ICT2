<?php

include "connection.php";

session_start();
$name = $_REQUEST['name'];
$email = $_SESSION['email'];
$cover_photo = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
$size = $_FILES['photo']['size'];
$path = 'user_uploads/' . $cover_photo;

$ext = pathinfo($cover_photo, PATHINFO_EXTENSION);

if ($ext == 'pdf' || $ext == 'doc' || $ext == 'docx') {
    move_uploaded_file($tmp, $path);
    echo "File Name is " . $cover_photo . "<br>";
    echo "Size of the File is " . $size;
    $s = "insert into documents(name,path,email) VALUES('" . $name . "','" . $cover_photo . "','" . $email . "')";
    mysqli_query($conn, $s);
    echo $s;
        header("Location:studentdashboard.php?er=Document Added Successfully");

} else {
    header("Location:studentdashboard.php?er=Error in Uploading Try again!");

    
}

