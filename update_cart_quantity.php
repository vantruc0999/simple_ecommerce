<?php
session_start();
// var_dump($_SESSION['cart'][24]['quantity'] < 0);
// unset($_SESSION['cart']);
// exit;
$id = $_GET['id'];
$type = $_GET['type'];

if ($type == '1') {
    $_SESSION['cart'][$id]['quantity']++;
} else {
    if ($_SESSION['cart'][$id]['quantity'] > 1)
        $_SESSION['cart'][$id]['quantity']--;
    else
        unset($_SESSION['cart'][$id]);
}

