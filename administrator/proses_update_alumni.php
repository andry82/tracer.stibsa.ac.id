<?php
include '../config.php';
$nim = $_POST['nim'];
$nia = $_POST['nia'];
$nia_username = addslashes(str_replace(".", "",$nia));
$nama = $_POST['nama_mhs'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = date('Y-m-d', strtotime($_POST['tanggal_lahir']));
$tanggal_lulus = date('Y-m-d', strtotime($_POST['tanggal_lulus']));
$thn_lulus = date('Y', strtotime($_POST['tanggal_lulus']));
$prodi_id = $_POST['prodi'];
$peminatan_id = $_POST['konsentrasi'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$alamat_asal = $_POST['alamat_asal'];
$alamat = $_POST['alamat'];
$judul_lta = addslashes($_POST['judul_lta']);
mysqli_query($mysqli, "UPDATE alumni SET nia='$nia', nia_username='$nia_username', nama_mhs='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tanggal_lahir', thn_lulus='$thn_lulus', tgl_lulus='$tanggal_lulus', prodi_id='$prodi_id', peminatan_id='$peminatan_id', hp='$hp', email='$email', alamat_asal='$alamat_asal', alamat='$alamat', judul_lta='$judul_lta' WHERE nim='$nim'");
//redirectig to the display page. In our case, it is index.php
header("Location: detail_alumni.php?nim=$nim");
?>
