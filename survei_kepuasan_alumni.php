<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SURVEI ALUMNI | TRACER AMA YOGYAKARTA</title>

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
                    <a class="navbar-brand" href="#">TRACER STUDY AMA YPK YOGYAKARTA</a>
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
                        <h4 class="page-header"><i class="fa fa-th-list fa-fw"></i> SURVEI ALUMNI</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                include 'config.php';
                $nim = $_SESSION['nim'];
             
                ?>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">   
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                     <th class="col-lg-1">NO</th>
                                    <th class="col-lg-10">NAMA DOKUMEN</th>
                                    <th class="col-lg-1">DOWNLOAD</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                <tr>
                                    <td>1.</td>
                                    <td>Surat Pengantar Untuk Alumni</td>
                                    <td>
                                        <a href="download.php?nama_file=surat_pengantar_untuk_alumni.jpg" class="btn btn-success btn-sm"><i class="fa fa-download fa-fw"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Surat Pengantar Untuk Instansi</td>
                                    <td>
                                        <a href="download.php?nama_file=surat_pengantar_untuk_pimpinan_instansi.jpg" class="btn btn-success btn-sm"><i class="fa fa-download fa-fw"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Surat Pengantar Untuk Pimpinan</td>
                                    <td>
                                        <a href="download.php?nama_file=surat_pengantar_pimpinan.jpg" class="btn btn-success btn-sm"><i class="fa fa-download fa-fw"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Formulir Survei Masa Tunggu dan Bidang Kerja (Untuk Alumni)</td>
                                    <td>
                                        <a href="download.php?nama_file=survey_masa_tunggu_dan_bidang_kerja.pdf" class="btn btn-success btn-sm"><i class="fa fa-download fa-fw"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Formulir Kompetensi Lulusan (Untuk Pimpinan Instansi Terkait)</td>
                                    <td>
                                        <a href="download.php?nama_file=survei_kompetensi_lulusan.pdf" class="btn btn-success btn-sm"><i class="fa fa-download fa-fw"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
