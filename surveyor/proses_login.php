<?php

session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:login.php");
}

include '../config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

// = mysql_query("select * from user where username='$username' and password='$password'");
$login = mysqli_query($mysqli, "select * from pekerjaan where users='$username' and password='$password'");
$cek = mysqli_num_rows($login);
 while ($d = mysqli_fetch_array($login)) {
    $a = $d['username'];
    $nim = $d['nim'];
    $id = $d['id'];
    $instansi = $d['instansi'];
    $departemen = $d['departemen'];
    $jabatan = $d['jabatan'];
    $bagian = $d['bagian'];
 }
if ($cek > 0) {
    session_start();
    	$_SESSION['username'] = $a;
    	$_SESSION['id'] = $id;
    	$_SESSION['nim'] = $nim;
	$_SESSION['level'] = "surveyor";
	$_SESSION['instansi'] = $instansi;
	$_SESSION['departemen'] = $departemen;
	$_SESSION['jabatan'] = $jabatan;
	$_SESSION['bagian'] = $bagian;
    header("location:index.php");
} else { 
    header("location:login.php");
}
?>
