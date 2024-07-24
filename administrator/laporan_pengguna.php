<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LAPORAN PENGGUNA | SISTEM INFORMASI TRACER STUDY - SEKOLAH TINGGI ILMU BISNIS KUMALA NUSA</title>

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
    include '../config.php';

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] != "tracer") {
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
                        <h4 class="page-header"><i class="fa fa-list fa-fw"></i> LAPORAN PENGGUNA</h4>
                        <!--<div style="width: 800px;margin: 0px auto;">
                            <canvas id="myChart"></canvas>
                        </div>
                        <br/>-->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">                    
                    <div class="col-lg-12">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th style="text-align: center">TAHUN MASUK</th>
                                    <th style="text-align: center">JUMLAH ALUMNI</th>
                                    <th style="text-align: center">ALUMNI BEKERJA</th>
                                    <th style="text-align: center">JUMLAH PENGGUNA</th>
                                    <th style="text-align: center">DETAIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($mysqli, "SELECT DISTINCT(m.TAHUNMSMHS) FROM msmhs m, transkrip t, kuisioner k WHERE k.nim=t.nim AND t.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND k.status='1' ORDER BY m.TAHUNMSMHS DESC");
                                $no = 1;
                                while ($data = mysqli_fetch_array($result)) {
                                    $angkatan = $data['TAHUNMSMHS'];
                                    $alumni = mysqli_query($mysqli, "SELECT * FROM msmhs m, transkrip t WHERE t.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.TAHUNMSMHS=$angkatan");
                                    $total_alumni = mysqli_num_rows($alumni); 
                                    $bekerja = mysqli_query($mysqli, "SELECT * FROM msmhs m, alumni_bekerja ab WHERE ab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.TAHUNMSMHS=$angkatan");
                                    $sudah_bekerja = mysqli_num_rows($bekerja);
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo $angkatan; ?></td>
                                        <td style="text-align: center"><?php echo $total_alumni; ?> ALUMNI</td>
                                        <td style="text-align: center"><?php echo $sudah_bekerja; ?> ALUMNI</td>
                                        <td style="text-align: center"><?php echo $sudah_bekerja; ?> PENGGUNA</td>
                                        <td style="text-align: center"><a href="laporan_detail_pengguna.php?angkatan=<?php echo $angkatan; ?>" class="btn btn-primary btn-xs"><i class="fa fa-book fa-fw"></i> DETAIL</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
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
        <script type="text/javascript" src="../chartjs/Chart.js"></script>
        <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true,
                ordering: false
            });
        });
        </script>
        <?php
        $alumni_1 = mysqli_query($mysqli, "SELECT DISTINCT ak.nim FROM msmhs m, alumni_bekerja ak WHERE ak.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401'");
        $count_alumni_1 = mysqli_num_rows($alumni_1);
        $alumni_2 = mysqli_query($mysqli, "SELECT DISTINCT ak.nim FROM msmhs m, alumni_bekerja ak WHERE ak.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201'");
        $count_alumni_2 = mysqli_num_rows($alumni_2);
        $perusahaan_1 = mysqli_query($mysqli, "SELECT * FROM msmhs m, alumni_bekerja ak WHERE ak.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401'");
        $count_perusahaan_1 = mysqli_num_rows($perusahaan_1);
        $perusahaan_2 = mysqli_query($mysqli, "SELECT * FROM msmhs m, alumni_bekerja ak WHERE ak.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201'");
        $count_perusahaan_2 = mysqli_num_rows($perusahaan_2);
        ?>
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["MANAJEMEN ADMINISTRASI", "MANAJEMEN"],
                    datasets: [{
                            label: 'Jumlah Alumni Bekerja',
                            data: [<?php echo $count_alumni_1; ?>, <?php echo $count_alumni_2; ?>],
                            borderColor: ['black', 'black'],
                            backgroundColor: ['black', 'black'],
                            borderWidth: 3,
                            pointRadius: 5,
                        }, {
                            label: 'Jumlah Pengguna',
                            data: [<?php echo $count_perusahaan_1; ?>, <?php echo $count_perusahaan_2; ?>],
                            borderColor: ['blue', 'blue'],
                            backgroundColor: ['blue', 'blue'],
                            borderWidth: 3,
                            pointRadius: 5,
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>
</html>
