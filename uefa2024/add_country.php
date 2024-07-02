<?php
session_start();
if (!isset($_SESSION['nim'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $group_id = $_POST['group_id'];
    $country_name = $_POST['country_name'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    $sql = "INSERT INTO countries (group_id, country_name, wins, draws, losses, points) VALUES ('$group_id', '$country_name', '$wins', '$draws', '$losses', '$points')";
    if ($conn->query($sql) === TRUE) {
        echo "Data negara berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
header('Location: dashboard.php');
?>
