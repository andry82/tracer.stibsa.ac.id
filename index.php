<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HALAMAN DEPAN | SISTEM INFORMASI TRACER STUDY - SEKOLAH TINGGI ILMU BISNIS KUMALA NUSA</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="vendor/morrisjs/morris.css" rel="stylesheet">
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- DataTables CSS -->
        <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    </head>
    <?php
    session_start();
    include 'config.php';
// cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['LEVEL'] != "alumni") {
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
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">TRACER STUDY</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">                    
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> KELUAR</a>
                        <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <?php include 'sidebar_menu.php'; ?>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header"><i class="fa fa-home fa-fw"></i> HALAMAN DEPAN</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-graduation-cap fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        //$jml_mars = mysqli_query($mysqli, "SELECT * FROM msmhs m, transkrip tr WHERE m.STMHSMSMHS='L' AND m.kdkonsen='MARS' AND m.NIMHSMSMHS=tr.nim AND m.NIMHSMSMHS='$nim'");
                                        //$jml_mars = mysqli_query($mysqli, "select * from msmhs WHERE kdkonsen='MRS' AND STMHSMSMHS='L' AND TAHUNMSMHS='$th_masuk'");
                                        //$count_mars = mysqli_num_rows($jml_mars);
                                        ?>
                                        <div class="huge"></div>
                                        <div>Manajemen<br/>Rumah Sakit</div>
                                    </div> 
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-graduation-cap fa-5x"></i>
                                    </div>
                                    <?php
                                    //$jml_maof = mysqli_query($mysqli, "select * from msmhs m, ta t, transkrip tr WHERE m.NIMHSMSMHS=t.nim AND tr.nim=t.nim AND m.kdkonsen='MAOF' AND m.STMHSMSMHS='L' AND tr.tgl_lulus='$tgl_lulus'");
                                    //$count_maof = mysqli_num_rows($jml_maof);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>Manajemen<br/>Obat dan Farmasi</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-graduation-cap fa-5x"></i>
                                    </div>
                                    <?php
                                    //$jml_map = mysqli_query($mysqli, "select * from msmhs m, ta t, transkrip tr WHERE m.NIMHSMSMHS=t.nim AND tr.nim=t.nim AND m.kdkonsen='MAP' AND m.STMHSMSMHS='L' AND tr.tgl_lulus='$tgl_lulus'");
                                    //$count_map = mysqli_num_rows($jml_map);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>Manajemen<br/>Perkantoran</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead><tr>
                                    <th>FOTO</th>
                                    <th>KETERANGAN DETAIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'config.php';
                                $thn_masuk = $_SESSION['TAHUNMSMHS'];
                                $nim = $_SESSION['NIM'];
                                $data = mysqli_query($mysqli, "select * from msmhs WHERE TAHUNMSMHS='$thn_masuk' AND NIMHSMSMHS!='$nim'");
                                while ($d = mysqli_fetch_array($data)) {
                                $tgl = date('d', strtotime($d['TGLHRMSMHS']));
                                $bln = date('F', strtotime($d['TGLHRMSMHS']));
                                $tahun = date('Y', strtotime($d['TGLHRMSMHS']));
                                $email = $d['EMAIL'];
                                $data_nim = $d['NIMHSMSMHS'];
                                $telp = $d['TELP'];
                                $alamat = $d['ALAMATLENGKAP'];
                                $data_ta = mysqli_query($mysqli, "select * from ta WHERE status_judul='2' AND nim='$data_nim'");
                                $data_tugas_akhir = mysqli_fetch_array($data_ta);
                                ?>
                                    <tr>
                                        <td>
                                            <?php
                                            $hash = md5(strtolower(trim($email)));
                                            $size = 100;
                                            $grav_url = "https://www.gravatar.com/avatar/" . $hash . "?s=" . $size;
                                            ?>
                                            <img src="<?php echo $grav_url; ?>" style="padding-bottom: 10px;"><br />
                                        </td>
                                        <td>
                                            <table width="100%" border="0">
                                                <tr>
                                                    <td width="20%">NIM / NIA</td>
                                                    <td width="1%">:&nbsp;</td>
                                                    <td width="79%"><?php echo $d['NIMHSMSMHS']; ?> / <?php echo $d['NIA_NIMHSMSMHS']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:&nbsp;</td>
                                                    <td><?php echo $d['NMMHSMSMHS']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tempat, Tgl Lahir</td>
                                                    <td>:&nbsp;</td>
                                                    <td><?php echo strtoupper($d['TPLHRMSMHS']); ?>, <?php echo $tgl; ?>-<?php echo $bln; ?>-<?php echo $tahun; ?></td>
                                                </tr>
                                               </tr>
                                               <tr>
                                                    <td>Nomor HP / WA</td>
                                                    <td>:&nbsp;</td>
                                                    <td><?php echo $telp; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Lengkap</td>
                                                    <td>:&nbsp;</td>
                                                    <td><?php echo $alamat; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Email</td>
                                                    <td>:&nbsp;</td>
                                                    <td><?php echo $email; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Lulus</td>
                                                    <td>:&nbsp;</td>
                                                    <td>-
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/metisMenu/metisMenu.min.js"></script>
        <script src="vendor/raphael/raphael.min.js"></script>
        <script src="vendor/morrisjs/morris.min.js"></script>
        <script src="dist/js/sb-admin-2.js"></script>
        <!-- DataTables JavaScript -->
        <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
        <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true,
                ordering: false
            });
        });
        </script>
    </body>
</html>