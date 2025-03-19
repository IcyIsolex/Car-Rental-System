<!DOCTYPE html>
<html lang="en">
<head>
    <title>Car Rental System</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <!-- Page Title -->
    <div class="page-title">
        Welcome to <b>Car Rental System</b> - Your Journey Starts Here!
    </div>

    <!-- Main Card Section -->
    <div class="container">
        <div class="card">
            <i class="fas fa-car"></i>
            <h3>Cars</h3>
            <p>Manage available cars.</p>
            <a href="cars.php" class="view-btn">View Cars</a>
        </div>

        <div class="card">
            <i class="fas fa-user"></i>
            <h3>Customers</h3>
            <p>Manage customer details.</p>
            <a href="customers.php" class="view-btn">View Customers</a>
        </div>

        <div class="card">
            <i class="fas fa-calendar-alt"></i>
            <h3>Rentals</h3>
            <p>Track rental history.</p>
            <a href="rentals.php" class="view-btn">View Rentals</a>
        </div>

        <div class="card">
            <i class="fas fa-credit-card"></i>
            <h3>Payments</h3>
            <p>Process payments securely.</p>
            <a href="payments.php" class="view-btn">View Payments</a>
        </div>

        <div class="card">
            <i class="fas fa-shield-alt"></i>
            <h3>Insurance</h3>
            <p>Manage insurance records.</p>
            <a href="insurance.php" class="view-btn">View Insurance</a>
        </div>

        <div class="card">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Locations</h3>
            <p>View rental locations.</p>
            <a href="locations.php" class="view-btn">View Locations</a>
        </div>
    </div>
</body>
</html>
