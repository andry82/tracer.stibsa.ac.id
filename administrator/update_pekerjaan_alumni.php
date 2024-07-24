<?php
session_start();
include '../config.php';
$nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
$key = mysqli_real_escape_string($mysqli, $_POST['key']);
$instansi = mysqli_real_escape_string($mysqli, $_POST['instansi']);
$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
$jabatan = mysqli_real_escape_string($mysqli, $_POST['jabatan']);
$medsos = mysqli_real_escape_string($mysqli, $_POST['medsos']);
$tanggal_masuk = mysqli_real_escape_string($mysqli, $_POST['tanggal_masuk']);
$tahun_masuk = date('Y', date(strtotime($tanggal_masuk)));
$tgl_masuk = date('Y-m-d', date(strtotime($tanggal_masuk)));
$jenis_perusahaan = mysqli_real_escape_string($mysqli, $_POST['jenis_perusahaan']);
$result = mysqli_query($mysqli, "UPDATE alumni_kerja SET nama_ip='$instansi', alamat='$alamat', jabatan='$jabatan', medsos='$medsos', tgl_masuk='$tgl_masuk', jenis_instansi='$jenis_perusahaan' WHERE nim='$nim' AND reff='$key'");
header("location:detail_alumni.php?nim=$nim");