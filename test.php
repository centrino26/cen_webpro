<?php
// Array untuk menyimpan data barang
$barang = [
    ["id" => 1, "nama" => "Buku", "kategori" => "Alat Tulis", "harga" => 20000],
    ["id" => 2, "nama" => "Pulpen", "kategori" => "Alat Tulis", "harga" => 5000],
];

// Tambah Barang
if (isset($_POST['tambah'])) {
    $idBaru = count($barang) + 1;
    $barang[] = [
        "id" => $idBaru,
        "nama" => $_POST['nama'],
        "kategori" => $_POST['kategori'],
        "harga" => $_POST['harga']
    ];
}

// Hapus Barang
if (isset($_GET['hapus'])) {
    $barang = array_filter($barang, fn($b) => $b['id'] != $_GET['hapus']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Barang</title>
    <style>
        .form-group { margin-bottom: 10px; }
        table { width: 50%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
    </style>
</head>
<body>
    <h2>Tambah Barang</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nama Barang:</label>
            <input type="text" name="nama" required>
        </div>
        <div class="form-group">
            <label>Kategori Barang:</label>
            <input type="text" name="kategori" required>
        </div>
        <div class="form-group">
            <label>Harga Barang:</label>
            <input type="number" name="harga" required>
        </div>
        <button type="submit" name="tambah">Tambah Barang</button>
    </form>

    <h2>Daftar Barang</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($barang as $b) { ?>
        <tr>
            <td><?= $b['id'] ?></td>
            <td><?= $b['nama'] ?></td>
            <td><?= $b['kategori'] ?></td>
            <td><?= $b['harga'] ?></td>
            <td><a href="?hapus=<?= $b['id'] ?>">Hapus</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>