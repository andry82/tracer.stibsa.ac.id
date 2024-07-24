<?php
include 'config.php';
$nim = $_GET['nim'];
$key = $_GET['key'];
$status = $_GET['status'];
mysqli_query($mysqli, "UPDATE kuisioner SET status='$status' WHERE nim='$nim' AND nikey='$key'");
header("location: acessment_formulir.php?nim=$nim&key=$key");
?>