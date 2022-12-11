<?php
session_start();
require_once "connect.php";

if (!isset($_SESSION['id'])) {
    echo "Vui lòng đăng nhập trước khi thanh toán";
} else {
    if ((!isset($_SESSION['cart'])) || count($_SESSION['cart']) == 0) {
        echo "Giỏ hàng trống";
    } else {
        $receiver = $_POST['name_receiver'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $customerId = (int)$_SESSION['id'];
        $date = $date = date('Y-m-d H:i:s');

        $total_price = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total_price += $item['quantity'] * $item['price'];
        }

        $count = mysqli_query($conn, "INSERT INTO `orders`( `Address`, `Email`, `NameReceiver`, `CustomerId`, `PhoneReceiver`, `Status`, `TotalPrice`, `CreatedAt`) 
            VALUES ('$address','$email','$receiver','$customerId','$phone','pending','$total_price','$date')");

        if ($count) {
            $res = mysqli_query($conn, "Select max(OrderId) from orders where CustomerId = '$customerId'");
            $orderId = mysqli_fetch_array($res)['max(OrderId)'];

            foreach ($_SESSION['cart'] as $productId => $item) {
                $quantity = $item['quantity'];
                mysqli_query($conn, "INSERT INTO `orders_product`(`OrderId`, `ProductId`, `Quantity`) 
            VALUES ('$orderId','$productId','$quantity')");
            }
            unset($_SESSION['cart']);

            echo 1;
        }
    }
}
