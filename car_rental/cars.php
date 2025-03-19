<?php include 'header.php'; ?>
<div class="container">
    <div class="management-header">
        <h1>Car Management</h1>
        <a href="add_car.php"><button class="add-btn">+ Add Car</button></a>
    </div>

    <table>
        <tr>
            <th>Brand</th>
            <th>Model</th>
            <th>Price/Day</th>
            <th>Availability</th>
            <th>Actions</th>
        </tr>

        <?php
        include 'db.php';
        $result = $conn->query("SELECT * FROM cars");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['brand']}</td>
                    <td>{$row['model']}</td>
                    <td>₹{$row['price_per_day']}</td>
                    <td>" . ($row['availability'] ? "Available" : "Rented") . "</td>
                    <td>
                        <a href='edit_car.php?id={$row['id']}'><button class='edit-btn'>Edit</button></a>
                        <a href='delete_car.php?id={$row['id']}' onclick='return confirmDelete();'>
                            <button class='delete-btn'>Delete</button>
                        </a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</div>
<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this item?");
}
</script>
