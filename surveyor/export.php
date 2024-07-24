<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel"); 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=daftar-judul-ta.xls");
?>
 <table width="100%" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>NIM</th>
            <th>NAMA LENGKAP</th>
            <th>KELAS</th>
            <th>KONSENTRASI</th>
            <th>JUDUL DI SETUJUI</th>
            <th>PEMB PKL</th>
            <th>PEMB TA</th>
        </tr>
    </thead>
    <tbody>
        <?php
        session_start();
        if ($_SESSION['level'] == "") {
            header("location:login.php");
        }
        include '../config.php';
        $data = mysqli_query($mysqli, "select * from ta t, msmhs m, kelasparalel_mhs k, konsentrasi ks WHERE m.NIMHSMSMHS=t.nim AND m.kdkonsen=ks.kdkonsen AND k.nimhs=t.nim AND t.tahun='$ta' AND t.status !='0' AND t.status !='4'");
        while ($d = mysqli_fetch_array($data)) {
            $nim = $d['nim'];
            $nama = $d['NMMHSMSMHS'];
            $kelas = $d['nmkelas'];
            $konsentrasi = $d['nmkonsen'];
            $judul1 = $d['judul1'];
            $judul2 = $d['judul2'];
            $judul3 = $d['judul3'];
            $status = $d['status'];
            $pembimbing_pkl = $d['pembimbing_pkl'];
            $pembimbing = $d['pembimbing'];
            $catatan = $d['catatan'];
            ?>
            <tr>
                <td><?php echo $nim; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $kelas; ?></td>
                <td><?php echo strtoupper($konsentrasi); ?></td>
                <td>
                    <?php
                    if ($status == '1') {
                        echo strtoupper($judul1);
                    } elseif ($status == '2') {
                        echo strtoupper($judul2);
                    } elseif ($status == '3') {
                        echo strtoupper($judul3);
                    }
                    ?>
                </td>
                <td><?php echo $pembimbing_pkl; ?></td>
                <td> 
                    <?php if ($status == '0' or $status == '4') { ?>
                        -
                    <?php } else { ?>
                        <?php echo $pembimbing; ?>
                    <?php } ?>
                </td>
            </tr>

            <?php
        }
        ?>
    </tbody>
</table>