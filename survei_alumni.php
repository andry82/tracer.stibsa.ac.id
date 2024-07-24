<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>FORMULIR TINGKAT KEPUASAN PENGGUNA LULUSAN | SISTEM INFORMASI TRACER STUDY - SEKOLAH TINGGI ILMU BISNIS KUMALA NUSA</title>

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
                    <a class="navbar-brand" href="#">TINGKAT KEPUASAN PENGGUNA</a>
                </div>
                <!-- /.navbar-header -->
                <!-- /.navbar-top-links -->
                <?php
                include 'formulir_menu.php';
                $nim = $_GET['nim'];
                $reff = $_GET['reff'];                
                $alumni = mysqli_query($mysqli, "SELECT * FROM msmhs m, transkrip t WHERE t.nim=m.NIMHSMSMHS AND m.NIMHSMSMHS='$nim'");
                $created_at = date('Y-m-d h:i:s');
                //$reff = MD5($created_at); 
                ?>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $sql_pekerjaan = mysqli_query($mysqli, "SELECT * FROM alumni_bekerja ab, jenis_perusahaan jp WHERE ab.nim='$nim' AND ab.jenis_perusahaan_id=jp.id AND ab.reff='$reff'");
                        $count_perkerjaan = mysqli_num_rows($sql_pekerjaan);
                        if ($count_perkerjaan == 1) {
                            $data_alumni = mysqli_fetch_array($alumni);
                            $data_pekerjaan = mysqli_fetch_array($sql_pekerjaan);
                            ?>
                            <h4 class="page-header"><i class="fa fa-edit fa-fw"></i> IDENTITAS ALUMNI</h4>
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th width="50px" rowspan="5"style="padding: 0px">
                                            <img src="https://via.placeholder.com/150x200">        
                                    </th>
                                    <th>NIA</th><td><?php echo $data_alumni['NIA_NIMHSMSMHS']; ?></td></tr>
                                <tr><th>NAMA ALUMNI</th>
                                    <td><?php echo strtoupper($data_alumni['NMMHSMSMHS']); ?>&nbsp;&nbsp;
                                    </td></tr>
                                <tr><th>TAHUN LULUS</th><td><?php echo date('Y', strtotime($data_alumni['tgl_lulus'])); ?></td></tr>
                                <tr><th>NAMA INSTANSI</th><td><?php echo $data_pekerjaan['instansi']; ?></td>
                                </tr>
                                <tr><th>JENIS INSTANSI</th><td><?php echo strtoupper($data_pekerjaan['nama']); ?></td></tr>
                            </table>
                            <?php
                            include 'formulir_survei_alumni.php';
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