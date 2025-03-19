<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Insurance - Car Rental System</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
    <div class="management-header">
    <h1>Insurance Management</h1>
    <a href="add_insurance.php" class="add-btn">+ Add Insurance</a>
</div>

        <table>
            <tr>
                <th>Policy Name</th>
                <th>Coverage Amount</th>
                <th>Premium</th>
                <th>Actions</th>
            </tr>

            <?php
            $result = $conn->query("SELECT * FROM insurance");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['policy_name']}</td>
                    <td>₹{$row['coverage_amount']}</td>
                    <td>₹{$row['premium']}</td>

                    <td>
                        <a href='edit_insurance.php?id={$row['id']}'><button class='edit-btn'>Edit</button></a>
                        <a href='delete_insurance.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\");'><button class='delete-btn'>Delete</button></a>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
