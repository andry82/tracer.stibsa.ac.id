<?php
session_start();
include 'config.php';
$nikeymhs = $_SESSION['NIKEY'];
$nimmhs = $_SESSION['NIM'];
$f8 = addslashes($_POST['f8']);
$f504= addslashes($_POST['f504']);
$masa_tunggu = addslashes($_POST['masa_tunggu']);
$pendapatan_rata = addslashes($_POST['pendapatan_rata']);
$kesesuaian = addslashes($_POST['kesesuaian']);

echo "UPDATE kuisioner SET f8='$f8', f504='$f504', masa_tunggu='$masa_tunggu', pendapatan_rata='$pendapatan_rata', kesesuaian='$kesesuaian', status='1' WHERE nim='$nimmhs' AND nikey='$nikeymhs'";

$result = mysqli_query($mysqli, "UPDATE kuisioner SET f8='$f8', f504='$f504', masa_tunggu='$masa_tunggu', pendapatan_rata='$pendapatan_rata', kesesuaian='$kesesuaian', status='1' WHERE nim='$nimmhs' AND nikey='$nikeymhs'");
$_SESSION['pesan'] = "SELAMAT, KUISIONER Anda Telah berhasil di simpan !!!";
header("location: kuisioner.php");
?>