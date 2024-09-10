<?php
session_start();
require "products.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
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
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-clear {
            background-color: #dc3545;
            color: white;
        }
        .btn-clear:hover {
            background-color: #c82333;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .button-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Your Shopping Cart</h1>

    <!-- Cart Items -->
    <h2>Items in Cart</h2>
    <ul>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <li><?php echo $item['name']; ?> - <?php echo $item['price']; ?> PHP</li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Your cart is empty.</li>
        <?php endif; ?>
    </ul>

    <!-- Buttons -->
    <div class="button-container">
        <a href="reset-cart.php" class="btn btn-clear">Clear Cart</a>
        <a href="reset-everything.php" class="btn btn-clear">Clear Everything (Cart & Orders)</a>
        <a href="index.php" class="btn">Back to Product List</a>

        <?php if (!empty($_SESSION['cart'])): ?>
            <a href="checkout.php" class="btn">Proceed to Checkout</a>
        <?php endif; ?>
    </div>
</body>
</html>
