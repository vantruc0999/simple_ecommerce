<?php
require_once "../connect.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM `product` WHERE ProductId = '$id'");

    header("Location: product_manage.php");
}
