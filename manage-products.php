<?php
session_start();
include "../php/db.php";

if ($_SESSION['role'] !== 'admin') {
  header("Location: ../login.html");
  exit();
}

if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  mysqli_query($conn,"INSERT INTO products VALUES(NULL,'$name','$price','$stock')");
}

$products = mysqli_query($conn,"SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Products</title>
  <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<div class="dashboard">

<aside class="sidebar">
  <h2>Dairy<span>Fresh</span></h2>
  <a href="admin-dashboard.php">📊 Dashboard</a>
  <a class="active">🧀 Products</a>
  <a href="../php/logout.php" class="logout">🚪 Logout</a>
</aside>

<main class="main">
<h1>Manage Products</h1>

<form class="form" method="POST">
  <input type="text" name="name" placeholder="Product Name" required>
  <input type="number" name="price" placeholder="Price" required>
  <input type="number" name="stock" placeholder="Stock" required>
  <button name="add">Add Product</button>
</form>

<table>
<tr>
  <th>ID</th><th>Name</th><th>Price</th><th>Stock</th>
</tr>
<?php while($p=mysqli_fetch_assoc($products)){ ?>
<tr>
  <td><?= $p['id'] ?></td>
  <td><?= $p['name'] ?></td>
  <td>₹<?= $p['price'] ?></td>
  <td><?= $p['stock'] ?></td>
</tr>
<?php } ?>
</table>

</main>
</div>
</body>
</html>
