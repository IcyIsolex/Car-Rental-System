<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM locations WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: locations.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
