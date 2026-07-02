<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    echo "Login required ❌";
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

$sql = "INSERT INTO reviews (user_id, product_id, rating, comment)
VALUES ('$user_id','$product_id','$rating','$comment')";

mysqli_query($conn,$sql);

header("Location: review.php?id=$product_id");
exit();
?>
