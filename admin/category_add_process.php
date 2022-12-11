<?php
session_start();
require_once "../connect.php";

$category = $_POST['category'];
$description = $_POST['description'];

$result = mysqli_query($conn, "Select * from category where CategoryName = '$category'");
$old_category = mysqli_fetch_array($result);

// var_dump($old_category);
// exit;
if ($old_category)
    echo 'Category already exists';
else {
    mysqli_query($conn, "INSERT INTO `category`(`CategoryName`, `Description`) VALUES ('$category','$description')");
    echo 1;
}
