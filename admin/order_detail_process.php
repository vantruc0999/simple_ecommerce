<?php
require_once "../connect.php";

if (isset($_POST['submit'])) {
    $status = $_POST['status'];
    $orderId = $_POST['order_id'];

    mysqli_query($conn, "UPDATE `orders` SET `Status` = '$status' where OrderId = '$orderId'");
    header("Location: order_manage.php");
}
