<?php

session_start();
// cek apakah yang mengakses halaman ini sudah login
include 'config.php';
$nim = addslashes(str_replace(".", "",$_POST['nimnia']));
$password = addslashes($_POST['password']);
$login = mysqli_query($mysqli, "SELECT * from msmhs where (NIMHSMSMHS='$nim' or NIA_NIMHSMSMHS='$nim') and login_pass='$password'");
$cek = mysqli_num_rows($login);
if ($cek == 0) {
  //include 'api/alumni.php';
}
while ($d = mysqli_fetch_array($login)) {
    $nama_alumni = $d['NMMHSMSMHS'];
    $nim = $d['NIMHSMSMHS'];
    $nia = $d['NIA_NIMHSMSMHS'];    
    $thn_masuk = $d['TAHUNMSMHS'];    
    $nikey = md5($nim);
}
echo $cek;
if ($cek > 0) {
    session_start();
    $_SESSION['NIA'] = $nia;
    $_SESSION['NIM'] = $nim;
    $_SESSION['TAHUNMSMHS'] = $thn_masuk;
    $_SESSION['NIKEY'] = $nikey;
    $_SESSION['NAMA_ALUMNI'] = $nama_alumni;
    $_SESSION['LEVEL'] = "alumni";
    $kuisioner = mysqli_query($mysqli, "SELECT * FROM kuisioner WHERE nikey='$nikey'");
    $count_kuisioner = mysqli_num_rows($kuisioner);
    if ($count_kuisioner == 0) {
        $created_at = date('Y-m-d h:i:s');
        mysqli_query($mysqli, "INSERT INTO kuisioner(nim,nikey,created_at) VALUES('$nim','$nikey', '$created_at')");
    }
    header("location:index.php");
} else {
    header("location:login.php");
}
?>
