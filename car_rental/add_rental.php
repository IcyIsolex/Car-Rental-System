<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Rental</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Add a New Rental</h1>
        <form method="POST" action="">
            <label>Customer:</label>
            <select name="customer_id" required>
                <?php
                $customers = $conn->query("SELECT * FROM customers");
                while ($row = $customers->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select><br>

            <label>Car:</label>
            <select name="car_id" required>
                <?php
                $cars = $conn->query("SELECT * FROM cars WHERE availability=1");
                while ($row = $cars->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['brand']} {$row['model']}</option>";
                }
                ?>
            </select><br>

            <input type="date" name="rental_date" required><br>
            <input type="date" name="return_date" required><br>
            <input type="number" name="total_cost" placeholder="Total Cost" required><br>
            <button type="submit" name="submit" class="add-btn">Add Rental</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $customer_id = $_POST['customer_id'];
            $car_id = $_POST['car_id'];
            $rental_date = $_POST['rental_date'];
            $return_date = $_POST['return_date'];
            $total_cost = $_POST['total_cost'];

            $sql = "INSERT INTO rentals (customer_id, car_id, rental_date, return_date, total_cost) 
                    VALUES ('$customer_id', '$car_id', '$rental_date', '$return_date', '$total_cost')";
            if ($conn->query($sql) === TRUE) {
                $conn->query("UPDATE cars SET availability=0 WHERE id='$car_id'");
                echo "<p>Rental added successfully! <a href='rentals.php'>View Rentals</a></p>";
            } else {
                echo "<p>Error: " . $conn->error . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
