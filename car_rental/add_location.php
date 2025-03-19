<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Location</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Add a New Location</h1>
        <form method="POST" action="">
            <input type="text" name="location_name" placeholder="Location Name" required><br>
            <input type="text" name="address" placeholder="Address" required><br>
            <button type="submit" name="submit" class="add-btn">Add Location</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $location_name = $_POST['location_name'];
            $address = $_POST['address'];

            $sql = "INSERT INTO locations (location_name, address) VALUES ('$location_name', '$address')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Location added successfully! <a href='locations.php'>View Locations</a></p>";
            } else {
                echo "<p>Error: " . $conn->error . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
