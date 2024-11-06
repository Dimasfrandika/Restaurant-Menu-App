<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM menu_items WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_item = $_POST['nama_item'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    $query = "UPDATE menu_items SET nama_item = '$nama_item', deskripsi = '$deskripsi', harga = '$harga', kategori = '$kategori' WHERE id = $id";
    mysqli_query($koneksi, $query);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Item Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Item Menu</h2>
    <form action="" method="POST">
        Nama Item: <input type="text" name="nama_item" value="<?= $row['nama_item'] ?>" required><br>
        Deskripsi: <textarea name="deskripsi" required><?= $row['deskripsi'] ?></textarea><br>
        Harga: <input type="number" name="harga" step="0.01" value="<?= $row['harga'] ?>" required><br>
        Kategori: 
        <select name="kategori" required>
            <option value="Makanan" <?= $row['kategori'] == 'Makanan' ? 'selected' : '' ?>>Makanan</option>
            <option value="Minuman" <?= $row['kategori'] == 'Minuman' ? 'selected' : '' ?>>Minuman</option>
            <option value="Dessert" <?= $row['kategori'] == 'Dessert' ? 'selected' : '' ?>>Dessert</option>
        </select><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
