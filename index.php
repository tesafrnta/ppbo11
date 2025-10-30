<?php
require_once 'config/Database.php';
require_once 'classes/Mahasiswa.php';

$db = new Database();
$mhs = new Mahasiswa($db->getConnection());
$data = $mhs->readAll();

if (isset($_COOKIE['success'])) {
    echo "<script>alert('Berhasil " . $_COOKIE['success'] . " data');</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css"> <!-- Pastikan path sesuai -->
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <a href="tambah.php" class="add-button">+ Tambah Data</a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $data->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['nim'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td>
                <a href="ubah.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

