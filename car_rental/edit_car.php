<?php
include 'db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("❌ Error: Car ID is missing!");
}

$car_id = $_GET['id'];

// Fetch car details from the database
$query = $conn->query("SELECT * FROM cars WHERE id = '$car_id'");
$car = $query->fetch_assoc();

// ✅ Ensure `status` exists before using it
$status = isset($car['status']) ? $car['status'] : 'Available';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Car</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Car</h1>
        <form method="POST" action="">
            <label>Brand:</label>
            <input type="text" name="brand" value="<?= $car['brand']; ?>" required><br>

            <label>Model:</label>
            <input type="text" name="model" value="<?= $car['model']; ?>" required><br>

            <label>Price/Day:</label>
            <input type="number" name="price" value="<?= $car['price_per_day']; ?>" required><br>

            <label>Status:</label>
            <select name="status">
                <option value="Available" <?= ($status == 'Available') ? 'selected' : ''; ?>>Available</option>
                <option value="Rented" <?= ($status == 'Rented') ? 'selected' : ''; ?>>Rented</option>
            </select><br>

            <button type="submit" name="update" class="edit-btn">Update Car</button>
        </form>

        <?php
        if (isset($_POST['update'])) {
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $price = $_POST['price'];
            $status = $_POST['status'];

            $sql = "UPDATE cars SET brand='$brand', model='$model', price_per_day='$price', status='$status' WHERE id='$car_id'";
            if ($conn->query($sql) === TRUE) {
                echo "<p>✅ Car updated successfully! <a href='cars.php'>View Cars</a></p>";
            } else {
                echo "<p>❌ Error: " . $conn->error . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
