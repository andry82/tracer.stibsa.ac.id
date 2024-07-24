<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SURVEI ALUMNI| Survey Alumni - AMA YPK Yogyakarta</title>

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
    $id_pekerjaan = $_SESSION['id'];
    $surveyor = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE pekerjaan_id=$id_pekerjaan");
    $countsurveyor = mysqli_num_rows($surveyor);
    while ($datasurvei = mysqli_fetch_array($surveyor)) {
        $status_survei = $datasurvei['status_survei'];
    }

// cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] != "surveyor") {
        header("location:login.php");
    } elseif ($countsurveyor == 0) {
        header("location:surveyor.php");
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
                        <h4 class="page-header"><i class="fa fa-check fa-fw"></i> SURVEY ALUMNI</h4>
                    </div>
                    <div class="col-lg-12">
                        <?php if ($status_survei != 0) { ?>
                            Terima Kasih Anda Telah Melakukan Survei Untuk Lulusan Kami
                        <?php } else { ?>
                            <form name="form" method="post" action="proses_simpan_survei_alumni.php">
                                <div class="col-lg-6">
                                    Integritas (etika dan moral) !<br/>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_1" id="poin_1" value="Kurang">Kurang
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_1" id="poin_1" value="Cukup">Cukup
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_1" id="poin_1" value="Baik">Baik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_1" id="poin_1" value="Sangat Baik">Sangat Baik
                                        </label>
                                    </div>
                                    Keahlian berdasarkan bidang ilmu (profesionalisme) !<br/>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_2" id="poin_2" value="Kurang">Kurang
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_2" id="poin_2" value="Cukup">Cukup
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_2" id="poin_2" value="Baik">Baik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_2" id="poin_2" value="Sangat Baik">Sangat Baik
                                        </label>
                                    </div>
                                    Kemampuan Bahasa Inggris !<br/>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_3" id="poin_3" value="Kurang">Kurang
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_3" id="poin_3" value="Cukup">Cukup
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_3" id="poin_3" value="Baik">Baik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_3" id="poin_3" value="Sangat Baik">Sangat Baik
                                        </label>
                                    </div>
                                    Kemampuan Berkomunikasi !<br/>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_4" id="poin_4" value="Kurang">Kurang
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_4" id="poin_4" value="Cukup">Cukup
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_4" id="poin_4" value="Baik">Baik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_4" id="poin_4" value="Sangat Baik">Sangat Baik
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    Leadership/Kepemimpinan !<br/>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_5" id="poin_5" value="Kurang">Kurang
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_5" id="poin_5" value="Cukup">Cukup
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_5" id="poin_5" value="Baik">Baik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_5" id="poin_5" value="Sangat Baik">Sangat Baik
                                        </label>
                                    </div>
                                    Penguasaan Teknologi Informasi !<br/>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_6" id="poin_6" value="Kurang">Kurang
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_6" id="poin_6" value="Cukup">Cukup
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_6" id="poin_6" value="Baik">Baik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_6" id="poin_6" value="Sangat Baik">Sangat Baik
                                        </label>
                                    </div>
                                    Kerjasama Tim !<br/>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_7" id="poin_7" value="Kurang">Kurang
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_7" id="poin_7" value="Cukup">Cukup
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_7" id="poin_7" value="Baik">Baik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_7" id="poin_7" value="Sangat Baik">Sangat Baik
                                        </label>
                                    </div>
                                    Pengembangan Diri !<br/>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_8" id="poin_8" value="Kurang">Kurang
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_8" id="poin_8" value="Cukup">Cukup
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_8" id="poin_8" value="Baik">Baik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_8" id="poin_8" value="Sangat Baik">Sangat Baik
                                        </label>
                                    </div>
                                    Penilaian kualitas secara keseluruhan !<br/>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_9" id="poin_9" value="Kurang">Kurang
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_9" id="poin_9" value="Cukup">Cukup
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_9" id="poin_9" value="Baik">Baik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="poin_9" id="poin_9" value="Sangat Baik">Sangat Baik
                                        </label>
                                    </div>                        
                                </div>
                                <div class="col-lg-12 text-center">      
                                    <br/>
                                    <div class="form-group">
                                        <input type="submit" name="simpan" value="SIMPAN SURVEI ALUMNI" class="btn btn-success btn-sm">
                                    </div> 
                                    <br/>
                                </div>
                            </form>
                        <?php } ?>

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