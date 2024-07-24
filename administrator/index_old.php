<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HALAMAN DEPAN | Administrator Verifikasi Data Mahasiswa - AMA YPK Yogyakarta</title>

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- DataTables CSS -->
        <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    </head>
    <?php
    session_start();
    include('bar128.php');
    include '../config.php';

// cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] != "administrator") {
        header("location:login.php");
    }
    ?>
    <script type='text/javascript'>
        //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
        function tampilkanwaktu() {
            //buat object date berdasarkan waktu saat ini
            var waktu = new Date();
            //ambil nilai jam, 
            //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
            var sh = waktu.getHours() + "";
            //ambil nilai menit
            var sm = waktu.getMinutes() + "";
            //ambil nilai detik
            var ss = waktu.getSeconds() + "";
            //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
            document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
        }
    </script>
    <body onload="tampilkanwaktu(); setInterval('tampilkanwaktu()', 1000);">	
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <?php include 'sidebar_menu.php'; ?>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header"><i class="fa fa-home fa-fw"></i> HALAMAN DEPAN</h4>
                    </div>
                    <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><center>NO</center></th>
                            <th><center>TAHUN MASUK</center></th>
                            <th><center>JUMLAH ALUMNI</center></th>
                            <th><center>ALUMNI BEKERJA</center></th>
                            <th><center>ALUMNI BELUM BEKERJA</center></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($mysqli, "SELECT * FROM angkatan ORDER BY angkatan DESC");
                                $no = 1;
                                $th = 0;
                                while ($data = mysqli_fetch_array($result)) {
                                    $angkatan = $data['angkatan']; ?>
                                        <tr>
                                            <td><center><?php echo $no++; ?></center></td>
                                    <td><center><?php echo $angkatan; ?></center></td>
                                    <?php
                                    $alumni = mysqli_query($mysqli, "SELECT * FROM alumni WHERE thn_masuk=$angkatan");
                                    $total_alumni = mysqli_num_rows($alumni)                                            
                                    ?>
                                    <td><center><?php echo $total_alumni; ?></center></td>
                                    <?php
                                    $bekerja = mysqli_query($mysqli, "SELECT DISTINCT(a.nim) FROM alumni a, alumni_kerja ak WHERE a.nim=ak.nim AND a.thn_masuk=$angkatan");
                                    $sudah_bekerja = mysqli_num_rows($bekerja);
                                    ?>
                                    <td><center><?php echo $sudah_bekerja; ?></center></td>
                                    <td><center><?php echo $total_alumni - $sudah_bekerja; ?></center></td>
                                    </tr>
                            <?php }
                            ?>
                            <tr>
                                <td colspan="2"><center>JUMLAH TOTAL</center></td>
                            <td><center><?php echo $sum; ?></center></td>
                            <td></td>
                            <td></td>
                            </tr>
                            </tbody>
                        </table>                        
                    </div>
                    <div class="col-lg-12">  
                        <?php
                        $pekerjaan = mysqli_query($mysqli, "SELECT * FROM pekerjaan");
                        $countpekerjaan = mysqli_num_rows($pekerjaan);
                        $surveyor = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1");
                        $countsurveyor = mysqli_num_rows($surveyor);
                        $total = ($countsurveyor / $countpekerjaan) * 100;

                        $poin_1_kurang = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_1='Kurang'");
                        $count_poin_1_kurang = mysqli_num_rows($poin_1_kurang);
                        $nilai_1_1 = ($count_poin_1_kurang / $countsurveyor) * 100;

                        $poin_1_cukup = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_1='Cukup'");
                        $count_poin_1_cukup = mysqli_num_rows($poin_1_cukup);
                        $nilai_1_2 = ($count_poin_1_cukup / $countsurveyor) * 100;

                        $poin_1_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_1='Baik'");
                        $count_poin_1_baik = mysqli_num_rows($poin_1_baik);
                        $nilai_1_3 = ($count_poin_1_baik / $countsurveyor) * 100;

                        $poin_1_sangat_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_1='Sangat Baik'");
                        $count_poin_1_sangat_baik = mysqli_num_rows($poin_1_sangat_baik);
                        $nilai_1_4 = ($count_poin_1_sangat_baik / $countsurveyor) * 100;

                        $poin_2_kurang = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_2='Kurang'");
                        $count_poin_2_kurang = mysqli_num_rows($poin_2_kurang);
                        $nilai_2_1 = ($count_poin_2_kurang / $countsurveyor) * 100;

                        $poin_2_cukup = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_2='Cukup'");
                        $count_poin_2_cukup = mysqli_num_rows($poin_2_cukup);
                        $nilai_2_2 = ($count_poin_2_cukup / $countsurveyor) * 100;

                        $poin_2_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_2='Baik'");
                        $count_poin_2_baik = mysqli_num_rows($poin_2_baik);
                        $nilai_2_3 = ($count_poin_2_baik / $countsurveyor) * 100;

                        $poin_2_sangat_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_2='Sangat Baik'");
                        $count_poin_2_sangat_baik = mysqli_num_rows($poin_2_sangat_baik);
                        $nilai_2_4 = ($count_poin_2_sangat_baik / $countsurveyor) * 100;

                        $poin_3_kurang = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_3='Kurang'");
                        $count_poin_3_kurang = mysqli_num_rows($poin_3_kurang);
                        $nilai_3_1 = ($count_poin_3_kurang / $countsurveyor) * 100;

                        $poin_3_cukup = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_3='Cukup'");
                        $count_poin_3_cukup = mysqli_num_rows($poin_3_cukup);
                        $nilai_3_2 = ($count_poin_3_cukup / $countsurveyor) * 100;

                        $poin_3_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_3='Baik'");
                        $count_poin_3_baik = mysqli_num_rows($poin_3_baik);
                        $nilai_3_3 = ($count_poin_3_baik / $countsurveyor) * 100;

                        $poin_3_sangat_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_3='Sangat Baik'");
                        $count_poin_3_sangat_baik = mysqli_num_rows($poin_3_sangat_baik);
                        $nilai_3_4 = ($count_poin_3_sangat_baik / $countsurveyor) * 100;

                        $poin_4_kurang = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_4='Kurang'");
                        $count_poin_4_kurang = mysqli_num_rows($poin_4_kurang);
                        $nilai_4_1 = ($count_poin_3_kurang / $countsurveyor) * 100;

                        $poin_4_cukup = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_4='Cukup'");
                        $count_poin_4_cukup = mysqli_num_rows($poin_4_cukup);
                        $nilai_4_2 = ($count_poin_4_cukup / $countsurveyor) * 100;

                        $poin_4_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_4='Baik'");
                        $count_poin_4_baik = mysqli_num_rows($poin_4_baik);
                        $nilai_4_3 = ($count_poin_4_baik / $countsurveyor) * 100;

                        $poin_4_sangat_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_4='Sangat Baik'");
                        $count_poin_4_sangat_baik = mysqli_num_rows($poin_4_sangat_baik);
                        $nilai_4_4 = ($count_poin_4_sangat_baik / $countsurveyor) * 100;

                        $poin_5_kurang = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_5='Kurang'");
                        $count_poin_5_kurang = mysqli_num_rows($poin_5_kurang);
                        $nilai_5_1 = ($count_poin_5_kurang / $countsurveyor) * 100;

                        $poin_5_cukup = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_5='Cukup'");
                        $count_poin_5_cukup = mysqli_num_rows($poin_5_cukup);
                        $nilai_5_2 = ($count_poin_5_cukup / $countsurveyor) * 100;

                        $poin_5_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_5='Baik'");
                        $count_poin_5_baik = mysqli_num_rows($poin_5_baik);
                        $nilai_5_3 = ($count_poin_5_baik / $countsurveyor) * 100;

                        $poin_5_sangat_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_5='Sangat Baik'");
                        $count_poin_5_sangat_baik = mysqli_num_rows($poin_5_sangat_baik);
                        $nilai_5_4 = ($count_poin_5_sangat_baik / $countsurveyor) * 100;

                        $poin_6_kurang = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_6='Kurang'");
                        $count_poin_6_kurang = mysqli_num_rows($poin_6_kurang);
                        $nilai_6_1 = ($count_poin_6_kurang / $countsurveyor) * 100;

                        $poin_6_cukup = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_6='Cukup'");
                        $count_poin_6_cukup = mysqli_num_rows($poin_6_cukup);
                        $nilai_6_2 = ($count_poin_6_cukup / $countsurveyor) * 100;

                        $poin_6_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_6='Baik'");
                        $count_poin_6_baik = mysqli_num_rows($poin_6_baik);
                        $nilai_6_3 = ($count_poin_6_baik / $countsurveyor) * 100;

                        $poin_6_sangat_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_6='Sangat Baik'");
                        $count_poin_6_sangat_baik = mysqli_num_rows($poin_6_sangat_baik);
                        $nilai_6_4 = ($count_poin_6_sangat_baik / $countsurveyor) * 100;

                        $poin_7_kurang = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_7='Kurang'");
                        $count_poin_7_kurang = mysqli_num_rows($poin_7_kurang);
                        $nilai_7_1 = ($count_poin_7_kurang / $countsurveyor) * 100;

                        $poin_7_cukup = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_7='Cukup'");
                        $count_poin_7_cukup = mysqli_num_rows($poin_7_cukup);
                        $nilai_7_2 = ($count_poin_7_cukup / $countsurveyor) * 100;

                        $poin_7_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_7='Baik'");
                        $count_poin_7_baik = mysqli_num_rows($poin_7_baik);
                        $nilai_7_3 = ($count_poin_7_baik / $countsurveyor) * 100;

                        $poin_7_sangat_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_7='Sangat Baik'");
                        $count_poin_7_sangat_baik = mysqli_num_rows($poin_7_sangat_baik);
                        $nilai_7_4 = ($count_poin_7_sangat_baik / $countsurveyor) * 100;

                        $poin_8_kurang = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_8='Kurang'");
                        $count_poin_8_kurang = mysqli_num_rows($poin_8_kurang);
                        $nilai_8_1 = ($count_poin_8_kurang / $countsurveyor) * 100;

                        $poin_8_cukup = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_8='Cukup'");
                        $count_poin_8_cukup = mysqli_num_rows($poin_8_cukup);
                        $nilai_8_2 = ($count_poin_8_cukup / $countsurveyor) * 100;

                        $poin_8_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_8='Baik'");
                        $count_poin_8_baik = mysqli_num_rows($poin_8_baik);
                        $nilai_8_3 = ($count_poin_8_baik / $countsurveyor) * 100;

                        $poin_8_sangat_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_8='Sangat Baik'");
                        $count_poin_8_sangat_baik = mysqli_num_rows($poin_8_sangat_baik);
                        $nilai_8_4 = ($count_poin_8_sangat_baik / $countsurveyor) * 100;

                        $poin_9_kurang = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_9='Kurang'");
                        $count_poin_9_kurang = mysqli_num_rows($poin_9_kurang);
                        $nilai_9_1 = ($count_poin_9_kurang / $countsurveyor) * 100;

                        $poin_9_cukup = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_9='Cukup'");
                        $count_poin_9_cukup = mysqli_num_rows($poin_9_cukup);
                        $nilai_9_2 = ($count_poin_9_cukup / $countsurveyor) * 100;

                        $poin_9_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_9='Baik'");
                        $count_poin_9_baik = mysqli_num_rows($poin_9_baik);
                        $nilai_9_3 = ($count_poin_9_baik / $countsurveyor) * 100;

                        $poin_9_sangat_baik = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE status_survei=1 AND poin_9='Sangat Baik'");
                        $count_poin_9_sangat_baik = mysqli_num_rows($poin_9_sangat_baik);
                        $nilai_9_4 = ($count_poin_9_sangat_baik / $countsurveyor) * 100;
                        ?>
                    </div>
                    <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-lg-1 center">NO</th>
                                    <th class="col-lg-3 center-block">ITEM SURVEI</th>
                                    <th class="col-lg-2"><center>KURANG</center></th>
                            <th class="col-lg-2"><center>CUKUP</center></th>
                            <th class="col-lg-2"><center>BAIK</center></th>
                            <th class="col-lg-2"><center>SANGAT BAIK</center></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-lg-1">1.</td>
                                    <td class="col-lg-3">Integritas (Etika dan Moral) ! </td>
                                    <td class="col-lg-2"><center><?php echo number_format($nilai_1_1, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_1_2, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_1_3, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_1_4, 2); ?> %</center></td>
                            <tr>
                                <td class="col-lg-1">2.</td>
                                <td class="col-lg-3">Keahlian Berdasarkan Bidang Ilmu (Profesionalisme) ! </td>
                                <td class="col-lg-2"><center><?php echo number_format($nilai_2_1, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_2_2, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_2_3, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_2_4, 2); ?> %</center></td>
                            <tr>
                                <td class="col-lg-1">3.</td>
                                <td class="col-lg-3">Kemampuan Bahasa Inggris !</td>
                                <td class="col-lg-2"><center><?php echo number_format($nilai_3_1, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_3_2, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_3_3, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_3_4, 2); ?> %</center></td>
                            <tr>
                                <td class="col-lg-1">4.</td>
                                <td class="col-lg-3">Kemampuan Berkomunikasi !</td>
                                <td class="col-lg-2"><center><?php echo number_format($nilai_4_1, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_4_2, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_4_3, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_4_4, 2); ?> %</center></td>
                            <tr>
                                <td class="col-lg-1">5.</td>
                                <td class="col-lg-3">Leadership / Kepemimpinan !</td>
                                <td class="col-lg-2"><center><?php echo number_format($nilai_5_1, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_5_2, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_5_3, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_5_4, 2); ?> %</center></td>
                            <tr>
                                <td class="col-lg-1">6.</td>
                                <td class="col-lg-3">Penguasaan Teknologi Informasi !</td>
                                <td class="col-lg-2"><center><?php echo number_format($nilai_6_1, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_6_2, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_6_3, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_6_4, 2); ?> %</center></td>
                            <tr>
                                <td class="col-lg-1">7.</td>
                                <td class="col-lg-3">Kerjasama Tim !</td>
                                <td class="col-lg-2"><center><?php echo number_format($nilai_7_1, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_7_2, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_7_3, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_7_4, 2); ?> %</center></td>
                            <tr>
                                <td class="col-lg-1">8.</td>
                                <td class="col-lg-3">Pengembangan Diri !</td>
                                <td class="col-lg-2"><center><?php echo number_format($nilai_8_1, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_8_2, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_8_3, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_8_4, 2); ?> %</center></td>
                            <tr>
                                <td class="col-lg-1">9.</td>
                                <td class="col-lg-3">Penilaian Kualitas secara Keseluruhan !</td>
                                <td class="col-lg-2"><center><?php echo number_format($nilai_9_1, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_9_2, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_9_3, 2); ?> %</center></td>
                            <td class="col-lg-2"><center><?php echo number_format($nilai_9_4, 2); ?> %</center></td>
                            </tr>
                            </tbody>
                        </table>                              
                        <b>INFORMASI : </b><br/>
                        Jumlah Instansi : <?php echo $countpekerjaan; ?> Instansi<br/>
                        Jumlah Survei : <?php echo $countsurveyor; ?> Instansi<br/> 
                        </b><br/>
                    </div>
                    <div class="col-lg-12">
                    </div>
                </div>

            </div>            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../vendor/metisMenu/metisMenu.min.js"></script>
        <script src="../vendor/raphael/raphael.min.js"></script>
        <script src="../vendor/morrisjs/morris.min.js"></script>
        <script src="../dist/js/sb-admin-2.js"></script>
        <!-- DataTables JavaScript -->
        <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
        <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
        </script>
    </body>
</html>