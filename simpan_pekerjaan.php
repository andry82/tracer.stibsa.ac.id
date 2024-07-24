<?php
session_start();
include 'config.php';
$nim = $_SESSION['NIM'];
$instansi = mysqli_real_escape_string($mysqli, $_POST['instansi']);
$jabatan = mysqli_real_escape_string($mysqli, $_POST['jabatan']);
$tanggal_masuk = mysqli_real_escape_string($mysqli, $_POST['tanggal_masuk']);
$tahun_masuk = date('Y', date(strtotime($tanggal_masuk)));
$tgl_masuk = date('Y-m-d', date(strtotime($tanggal_masuk)));
$jenis_perusahaan = mysqli_real_escape_string($mysqli, $_POST['jenis_perusahaan']);
$created_at = date('Y-m-d H:i:s');
$reff = md5($created_at);
mysqli_query($mysqli, "INSERT INTO alumni_bekerja(nim,instansi,jabatan,tanggal_masuk,jenis_perusahaan_id,created_at,reff) VALUES('$nim','$instansi','$jabatan','$tgl_masuk','$jenis_perusahaan','$created_at','$reff')");
//echo "INSERT INTO alumni_bekerja(nim,instansi,jabatan,tanggal_masuk,jenis_perusahaan_id,created_at,reff) VALUES('$nim','$instansi','$jabatan','$tgl_masuk','$jenis_perusahaan','$created_at','$reff')";
header("location:historis_pekerjaan.php");