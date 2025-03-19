# Car-Rental-System
📌 Overview

The Car Rental System is a web-based application that allows users to manage customers, cars, rentals, payments, insurance, and locations efficiently. It provides CRUD (Create, Read, Update, Delete) functionalities for each module, making it easy to handle rental operations.
🛠️ Tech Stack

    Frontend: HTML, CSS, JavaScript
    Backend: PHP
    Database: MySQL (via XAMPP)
    Server: Apache (XAMPP)

✨ Features

✅ Customer Management - Add, update, and remove customers
✅ Car Inventory - Manage car availability and pricing
✅ Rentals - Book cars for specific dates with total cost calculation
✅ Payments - Record transactions for rentals
✅ Insurance - Add and manage insurance policies
✅ Locations - Define rental locations
✅ User-Friendly Interface - Simple and professional UI
⚙️ Setup Instructions
1️⃣ Install Prerequisites

Ensure you have the following installed:

    XAMPP (Apache, MySQL, PHP)

2️⃣ Clone the Repository

git clone https://github.com/your-username/car-rental-system.git
cd car-rental-system

3️⃣ Start XAMPP Services

    Open XAMPP Control Panel
    Start Apache and MySQL

4️⃣ Create the Database

    Open phpMyAdmin (http://localhost/phpmyadmin/)
    Create a database:

    CREATE DATABASE car_rental;

    Import car_rental.sql (if available)

5️⃣ Update Database Configuration

Edit db.php and configure your database credentials:

$servername = "localhost";
$username = "root";
$password = "";
$database = "car_rental";
$conn = new mysqli($servername, $username, $password, $database);

6️⃣ Run the Website

    Open browser and go to:

    http://localhost/car_rental/index.php

📂 Project Structure

/car_rental_system
│── /assets             # CSS, JS, images
│── /db.php             # Database connection
│── /header.php         # Navbar and common header
│── /index.php          # Dashboard page
│── /customers/         # Customer management
│── /rentals/           # Rental management
│── /payments/          # Payment management
│── /insurance/         # Insurance management
│── /locations/         # Rental locations
│── /cars/              # Car inventory
│── README.md           # Project documentation


🔥 Future Enhancements

    🚀 Admin Authentication for security
    📊 Reports & Analytics for rentals & payments
    💳 Online Payments integration

Enjoy using the Car Rental System! 🎉 🚗💨
