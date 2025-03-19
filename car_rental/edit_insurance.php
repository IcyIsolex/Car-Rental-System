<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Insurance</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Insurance Policy</h1>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $insurance = $conn->query("SELECT * FROM insurance WHERE id=$id")->fetch_assoc();
        }

        if (isset($_POST['update'])) {
            $policy_name = $_POST['policy_name'];
            $coverage_amount = $_POST['coverage_amount'];
            $premium = $_POST['premium'];

            $sql = "UPDATE insurance SET policy_name='$policy_name', coverage_amount='$coverage_amount', premium='$premium' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Insurance updated! <a href='insurance.php'>Go back</a></p>";
            }
        }
        ?>

        <form method="POST">
            <input type="text" name="policy_name" value="<?= $insurance['policy_name'] ?>" required><br>
            <input type="number" name="coverage_amount" value="<?= $insurance['coverage_amount'] ?>" required><br>
            <input type="number" name="premium" value="<?= $insurance['premium'] ?>" required><br>
            <button type="submit" name="update" class="edit-btn">Update</button>
        </form>
    </div>
</body>
</html>
