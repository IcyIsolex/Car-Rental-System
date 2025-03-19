<?php include 'header.php'; ?>
<div class="container">
    <div class="management-header">
        <h1>Customer Management</h1>
        <a href="add_customer.php"><button class="add-btn">+ Add Customer</button></a>
    </div>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'db.php';
        $result = $conn->query("SELECT * FROM customers");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>
                        <a href='edit_customer.php?id={$row['id']}'><button class='edit-btn'>Edit</button></a>
                        <a href='delete_customer.php?id={$row['id']}' onclick='return confirmDelete();'>
                            <button class='delete-btn'>Delete</button>
                        </a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</div>
