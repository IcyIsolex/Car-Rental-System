<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Location</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Location</h1>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $location = $conn->query("SELECT * FROM locations WHERE id=$id")->fetch_assoc();
        }

        if (isset($_POST['update'])) {
            $location_name = $_POST['location_name'];
            $address = $_POST['address'];

            $sql = "UPDATE locations SET location_name='$location_name', address='$address' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Location updated! <a href='locations.php'>Go back</a></p>";
            }
        }
        ?>

        <form method="POST">
            <input type="text" name="location_name" value="<?= $location['location_name'] ?>" required><br>
            <input type="text" name="address" value="<?= $location['address'] ?>" required><br>
            <button type="submit" name="update" class="edit-btn">Update</button>
        </form>
    </div>
</body>
</html>
