<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>EDIT DATA ALUMNI | SISTEM INFORMASI TRACER STUDY - SEKOLAH TINGGI ILMU BISNIS KUMALA NUSA</title>

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="../dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- DataTables CSS -->
        <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    </head>
    <?php
    session_start();
    include '../config.php';

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
                        <h4 class="page-header"><i class="fa fa-eye fa-fw"></i> EDIT DATA ALUMNI</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">                    
                    <div class="col-lg-12">
                        <?php
//getting id from url
                        $nim = $_GET['nim'];
//selecting data associated with this particular id
                        $res = mysqli_query($mysqli, "SELECT * FROM alumni WHERE nim='$nim'");
                        while ($data = mysqli_fetch_array($res)) {
                            $nia = $data['nia'];
                            $nama = $data['nama_mhs'];
                            $kelamin = $data['kelamin'];
                            $tempat_lahir = $data['tempat_lahir'];
                            $tanggal_lahir = $data['tgl_lahir'];
                            $tanggal_lulus = $data['tgl_lulus'];
                            $hp = $data['hp'];
                            $prodi_id = $data['prodi_id'];
                            $peminatan = $data['peminatan_id'];
                            $email = $data['email'];
                            $alamat_asal = $data['alamat_asal'];
                            $alamat = $data['alamat'];
                            $judul_tugas_akhir = $data['judul_lta'];
                        }
                        ?>
                        <!-- /.col-lg-12 -->
                        <form name="form" method="post" action="proses_update_alumni.php" enctype="multipart/form-data">
                            <input type="hidden" name="nim" value="<?php echo $nim; ?>">
                            <div class="form-group">
                                <label for="Prodi">PROGRAM STUDI</label>
                                <select class="form-control" name="prodi"  id="prodi">
                                    <option value="">-- PILIH --</option>
                                    <?php
                                    $prodi = mysqli_query($mysqli, "SELECT * FROM programstudi ORDER BY id ASC");
                                    while ($data_prodi = mysqli_fetch_array($prodi)) {
                                        $id = $data_prodi["id"];
                                        $jenjang = $data_prodi["jenjang"];
                                        $nama_prodi = $data_prodi["nama_prodi"];
                                        if($prodi_id == $id) { ?>
                                          <option value="<?php echo $id; ?>" selected><?php echo $jenjang; ?> - <?php echo strtoupper($nama_prodi); ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $id; ?>"><?php echo $jenjang; ?> - <?php echo strtoupper($nama_prodi); ?></option>
                                    <?php }}?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3">KONSENTRASI</label>
                                <select style="text-transform: uppercase" class="form-control" name="konsentrasi" id="konsentrasi">
                                    <?php if($peminatan == "" && $prodi_id == "") { ?>
                                       <option value="">-- PILIH --</option>
                                    <?php }else{ ?>
                                        <?php
                                    $prodi = mysqli_query($mysqli, "SELECT * FROM peminatan_prodi WHERE prodi_id=$prodi_id ORDER BY id ASC");
                                    while ($data_prodi = mysqli_fetch_array($prodi)) {
                                        $id = $data_prodi["id"];
                                        $kode = $data_prodi["kode"];
                                        $nama_peminatan = $data_prodi["nama_peminatan"];
                                        if($peminatan == $id) {?>
                                        <option value="<?php echo $id; ?>" selected><?php echo $kode; ?> - <?php echo strtoupper($nama_peminatan); ?></option>
                                        <?php }else{?>
                                        <option value="<?php echo $id; ?>"><?php echo $kode; ?> - <?php echo strtoupper($nama_peminatan); ?></option>
                                    <?php }} ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Nia">NOMOR INDUK ALUMNI</label>
                                <input type="text" class="form-control" name="nia" value="<?php echo $nia; ?>"  placeholder="NIA">
                            </div>
                            <div class="form-group">
                                <label for="NamaLengkap">NAMA LENGKAP</label>
                                <input type="text" class="form-control" name="nama_mhs" value="<?php echo $nama; ?>" placeholder="Nama Lengkap">
                            </div>     
                            <div class="form-group">
                                <label for="TempatLahir">TEMPAT LAHIR</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" placeholder="Tempat Lahir">
                            </div>     
                            <div class="form-group">
                                <label for="TanggalLahir">TANGGAL LAHIR</label>
                                <input type="text" class="form-control datepicker" name="tanggal_lahir" value="<?php echo date('d-m-Y', strtotime($tanggal_lahir)); ?>" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label for="TanggalLulus">TANGGAL LULUS</label>
                                <input type="text" class="form-control datepicker" name="tanggal_lulus" value="<?php echo date('d-m-Y', strtotime($tanggal_lulus)); ?>" placeholder="Tanggal Lulus">
                            </div>    
                            <div class="form-group">
                                <label for="TelpWa">TELP / WA</label>
                                <input type="text" class="form-control" name="hp" value="<?php echo $hp; ?>" placeholder="Telp / WA">
                            </div>    
                            <div class="form-group">
                                <label for="Email">EMAIL</label>
                                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="E Mail">
                            </div>         
                            <div class="form-group">
                                <label for="AlamatAsal">ALAMAT ASAL</label>
                                <input type="text" class="form-control" name="alamat_asal" value="<?php echo $alamat_asal; ?>" placeholder="Alamat Asal">
                            </div>
                            <div class="form-group">
                                <label for="AlamatSekarang">ALAMAT SEKARANG</label>
                                <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>" placeholder="Alamat Sekarang">
                            </div> 
                            <div class="form-group">
                                <label for="JudulTugasAkhir">JUDUL TUGAS AKHIR</label>
                                <input type="text" class="form-control" name="judul_lta" value="<?php echo $judul_tugas_akhir; ?>" placeholder="Judul Tugas Akhir">
                            </div>                           
                            <div class="form-group">
                                <input type="submit" name="update" value="UPDATE" class="btn btn-success btn-sm">
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
        <script src="../dist/js/bootstrap-datepicker.min.js"></script>        
        <script type="text/javascript">
        $(function () {
            $(".datepicker").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true,
                startView: 2
            });
        });
        $("#prodi").change(function () {
            // variabel dari nilai combo box kendaraan
            var prodi_id = $("#prodi").val();
            $.ajax({
                method: "POST",
                dataType: "html",
                url: "data_konsentrasi.php",
                data: {
                    data_prodi: prodi_id
                },
                success: function (data) {
                    $("#konsentrasi").html(data);
                }
            });
        });
            </script>
    </body>
</html>
