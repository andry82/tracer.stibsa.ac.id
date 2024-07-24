<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>GENERATE LINK PUBLIK | SISTEM INFORMASI TRACER STUDY - SEKOLAH TINGGI ILMU BISNIS KUMALA NUSA</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="vendor/morrisjs/morris.css" rel="stylesheet">
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- DataTables CSS -->
        <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet"> 
    </head>
    <?php
    session_start();
    include('bar128.php');
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
                        <h4 class="page-header"><i class="fa fa-link fa-fw"></i> GENERATE LINK PUBLIK</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        include 'config.php';
                        $nim = $_SESSION['nim'];
                        $pekerjaan_id = $_GET['pekerjaan_id'];
                        $result = mysqli_query($mysqli, "SELECT * FROM msmhs WHERE NIMHSMSMHS='$nim'");
                        while ($data = mysqli_fetch_array($result)) {
                            $url_publik = $data['url_publik'];
                        }
                        ?>

                        <?php if ($url_publik == '') { ?>
                            <a href="generate_url.php" class="btn btn-success btn-sm"><i class="fa fa-link fa-fw"></i> GENERATE LINK</a>
                        <?php
                        } else {
                            $actual_link = "http://$_SERVER[HTTP_HOST]";
                            ?>
                            <?php echo $actual_link; ?>/tracer.amaypk.ac.id/curiculum_vitae.php?id=<?php echo $url_publik; ?>
                        <?php } ?>
                    </div> 
                </div>
                <!-- /.row -->

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
            <!-- DataTables JavaScript -->
            <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
            <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
            <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
            <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
            </script>

    </body>
</html>