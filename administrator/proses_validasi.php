<?php
include '../config.php';
$nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
if($_POST['status'] == '4'){
   $pembimbing = '';
}else{
   $pembimbing = mysqli_real_escape_string($mysqli, $_POST['pembimbing']);
}
$pembimbing_pkl = mysqli_real_escape_string($mysqli, $_POST['pembimbing_pkl']);
$catatan = mysqli_real_escape_string($mysqli, $_POST['catatan']);
$status = mysqli_real_escape_string($mysqli, $_POST['status']);
$result = mysqli_query($mysqli, "UPDATE ta SET pembimbing_pkl='$pembimbing_pkl',pembimbing='$pembimbing',catatan='$catatan',status='$status' WHERE nim='$nim'");

    //redirectig to the display page. In our case, it is index.php
   header("location:belum_disetujui.php");
