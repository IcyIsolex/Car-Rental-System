<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rentals - Car Rental System</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
    <div class="management-header">
    <h1>Rental Management</h1>
    <a href="add_rental.php" class="add-btn">+ Add Rental</a>
</div>

        <table>
            <tr>
                <th>Customer</th>
                <th>Car</th>
                <th>Rental Date</th>
                <th>Return Date</th>
                <th>Total Cost</th>
                <th>Actions</th>
            </tr>

            <?php
            $result = $conn->query("SELECT rentals.id, customers.name AS customer, cars.brand, cars.model, rentals.rental_date, rentals.return_date, rentals.total_cost 
                                    FROM rentals
                                    JOIN customers ON rentals.customer_id = customers.id
                                    JOIN cars ON rentals.car_id = cars.id");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['customer']}</td>
                    <td>{$row['brand']} {$row['model']}</td>
                    <td>{$row['rental_date']}</td>
                    <td>{$row['return_date']}</td>
                    <td>₹{$row['total_cost']}</td>
                    <td>
                        <a href='edit_rental.php?id={$row['id']}'><button class='edit-btn'>Edit</button></a>
                        <a href='delete_rental.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\");'><button class='delete-btn'>Delete</button></a>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
