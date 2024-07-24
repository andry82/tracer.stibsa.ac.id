<?php
session_start();
include 'config.php';
$nikeymhs = $_SESSION['nikey'];
$nimmhs = $_SESSION['nim'];
$f8 = addslashes($_POST['f8']);
$f21 = addslashes($_POST['f21']);
$f22 = addslashes($_POST['f22']);
$f23 = addslashes($_POST['f23']);
$f24 = addslashes($_POST['f24']);
$f25 = addslashes($_POST['f25']);
$f26 = addslashes($_POST['f26']);
$f27 = addslashes($_POST['f27']);
$f301 = addslashes($_POST['f301']);
$f302 = addslashes($_POST['f302']);
$f303 = addslashes($_POST['f303']);
$f401 = addslashes($_POST['f401']);
$f402 = addslashes($_POST['f402']);
$f403 = addslashes($_POST['f403']);
$f404 = addslashes($_POST['f404']);
$f405 = addslashes($_POST['f405']);
$f406 = addslashes($_POST['f406']);
$f407 = addslashes($_POST['f407']);
$f408 = addslashes($_POST['f408']);
$f409 = addslashes($_POST['f409']);
$f410 = addslashes($_POST['f410']);
$f411 = addslashes($_POST['f411']);
$f412 = addslashes($_POST['f412']);
$f413 = addslashes($_POST['f413']);
$f414 = addslashes($_POST['f414']);
$f415 = addslashes($_POST['f415']);
$f504 = addslashes($_POST['f504']);
$f502 = addslashes($_POST['f502']);
$f505 = addslashes($_POST['f505']);
$f5a1 = addslashes($_POST['f5a1']);
$f5a2 = addslashes($_POST['f5a2']);
$f1101 = addslashes($_POST['f1101']);
$f5b = addslashes($_POST['f5b']);
$f5d = addslashes($_POST['f5d']);
$f6 = addslashes($_POST['f6']);
$f7 = addslashes($_POST['f7']);
$f7a = addslashes($_POST['f7a']);
$f1201 = addslashes($_POST['f1201']);
$f14 = addslashes($_POST['f14']);
$f15 = addslashes($_POST['f15']);
$f1001 = addslashes($_POST['f1001']);
$f1002 = addslashes($_POST['f1002']);
$f1601 = addslashes($_POST['f1601']);
$f1602 = addslashes($_POST['f1602']);
$f1603 = addslashes($_POST['f1603']);
$f1604 = addslashes($_POST['f1604']);
$f1605 = addslashes($_POST['f1605']);
$f1606 = addslashes($_POST['f1606']);
$f1607 = addslashes($_POST['f1607']);
$f1608 = addslashes($_POST['f1608']);
$f1609 = addslashes($_POST['f1609']);
$f1610 = addslashes($_POST['f1610']);
$f1611 = addslashes($_POST['f1611']);
$f1612 = addslashes($_POST['f1612']);
$f1613 = addslashes($_POST['f1613']);
$f1614 = addslashes($_POST['f1614']);
$f1761 = addslashes($_POST['f1761']);
$f1762 = addslashes($_POST['f1762']);
$f1763 = addslashes($_POST['f1763']);
$f1764 = addslashes($_POST['f1764']);
$f1765 = addslashes($_POST['f1765']);
$f1766 = addslashes($_POST['f1766']);
$f1767 = addslashes($_POST['f1767']);
$f1768 = addslashes($_POST['f1768']);
$f1769 = addslashes($_POST['f1769']);
$f1770 = addslashes($_POST['f1770']);
$f1771 = addslashes($_POST['f1771']);
$f1772 = addslashes($_POST['f1772']);
$f1773 = addslashes($_POST['f1773']);
$f1774 = addslashes($_POST['f1774']);
if ($f1101 == 5) {
    $f1102 = addslashes($_POST['f1102']);
} elseif ($f1101 != 5) {
    $f1102 = "";
}
if ($f8 == 3) {
    $f5c = addslashes($_POST['f5c']);
} elseif ($f8 != 3) {
    $f5c = "";
}
if ($f1201 == 7) {
    $f1202 = addslashes($_POST['f1202']);
} elseif ($f1201 != 7) {
    $f1202 = "";
}
if ($f415 == 1) {
    $f416 = addslashes($_POST['f416']);
} elseif ($f1201 != 7) {
    $f416 = "";
}
if ($f1001 == 5) {
    $f1002 = addslashes($_POST['f1002']);
} elseif ($f1001 != 5) {
    $f1002 = "";
}
if ($f301 == 1) {
    $f302 = addslashes($_POST['f302']);
    $f303 = "0";
} elseif ($f301 == 2) {
    $f303 = addslashes($_POST['f303']);
    $f302 = "0";
} elseif ($f301 == 3) {
    $f302 = "0";
    $f303 = "0";
}
if ($f8 == 4) {
    $f18a = addslashes($_POST['f18a']);
    $f18b = addslashes($_POST['f18b']);
    $f18c = addslashes($_POST['f18c']);
    $f18d = addslashes($_POST['f18d']);
} elseif ($f8 != 4) {
    $f18a = "";
    $f18b = "";
    $f18c = "";
    $f18d = "";
}
if ($f1613 == 13) {
    $f1614 = addslashes($_POST['f1614']);
} elseif ($f1613 == 0) {
    $f1614 = "";
}
$result = mysqli_query($mysqli, "UPDATE kuisioner SET f8='$f8', f21='$f21', f22='$f22', f23='$f23', f24='$f24', f25='$f25', f26='$f26', f27='$f27', f301='$f301', f302='$f302', f303='$f303', f401='$f401', f402='$f402', f403='$f403', f404='$f404', f405='$f405', f406='$f406', f407='$f407', f408='$f408', f409='$f409', f410='$f410', f411='$f411', f412='$f412', f413='$f413', f414='$f414', f415='$f415', f416='$f416', f504='$f504',f502='$f502',f505='$f505',f5a1='$f5a1',f5a2='$f5a2', f6='$f6', f7='$f7', f7a='$f7a', f1001='$f1001', f1002='$f1002', f1101='$f1101', f1101='$f1101', f1102='$f1102', f5b='$f5b', f5c='$f5c', f5d='$f5d', f18a='$f18a', f18b='$f18b', f18c='$f18c', f18d='$f18d', f1201='$f1201', f1202='$f1202', f14='$f14', f15='$f15', f1601='$f1601', f1602='$f1602', f1603='$f1603', f1604='$f1604', f1605='$f1605', f1606='$f1606', f1607='$f1607', f1608='$f1608', f1609='$f1609', f1610='$f1610', f1611='$f1611', f1612='$f1612', f1613='$f1613', f1614='$f1614',f1761='$f1761', f1762='$f1762', f1763='$f1763', f1764='$f1764', f1765='$f1765', f1766='$f1766', f1767='$f1767', f1768='$f1768', f1769='$f1769', f1770='$f1770', f1771='$f1771', f1772='$f1772', f1773='$f1773', f1774='$f1774', status='1' WHERE nim='$nimmhs' AND nikey='$nikeymhs'");
$_SESSION['pesan'] = "SELAMAT, KUISIONER Anda Telah berhasil di simpan !!!";
header("location: kuisioner.php");
?>