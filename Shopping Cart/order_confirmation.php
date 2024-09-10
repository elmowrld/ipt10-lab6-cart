<?php
session_start();
$order_code = isset($_GET['order_code']) ? $_GET['order_code'] : null;

if (!$order_code) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            color: #28a745;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Order Confirmed</h1>
    <p>Thank you for your order! Your order code is: <strong><?php echo $order_code; ?></strong></p>

    <a href="index.php" class="btn">Return to Product List</a>
</body>
</html>
