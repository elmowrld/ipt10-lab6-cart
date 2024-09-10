<?php
session_start();
require "products.php";  // Ensure this path is correct
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 10px;
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
        .btn:hover {
            background-color: #218838;
        }
        .view-cart-btn {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }
        .view-cart-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Products</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo $product['name']; ?> - <?php echo $product['price']; ?> PHP
                <form method="post" action="add-to-cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit" class="btn">Add to Cart</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="cart.php" class="view-cart-btn">View Cart</a>
</body>
</html>
