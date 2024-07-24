<?php

session_start();
include 'config.php';
$surveyor_id = $_GET['id'];
$nim = $_SESSION['nim'];
$result = mysqli_query($mysqli, "SELECT * FROM surveyor s, pekerjaan p, msmhs m WHERE s.nim=p.nim AND s.nim=m.NIMHSMSMHS AND s.id='$surveyor_id' AND s.nim='$nim'");
$no = 1;
while ($data = mysqli_fetch_array($result)) {
    $nama_alumni = ucwords(strtolower($data['NMMHSMSMHS']));
    $nama_surveyor = $data['nama_surveyor'];
    $jabatan_surveyor = $data['jabatan_surveyor'];
    $instansi_surveyor = $data['instansi'];
    $alamat_instansi_surveyor = $data['alamat_instansi'];
    $no_telp_surveyor = $data['telp'];
    $no_faks_surveyor = $data['fax'];
    $departemen = $data['departemen'];
    $jabatan = $data['jabatan'];
    $jenis_kelamin = $data['KDJEKMSMHS'];
    $poin_1 = $data['poin_1'];
    $poin_2 = $data['poin_2'];
    $poin_3 = $data['poin_3'];
    $poin_4 = $data['poin_4'];
    $poin_5 = $data['poin_5'];
    $poin_6 = $data['poin_6'];
    $poin_7 = $data['poin_7'];
    $poin_8 = $data['poin_8'];
    $poin_9 = $data['poin_9'];
}
if($poin_1 =="Sangat Baik"){
    $poin_1_sb = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_1 =="Baik") {
    $poin_1_b = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_1 =="Cukup") {
    $poin_1_c = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_1 =="Kurang") {
    $poin_1_k = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}
if($poin_2 =="Sangat Baik"){
    $poin_2_sb = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_2 =="Baik") {
    $poin_2_b = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_2 =="Cukup") {
    $poin_2_c = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_2 =="Kurang") {
    $poin_2_k = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}
if($poin_3 =="Sangat Baik"){
    $poin_3_sb = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_3 =="Baik") {
    $poin_3_b = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_3 =="Cukup") {
    $poin_3_c = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_3 =="Kurang") {
    $poin_3_k = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}
if($poin_4 =="Sangat Baik"){
    $poin_4_sb = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_4 =="Baik") {
    $poin_4_b = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_4 =="Cukup") {
    $poin_4_c = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_4 =="Kurang") {
    $poin_4_k = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}
if($poin_5 =="Sangat Baik"){
    $poin_5_sb = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_5 =="Baik") {
    $poin_5_b = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_5 =="Cukup") {
    $poin_5_c = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_5 =="Kurang") {
    $poin_5_k = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}
if($poin_6 =="Sangat Baik"){
    $poin_6_sb = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_6 =="Baik") {
    $poin_6_b = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_6 =="Cukup") {
    $poin_6_c = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_6 =="Kurang") {
    $poin_6_k = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}
if($poin_7 =="Sangat Baik"){
    $poin_7_sb = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_7 =="Baik") {
    $poin_7_b = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_7 =="Cukup") {
    $poin_7_c = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_7 =="Kurang") {
    $poin_7_k = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}
if($poin_8 =="Sangat Baik"){
    $poin_8_sb = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_8 =="Baik") {
    $poin_8_b = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_8 =="Cukup") {
    $poin_8_c = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_8 =="Kurang") {
    $poin_8_k = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}
if($poin_9 =="Sangat Baik"){
    $poin_9_sb = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_9 =="Baik") {
    $poin_9_b = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_9 =="Cukup") {
    $poin_9_c = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}elseif ($poin_9 =="Kurang") {
    $poin_9_k = '<img src="images/centang.png" alt="Smiley face" height="24" width="24">';
}
require_once("dompdf/dompdf_config.inc.php"); //memanggil file dompdf_config.inc.php
$html = '<html><body>' .
        '<center><b>SURVEY KOMPETENSI LULUSAN</b></center>' .
        '<center><b>PROGRAM STUDI DIPLOMA 3 MANAJEMEN ADMINISTRASI</b></center>' .
        '<center><b>AKADEMI MANAJEMEN ADMINISTRASI (AMA) "YPK" YOGYAKARTA</b></center>' .
        '<br/>' .
        '<p><b>Yang terhormat user / pengguna lulusan,</b></p>' .
        '<p style="text-align:justify;">Program Studi Diploma 3 Manajemen Administrasi Akademi Manajemen Administrasi (AMA) "YPK" Yogyakarta senantiasa
