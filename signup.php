<?php
include "db.php";

if (isset($_POST['signup'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (full_name, email, password)
              VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $query)) {
        header("Location: ../login.html");
        exit();
    } else {
        echo "Email already exists!";
    }
}
?>