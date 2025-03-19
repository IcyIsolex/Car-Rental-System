<?php
// Database Configuration
$servername = "localhost"; // XAMPP default host
$username = "root";        // Default MySQL username
$password = "8080441886";            // Default (empty password)
$dbname = "car_rental_db"; // Your database name

// Create MySQL Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Debugging
// echo "Connected successfully";
?>
