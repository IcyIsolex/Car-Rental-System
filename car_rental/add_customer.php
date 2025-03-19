<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Customer</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Add a New Customer</h1>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Full Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="phone" placeholder="Phone Number" required><br>
            <button type="submit" name="submit" class="add-btn">Add Customer</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $sql = "INSERT INTO customers (name, email, phone) VALUES ('$name', '$email', '$phone')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Customer added successfully! <a href='index.php'>View Customers</a></p>";
            } else {
                echo "<p>Error: " . $conn->error . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
