<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=daftar-pendaftaran-ta.xls");
include '../config.php';
$aturan = mysqli_query($mysqli, "select * from config");
$dataaturan = mysqli_fetch_array($aturan);
$tahun = $dataaturan['tahun'];
$ta = substr($tahun, 0, 4);
?>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>NIM</th>
            <th>NAMA LENGKAP</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = mysqli_query($mysqli, "select * from pendaftaran_ta t, msmhs m WHERE t.nim=m.NIMHSMSMHS AND t.tahun=$tahun");
        while ($d = mysqli_fetch_array($data)) {
            $nim = $d['nim'];
            $nama = $d['NMMHSMSMHS'];
            ?>

            <tr>
                <td><?php echo $nim; ?></td>
                <td><?php echo $nama; ?></td>
            </tr>

            <?php
        }
        ?>
    </tbody>
</table>