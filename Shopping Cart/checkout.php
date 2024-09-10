<?php
session_start();
require "products.php";

if (empty($_SESSION['cart'])) {
    header("Location: cart.php");  // Redirect to cart if it's empty
    exit();
}

// Calculate total price
$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['price'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1, h2 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #fff;
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn {
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-cancel {
            background-color: #dc3545;
        }
        .btn-cancel:hover {
            background-color: #c82333;
        }
        .btn:hover {
            background-color: #218838;
        }
        .button-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Checkout</h1>

    <h2>Review Your Order</h2>
    <ul>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <li><?php echo $item['name']; ?> - <?php echo $item['price']; ?> PHP</li>
        <?php endforeach; ?>
    </ul>

    <h3>Total Price: <?php echo $total_price; ?> PHP</h3>

    <!-- Buttons -->
    <div class="button-container">
        <a href="place_order.php" class="btn">Confirm Order</a>
        <a href="cart.php" class="btn btn-cancel">Cancel</a>
    </div>
</body>
</html>
