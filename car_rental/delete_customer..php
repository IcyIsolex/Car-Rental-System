<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM customers WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect after deleting
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
