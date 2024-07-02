<?php


include 'db.php';

// Fetch groups
$groups = $conn->query("SELECT * FROM groups");

// Fetch countries
$countries = $conn->query("SELECT * FROM countries");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <a href="logout.php">Logout</a>

    <h2>Tambah Data Grup</h2>
    <form method="post" action="add_group.php">
        Nama Group: 
        <select name="group_name">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <input type="submit" value="Tambah">
    </form>

    <h2>Tambah Data Negara</h2>
    <form method="post" action="add_country.php">
        Nama Group:
        <select name="group_id">
            <?php while ($group = $groups->fetch_assoc()) { ?>
                <option value="<?php echo $group['id']; ?>"><?php echo $group['group_name']; ?></option>
            <?php } ?>
        </select><br>
        Nama Negara: <input type="text" name="country_name" required><br>
        Jumlah Menang: <input type="number" name="wins" required><br>
        Jumlah Seri: <input type="number" name="draws" required><br>
        Jumlah Kalah: <input type="number" name="losses" required><br>
        Jumlah Poin: <input type="number" name="points" required><br>
        <input type="submit" value="Tambah">
    </form>

    <h2>Data Negara</h2>
    <table border="1">
        <tr>
            <th>Nama Negara</th>
            <th>Group</th>
            <th>Menang</th>
            <th>Seri</th>
            <th>Kalah</th>
            <th>Poin</th>
            <th>Aksi</th>
        </tr>
        <?php while ($country = $countries->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $country['country_name']; ?></td>
                <td><?php echo $country['group_id']; ?></td>
                <td><?php echo $country['wins']; ?></td>
                <td><?php echo $country['draws']; ?></td>
                <td><?php echo $country['losses']; ?></td>
                <td><?php echo $country['points']; ?></td>
                <td>
                    <a href="edit_country.php?id=<?php echo $country['id']; ?>">Edit</a>
                    <a href="delete_country.php?id=<?php echo $country['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
