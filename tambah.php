<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_kegiatan'];
$tanggal = $_POST['tanggal_kegiatan'];

$query = "INSERT INTO tb_kegiatan (nama_kegiatan, tanggal_kegiatan) 
          VALUES ('$nama', '$tanggal')";
mysqli_query($koneksi, $query);

header("Location: index.php");
exit;
?>
