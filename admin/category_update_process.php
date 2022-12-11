<?php
session_start();
require_once "../connect.php";

$id = $_POST['id'];
$category = $_POST['category'];
$description = $_POST['description'];

$result = mysqli_query($conn, "Select * from category where CategoryName = '$category'");
$old_category = mysqli_fetch_array($result);

if ($old_category)
    echo 'Category already exists';
else {
    mysqli_query($conn, "UPDATE `category` SET `CategoryName`='$category',`Description`='$description' WHERE CategoryId = '$id'");
    echo 1;
}

