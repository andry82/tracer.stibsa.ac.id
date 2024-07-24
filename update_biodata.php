<?php
session_start();
include 'config.php';
$nikey = $_SESSION['nikey'];
$nim = $_SESSION['nim'];
$tempat_lahir = mysqli_real_escape_string($mysqli, $_POST['tempat_lahir']);
$telp = mysqli_real_escape_string($mysqli, $_POST['telp']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$alamat_asal = mysqli_real_escape_string($mysqli, $_POST['alamat_asal']);
$alamat_sekarang = mysqli_real_escape_string($mysqli, $_POST['alamat_sekarang']);
$tanggal_lahir = mysqli_real_escape_string($mysqli, date('Y-m-d', strtotime(date($_POST['tanggal_lahir']))));
$result = mysqli_query($mysqli, "UPDATE alumni SET tempat_lahir='$tempat_lahir', tgl_lahir='$tanggal_lahir', alamat_asal='$alamat_asal', alamat='$alamat_sekarang', hp='$telp', email='$email' WHERE nim='$nim' AND nikey='$nikey'");
header("location: biodata.php");
?>