<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_item = $_POST['nama_item'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    $query = "INSERT INTO menu_items (nama_item, deskripsi, harga, kategori) VALUES ('$nama_item', '$deskripsi', '$harga', '$kategori')";
    mysqli_query($koneksi, $query);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Item Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Item Menu Baru</h2>
    <form action="tambah.php" method="POST">
        Nama Item: <input type="text" name="nama_item" required><br>
        Deskripsi: <textarea name="deskripsi" required></textarea><br>
        Harga: <input type="number" name="harga" step="0.01" required><br>
        Kategori: 
        <select name="kategori" required>
            <option value="Makanan">Makanan</option>
            <option value="Minuman">Minuman</option>
            <option value="Dessert">Dessert</option>
        </select><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
