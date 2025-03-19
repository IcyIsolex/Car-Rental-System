<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Locations - Car Rental System</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
    <div class="management-header">
    <h1>Rental Locations</h1>
    <a href="add_location.php" class="add-btn">+ Add Location</a>
</div>

        <table>
            <tr>
                <th>Location Name</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>

            <?php
            $result = $conn->query("SELECT * FROM locations");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['location_name']}</td>
                    <td>{$row['address']}</td>
                    <td>
                        <a href='edit_location.php?id={$row['id']}'><button class='edit-btn'>Edit</button></a>
                        <a href='delete_location.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\");'><button class='delete-btn'>Delete</button></a>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
