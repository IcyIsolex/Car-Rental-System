<?php
include 'db.php'; // Ensure database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Run DELETE query
    $query = "DELETE FROM payments WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: payments.php?success=Payment deleted");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request!";
}
?>
