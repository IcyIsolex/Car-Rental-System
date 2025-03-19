<?php
include 'db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("❌ Error: Payment ID is missing!");
}

$payment_id = $_GET['id'];

// ✅ Fetch payment details
$query = $conn->query("SELECT * FROM payments WHERE id = '$payment_id'");
$payment = $query->fetch_assoc();

if (!$payment) {
    die("❌ Error: Payment record not found!");
}

$method = isset($payment['method']) ? $payment['method'] : 'Cash';

// ✅ Handle the update request
if (isset($_POST['update'])) {
    $amount = $_POST['amount'];
    $method = $_POST['method'];
    $payment_date = $_POST['payment_date'];

    // ✅ Update query to save method selection
    $sql = "UPDATE payments SET amount='$amount', method='$method', payment_date='$payment_date' WHERE id='$payment_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>✅ Payment updated successfully! <a href='payments.php'>View Payments</a></p>";
    } else {
        echo "<p>❌ Error updating payment: " . $conn->error . "</p>";
    }

    // ✅ Redirect to refresh the page and show updated values
    header("Location: payments.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Payment</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Payment</h1>
        <form method="POST" action="">
            <label>Amount:</label>
            <input type="number" name="amount" value="<?= htmlspecialchars($payment['amount']); ?>" required><br>

            <label>Payment Method:</label>
            <select name="method">
                <option value="Credit Card" <?= ($method == 'Credit Card') ? 'selected' : ''; ?>>Credit Card</option>
                <option value="Debit Card" <?= ($method == 'Debit Card') ? 'selected' : ''; ?>>Debit Card</option>
                <option value="Cash" <?= ($method == 'Cash') ? 'selected' : ''; ?>>Cash</option>
            </select><br>

            <label>Payment Date:</label>
            <input type="date" name="payment_date" value="<?= htmlspecialchars($payment['payment_date']); ?>" required><br>

            <button type="submit" name="update" class="edit-btn">Update Payment</button>
        </form>
    </div>
</body>
</html>
