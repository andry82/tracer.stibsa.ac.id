<?php
include '../config.php';
$nim = $_GET['nim'];
if($_GET['status_akademik'] == '1'){
    mysqli_query($mysqli, "UPDATE msmhs SET STMHSMSMHS='A' WHERE NIMHSMSMHS='$nim'");
}elseif($_GET['status_akademik'] == '2'){
    mysqli_query($mysqli, "UPDATE msmhs SET STMHSMSMHS='L' WHERE NIMHSMSMHS='$nim'");
}elseif($_GET['status_akademik'] == '3'){
    mysqli_query($mysqli, "UPDATE msmhs SET STMHSMSMHS='K' WHERE NIMHSMSMHS='$nim'");
}

//$result = mysqli_query($mysqli, "UPDATE ta SET pembimbing_pkl='$pembimbing_pkl',pembimbing='$pembimbing',catatan='$catatan',status='$status' WHERE nim='$nim'");
//redirectig to the display page. In our case, it is index.php
header("location: detail_mahasiswa.php?nim=$nim");

