<?php
session_start();
include 'config.php';
$nim = $_SESSION['nim'];
$id = mysqli_real_escape_string($mysqli, $_POST['id']);
$instansi = mysqli_real_escape_string($mysqli, $_POST['instansi']);
$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
$jabatan = mysqli_real_escape_string($mysqli, $_POST['jabatan']);
$medsos = mysqli_real_escape_string($mysqli, $_POST['medsos']);
$tanggal_masuk = mysqli_real_escape_string($mysqli, $_POST['tanggal_masuk']);
$tahun_masuk = date('Y', date(strtotime($tanggal_masuk)));
$tgl_masuk = date('Y-m-d', date(strtotime($tanggal_masuk)));
$jenis_perusahaan = mysqli_real_escape_string($mysqli, $_POST['jenis_perusahaan']);
$created_at = date('Y-m-d H:i:s');
$reff = md5($created_at);
$result = mysqli_query($mysqli, "UPDATE alumni_kerja SET nama_ip='$instansi', alamat='$alamat', jabatan='$jabatan', medsos='$medsos', tgl_masuk='$tgl_masuk', jenis_instansi='$jenis_perusahaan', reff='$reff' WHERE id='$id'");
header("location: historis_pekerjaan.php"); ?>