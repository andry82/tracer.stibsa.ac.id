<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>EDIT PEKERJAAN | SISTEM INFORMASI TRACER STUDY - SEKOLAH TINGGI ILMU BISNIS KUMALA NUSA</title>

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
                        <h4 class="page-header"><i class="fa fa-edit fa-fw"></i> EDIT PEKERJAAN</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        include 'config.php';
                        $nim = $_SESSION['nim'];
                        $pekerjaan_id = $_GET['pekerjaan_id'];
                        $result = mysqli_query($mysqli, "SELECT * FROM alumni_kerja WHERE id='$pekerjaan_id'");
                        while ($data = mysqli_fetch_array($result)) {
                            $instansi = $data['nama_ip'];
                            $alamat = $data['alamat'];
                            $jabatan = $data['jabatan'];
                            $medsos = $data['medsos'];
                            $tgl_masuk = date('d-m-Y', strtotime(date($data['tgl_masuk'])));
                            $jenis_instansi = $data['jenis_instansi'];
                        }
                        $nim = $_SESSION['nim'];
                        ?>
                        <form method="post" action="update_pekerjaan.php"  class="col-lg-6">
                            <input type="hidden" name="id" value="<?php echo $pekerjaan_id; ?>">
                            <div class="form-group">
                                <label>Instansi / Perusahaan</label>
                                <input type="text" name="instansi" value='<?php echo $instansi; ?>' class="form-control" placeholder="Instansi Bekerja">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea type="text" cols="5" name="alamat" class="form-control" placeholder="Alamat"><?php echo $alamat ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" value='<?php echo $jabatan; ?>' class="form-control" placeholder="Jabatan">
                            </div>
                            <div class="form-group">
                                <label>Website/Email/Medsos Perusahaan</label>
                                <input type="text" name="medsos" value='<?php echo $medsos; ?>' class="form-control" placeholder="Website/Email/Medsos Perusahaan">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar fa-fw"></i>
                                    </div>
                                    <input type="text" name="tanggal_masuk" value='<?php echo $tgl_masuk; ?>' class="form-control datepicker" placeholder="Tanggal Masuk (DD/MM/YYYY)">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label>Jenis Perusahaan/Instansi</label>
                                <select class="form-control" name="jenis_perusahaan">
                                    <option value="">-- PILIH --</option>
                                    <?php
                                    $perusahaan = mysqli_query($mysqli, "SELECT * FROM jenis_perusahaan");
                                    while ($data_perusahaan = mysqli_fetch_array($perusahaan)) {
                                        if($jenis_instansi  == $data_perusahaan['id']) { ?>
                                        <option value="<?php echo $data_perusahaan['id']; ?>" selected><?php echo strtoupper($data_perusahaan['name']); ?></option>
                                        <?php }else{ ?>
                                        <option value="<?php echo $data_perusahaan['id']; ?>"><?php echo strtoupper($data_perusahaan['name']); ?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                            <table>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="simpan" value="UPDATE" class="btn btn-success btn-sm"></td>
                                </tr>		
                            </table>
                        </form>
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