<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Payment</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Add a New Payment</h1>
        <form method="POST" action="">
            <label>Rental:</label>
            <select name="rental_id" required>
                <?php
                // Fetch rental details with customer names
                $rentals = $conn->query("SELECT rentals.id, customers.name 
                                         FROM rentals 
                                         JOIN customers ON rentals.customer_id = customers.id");
                while ($row = $rentals->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>Rental #{$row['id']} - {$row['name']}</option>";
                }
                ?>
            </select><br>

            <input type="number" name="amount" placeholder="Amount" required><br>

            <label>Payment Method:</label>
            <select name="payment_type" required>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Cash">Cash</option>
            </select><br>

            <label>Payment Date:</label>
            <input type="date" name="payment_date" required><br>

            <button type="submit" name="submit" class="add-btn">Add Payment</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $rental_id = $_POST['rental_id'];
            $amount = $_POST['amount'];
            $payment_type = $_POST['payment_type']; // ✅ Corrected field name
            $payment_date = $_POST['payment_date'];

            // ✅ Make sure column name matches database
            $sql = "INSERT INTO payments (rental_id, amount, payment_type, payment_date) 
                    VALUES ('$rental_id', '$amount', '$payment_type', '$payment_date')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>✅ Payment added successfully! <a href='payments.php'>View Payments</a></p>";
            } else {
                echo "<p>❌ Error: " . $conn->error . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
