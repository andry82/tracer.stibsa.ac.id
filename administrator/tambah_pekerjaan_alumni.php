<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>TAMBAH PEKERJAAN ALUMNI | SISTEM INFORMASI ALUMNI - AMA Yogyakarta</title>

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
                        <h4 class="page-header"><i class="fa fa-plus fa-fw"></i> TAMBAH PEKERJAAN ALUMNI</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">                    
                    <div class="col-lg-12">
                        <form method="post" action="simpan_pekerjaan_alumni.php"  class="col-lg-6">
                            <input type="hidden" name="nim" value="<?php echo $_GET['nim']; ?>">
                            <input type="hidden" name="password" value="<?php echo $password; ?>">
                            <div class="form-group">
                                <label>Instansi / Perusahaan</label>
                                <input type="text" name="instansi" class="form-control" placeholder="Instansi Bekerja">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea type="text" cols="5" name="alamat" class="form-control" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                            </div>
                            <div class="form-group">
                                <label>Website/Email/Medsos Perusahaan</label>
                                <input type="text" name="medsos" class="form-control" placeholder="Website/Email/Medsos Perusahaan">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar fa-fw"></i>
                                    </div>
                                    <input type="text" name="tanggal_masuk" class="form-control datepicker" placeholder="Tanggal Masuk (DD/MM/YYYY)">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label>Jenis Perusahaan/Instansi</label>
                                <select class="form-control" name="jenis_perusahaan">
                                    <option value="">-- PILIH --</option>
                                    <?php
                                    $jenis_perusahaan = mysqli_query($mysqli, "SELECT * FROM jenis_perusahaan");
                                    while ($data_perusahaan = mysqli_fetch_array($jenis_perusahaan)) {
                                        ?>
                                        <option value="<?php echo $data_perusahaan['id']; ?>"><?php echo strtoupper($data_perusahaan['name']); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <table>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="simpan" value="SIMPAN" class="btn btn-success btn-sm"></td>
                                </tr>		
                            </table>
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
