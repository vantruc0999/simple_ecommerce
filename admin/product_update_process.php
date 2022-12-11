<?php
session_start();
require_once "../connect.php";


$productId = $_POST['product_id'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$category = $_POST['category'];
$description = $_POST['description'];

mysqli_query($conn, "UPDATE `product` SET `ProductName`='$product_name',`Description`='$description',
`Price`='$price',`CategoryId`='$category' WHERE ProductId = '$productId'");

if (isset($_FILES['file']['name'])) {
    $imageName = $_FILES['file']['name'];
    $extension = pathinfo($imageName, PATHINFO_EXTENSION);

    $newImageName = rand() . time() . "." . $extension;

    $path = '../images/' . $newImageName;

    move_uploaded_file($_FILES['file']['tmp_name'], $path);

    $imagePath = 'images/' . $newImageName;

    $count = mysqli_query($conn, "UPDATE `product` SET `Image`='$imagePath' WHERE ProductId = '$productId'");

    if(!$count)
        echo "Something wrong, try again";
}

echo 1;

