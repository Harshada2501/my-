<?php
include "db.php";

if(isset($_POST['add_user'])){

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $contact_no = $_POST['contact_no'];
    $address = $_POST['address'];

    $check = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0){

        echo "<script>alert('Email already exists!');</script>";

    }else{

        $sql = "INSERT INTO users
        (full_name,email,password,contact_no,address)
        VALUES
        ('$full_name','$email','$password','$contact_no','$address')";

        if(mysqli_query($conn,$sql)){
            echo "<script>alert('User Added Successfully!');</script>";
        }else{
            echo mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add User</title>

<style>

body{
    background:#eef7f1;
    font-family:Arial;
}

.container{
    width:550px;
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

input,
textarea{
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

<h1>👤 Add User</h1>

<form method="POST">

<input type="text"
name="full_name"
placeholder="Full Name"
required>

<input type="email"
name="email"
placeholder="Email Address"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<input type="text"
name="contact_no"
placeholder="Contact Number"
required>

<textarea
name="address"
placeholder="Address"
rows="4"
required></textarea>

<button type="submit" name="add_user">
➕ Add User
</button>

</form>

</div>

</body>
</html>