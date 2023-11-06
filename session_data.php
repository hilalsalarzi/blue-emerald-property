<?php
session_start();
error_reporting(E_ALL);
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
if($user_id == "" or $username == ""){
    header("Location:login.php");
    exit();
}

$Current_date = date('Y-m-d');
$expiry_date = "2025-09-24";
if ($Current_date >= $expiry_date) {
session_destroy();
header("Location:login.php"); exit();
 }


?>