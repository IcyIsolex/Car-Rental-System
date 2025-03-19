<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payments - Car Rental System</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
    <div class="management-header">
    <h1>Payment Records</h1>
    <a href="add_payment.php" class="add-btn">+ Add Payment</a>
</div>

        <table>
            <tr>
                <th>Rental ID</th>
                <th>Customer</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Payment Date</th>
                <th>Actions</th>
            </tr>

            <?php
            // Ensure database connection is established
            if (!$conn) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            // Fetch payments and join with rentals & customers
            $result = $conn->query("SELECT payments.id, rentals.id AS rental_id, customers.name AS customer, 
                                           payments.amount, 
                                           COALESCE(payments.payment_type, 'Unknown') AS payment_type, 
                                           COALESCE(payments.payment_date, 'N/A') AS payment_date
                                    FROM payments
                                    JOIN rentals ON payments.rental_id = rentals.id
                                    JOIN customers ON rentals.customer_id = customers.id");

            // Check if there are records
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['rental_id']}</td>
                        <td>{$row['customer']}</td>
                        <td>₹{$row['amount']}</td>
                        <td>{$row['payment_type']}</td>
                        <td>{$row['payment_date']}</td>
                        <td>
                            <a href='edit_payment.php?id={$row['id']}'><button class='edit-btn'>Edit</button></a>
                            <a href='delete_payment.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\");'><button class='delete-btn'>Delete</button></a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No payment records found.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
