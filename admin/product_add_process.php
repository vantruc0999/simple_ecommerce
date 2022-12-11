<?php
session_start();
require_once "../connect.php";



$product_name = $_POST['product_name'];
$price = $_POST['price'];
$category = $_POST['category'];
$description = $_POST['description'];
$imageName = $_FILES['file']['name'];
$extension = pathinfo($imageName, PATHINFO_EXTENSION);

$newImageName = rand() . time() . "." . $extension;

$path = '../images/' . $newImageName;

move_uploaded_file($_FILES['file']['tmp_name'], $path);

$imagePath = 'images/' . $newImageName;

$count = mysqli_query($conn, "INSERT INTO `product`(`ProductName`, `Description`, `Image`, `Price`, `CategoryId`) 
VALUES ('$product_name','$description','$imagePath','$price','$category')");
if ($count)
    echo 1;
else
    echo "Soemthing wrong, try again";
