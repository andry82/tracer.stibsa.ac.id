<?php
include '../config.php';
$nik = $_POST['NIKMSMHS'];
$nim = $_POST['NIMHSMSMHS'];
$nama = $_POST['NMMHSMSMHS'];
$tplahir = $_POST['TPLHRMSMHS'];
$tgllahir = date('Y-m-d', strtotime($_POST['TGLHRMSMHS']));
$agama = $_POST['AGAMA'];
$alamat_sekarang = $_POST['ALAMATYOGYA'];
$alamat_lengkap = $_POST['ALAMATLENGKAP'];
$propinsi = $_POST['ASSMAMSMHS'];
$jenis_kelamin = $_POST['KDJEKMSMHS'];
$telp = $_POST['TELP'];
$email = $_POST['EMAIL'];
$keahlian = $_POST['KEAHLIAN'];
$profesi = $_POST['PROFESI'];
$orang_tua = $_POST['NAMAORTU'];
$telp_tua = $_POST['TELPORTUWALI'];
$alamat_tua = $_POST['ALAMATORTUWALI'];
//Upload KK/KTP
$ktp_kk = $_FILES["ktp_kk"]["name"];
$nama_sementara = $_FILES['ktp_kk']['tmp_name'];
$file_basename = substr($ktp_kk, 0, strripos($ktp_kk, '.')); // get file extention
$file_ext = substr($ktp_kk, strripos($ktp_kk, '.')); // get file name
$newfilename = $nim.$file_ext;
$dirUpload = "../document/ktp/";
$targetFilePath = $dirUpload . $ktp_kk;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$allowTypes = array('jpg', 'jpeg');
if (in_array($fileType, $allowTypes)) {
  $terupload = move_uploaded_file($nama_sementara, $dirUpload.$newfilename);  
    $result = mysqli_query($mysqli, "UPDATE msmhs SET NIKMSMHS='$nik', NMMHSMSMHS='$nama', TPLHRMSMHS='$tplahir', TELP='$telp', TGLHRMSMHS='$tgllahir',KDJEKMSMHS='$jenis_kelamin',ALAMATLENGKAP='$alamat_lengkap',ASSMAMSMHS='$propinsi', AGAMA='$agama', ALAMATYOGYA='$alamat_sekarang', EMAIL='$email', keahlian='$keahlian', profesi='$profesi', ktpkk='$newfilename', NAMAORTUWALI='$orang_tua', TELPORTUWALI='$telp_tua', ALAMATORTUWALI='$alamat_tua' WHERE NIMHSMSMHS='$nim'");
} else {
    $result = mysqli_query($mysqli, "UPDATE msmhs SET NIKMSMHS='$nik', NMMHSMSMHS='$nama', TPLHRMSMHS='$tplahir', TELP='$telp', TGLHRMSMHS='$tgllahir',KDJEKMSMHS='$jenis_kelamin',ALAMATLENGKAP='$alamat_lengkap',ASSMAMSMHS='$propinsi', AGAMA='$agama', ALAMATYOGYA='$alamat_sekarang', EMAIL='$email', keahlian='$keahlian', profesi='$profesi', NAMAORTUWALI='$orang_tua', TELPORTUWALI='$telp_tua', ALAMATORTUWALI='$alamat_tua' WHERE NIMHSMSMHS='$nim'");

}
//redirectig to the display page. In our case, it is index.php
header("Location: mahasiswa.php");
?>
