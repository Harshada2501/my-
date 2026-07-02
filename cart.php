<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <link rel="stylesheet" href="../css/cart.css">
</head>
<body>

<h1>🛒 Your Cart</h1>

<?php if (!empty($_SESSION['cart'])) { ?>
  <div class="cart-container">
    <table class="cart-table">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($_SESSION['cart'] as $item) { ?>
          <tr>
            <td><?= htmlspecialchars($item['product_name']) ?></td>
            <td>₹<?= $item['price'] ?></td>
            <td><?= $item['quantity'] ?></td>
            <td>₹<?= $item['price'] * $item['quantity'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <div class="cart-actions">
      <a href="user-dashboard.php" class="btn">⬅ Continue Shopping</a>
      <a href="checkout.php" class="btn checkout">Proceed to Checkout ✅</a>
    </div>
  </div>
<?php } else { ?>
  <p class="empty-cart">Your cart is empty.</p>
  <a href="user-dashboard.php" class="btn">⬅ Back to Dashboard</a>
<?php } ?>

</body>
</html>