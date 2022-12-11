<?php
session_start();
require_once "../connect.php";

$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

$checkExistedEmail = mysqli_query($conn, "Select * from user where Email = '$email'");

if (mysqli_fetch_array($checkExistedEmail)) {
    echo "Email already exists";
} else {
    mysqli_query($conn, "INSERT INTO `user`(`Email`, `Password`, `FirstName`, `LastName`, `Address`, `PhoneNumber`) 
            VALUES ('$email','$hash','$firstname','$lastname','$address','$phone')");
    echo 1;
}
