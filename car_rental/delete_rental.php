<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $rental = $conn->query("SELECT car_id FROM rentals WHERE id=$id")->fetch_assoc();
    $car_id = $rental['car_id'];

    $sql = "DELETE FROM rentals WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $conn->query("UPDATE cars SET availability=1 WHERE id='$car_id'");
        header("Location: rentals.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
