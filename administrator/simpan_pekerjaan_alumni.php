<?php
session_start();
include '../config.php';
$nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
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
mysqli_query($mysqli, "INSERT INTO alumni_kerja(nim,nama_ip,alamat,tgl_masuk,thn_masuk,jabatan,medsos,jenis_instansi,created_at,reff) VALUES('$nim','$instansi','$alamat','$tgl_masuk','$tahun_masuk','$jabatan','$medsos','$jenis_perusahaan','$created_at','$reff')");
//echo "INSERT INTO alumni_kerja(nim,nama_ip,alamat,tgl_masuk,thn_masuk,jabatan,medsos,jenis_instansi,created_at,key) VALUES('$nim','$instansi','$alamat','$tgl_masuk','$tahun_masuk','$jabatan','$medsos','$jenis_perusahaan','$created_at','$key')";
header("location:detail_alumni.php?nim=$nim");