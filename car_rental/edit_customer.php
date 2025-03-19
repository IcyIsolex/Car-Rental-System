<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Customer</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Customer</h1>
        
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $customer = $conn->query("SELECT * FROM customers WHERE id=$id")->fetch_assoc();
        }

        if (isset($_POST['update'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $sql = "UPDATE customers SET name='$name', email='$email', phone='$phone' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Customer updated! <a href='index.php'>Go back</a></p>";
            }
        }
        ?>

        <form method="POST">
            <input type="text" name="name" value="<?= $customer['name'] ?>" required><br>
            <input type="email" name="email" value="<?= $customer['email'] ?>" required><br>
            <input type="text" name="phone" value="<?= $customer['phone'] ?>" required><br>
            <button type="submit" name="update" class="edit-btn">Update</button>
        </form>
    </div>
</body>
</html>
