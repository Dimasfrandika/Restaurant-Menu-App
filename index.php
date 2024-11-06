<?php
include 'koneksi.php';

$query = "SELECT * FROM menu_items";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu Restaurant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Menu</h2>
    <a href="tambah.php">Tambah Item Menu</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Item</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama_item'] ?></td>
                <td><?= $row['deskripsi'] ?></td>
                <td><?= $row['harga'] ?></td>
                <td><?= $row['kategori'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
