<?php
session_start();
include "db.php";

if(empty($_SESSION['cart'])){
    header("Location: cart.php");
    exit();
}

// Get logged-in user data
$userData = [];

if(isset($_SESSION['user_id'])){
    $uid = $_SESSION['user_id'];
    $res = mysqli_query($conn, "SELECT * FROM users WHERE id='$uid'");
    $userData = mysqli_fetch_assoc($res);
}

// Calculate total
$total = 0;
foreach($_SESSION['cart'] as $item){
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<link rel="stylesheet" href="../css/checkout.css">
</head>

<body>

<div class="checkout-container">

<h1>✅ Checkout</h1>

<div class="order-summary">
<h2>Order Summary</h2>

<table border="1" cellpadding="10">
<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
</tr>

<?php foreach($_SESSION['cart'] as $item){ ?>
<tr>
<td><?= htmlspecialchars($item['product_name']) ?></td>
<td>₹<?= $item['price'] ?></td>
<td><?= $item['quantity'] ?></td>
<td>₹<?= $item['price'] * $item['quantity'] ?></td>
</tr>
<?php } ?>

<tr>
<td colspan="3"><strong>Grand Total</strong></td>
<td><strong>₹<?= $total ?></strong></td>
</tr>

</table>
</div>

<form action="place-order.php" method="POST">

<label>Full Name</label>
<input type="text" name="fullname"
value="<?= htmlspecialchars($userData['full_name'] ?? '') ?>" required>

<label>Phone Number</label>
<input type="text" name="phone"
value="<?= htmlspecialchars($userData['contact_no'] ?? '') ?>" required>

<label>Address</label>
<textarea name="address" required><?= htmlspecialchars($userData['address'] ?? '') ?></textarea>

<label>Payment Method</label>

<select name="payment_method" required>
<option value="">Select Payment</option>
<option value="Cash on Delivery">Cash on Delivery</option>
<option value="Online Payment">Online Payment</option>
</select>

<button type="submit">Place Order 💳</button>

</form>

</div>

</body>
</html>
