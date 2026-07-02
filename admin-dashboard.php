<?php
include "db.php";
$total_users = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM users"));
$total_orders = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM orders"));
$total_products = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM products"));
$total_users = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM users"));

$search = $_GET['search'] ?? '';
$user   = $_GET['user'] ?? '';
$from   = $_GET['from'] ?? '';
$to     = $_GET['to'] ?? '';
$sort   = $_GET['sort'] ?? '';

$sales = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT 
SUM(price * quantity) as total_sales,
SUM(quantity) as total_qty
FROM orders
"));

$sql = "SELECT * FROM orders WHERE 1";

if($search != ""){
    $sql .= " AND product_name LIKE '%$search%'";
}

if($user != ""){
    $sql .= " AND user_id='$user'";
}

if($from != "" && $to != ""){
    $sql .= " AND DATE(created_at) BETWEEN '$from' AND '$to'";
}

if($sort == "latest"){
    $sql .= " ORDER BY created_at DESC";
}
elseif($sort == "oldest"){
    $sql .= " ORDER BY created_at ASC";
}
elseif($sort == "price_high"){
    $sql .= " ORDER BY price DESC";
}
elseif($sort == "price_low"){
    $sql .= " ORDER BY price ASC";
}
else{
    $sql .= " ORDER BY created_at DESC";
}

$order_result = mysqli_query($conn,$sql);


$product_result = mysqli_query($conn,"SELECT * FROM products");

?>

<!DOCTYPE html>
<html>
<head>
<title>DairyFarm Admin Panel</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{
display:flex;
background:#eef7f1;
}


.sidebar{
width:240px;
background:#2e7d32;
color:white;
min-height:100vh;
padding:25px;
}

.sidebar h2{
margin-bottom:30px;
}

.sidebar a{
display:block;
color:white;
text-decoration:none;
padding:12px;
margin:10px 0;
border-radius:8px;
transition:.3s;
}

.sidebar a:hover{
background:#1b5e20;
}


.main{
flex:1;
padding:40px;
}

.main h1{
margin-bottom:20px;
color:#2e7d32;
}


.cards{
display:flex;
gap:20px;
margin-bottom:40px;
}

.card{
flex:1;
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 10px 20px rgba(0,0,0,.1);
text-align:center;
}

.card h2{
font-size:35px;
color:#2e7d32;
}


.filter-box{
background:white;
padding:20px;
border-radius:10px;
margin-bottom:20px;
box-shadow:0 5px 15px rgba(0,0,0,.1);
}

.filter-box form{
display:flex;
gap:10px;
flex-wrap:wrap;
}

.filter-box input,
.filter-box select{
padding:10px;
border-radius:6px;
border:1px solid #ccc;
}

.filter-box button{
background:#2e7d32;
color:white;
border:none;
padding:10px 15px;
border-radius:6px;
cursor:pointer;
}

.filter-box button:hover{
background:#1b5e20;
}


table{
width:100%;
border-collapse:collapse;
background:white;
margin-bottom:40px;
border-radius:10px;
overflow:hidden;
box-shadow:0 10px 25px rgba(0,0,0,.1);
}

th,td{
padding:14px;
text-align:center;
}

th{
background:#2e7d32;
color:white;
}

tr:nth-child(even){
background:#f4faf6;
}

tr:hover{
background:#dcedc8;
}

</style>

</head>

<body>


<div class="sidebar">

<h2> Admin panel </h2>

<a href="#dashboard">Dashboard</a>
<a href="#products">Products</a>
<a href="#orders">Orders</a>
<a href="add-product.php">➕ Add Product</a>
<a href="add-user.php">👤 Add User</a>
<a href="payment-report.php">💳 Payment Report</a>
<a href="logout.php">Logout</a>

</div>


<div class="main">


<h1 id="dashboard">📊 Dashboard</h1>

<div class="cards">

<div class="card">
<h2><?= $total_orders['total'] ?></h2>
<p>Total Orders</p>
</div>

<div class="card">
<h2><?= $total_products['total'] ?></h2>
<p>Total Products</p>
</div>

<div class="card">
<h2><?= $total_users['total'] ?></h2>
<p>Total Users</p>
</div>

</div>



<h1 id="products">🍧 Products</h1>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Stock</th>
</tr>

<?php while($p=mysqli_fetch_assoc($product_result)){ ?>

<tr>

<td><?= $p['id'] ?></td>
<td><?= $p['name'] ?></td>
<td>₹<?= $p['price'] ?></td>
<td><?= $p['stock'] ?></td>

</tr>

<?php } ?>

</table>

<h1>📈 Sales Report</h1>

<div class="cards">

<div class="card">
<h2>₹<?= $sales['total_sales'] ?? 0 ?></h2>
<p>Total Sales</p>
</div>

<div class="card">
<h2><?= $sales['total_qty'] ?? 0 ?></h2>
<p>Total Quantity Sold</p>
</div>

</div>

<h1>👤 Latest Users</h1>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
</tr>

<?php
$user_result = mysqli_query($conn,"
SELECT * FROM users ORDER BY id DESC LIMIT 5
");

while($u=mysqli_fetch_assoc($user_result)){
?>

<tr>
<td><?= $u['id'] ?></td>
<td><?= $u['full_name'] ?></td>
<td><?= $u['email'] ?></td>
</tr>

<?php } ?>

</table>

<h1>🍧Low Stock Products</h1>

<table>

<tr>
<th>ID</th>
<th>Product</th>
<th>Stock</th>
</tr>

<?php
$low_stock = mysqli_query($conn,"
SELECT * FROM products WHERE stock <= 25
");

while($p=mysqli_fetch_assoc($low_stock)){
?>

<tr>
<td><?= $p['id'] ?></td>
<td><?= $p['name'] ?></td>
<td><?= $p['stock'] ?></td>
</tr>

<?php } ?>

</table>

<h1>📦 Recent Orders</h1>

<table>

<tr>
<th>Order ID</th>
<th>User ID</th>
<th>Product</th>
<th>Price</th>
<th>Date</th>
</tr>

<?php
$recent_orders = mysqli_query($conn,"
SELECT * FROM orders 
ORDER BY created_at DESC 
LIMIT 5
");

while($o=mysqli_fetch_assoc($recent_orders)){
?>

<tr>
<td><?= $o['id'] ?></td>
<td><?= $o['user_id'] ?></td>
<td><?= $o['product_name'] ?></td>
<td>₹<?= $o['price'] ?></td>
<td><?= $o['created_at'] ?></td>
</tr>

<?php } ?>

</table>

<h1 id="orders">📦 Orders Management</h1>

<div class="filter-box">

<form method="GET">

<input type="text" name="search" placeholder="🔍 Search Product">

<input type="number" name="user" placeholder="User ID">

<label>From</label>
<input type="date" name="from">

<label>To</label>
<input type="date" name="to">

<select name="sort">
<option value="">Sort Orders</option>
<option value="latest">Latest</option>
<option value="oldest">Oldest</option>
<option value="price_high">Price High → Low</option>
<option value="price_low">Price Low → High</option>
</select>

<button type="submit">Apply</button>

</form>

</div>

<table>

<tr>
<th>ID</th>
<th>User ID</th>
<th>Product</th>
<th>Price</th>
<th>Date</th>
</tr>

<?php while($row=mysqli_fetch_assoc($order_result)){ ?>

<tr>

<td><?= $row['id'] ?></td>
<td><?= $row['user_id'] ?></td>
<td><?= $row['product_name'] ?></td>
<td>₹<?= $row['price'] ?></td>
<td><?= $row['created_at'] ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
