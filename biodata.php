<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BIODATA | SISTEM INFORMASI TRACER STUDY - SEKOLAH TINGGI ILMU BISNIS KUMALA NUSA</title>

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
                        <h4 class="page-header"><i class="fa fa-user fa-fw"></i> BIODATA</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                include 'config.php';
                $nim = $_SESSION['NIM'];
                //$jml_rec = mysqli_query($mysqli, "SELECT * FROM alumni_kerja WHERE nim='$nim'");
                //$count = mysqli_num_rows($jml_rec);
                $result = mysqli_query($mysqli, "SELECT * FROM msmhs m, transkrip t WHERE t.nim=m.NIMHSMSMHS AND m.NIMHSMSMHS='$nim'");
                while ($data = mysqli_fetch_array($result)) {
                    $nama = $data['NMMHSMSMHS'];
                    $tempat_lahir = $data['TPLHRMSMHS'];
                    $tanggal_lahir = date('d-m-Y', strtotime(date($data['TGLHRMSMHS'])));
                    $alamat_asal = $data['ALAMATLENGKAP'];
                    $alamat_sekarang = $data['ALAMATLENGKAP'];
                    $telp = $data['TELP'];
                    $email = $data['EMAIL'];
                    $tgl_lulus = $data['tgl_lulus'];
                    //$judul_lta = $data['judul_lta'];
                }
                
                ?>
                <!-- /.row -->
                <div class="row">
                    <?php
                    $job = mysqli_query($mysqli, "SELECT * FROM alumni_bekerja ab, transkrip t WHERE t.nim=ab.nim AND ab.nim='$nim' ORDER BY ab.tanggal_masuk ASC LIMIT 1");
                    $data = mysqli_fetch_array($job);
                    $count = mysqli_num_rows($job);
                    if($count != 0){
                    $tanggal_1  = new DateTime($data['tanggal_masuk']);
                    $tanggal_2 = new DateTime($data['tgl_lulus']);
                    $selisih  = $tanggal_1->diff($tanggal_2);
                    $jeda_tunggu = $selisih->y . ' tahun, '. $selisih->m . ' bulan, '. $selisih->d . ' hari';
                    } ?> 
                    <div class="col-lg-12">
                        <form method="post" action="update_biodata.php">       
                            <input type="text" name="nim" value="<?php echo $nim; ?>" hidden>
                            <input type="text" name="status_judul" value="<?php echo $status; ?>" hidden>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>NOMOR INDUK ALUMNI</label>
                                    <input type="text" class="form-control" value="" disabled>
                                </div>
                                <div class="form-group">
                                    <label>NAMA LENGKAP</label>
                                    <input type="text" class="form-control" value="<?php echo $nama;  ; ?>, A.Md M" disabled>
                                </div>
                                <div class="form-group">
                                    <label>TEMPAT LAHIR</label>
                                    <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $tempat_lahir; ?>">
                                </div>
                                <div class="form-group">
                                    <label>TANGGAL LAHIR</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar fa-fw"></i>
                                        </div>
                                        <input type="text" name="tanggal_lahir" class="form-control datepicker" value="<?php echo $tanggal_lahir; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>TGL LULUS</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar fa-fw"></i>
                                        </div>
                                        <input type="text" name="tgl_lulus" class="form-control" value="<?php echo $tgl_lulus; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>STATUS BEKERJA</label>
                                    <?php if ($count == 0) { ?>
                                        <input type="text" name="status_bekerja" class="form-control" value="BELUM BEKERJA" disabled>
                                    <?php } elseif ($count > 0) { ?>
                                        <input type="text" name="status_bekerja" class="form-control" value="SUDAH BEKERJA" disabled>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>JEDA BEKERJA</label>
                                    <?php if ($count == 0) { ?>
                                        <input type="text" name="jeda_bekerja" class="form-control" value="-" disabled>
                                    <?php } elseif ($count > 0) { ?>
                                        <input type="text" name="jeda_bekerja" class="form-control" value="<?php echo $jeda_tunggu; ?>" disabled>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>TELP / HP / WA</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone fa-fw"></i>
                                        </div>
                                        <input type="text" name="telp" class="form-control" value="<?php echo $telp; ?>">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" name="simpan" value="UPDATE" class="btn btn-success btn-sm">
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>EMAIL</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope-o fa-fw"></i>
                                        </div>
                                        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                                    </div>
                                </div>
                                <div class="form-group data">                                
                                    <label>ALAMAT ASAL</label>
                                    <textarea type="text" name="alamat_asal" class="form-control" rows="4"><?php echo $alamat_asal; ?></textarea>
                                </div>
                                <div class="form-group data">                                
                                    <label>ALAMAT SEKARANG / POS</label>
                                    <textarea type="text" name="alamat_sekarang" class="form-control" rows="4"><?php echo $alamat_sekarang; ?></textarea>
                                </div>
                                <div class="form-group data">
                                    <label>JUDUL TUGAS AKHIR</label>
                                    <textarea type="text" name="judul_ta" class="form-control" rows="4" disabled="true"></textarea>
                                </div>
                            </div>
                        </form>   

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
            <script>
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

