<?php
  include 'config.php';
  $id = $_GET['pekerjaan_id'];
  mysqli_query($mysqli, "DELETE FROM alumni_kerja WHERE id='$id'");
  header("location: historis_pekerjaan.php");
?>

