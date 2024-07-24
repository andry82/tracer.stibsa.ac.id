<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HISTORIS PEKERJAAN | SISTEM INFORMASI TRACER STUDY - SEKOLAH TINGGI ILMU BISNIS KUMALA NUSA</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="vendor/morrisjs/morris.css" rel="stylesheet">
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
        $(function () {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
    <body onload="tampilkanwaktu();
            setInterval('tampilkanwaktu()', 1000);">	
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
                        <h4 class="page-header"><i class="fa fa-th-list fa-fw"></i> HISTORI PEKERJAAN</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                include 'config.php';
                $nim = $_SESSION['NIM'];
                ?>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">                        
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="col-lg-1">NO</th>
                                    <th class="col-lg-5">INFORMASI PEKERJAAN</th>
                                    <th class="col-lg-5">LINK SURVEI</th>
                                    <th class="col-lg-1">NAVIGASI</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $result = mysqli_query($mysqli, "SELECT * FROM alumni_bekerja ab, transkrip t WHERE t.nim=ab.nim AND ab.nim='$nim' ORDER BY tanggal_masuk ASC");
                                $no = 1;
                                while ($data = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td>
                                            INSTANSI : <?php echo $data['instansi']; ?><br/>
                                            TANGGAL MASUK : <?php echo date('d-m-Y', strtotime($data['tanggal_masuk'])); ?><br/>
                                            JABATAN : <?php echo $data['jabatan']; ?><br/>                                            
                                            MASA TUNGGU : 
                                            <?php
                                            $tanggal_lahir = new DateTime($data['tgl_lulus']);
                                            $tanggal_sekarang = new DateTime($data['tanggal_masuk']);
                                            $usia = $tanggal_lahir->diff($tanggal_sekarang);
                                            echo $usia->y . ' Tahun ' . $usia->m . ' Bulan '. $usia->d . ' Hari ';
                                            ?><br/>
                                        </td>
                                        <td>
                                            <a href="survei_alumni.php?nim=<?php echo $nim; ?>&reff=<?php echo $data['reff']; ?>" class="btn btn-success btn-xs"><i class="fa fa-link fa-fw"></i> LINK SURVEY KEPUASAN</a>
                                        </td>
                                        <td>
                                            <a href="edit_pekerjaan.php?pekerjaan_id=<?php echo $data['id']; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit fa-fw"></i></a>&nbsp;
                                            <a href="hapus_pekerjaan.php?pekerjaan_id=<?php echo $data['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-remove fa-fw"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="tambah_pekerjaan.php" class="btn btn-success btn-sm"><i class="fa fa-plus-circle fa-fw"></i> TAMBAH PEKERJAAN</a>

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
            <script src="dist/js/bootstrap-datepicker.min.js"></script>


    </body>
</html>
