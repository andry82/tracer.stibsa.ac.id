<?php
include 'config.php';
$nim = $_POST['nim'];
$pawd = $_POST['password'];
$pawdlg = $_POST['password_lagi'];
if (empty($pawd) || empty($pawdlg)) {
    echo "Tidak Boleh Kosong";
} elseif (($pawd) != ($pawdlg)) {
    echo "Password Baru dan Password Baru Lagi tidak sama";
} else {
    $query = "UPDATE msmhs SET login_pass='$pawd' WHERE NIMHSMSMHS='$nim'";
    $sql = mysqli_query($mysqli, $query);
    if ($sql) {
        echo "Password berhasil di Update";
    }
}
header("Location: ganti_password.php");
