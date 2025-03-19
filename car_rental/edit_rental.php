<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Rental</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Rental</h1>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $rental = $conn->query("SELECT * FROM rentals WHERE id=$id")->fetch_assoc();
        }

        if (isset($_POST['update'])) {
            $return_date = $_POST['return_date'];
            $total_cost = $_POST['total_cost'];

            $sql = "UPDATE rentals SET return_date='$return_date', total_cost='$total_cost' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Rental updated! <a href='rentals.php'>Go back</a></p>";
            }
        }
        ?>

        <form method="POST">
            <input type="date" name="return_date" value="<?= $rental['return_date'] ?>" required><br>
            <input type="number" name="total_cost" value="<?= $rental['total_cost'] ?>" required><br>
            <button type="submit" name="update" class="edit-btn">Update</button>
        </form>
    </div>
</body>
</html>
