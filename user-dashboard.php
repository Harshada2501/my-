<?php
session_start();
include "db.php";

$sql = "SELECT * FROM products ORDER BY name";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<header class="navbar">
  <div class="logo">ICECREAM<span>PARLOR🍧</span></div>

  <div class="auth-buttons">
  <a href="cart.php" class="login-btn">🛒 Cart</a>
</div>

</header>

<h1>Order Products🍧</h1>

<div class="products">

<?php while($row = mysqli_fetch_assoc($result)) { ?>

  <div class="card">

    <div class="image-box">
      <img src="../images/<?= htmlspecialchars($row['image']) ?>" 
           onerror="this.src='../images/placeholder.jpg'" 
           alt="<?= htmlspecialchars($row['name']) ?>">
    </div>

    <h3><?= htmlspecialchars($row['name']) ?></h3>

    <p class="price">₹<?= $row['price'] ?></p>

    <p class="stock">Stock: <?= $row['stock'] ?></p>

    <?php if (!empty($row['description'])) { ?>
      <p class="desc"><?= htmlspecialchars($row['description']) ?></p>
    <?php } ?>

    <form action="place-order.php" method="POST">
      <input type="hidden" name="product_name" value="<?= htmlspecialchars($row['name']) ?>">
      <input type="hidden" name="price" value="<?= $row['price'] ?>">
      <button type="submit">🛒 Order Now</button>
    </form>

    <form action="add-to-cart.php" method="POST">
      <input type="hidden" name="product_name" value="<?= htmlspecialchars($row['name']) ?>">
      <input type="hidden" name="price" value="<?= $row['price'] ?>">
      <button type="submit">🛒 Add to Cart</button>
    </form>

    <a href="review.php?id=<?= $row['id'] ?>" 
       style="display:block;margin-top:10px;text-align:center;
              background:#ffc107;padding:10px;border-radius:8px;
              text-decoration:none;color:black;font-weight:bold;">
       ⭐ Review Product
    </a>

  </div>

<?php } ?>

</div>  

<footer>
  <p>© 2026 . Utterly Butterly Delicious! 🧈</p>
</footer>

</body>
</html>
