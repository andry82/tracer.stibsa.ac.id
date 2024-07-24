<?php
session_start();
include 'config.php';
$nikeymhs = addslashes($_POST['nikeymhs']);
$nimmhs = addslashes($_POST['nimmhs']);
$f8 = addslashes(isset($_POST['f8']) ? $_POST['f8']: "");
$f21 = addslashes(isset($_POST['f21']) ? $_POST['f21']: "");
$f22 = addslashes(isset($_POST['f22']) ? $_POST['f22']: "");
$f23 = addslashes(isset($_POST['f23']) ? $_POST['f23']: "");
$f24 = addslashes(isset($_POST['f24']) ? $_POST['f24']: "");
$f25 = addslashes(isset($_POST['f25']) ? $_POST['f25']: "");
$f26 = addslashes(isset($_POST['f26']) ? $_POST['f26']: "");
$f27 = addslashes(isset($_POST['f27']) ? $_POST['f27']: "");
$f301 = addslashes(isset($_POST['f301']) ? $_POST['f301']: "");
$f302 = addslashes(isset($_POST['f302']) ? $_POST['f302']: "");
$f303 = addslashes(isset($_POST['f303']) ? $_POST['f303']: "");
$f401 = addslashes(isset($_POST['f401']) ? $_POST['f401']: "");
$f402 = addslashes(isset($_POST['f402']) ? $_POST['f402']: "");
$f403 = addslashes(isset($_POST['f403']) ? $_POST['f403']: "");
$f404 = addslashes(isset($_POST['f404']) ? $_POST['f404']: "");
$f405 = addslashes(isset($_POST['f405']) ? $_POST['f405']: "");
$f406 = addslashes(isset($_POST['f406']) ? $_POST['f406']: "");
$f407 = addslashes(isset($_POST['f407']) ? $_POST['f407']: "");
$f408 = addslashes(isset($_POST['f408']) ? $_POST['f408']: "");
$f409 = addslashes(isset($_POST['f409']) ? $_POST['f409']: "");
$f410 = addslashes(isset($_POST['f410']) ? $_POST['f410']: "");
$f411 = addslashes(isset($_POST['f411']) ? $_POST['f411']: "");
$f412 = addslashes(isset($_POST['f412']) ? $_POST['f412']: "");
$f413 = addslashes(isset($_POST['f413']) ? $_POST['f413']: "");
$f414 = addslashes(isset($_POST['f414']) ? $_POST['f414']: "");
$f415 = addslashes(isset($_POST['f415']) ? $_POST['f415']: "");
$f502 = addslashes(isset($_POST['f502']) ? $_POST['f502']: "");
$f504 = addslashes(isset($_POST['f504']) ? $_POST['f504']: "");
$f505 = addslashes(isset($_POST['f505']) ? $_POST['f505']: "");
$f5a1 = addslashes(isset($_POST['f5a1']) ? $_POST['f5a1']: "");
$f5a2 = addslashes(isset($_POST['f5a2']) ? $_POST['f5a2']: "");
$f1101 = addslashes(isset($_POST['f1101']) ? $_POST['f1101']: "");
$f5b = addslashes(isset($_POST['f5b']) ? $_POST['f5b']: "");
$f5d = addslashes(isset($_POST['f5d']) ? $_POST['f5d']: "");
$f6 = addslashes(isset($_POST['f6']) ? $_POST['f6']: "");
$f7 = addslashes(isset($_POST['f7']) ? $_POST['f7']: "");
$f7a = addslashes(isset($_POST['f7a']) ? $_POST['f7a']: "");
$f1201 = addslashes(isset($_POST['f1201']) ? $_POST['f1201']: "");
$f14 = addslashes(isset($_POST['f14']) ? $_POST['f14']: "");
$f15 = addslashes(isset($_POST['f15']) ? $_POST['f15']: "");
$f1001 = addslashes(isset($_POST['f1001']) ? $_POST['f1001']: "");
$f1002 = addslashes(isset($_POST['f1002']) ? $_POST['f1002']: "");
$f1601 = addslashes(isset($_POST['f1601']) ? $_POST['f1601']: "");
$f1602 = addslashes(isset($_POST['f1602']) ? $_POST['f1602']: "");
$f1603 = addslashes(isset($_POST['f1603']) ? $_POST['f1603']: "");
$f1604 = addslashes(isset($_POST['f1604']) ? $_POST['f1604']: "");
$f1605 = addslashes(isset($_POST['f1605']) ? $_POST['f1605']: "");
$f1606 = addslashes(isset($_POST['f1606']) ? $_POST['f1606']: "");
$f1607 = addslashes(isset($_POST['f1607']) ? $_POST['f1607']: "");
$f1608 = addslashes(isset($_POST['f1608']) ? $_POST['f1608']: "");
$f1609 = addslashes(isset($_POST['f1609']) ? $_POST['f1609']: "");
$f1610 = addslashes(isset($_POST['f1610']) ? $_POST['f1610']: "");
$f1611 = addslashes(isset($_POST['f1611']) ? $_POST['f1611']: "");
$f1612 = addslashes(isset($_POST['f1612']) ? $_POST['f1612']: "");
$f1613 = addslashes(isset($_POST['f1613']) ? $_POST['f1613']: "");
$f1614 = addslashes(isset($_POST['f1614']) ? $_POST['f1614']: "");
$f1761 = addslashes(isset($_POST['f1761']) ? $_POST['f1761']: "");
$f1762 = addslashes(isset($_POST['f1762']) ? $_POST['f1602']: "");
$f1763 = addslashes(isset($_POST['f1763']) ? $_POST['f1763']: "");
$f1764 = addslashes(isset($_POST['f1764']) ? $_POST['f1764']: "");
$f1765 = addslashes(isset($_POST['f1765']) ? $_POST['f1765']: "");
$f1766 = addslashes(isset($_POST['f1766']) ? $_POST['f1766']: "");
$f1767 = addslashes(isset($_POST['f1767']) ? $_POST['f1767']: "");
$f1768 = addslashes(isset($_POST['f1768']) ? $_POST['f1768']: "");
$f1769 = addslashes(isset($_POST['f1769']) ? $_POST['f1769']: "");
$f1770 = addslashes(isset($_POST['f1770']) ? $_POST['f1770']: "");
$f1771 = addslashes(isset($_POST['f1771']) ? $_POST['f1771']: "");
$f1772 = addslashes(isset($_POST['f1772']) ? $_POST['f1772']: "");
$f1773 = addslashes(isset($_POST['f1773']) ? $_POST['f1773']: "");
$f1774 = addslashes(isset($_POST['f1774']) ? $_POST['f1774']: "");

