<?php
session_start();

$product_name = $_POST['product_name'];
$price = $_POST['price'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['product_name'] === $product_name) {
        $item['quantity'] += 1;
        $found = true;
        break;
    }
}

if (!$found) {
    $_SESSION['cart'][] = [
        'product_name' => $product_name,
        'price' => $price,
        'quantity' => 1
    ];
}

header("Location: cart.php");
exit;
?>