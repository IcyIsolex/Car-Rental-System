<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM insurance WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: insurance.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
