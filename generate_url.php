<?php
session_start();
include 'config.php';
$characters = '123456789abcdefghijklmnopqrstuvwxyz';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < 21; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}
$pin = $randomString;
$nim = $_SESSION['nim'];
$result = mysqli_query($mysqli, "UPDATE msmhs SET url_publik='$pin' WHERE NIMHSMSMHS='$nim'");
header("location: generate_link_publik.php");
?>
