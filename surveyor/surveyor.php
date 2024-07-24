<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>IDENTITAS PENILAI | Survey Alumni AMA YPK Yogyakarta</title>

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

// cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] != "surveyor") {
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
                        <h4 class="page-header"><i class="fa fa-user fa-fw"></i> IDENTITAS PENILAI</h4>
                    </div>
                    <?php
                    $id = $_SESSION['id'];
                    $survei = mysqli_query($mysqli, "select * from surveyor where pekerjaan_id='$id'");
                    while ($dsurvei = mysqli_fetch_array($survei)) {
                        $nama_surveyor = $dsurvei['nama_surveyor'];
                        $jabatan_surveyor = $dsurvei['jabatan_surveyor'];
                        $alamat_instansi  = $dsurvei['alamat_instansi'];
                        $telp  = $dsurvei['telp'];
                        $fax  = $dsurvei['fax'];
                    }
                    ?>
                    <div class="col-lg-12">
                        <form name="form" method="post" action="proses_simpan_surveyor.php">
                            <input type="hidden" name="nim" value="<?php echo $_SESSION['nim']; ?>">
                            <div class="form-group">
                                <label for="NamaLengkap">NAMA LENGKAP PENILAI</label>
                                <input type="text" class="form-control" name="nama_surveyor" value="<?php echo $nama_surveyor; ?>" placeholder="Nama Lengkap Penilai">
                            </div>
                            <div class="form-group">
                                <label for="JabatanPenilai">JABATAN PENILAI</label>
                                <input type="text" class="form-control" name="jabatan_surveyor" value="<?php echo $jabatan_surveyor; ?>" placeholder="Jabatan Penilai">
                            </div>
                            <div class="form-group">
                                <label for="Instansi">INSTANSI</label>
                                <input type="text" class="form-control" name="instansi" value="<?php echo $_SESSION['instansi'] ?>" placeholder="Instansi">
                            </div>                                                       
                            <div class="form-group">
                                <label for="AlamatInstansi">ALAMAT INSTANSI</label>
                                <input type="text" class="form-control" name="alamat_instansi" value="<?php echo $alamat_instansi; ?>" placeholder="Alamat Instansi">
                            </div>                                                       
                            <div class="form-group">
                                <label for="Telp">TELP</label>
                                <input type="text" class="form-control" name="telp" value="<?php echo $telp; ?>" placeholder="Telp">
                            </div>                                                       
                            <div class="form-group">
                                <label for="fax">FAX</label>
                                <input type="text" class="form-control" name="fax" value="<?php echo $fax; ?>" placeholder="Fax">
                            </div>                                                       
                            <div class="form-group">
                                <input type="submit" name="simpan" value="SIMPAN" class="btn btn-success btn-sm">
                            </div> 
                        </form>

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