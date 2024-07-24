<?php
$getfile = file_get_contents('' . $akademik_url . '/api/alumni.php?nim=' . $nim . '');
$jsonfile = json_decode($getfile, true);
$status = $jsonfile['status'];
foreach ($jsonfile['data'] as $row) {
    $nim = $row['NIMHSMSMHS'];
    $nama = addslashes($row['NMMHSMSMHS']);
    $tahun_masuk = $row['TAHUNMSMHS'];
    $tempat_lahir = $row['TPLHRMSMHS'];
    $tanggal_lahir = $row['TGLHRMSMHS'];
    $jenis_kelamin = $row['KDJEKMSMHS'];
    $telp = $row['TELP'];
    $email = $row['EMAIL'];
    $alamat_asal = $row['ALAMATLENGKAP'];
    $alamat_sekarang = $row['ALAMATYOGYA'];
    $tgl_lulus = $row['tanggal'];
    $prodi = $row['prodi_id'];
    $peminatan = $row['peminatan_id'];
    $judul_lta = $row['judul_lta'];
    $nia = $row['nia'];
    $nia_username = addslashes(str_replace(".", "",$row['nia']));
    $tahun_lulus = date('Y', strtotime($tgl_lulus));
    $nikey = md5($row['NIMHSMSMHS']);
    $result = mysqli_query($mysqli, "SELECT * FROM alumni WHERE nim='$nim'");
    $count_alumni = mysqli_num_rows($result);
    if ($count_alumni == 0 && $status == 1) {
        //echo "INSERT INTO alumni(nim,nia,nama_mhs,kelamin,tempat_lahir,tgl_lahir,alamat_asal,alamat,hp,email,nia_username,username,password,thn_masuk,thn_lulus,tgl_lulus,prodi_id,peminatan_id,judul_lta,nikey) VALUES('$nim','$nia','$nama','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat_asal','$alamat_sekarang','$telp','$email','$nia_username','$nim','$tahun_lulus','$tahun_masuk','$tahun_lulus','$tgl_lulus','$prodi','$peminatan','$judul_lta','$nikey')";
        mysqli_query($mysqli, "INSERT INTO alumni(nim,nia,nama_mhs,kelamin,tempat_lahir,tgl_lahir,alamat_asal,alamat,hp,email,nia_username,username,password,thn_masuk,thn_lulus,tgl_lulus,prodi_id,peminatan_id,judul_lta,nikey) VALUES('$nim','$nia','$nama','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat_asal','$alamat_sekarang','$telp','$email','$nia_username','$nim','$tahun_lulus','$tahun_masuk','$tahun_lulus','$tgl_lulus','$prodi','$peminatan','$judul_lta','$nikey')");
    }
}
    