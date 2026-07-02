<?php
include "db.php";

if(isset($_POST['add_product'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category = $_POST['category'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../images/".$image);

    $sql = "INSERT INTO products
            (name, price, stock, category, image)
            VALUES
            ('$name','$price','$stock','$category','$image')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Product Added Successfully!');</script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>

<style>

body{
    background:#eef7f1;
    font-family:Arial;
}

.container{
    width:500px;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

h1{
    text-align:center;
    color:#2e7d32;
    margin-bottom:20px;
}

input,select{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:6px;
}

button{
    width:100%;
    padding:12px;
    background:#2e7d32;
    color:white;
    border:none;
    border-radius:6px;
    cursor:pointer;
}

button:hover{
    background:#1b5e20;
}

</style>
</head>
<body>

<div class="container">

<h1>➕ Add Product</h1>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="name"
placeholder="Product Name" required>

<input type="number" step="0.01"
name="price"
placeholder="Price" required>

<input type="number"
name="stock"
placeholder="Stock" required>

<select name="category" required>
    <option value="">Select Category</option>
    <option value="Classic">Classic</option>
    <option value="Premium">Premium</option>
    <option value="Sundae">Sundae</option>
    <option value="Cone">Cone</option>
    <option value="Traditional">Traditional</option>
    <option value="Seasonal">Seasonal</option>
    <option value="Beverage">Beverage</option>
</select>

<input type="file" name="image" required>

<button type="submit" name="add_product">
Add Product
</button>

</form>

</div>

</body>
</html>