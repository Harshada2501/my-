<?php
session_start();
$total = $_GET['total'] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment</title>
<link rel="stylesheet" href="../css/payment.css">
</head>

<body>

<div class="payment-box">

<h2>💳 Payment</h2>

<p>Total Amount: <strong>₹<?= $total ?></strong></p>

<form action="process-payment.php" method="POST">

<input type="hidden" name="amount" value="<?= $total ?>">

<label>Select Payment Method</label>

<select name="payment_method" required>
<option value="">Select</option>
<option value="Cash on Delivery">Cash on Delivery</option>
<option value="Online Payment">Online Payment</option>
</select>

<button type="submit">Confirm Payment</button>

</form>

</div>

</body>
</html>
