<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "Kode tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM tb_kegiatan WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $tanggal_kegiatan = $_POST['tanggal_kegiatan'];

    $update = "UPDATE tb_kegiatan 
               SET nama_kegiatan = '$nama_kegiatan', tanggal_kegiatan = '$tanggal_kegiatan'
               WHERE id = '$id'";

    if (mysqli_query($koneksi, $update)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form method="post">
        <label>Nama Kegiatan:</label><br>
        <input type="text" name="nama_kegiatan" value="<?php echo $data['nama_kegiatan']; ?>"><br><br>
        
        <label>Waktu Kegiatan:</label><br>
        <textarea name="tanggal_kegiatan"><?php echo $data['tanggal_kegiatan']; ?></textarea><br><br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>