berupaya meningkatkan mutu lulusan agar memiliki kompetensi yang handal sebagai profesional. Untuk itu mengharapkan umpan balik / feedback dari pengguna / user terkait kinerja <span style="text-size:20px">lulusan (alumni)</span> kami selama bekerja di
instansi / perusahaan Bapak/Ibu. Survey ini digunakan sebagai bahan evaluasi kinerja lulusan serta wujud nyata untuk
meningkatkan mutu lulusan.
</p>' .
        '<i><b>Mohon diisi dengan identitas yang lengkap dan sesuai</b></i><br/><br/>' .
        '<table width="100%" border="0">' .
        '<tr><td width="50%" colspan="2"><b>Identitas Karyawan Yang Dinilai</b></td><td width="50%" colspan="2"><b>Identitas Penilai Pada Instansi / Perusahaan :
</b></td></tr>' .
        '<tr><td width="30%">Nama</td><td width="70%">: '.$nama_alumni.'</td><td width="30%">Nama</td><td width="70%">: '.$nama_surveyor.'</td></tr>' .
        '<tr><td>Bagian/Departemen</td><td>: '.$departemen.'</td><td>Jabatan</td><td>: '.$jabatan_surveyor.'</td></tr>' .
        '<tr><td>Jabatan</td><td>: '.$jabatan.'</td><td>Instansi/Perusahaan</td><td>: '.$instansi_surveyor.'</td></tr>' .
        '<tr><td>Usia</td><td>: ...........</td><td>Alamat Instansi</td><td>: '.$alamat_instansi_surveyor.'</td></tr>' .
        '<tr><td>Jenis Kelamin</td><td>: '.$jenis_kelamin.'</td><td>No Telp</td><td>: '.$no_telp_surveyor.'</td></tr>' .
        '<tr><td>Lama Bekerja</td><td>: ...........</td><td>No Faks</td><td>: '.$no_faks_surveyor.'</td></tr>' .
        '</table>' .
        '<p style="text-align:justify;">Berikan tanggapan yang menyatakan tingkat kemampuan lulusan Program Studi
Manajemen Administrasi Akademi Manajemen Administrasi (AMA) "YPK" Yogyakarta pada berbagai aspek !</p>'.
        '<table width="100%" border="1">'.
        '<tr><td rowspan="2">No</td><td rowspan="2">Jenis Kemampuan</td><td colspan="4">Tanggapan Pihak Pengguna</td></tr>'.
        '<tr><td>Sangat Baik</td><td>Baik</td><td>Cukup</td><td>Kurang</td></tr>'.
        '<tr><td>1.</td><td>Integritas (etika dan moral) !</td><td align="center">'.$poin_1_sb.'</td><td align="center">'.$poin_1_b.'</td><td align="center">'.$poin_1_c.'</td><td align="center">'.$poin_1_k.'</td></tr>'.
        '<tr><td>2.</td><td>Keahlian berdasarkan bidang ilmu (profesionalisme) !</td><td align="center">'.$poin_2_sb.'</td><td align="center">'.$poin_2_b.'</td><td align="center">'.$poin_2_c.'</td><td align="center">'.$poin_2_k.'</td></tr>'.
        '<tr><td>3.</td><td>Kemampuan Bahasa Inggris !</td><td align="center">'.$poin_3_sb.'</td><td align="center">'.$poin_3_b.'</td><td align="center">'.$poin_3_c.'</td><td align="center">'.$poin_3_k.'</td></tr>'.
        '<tr><td>4.</td><td>Kemampuan Berkomunikasi !</td><td align="center">'.$poin_4_sb.'</td><td align="center">'.$poin_4_b.'</td><td align="center">'.$poin_4_c.'</td><td align="center">'.$poin_4_k.'</td></tr>'.
        '<tr><td>5.</td><td>Leadership/Kepemimpinan !</td><td align="center">'.$poin_5_sb.'</td><td align="center">'.$poin_5_b.'</td><td align="center">'.$poin_5_c.'</td><td align="center">'.$poin_5_k.'</td></tr>'.
        '<tr><td>6.</td><td>Penguasaan Teknologi Informasi !</td><td align="center">'.$poin_6_sb.'</td><td align="center">'.$poin_6_b.'</td><td align="center">'.$poin_6_c.'</td><td align="center">'.$poin_6_k.'</td></tr>'.
        '<tr><td>7.</td><td>Kerjasama tim !</td><td align="center">'.$poin_7_sb.'</td><td align="center">'.$poin_7_b.'</td><td align="center">'.$poin_7_c.'</td><td align="center">'.$poin_7_k.'</td></tr>'.
        '<tr><td>8.</td><td>Pengembangan diri !</td><td align="center">'.$poin_8_sb.'</td><td align="center">'.$poin_8_b.'</td><td align="center">'.$poin_8_c.'</td><td align="center">'.$poin_8_k.'</td></tr>'.
        '<tr><td>9.</td><td>Penilaian kualitas secara keseluruhan !</td><td align="center">'.$poin_9_sb.'</td><td align="center">'.$poin_9_b.'</td><td align="center">'.$poin_9_c.'</td><td align="center">'.$poin_9_k.'</td></tr>'.
        '</table>'.
        '</body></html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('hasil_survei_alumni.pdf', array("Attachment" => 0));
?>
