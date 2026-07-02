<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === "admin@dairyfresh.com" && $password === "admin123") {

        $_SESSION['role'] = "admin";
        $_SESSION['email'] = $email;

        header("Location: admin-dashboard.php");
        exit();
    }

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['role'] = "user";
        $_SESSION['user_id'] = $user['id'];   
        $_SESSION['user'] = $user['full_name'];

        header("Location: user-dashboard.php");
        exit();
    }

    echo "Invalid Email or Password ❌";
}
?>
