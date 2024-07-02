<?php
session_start();
if (!isset($_SESSION['nim'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $group_name = $_POST['group_name'];

    $sql = "INSERT INTO groups (group_name) VALUES ('$group_name')";
    if ($conn->query($sql) === TRUE) {
        echo "Data grup berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
header('Location: dashboard.php');
?>