if ($f1101 == 5) {
    $f1102 = addslashes(isset($_POST['f1102']) ? $_POST['f1102']: "");
} elseif ($f1101 != 5) {
    $f1102 = "";
}
if ($f8 == 3) {
    $f5c = addslashes(isset($_POST['f5c']) ? $_POST['f5c']: "");
} elseif ($f8 != 3) {
    $f5c = "";
}
if ($f1201 == 7) {
    $f1202 = addslashes(isset($_POST['f1202']) ? $_POST['f1202']: "");
} elseif ($f1201 != 7) {
    $f1202 = "";
}
if ($f415 == 1) {
    $f416 = addslashes(isset($_POST['f416']) ? $_POST['f416']: "");
} elseif ($f1201 != 7) {
    $f416 = "";
}
if ($f1001 == 5) {
    $f1002 = addslashes(isset($_POST['f1002']) ? $_POST['f1002']: "");
} elseif ($f1001 != 5) {
    $f1002 = "";
}
if ($f301 == 1) {
    $f302 = addslashes(isset($_POST['f302']) ? $_POST['f302']: "");
    $f303 = "0";
} elseif ($f301 == 2) {
    $f303 = addslashes(isset($_POST['f303']) ? $_POST['f303']: "");
    $f302 = "0";
} elseif ($f301 == 3) {
    $f302 = "0";
    $f303 = "0";
}
if ($f8 == 4) {
    $f18a = addslashes(isset($_POST['f18a']) ? $_POST['f18a']: "");
    $f18b = addslashes(isset($_POST['f18b']) ? $_POST['f18b']: "");
    $f18c = addslashes(isset($_POST['f18c']) ? $_POST['f18c']: "");
    $f18d = addslashes(isset($_POST['f18d']) ? $_POST['f18d']: "");
} elseif ($f8 != 4) {
    $f18a = "";
    $f18b = "";
    $f18c = "";
    $f18d = "";
}
if ($f1613 == 13) {
    $f1614 = addslashes(isset($_POST['f1614']) ? $_POST['f1614']: "");
} elseif ($f1613 == 0) {
    $f1614 = "";
}
$result = mysqli_query($mysqli, "UPDATE kuisioner SET f8='$f8', f21='$f21', f22='$f22', f23='$f23', f24='$f24', f25='$f25', f26='$f26', f27='$f27', f301='$f301', f302='$f302', f303='$f303', f401='$f401', f402='$f402', f403='$f403', f404='$f404', f405='$f405', f406='$f406', f407='$f407', f408='$f408', f409='$f409', f410='$f410', f411='$f411', f412='$f412', f413='$f413', f414='$f414', f415='$f415', f416='$f416', f504='$f504',f502='$f502',f505='$f505',f5a1='$f5a1',f5a2='$f5a2', f6='$f6', f7='$f7', f7a='$f7a', f1001='$f1001', f1002='$f1002', f1101='$f1101', f1101='$f1101', f1102='$f1102', f5b='$f5b', f5c='$f5c', f5d='$f5d', f18a='$f18a', f18b='$f18b', f18c='$f18c', f18d='$f18d', f1201='$f1201', f1202='$f1202', f14='$f14', f15='$f15', f1601='$f1601', f1602='$f1602', f1603='$f1603', f1604='$f1604', f1605='$f1605', f1606='$f1606', f1607='$f1607', f1608='$f1608', f1609='$f1609', f1610='$f1610', f1611='$f1611', f1612='$f1612', f1613='$f1613', f1614='$f1614',f1761='$f1761', f1762='$f1762', f1763='$f1763', f1764='$f1764', f1765='$f1765', f1766='$f1766', f1767='$f1767', f1768='$f1768', f1769='$f1769', f1770='$f1770', f1771='$f1771', f1772='$f1772', f1773='$f1773', f1774='$f1774', status='1' WHERE nikey='$nikeymhs'");
$instansi = mysqli_real_escape_string($mysqli, $_POST['instansi']);
$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
$jabatan = mysqli_real_escape_string($mysqli, $_POST['jabatan']);
$medsos = mysqli_real_escape_string($mysqli, $_POST['medsos']);
$tanggal_masuk = mysqli_real_escape_string($mysqli, $_POST['tanggal_masuk']);
$tahun_masuk = date('Y', date(strtotime($tanggal_masuk)));
$tgl_masuk = date('Y-m-d', date(strtotime($tanggal_masuk)));
$jenis_perusahaan = mysqli_real_escape_string($mysqli, $_POST['jenis_perusahaan']);
mysqli_query($mysqli, "UPDATE alumni_kerja SET nama_ip='$instansi', alamat='$alamat', tgl_masuk='$tgl_masuk', thn_masuk='$tahun_masuk', jabatan='$jabatan', medsos='$medsos', jenis_instansi='$jenis_perusahaan' WHERE nim='$nimmhs'");
$_SESSION['pesan'] = "SELAMAT, KUISIONER Anda Telah berhasil di simpan !!!";
header("location: public_formulir.php?nim=$nimmhs&key=$nikeymhs");
?>