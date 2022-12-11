<?php
session_start();
require_once "../connect.php";

$id = $_POST['user_id'];
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];

$address = $_POST['address'];
$phone = $_POST['phone'];

$count = mysqli_query($conn, "UPDATE `user` SET `FirstName`='$firstname',`LastName`='$lastname',`Address`='$address',`PhoneNumber`='$phone' WHERE UserId = '$id'");
if($count)
    echo 1;
else
    echo $phone ;
