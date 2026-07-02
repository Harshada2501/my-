<?php
session_start();
include "db.php";

$fullname = $_POST['fullname'] ?? '';
$phone    = $_POST['phone'] ?? '';
$address  = $_POST['address'] ?? '';
$payment  = $_POST['payment_method'] ?? '';

$user_id = $_SESSION['user_id'] ?? 0;

if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

    foreach($_SESSION['cart'] as $item){

        $product = $item['product_name'];
        $price   = $item['price'];
        $qty     = $item['quantity'];
        $total   = $price * $qty;

        $sql = "INSERT INTO orders 
        (user_id, user_name, product_name, quantity, price, payment_method, address, status)
        VALUES 
        ('$user_id','$fullname','$product','$qty','$total','$payment','$address','Pending')";

        mysqli_query($conn, $sql);
    }

    unset($_SESSION['cart']);

    header("Location: success.php");
    exit();

} else {
    echo "Cart is empty ❌";
}
?>
