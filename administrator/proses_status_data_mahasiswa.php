<?php
include '../config.php';
$nim = $_GET['nim'];
$tanggal = date('d-m-Y H:i:s');
if($_GET['status_data'] == '1'){
    mysqli_query($mysqli, "UPDATE msmhs SET tgl_update='$tanggal' WHERE NIMHSMSMHS='$nim'");
}elseif($_GET['status_data'] == '2'){
    mysqli_query($mysqli, "UPDATE msmhs SET tgl_update='' WHERE NIMHSMSMHS='$nim'");
}

//$result = mysqli_query($mysqli, "UPDATE ta SET pembimbing_pkl='$pembimbing_pkl',pembimbing='$pembimbing',catatan='$catatan',status='$status' WHERE nim='$nim'");
//redirectig to the display page. In our case, it is index.php
header("location: detail_mahasiswa.php?nim=$nim");

