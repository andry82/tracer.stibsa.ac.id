<?php
session_start();
include '../config.php';
$username = addslashes($_POST['username']);
$password = addslashes(md5($_POST['password']));
$result= mysqli_query($mysqli, "select * from siakad_admin where username='$username' and passwd='$password'");
$cek = mysqli_num_rows($result);
while ($d = mysqli_fetch_array($result)) {
    $username = $d['username'];
    $level = $d['level'];
}
if ($cek > 0) {
    session_start();
    $_SESSION['username'] = $username;
	$_SESSION['level'] = $level;
    header("location:index.php");
} else { 
    header("location:login.php");
}
?>
