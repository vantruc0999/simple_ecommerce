<?php
session_start();
require_once "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $res = mysqli_query($conn, "Select * from product where ProductId = '$id'");
    $product = mysqli_fetch_array($res);

    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] = 1;
        $_SESSION['cart'][$id]['image'] = $product['Image'];
        $_SESSION['cart'][$id]['product_name'] = $product['ProductName'];
        $_SESSION['cart'][$id]['price'] = $product['Price'];
        $_SESSION['cart'][$id]['description'] = $product['Description'];
    } else {
        $_SESSION['cart'][$id]['quantity']++;
    }
    echo 1;
}
else
    echo 0;
