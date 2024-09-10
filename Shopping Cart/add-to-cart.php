<?php
session_start();
require "products.php";  // Ensure this path is correct based on your directory structure

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Find the product by id
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            // Add product to cart (Session variable)
            $_SESSION['cart'][] = $product;
            break;
        }
    }
}

// Redirect to the cart page
header("Location: cart.php");
exit();
?>
