<?php
session_start();
require "products.php";

// Check if there are items in the cart
if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

// Generate a random order code
$order_code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
$total_price = 0;

// Prepare the order data for session
$order = [
    'order_code' => $order_code,
    'date_time' => date('Y-m-d H:i:s'),
    'items' => $_SESSION['cart'],
    'total_price' => 0
];

// Calculate total price
foreach ($_SESSION['cart'] as $item) {
    $order['total_price'] += $item['price'];
}

// Save order to session
if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = [];
}
$_SESSION['orders'][] = $order;

// Clear the cart after placing the order
$_SESSION['cart'] = [];

// Redirect to order confirmation page
header("Location: order_confirmation.php?order_code=" . $order_code);
exit();
?>
