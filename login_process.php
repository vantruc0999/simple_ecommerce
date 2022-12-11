<?php
session_start();
require_once "connect.php";


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkAccount = mysqli_query($conn, "Select * from user where Email = '$email'");
    $account = mysqli_fetch_array($checkAccount);

    if (!$account) {
        echo "Wrong Username";
    } else {
        $hash = $account['Password'];
        $verify = password_verify($password, $hash);
        if ($verify) {
            $_SESSION['id'] = $account['UserId'];
            $_SESSION['name'] = $account['FirstName'] . ' ' . $account['LastName'];
            $_SESSION['admin'] = $account['is_admin'];
            echo 1;
        } else {
            echo "Wrong Username or Password";
        }
    }
}
