<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Insurance</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Add New Insurance Policy</h1>
        <form method="POST" action="">
            <label>Policy Name:</label>
            <input type="text" name="policy_name" required><br>

            <label>Coverage Amount:</label>
            <input type="number" name="coverage_amount" required><br>

            <label>Premium:</label>
            <input type="number" name="premium" required><br>

            <button type="submit" name="submit" class="add-btn">Add Insurance</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $policy_name = $_POST['policy_name'];
            $coverage_amount = $_POST['coverage_amount'];
            $premium = $_POST['premium'];

            // ✅ Make sure column names match the database
            $sql = "INSERT INTO insurance (policy_name, coverage_amount, premium) 
                    VALUES ('$policy_name', '$coverage_amount', '$premium')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>✅ Insurance added successfully! <a href='insurance.php'>View Policies</a></p>";
            } else {
                echo "<p>❌ Error: " . $conn->error . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
