<?php
session_start();
include '../config.php';
$id_pekerjaan = $_SESSION['id'];
$poin_1 = $_POST['poin_1'];
$poin_2 = $_POST['poin_2'];
$poin_3 = $_POST['poin_3'];
$poin_4 = $_POST['poin_4'];
$poin_5 = $_POST['poin_5'];
$poin_6 = $_POST['poin_6'];
$poin_7 = $_POST['poin_7'];
$poin_8 = $_POST['poin_8'];
$poin_9 = $_POST['poin_9'];
mysqli_query($mysqli, "UPDATE surveyor SET poin_1='$poin_1',poin_2='$poin_2',poin_3='$poin_3',poin_4='$poin_4',poin_5='$poin_5',poin_6='$poin_6',poin_7='$poin_7',poin_8='$poin_8',poin_9='$poin_9',status_survei='1' WHERE pekerjaan_id='$id_pekerjaan'");
header("location: survei_alumni.php");
//echo "UPDATE surveyor SET poin_1='$poin_1',poin_2='$poin_2',poin_3='$poin_3',poin_4='$poin_4',poin_5='$poin_5',poin_6='$poin_6',poin_7='$poin_7',poin_8='$poin_8',poin_9='$poin_9',status_survei='1' WHERE pekerjaan_id='$id_pekerjaan'";
