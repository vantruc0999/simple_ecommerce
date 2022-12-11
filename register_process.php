<?php
session_start();
require_once "connect.php";


if(isset($_POST['submit'])){
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $checkExistedEmail = mysqli_query($conn, "Select * from user where Email = '$email'");

    if(mysqli_fetch_array($checkExistedEmail)){
        echo "Email already exists";
    }
    else
        {
            mysqli_query($conn, "INSERT INTO `user`(`Email`, `Password`, `FirstName`, `LastName`, `Address`, `PhoneNumber`) 
            VALUES ('$email','$hash','$firstname','$lastname','$address','$phone')");

            $res = mysqli_query($conn, "Select * from user where Email = '$email'");
            $user = mysqli_fetch_array($res);

            $_SESSION['id'] = $user['UserId'];
            $_SESSION['name'] = $firstname . ' ' .$lastname;
            $_SESSION['admin'] = $user['is_admin'];

            echo 1;
        }
   
}