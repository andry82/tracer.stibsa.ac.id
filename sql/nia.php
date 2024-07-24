<?php 
include '../config.php';
$result = mysqli_query($mysqli, "SELECT * FROM alumni");
$no = 1;
while ($data = mysqli_fetch_array($result)) {
    $nim = $data['nim'];
    $nama_mhs = trim(strtoupper($data['nama_mhs']));
    //$nia_username = str_replace(" ", "", $nia);
    mysqli_query($mysqli, "UPDATE alumni SET nama_mhs='$nama_mhs' WHERE nim='$nim'");
    echo $nim.'<br/>';
}
?>