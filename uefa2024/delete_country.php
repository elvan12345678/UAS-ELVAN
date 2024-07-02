<?php
session_start();
if (!isset($_SESSION['nim'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM countries WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Data negara berhasil dihapus";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header('Location: dashboard.php');
?>
