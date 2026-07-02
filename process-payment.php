<?php
session_start();
include "db.php";

if(isset($_SESSION['order_data'])){

    $orderData = $_SESSION['order_data'];
    $info = $_SESSION['order_info'];

    foreach($orderData as $item){

        $product = $item['product_name'];
        $price   = $item['price'];
        $qty     = $item['quantity'];
        $total   = $price * $qty;

        mysqli_query($conn, "INSERT INTO orders 
        (user_id, user_name, phone, address, product_name, quantity, total_price, payment_method, status)
        VALUES 
        ('{$info['user_id']}','{$info['fullname']}','{$info['phone']}','{$info['address']}','$product','$qty','$total','Online Payment','Paid')");
    }

    unset($_SESSION['cart']);
    unset($_SESSION['order_data']);
    unset($_SESSION['order_info']);

    header("Location: success.php");
}

?>
