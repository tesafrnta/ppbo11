<?php
require_once "config/Database.php";
require_once "classes/Mahasiswa.php";

$db = (new Database())->getConnection();
$mhs = new Mahasiswa($db);
$id = $_GET['id'];

$query = $db->prepare("SELECT * FROM mahasiswa WHERE id = :id");
$query->bindParam(":id", $id);
$query->execute();
$data = $query->fetch(PDO::FETCH_ASSOC);

if ($_POST) {
    $mhs->id = $id;
    $mhs->nama = $_POST['nama'];
    $mhs->nim = $_POST['nim'];
    $mhs->jurusan = $_POST['jurusan'];

    if ($mhs->update()) {
        setcookie('success', 'edit', time() + 1);
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Ubah Data Mahasiswa</h2>
    <form method="POST" style="max-width: 500px; background-color: white; padding: 24px; border-radius: 12px; box-shadow: 0 6px 12px rgba(0,0,0,0.05);">
        <div style="margin-bottom: 16px;">
            <label for="nama" style="display: block; margin-bottom: 6px; font-weight: 600;">Nama</label>
            <input type="text" name="nama" id="nama" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
        </div>
        <div style="margin-bottom: 16px;">
            <label for="nim" style="display: block; margin-bottom: 6px; font-weight: 600;">NIM</label>
            <input type="text" name="nim" id="nim" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
        </div>
        <div style="margin-bottom: 24px;">
            <label for="jurusan" style="display: block; margin-bottom: 6px; font-weight: 600;">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
        </div>
        <button type="submit" class="add-button">Simpan</button>
    </form>
</body>
</html>