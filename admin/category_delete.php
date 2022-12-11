<?php
    require_once "../connect.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        mysqli_query($conn, "DELETE FROM `category` WHERE CategoryId = '$id'");
        header("Location: category_manage.php");
    }