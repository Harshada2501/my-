<?php include "order.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Orders Management</title>

<style>
body{
    font-family:Arial;
    background:#eef7f1;
    padding:30px;
}

h1{
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

input, select{
    padding:10px;
    border-radius:6px;
    border:1px solid #ccc;
}

button{
    background:#2e7d32;
    color:white;
    border:none;
    padding:10px 15px;
    border-radius:6px;
    cursor:pointer;
}

button:hover{
    background:#1b5e20;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
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

<h1>📦 Orders Management</h1>

<form method="GET">

<input type="text" name="search" placeholder="🔍 Search Product"
value="<?= $_GET['search'] ?? '' ?>">

<input type="number" name="user" placeholder="User ID"
value="<?= $_GET['user'] ?? '' ?>">

<button type="submit">Apply</button>

</form>

</div>

<table>

<tr>
<th>ID</th>
<th>User Name</th>
<th>Product</th>
<th>Quantity</th>
<th>Total Price</th>
<th>Payment</th>
<th>Date</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['user_name'] ?></td>
<td><?= $row['product_name'] ?></td>
<td><?= $row['quantity'] ?></td>
<td>₹<?= $row['total_price'] ?></td>
<td><?= $row['payment_method'] ?></td>
<td><?= $row['created_at'] ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>
