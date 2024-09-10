<?php
session_start();
$_SESSION['cart'] = [];
$_SESSION['orders'] = [];
header("Location: cart.php");
exit();
?>
