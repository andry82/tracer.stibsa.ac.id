<?php
session_start();
include 'config.php';
$reff = addslashes($_POST['reff']);
$nim = addslashes($_POST['nim']);
$jabatan_penilai = addslashes($_POST['jabatan_penilai']);
$radio_1 = $_POST['1'];
$radio_2 = $_POST['2'];
$radio_3 = $_POST['3'];
$radio_4 = $_POST['4'];
$radio_5 = $_POST['5'];
$radio_6 = $_POST['6'];
$radio_7 = $_POST['7'];

if($_POST['count_survei'] == 0){
  //echo "INSERT INTO survei_alumni_bekerja(nim,jabatan_penilai,q1,q2,q3,q4,q5,q6,q7,reff) VALUES('$nim','$jabatan_penilai','$radio_1','$radio_2','$radio_3','$radio_4','$radio_5','$radio_6','$radio_7','$reff')";
  mysqli_query($mysqli, "INSERT INTO survei_alumni_bekerja(nim,jabatan_penilai,q1,q2,q3,q4,q5,q6,q7,reff) VALUES('$nim','$jabatan_penilai','$radio_1','$radio_2','$radio_3','$radio_4','$radio_5','$radio_6','$radio_7','$reff')");
}else{
  mysqli_query($mysqli, "UPDATE survei_alumni_bekerja SET jabatan_penilai='$jabatan_penilai', q1='$radio_1', q2='$radio_2', q3='$radio_3', q4='$radio_4', q5='$radio_5', q6='$radio_6', q7='$radio_7' WHERE nim='$nim' AND reff='$reff'");
}
$_SESSION['pesan'] = "SELAMAT, SURVEI Anda Telah berhasil di simpan !!!";
header("location: survei_alumni.php?nim=$nim&reff=$reff");
?>