<?php
session_start();
include '../config.php';
$id_pekerjaan = $_SESSION['id'];
$nim = $_POST['nim'];
$nama_surveyor = $_POST['nama_surveyor'];
$jabatan_surveyor = $_POST['jabatan_surveyor'];
$instansi = $_POST['instansi'];
$alamat_instansi = $_POST['alamat_instansi'];
$telp = $_POST['telp'];
$fax = $_POST['fax'];
$poin_1 = $_POST['poin_1'];
$poin_2 = $_POST['poin_2'];
$poin_3 = $_POST['poin_3'];
$poin_4 = $_POST['poin_4'];
$poin_5 = $_POST['poin_5'];
$poin_6 = $_POST['poin_6'];
$poin_7 = $_POST['poin_7'];
$poin_8 = $_POST['poin_8'];
$poin_9 = $_POST['poin_9'];

$surveyor = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE pekerjaan_id='$id_pekerjaan'");
$countsurveyor = mysqli_num_rows($surveyor);
if ($countsurveyor == 0) {
    $result = mysqli_query($mysqli, "INSERT INTO surveyor(pekerjaan_id,nim,nama_surveyor,jabatan_surveyor,instansi,alamat_instansi,telp,fax,poin_1,poin_2,poin_3,poin_4,poin_5,poin_6,poin_7,poin_8,poin_9,status_survei) VALUES('$id_pekerjaan','$nim','$nama_surveyor','$jabatan_surveyor','$instansi','$alamat_instansi','$telp','$fax','','','','','','','','','','0')");
   //echo "INSERT INTO surveyor(pekerjaan_id,nim,nama_surveyor,jabatan_surveyor,instansi,alamat_instansi,telp,fax,poin_1,poin_2,poin_3,poin_4,poin_5,poin_6,poin_7,poin_8,poin_9,status_survei) VALUES('$id_pekerjaan','$nim','$nama_surveyor','$jabatan_surveyor','$instansi','$alamat_instansi','$telp','$fax','','','','','','','','','','0')"; 
} else {
    
}
header("location: surveyor.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

