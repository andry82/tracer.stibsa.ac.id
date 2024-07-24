<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LAPORAN LAMA TUNGGU | SISTEM INFORMASI ALUMNI - AMA Yogyakarta</title>

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
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header"><i class="fa fa-list fa-fw"></i> LAPORAN LAMA TUNGGU</h4>
                        <div style="width: 800px;margin: 0px auto;">
                            <canvas id="myChart"></canvas>
                        </div>
                        <br/>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">                    
                    <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center">NAMA PRODI</th>
                                    <th style="text-align: center">JUMLAH RESPONDEN</th>
                                    <th style="text-align: center">1</th>
                                    <th style="text-align: center">2</th>
                                </tr>
                            </thead>
                            <tbody>    
                                <?php
                                $result = mysqli_query($mysqli, "SELECT * FROM  programstudi WHERE status='1'");
                                while ($data = mysqli_fetch_array($result)) {
                                    $prodi_id = $data['id'];
                                    ?>                          
                                    <tr>
                                        <td><?php echo strtoupper($data['nama_prodi']); ?></td>
                                        <?php
                                        $kuisioner = mysqli_query($mysqli, "SELECT * FROM kuisioner k, alumni m WHERE m.nim=k.nim AND m.nikey=k.nikey AND m.prodi_id='$prodi_id' AND k.status='1'");
                                        $count_responden = mysqli_num_rows($kuisioner);
                                        ?>
                                        <td style="text-align: center"><?php echo $count_responden; ?></td>
                                        <td style="text-align: center">
                                            <?php
                                            $f14_1 = mysqli_query($mysqli, "SELECT * FROM kuisioner k, alumni m WHERE m.nim=k.nim AND m.nikey=k.nikey AND m.prodi_id='$prodi_id' AND k.f504='1' AND k.status='1'");
                                            $count_f14_1 = mysqli_num_rows($f14_1);
                                            echo $count_f14_1;
                                            ?>    
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                            $f14_2 = mysqli_query($mysqli, "SELECT * FROM kuisioner k, alumni m WHERE m.nim=k.nim AND m.nikey=k.nikey AND m.prodi_id='$prodi_id' AND k.f504='2' AND k.status='1'");
                                            $count_f14_2 = mysqli_num_rows($f14_2);
                                            echo $count_f14_2;
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        KETERANGAN :<br/>
                        1 : Mendapat Pekerjaan <= 6 Bulan (Termasuk Sebelum LULUS)<br/>
                        2 : Mendapat Pekerjaan > 6 Bulan <br/>
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
        $kuisioner_1 = mysqli_query($mysqli, "SELECT * FROM kuisioner k, alumni m WHERE m.nim=k.nim AND m.nikey=k.nikey AND m.prodi_id='1' AND k.status='1'");
        $count_responden_1 = mysqli_num_rows($kuisioner_1);
        $kuisioner_2 = mysqli_query($mysqli, "SELECT * FROM kuisioner k, alumni m WHERE m.nim=k.nim AND m.nikey=k.nikey AND m.prodi_id='2' AND k.status='1'");
        $count_responden_2 = mysqli_num_rows($kuisioner_2);
        $f504_1_1 = mysqli_query($mysqli, "SELECT * FROM kuisioner k, alumni m WHERE m.nim=k.nim AND m.nikey=k.nikey AND m.prodi_id='1' AND k.f504='1' AND k.status='1'");
        $count_f504_1_1 = mysqli_num_rows($f504_1_1);
        $f504_1_2 = mysqli_query($mysqli, "SELECT * FROM kuisioner k, alumni m WHERE m.nim=k.nim AND m.nikey=k.nikey AND m.prodi_id='2' AND k.f504='1' AND k.status='1'");
        $count_f504_1_2 = mysqli_num_rows($f504_1_2);
        $f504_2_1 = mysqli_query($mysqli, "SELECT * FROM kuisioner k, alumni m WHERE m.nim=k.nim AND m.nikey=k.nikey AND m.prodi_id='1' AND k.f504='2' AND k.status='1'");
        $count_f504_2_1 = mysqli_num_rows($f504_2_1);
        $f504_2_2 = mysqli_query($mysqli, "SELECT * FROM kuisioner k, alumni m WHERE m.nim=k.nim AND m.nikey=k.nikey AND m.prodi_id='2' AND k.f504='2' AND k.status='1'");
        $count_f504_2_2 = mysqli_num_rows($f504_2_2);
        ?>
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["MANAJEMEN ADMINISTRASI", "MANAJEMEN"],
                    datasets: [{
                            label: 'Jumlah Responden',
                            data: [<?php echo $count_responden_1; ?>, <?php echo $count_responden_2; ?>],
                            borderColor: ['black', 'black'],
                            backgroundColor: ['black', 'black'],
                            borderWidth: 3,
                            pointRadius: 5,
                        }, {
                            label: '1',
                            data: [<?php echo $count_f504_1_1; ?>, <?php echo $count_f504_1_2; ?>],
                            borderColor: ['blue', 'blue'],
                            backgroundColor: ['blue', 'blue'],
                            borderWidth: 3,
                            pointRadius: 5,
                        }, {
                            label: '2',
                            data: [<?php echo $count_f504_2_1; ?>, <?php echo $count_f504_2_2; ?>],
                            borderColor: ['red', 'red'],
                            backgroundColor: ['red', 'red'],
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
