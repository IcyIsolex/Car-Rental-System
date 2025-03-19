<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Car</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Add a New Car</h1>
        <form method="POST" action="">
            <input type="text" name="brand" placeholder="Brand" required><br>
            <input type="text" name="model" placeholder="Model" required><br>
            <input type="number" name="price" placeholder="Price per Day" required><br>
            <button type="submit" name="submit" class="add-btn">Add Car</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $price = $_POST['price'];

            $sql = "INSERT INTO cars (brand, model, price_per_day, availability) VALUES ('$brand', '$model', '$price', 1)";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Car added successfully! <a href='cars.php'>View Cars</a></p>";
            } else {
                echo "<p>Error: " . $conn->error . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
