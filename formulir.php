<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>FORMULIR TRACER | SISTEM INFORMASI TRACER STUDY - SEKOLAH TINGGI ILMU BISNIS KUMALA NUSA</title>

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
                    <a class="navbar-brand" href="#">TRACER STUDY AMA YOGYAKARTA</a>
                </div>
                <!-- /.navbar-header -->
                <!-- /.navbar-top-links -->
                <?php
                include 'formulir_menu.php';
                $nim = $_GET['nim'];
                $key = $_GET['key'];
                $getfile = file_get_contents('' . $akademik_url . '/api/mahasiswa.php?nim=' . $nim . '');
                $jsonfile = json_decode($getfile, true);
                $status = $jsonfile['status'];
                foreach ($jsonfile['data'] as $row) {
                    $nikeymhs = $row['NIKEY'];
                    if ($nikeymhs == $key) {
                        $keys = 1;
                    } else {
                        $keys = 0;
                    }
                    $nimmhs = $row['NIMHSMSMHS'];
                    $nmkelas = $row['nmkelas'];
                    $ta_periode = $row['tahun'];
                    $thmskmhs = $row['TAHUNMSMHS'];
                    $nama = addslashes($row['NMMHSMSMHS']);
                    $nama_mahasiswa = strtoupper($row['NMMHSMSMHS']);
                    $nama_kosentrasi = strtoupper($row['nmkonsen']);
                    $nikey = md5($row['NIMHSMSMHS']);
                    $kuisioner = mysqli_query($mysqli, "SELECT * FROM kuisioner WHERE nikey='$nikeymhs'");
                    $count_kuisioner = mysqli_num_rows($kuisioner);
                    if ($count_kuisioner == 0 && $status == 1 && $keys == 1) {
                        $created_at = date('Y-m-d h:i:s');
                        mysqli_query($mysqli, "INSERT INTO kuisioner(nim,nikey,created_at) VALUES('$nimmhs','$nikeymhs', '$created_at')");
                    }
                    $pekerjaan = mysqli_query($mysqli, "SELECT * FROM alumni_kerja WHERE nim='$nimmhs' ORDER BY id ASC LIMIT 1");
                    $count_perkerjaan = mysqli_num_rows($pekerjaan);
                    if ($count_perkerjaan == 0) {
                        $created_at = date('Y-m-d h:i:s');
                        $reff = MD5($created_at);
                        mysqli_query($mysqli, "INSERT INTO alumni_kerja(nim,created_at,status,reff) VALUES('$nimmhs','$created_at','1','$reff')");
                    }
                }
                ?>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $sql_kuisioner = mysqli_query($mysqli, "SELECT * FROM kuisioner WHERE nim='$nimmhs' AND nikey='$nikeymhs'");
                        $sql_count_kuisioner = mysqli_num_rows($sql_kuisioner);
                        $sql_pekerjaan = mysqli_query($mysqli, "SELECT * FROM alumni_kerja WHERE nim='$nimmhs' ORDER BY id ASC LIMIT 1");
                        $sql_count_pekerjaan = mysqli_num_rows($sql_pekerjaan);
                        if ($status == 1 && $sql_count_kuisioner == 1 && $sql_count_pekerjaan == 1 && $keys == 1) {
                            $data_kuisioner = mysqli_fetch_array($sql_kuisioner);
                            $data_pekerjaan = mysqli_fetch_array($sql_pekerjaan);
                            ?>
                            <h4 class="page-header"><i class="fa fa-edit fa-fw"></i> IDENTITAS MAHASISWA</h4>
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th width="50px" rowspan="5"style="padding: 0px">
                                        <?php if ($foto_diri != "") { ?>       
                                            <img src="<?php echo $foto_diri; ?>" height="200">
                                        <?php } else { ?>
                                            <img src="https://via.placeholder.com/150x200">
                                        <?php } ?>           
                                    </th>
                                    <th>NIM</th><td><?php echo $nimmhs; ?></td></tr>
                                <tr><th>NAMA MAHASISWA</th>
                                    <td><?php echo strtoupper($nama_mahasiswa); ?>&nbsp;&nbsp;
                                    </td></tr>
                                <?php
                                $arr_kelas = explode("/", $nmkelas);
                                $arr_pembimbing = explode("-", $nmkelas);
                                $ta = substr($ta_periode, 0, 4);
                                $sdta = $ta + 1;
                                $smtgg = substr($ta_periode, 4, 1);
                                ?>
                                <tr><th>KELAS</th><td><?php echo $arr_kelas[0]; ?><?php echo (($ta - $thmskmhs) * 2) + $smtgg; ?></td></tr>
                                <tr><th>KONSENTRASI</th><td>
                                        <?php
                                        echo $nama_kosentrasi;
                                        ?>
                                    </td>
                                </tr>
                                <tr><th>DOSEN PEMBIMBING AKADEMIK</th><td><?php echo strtoupper($arr_pembimbing[1]); ?></td></tr>
                            </table>
                            <?php
                            include 'formulir_tracer.php';
                        } elseif ($keys == 0) {
                            ?>
                            <br/>
                            <div class="alert alert-info alert-dismissible fade in">ALAMAT SALAH ... !</div>                            
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
        $(function () {
            $(".datepicker").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true,
                startView: 2
            });
        });
            </script>

    </body>
</html>