<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>VALIDASI TUGAS AKHIR | Administrator Sistem Informasi Tugas Akhir Mahasiswa - AMA YPK Yogyakarta</title>

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
    if ($_SESSION['level'] == "") {
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
            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header"><i class="fa fa-book fa-fw"></i> DAFTAR TUGAS AKHIR</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                $aturan = mysqli_query($mysqli, "select * from config");
                $dataaturan = mysqli_fetch_array($aturan);
                $tahun = $dataaturan['tahun'];
                $ta = substr($tahun, 0, 4);
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>NAMA LENGKAP</th>
                                    <th>JUDUL</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $res = mysqli_query($mysqli, "SELECT * FROM ta t, msmhs m, upload_ta u WHERE u.nim=t.nim AND u.nim=m.NIMHSMSMHS");
                                while ($d = mysqli_fetch_array($res)) {
                                    $nim = $d['nim'];
                                    $nama = $d['NMMHSMSMHS'];
                                    $judul1 = $d['judul1'];
                                    $judul2 = $d['judul2'];
                                    $judul3 = $d['judul3'];
                                    $status = $d['status'];
                                    $status_ta = $d['status_ta'];
                                    ?>
                                    <tr>
                                        <td class="col-lg-1"><?php echo $nim; ?></td>
                                        <td class="col-lg-2"><?php echo $nama; ?></td>
                                        <td class="col-lg-5">
                                            <?php if ($status == '1') { ?>
                                                <?php echo strtoupper($judul1); ?>
                                            <?php } elseif ($status == '2') { ?>
                                                <?php echo strtoupper($judul2); ?>
                                            <?php } elseif ($status == '3') { ?>
                                                <?php echo strtoupper($judul3); ?>
                                            <?php } ?>
                                        </td>
                                        <?php if ($status_ta == '1') { ?>
                                           <td class="col-lg-2"><a href="validasi_tugas_akhir.php?nim=<?php echo $nim ?>"><span class="label label-success">SUDAH VALID</span></a></td>
                                        <?php } elseif ($status_ta == '0') { ?>
                                            <td class="col-lg-2"><a href="validasi_tugas_akhir.php?nim=<?php echo $nim ?>"><span class="label label-default">BELUN VALID</span></a></td>
                                        <?php } ?>
                                      </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <br />
                        <br />
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
                responsive: true,
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
        </script>
    </body>
</html>
