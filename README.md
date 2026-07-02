# 🥛 DairyFresh – Dairy Products Management System

DairyFresh is a complete **Dairy Products Management System** developed using **HTML, CSS, JavaScript, PHP, and MySQL**. The system allows customers to browse dairy products and place orders, while administrators can efficiently manage products, users, inventory, and customer orders through a secure admin dashboard.

This project was developed as an academic full-stack web application to demonstrate web development concepts including frontend design, backend programming, database management, and CRUD operations.

---

## 🚀 Features

### 👤 User Side

- Home page with featured dairy products
- Browse all available products
- Product details
- User Registration
- User Login
- Place Orders
- Contact Page
- About Us Page

### 🔐 Admin Panel

- Secure Admin Login
- Dashboard Overview
- Add, Edit & Delete Products
- Manage Customers
- Manage Orders
- Manage Product Stock
- View Sales Reports
- View Latest Users
- Monitor Low Stock Products
- Payment Reports

---

## 🛠️ Technologies Used

### Frontend
- HTML5
- CSS3
- JavaScript

### Backend
- PHP (Core PHP)

### Database
- MySQL

### Development Environment
- XAMPP
- Apache Server

---

## 📁 Project Structure

```
dairyfarm/
│
├── CSS/
├── Database/
│   └── diaryfresh.sql
├── images/
├── js/
├── php/
│
├── index.php
├── about.php
├── products.php
├── ordernow.php
├── login.php
├── signup.php
└── contact.php
```

---

## ⚙️ Installation Guide

### Step 1

Download or Clone the repository.

```bash
git clone https://github.com/yourusername/DairyFresh.git
```

---

### Step 2

Copy the project folder into your XAMPP **htdocs** directory.

```
C:\xampp\htdocs\dairyfarm
```

---

### Step 3

Start the following services from the XAMPP Control Panel.

- Apache
- MySQL

---

### Step 4

Open **phpMyAdmin**.

Create a new database named:

```
diaryfresh
```

Import the SQL file located inside the **Database** folder.

---

### Step 5

Configure your database connection inside your PHP configuration file.

Example:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "diaryfresh";

$conn = mysqli_connect($host, $user, $password, $database);
```

---

### Step 6

Open your browser and run the project.

```
http://localhost/dairyfarm/
```

Admin Panel (if available)

```
http://localhost/dairyfarm/php/admin/
```

---

## 🗄️ Database

**Database Name**

```
diaryfresh
```

---

## 📊 Modules

### Customer Module

- Register
- Login
- Browse Products
- Place Orders
- Contact Support

### Product Module

- Product Listing
- Product Categories
- Product Images
- Product Details

### Order Module

- Order Placement
- Order Tracking
- Order Management

### Admin Module

- Dashboard
- Product Management
- Customer Management
- Inventory Management
- Reports

---

## 📈 Reports

- Sales Report
- Payment Report
- Latest Users
- Recent Orders
- Low Stock Products
- Product Inventory

---

## 🎯 Future Enhancements

- Razorpay Payment Integration
- Online Payment Gateway
- Email Notifications
- Invoice Generation
- Product Reviews
- Wishlist
- Responsive Mobile Design

---

## 📸 Screenshots

You can add screenshots of the following pages:

- Home Page
- Products Page
- Login Page
- Order Page
- Admin Dashboard

---

## 📌 Project Status

✅ Completed

✅ Fully Functional

✅ Academic Project

🚀 Ready for Future Enhancements

---

## 👨‍💻 Developer

**(Harshu🌻)**

Bachelor of Computer Applications (BCA)

---

## 📄 License

This project is developed for educational and learning purposes only.

Feel free to modify, improve, and extend the project.

---

⭐ If you found this project helpful, consider giving it a Star on GitHub!
