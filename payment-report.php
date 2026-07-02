<?php
include "db.php";

$result = mysqli_query($conn,"
SELECT payment_method, COUNT(*) AS total_orders
FROM orders
GROUP BY payment_method
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Method Report</title>

<style>
body{
    font-family:Arial;
    background:#eef7f1;
    padding:30px;
}

h1{
    color:#2e7d32;
    text-align:center;
}

table{
    width:60%;
    margin:auto;
    border-collapse:collapse;
    background:white;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

th,td{
    padding:15px;
    text-align:center;
    border:1px solid #ddd;
}

th{
    background:#2e7d32;
    color:white;
}
</style>

</head>
<body>

<h1>💳 Payment Method Report</h1>

<table>

<tr>
    <th>Payment Method</th>
    <th>Total Orders</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
    <td><?= $row['payment_method'] ?></td>
    <td><?= $row['total_orders'] ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>