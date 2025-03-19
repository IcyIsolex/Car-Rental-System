<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM cars WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: cars.php"); // Redirect after deleting
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
