<?php
session_start();
if (!isset($_SESSION['nim'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM countries WHERE id='$id'";
$result = $conn->query($sql);
$country = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $group_id = $_POST['group_id'];
    $country_name = $_POST['country_name'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    $sql = "UPDATE countries SET group_id='$group_id', country_name='$country_name', wins='$wins', draws='$draws', losses='$losses', points='$points' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Data negara berhasil diubah";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Negara</title>
</head>
<body>
    <h2>Edit Data Negara</h2>
    <form method="post">
        Nama Group:
        <select name="group_id">
            <?php 
            $groups = $conn->query("SELECT * FROM groups");
            while ($group = $groups->fetch_assoc()) { ?>
                <option value="<?php echo $group['id']; ?>" <?php if ($group['id'] == $country['group_id']) echo "selected"; ?>><?php echo $group['group_name']; ?></option>
            <?php } ?>
        </select><br>
        Nama Negara: <input type="text" name="country_name" value="<?php echo $country['country_name']; ?>" required><br>
        Jumlah Menang: <input type="number" name="wins" value="<?php echo $country['wins']; ?>" required><br>
        Jumlah Seri: <input type="number" name="draws" value="<?php echo $country['draws']; ?>" required><br>
        Jumlah Kalah: <input type="number" name="losses" value="<?php echo $country['losses']; ?>" required><br>
        Jumlah Poin: <input type="number" name="points" value="<?php echo $country['points']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
