<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>KUISIONER | SISTEM INFORMASI TRACER STUDY - SEKOLAH TINGGI ILMU BISNIS KUMALA NUSA</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">
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
    </script>
    <body onload="tampilkanwaktu(); setInterval('tampilkanwaktu()', 1000);">	
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
                <?php
                include 'sidebar_menu.php';
                $kuisioner = mysqli_query($mysqli, "SELECT * FROM kuisioner WHERE nim='$nim'");
                $data_kuisioner = mysqli_fetch_array($kuisioner);
                ?>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                        <h4 class="page-header"><i class="fa fa-question fa-fw"></i> KUISIONER</h4>
                        <?php
                        $pekerjaan = mysqli_query($mysqli, "SELECT * FROM alumni_bekerja WHERE nim='$nim'");
                        $jumlah_pekerjaan = mysqli_num_rows($pekerjaan);
                        if ($jumlah_pekerjaan == 0) {
                            ?>
                            <div class="alert alert-warning alert-dismissible fade in">
                                MOHON MAAF ! DATA PEKERJAAN BELUM TERISI
                            </div>
<?php } else { ?>
                            <form accept-charset="UTF-8" action="proses_tracer_kuisioner.php" onsubmit="return validasi_input(this)" class="form-horizontal" method="post" style="padding: 12px;">
                                <input name="nim" type="hidden" value="<?php echo $nim; ?>">
                                <table width="100%" class="table table-bordered">
                                    <tr>
                                        <td width="30%">Jelaskan Status Anda ??</td>
                                        <td width="70%">
                                            <div class="radio">
                                                <label>
                                                    <?php if ($data_kuisioner['f8'] == 1) { ?>
                                                        <input type="radio" name="f8" class="f83" value="1" checked>
                                                    <?php } elseif ($data_kuisioner['f8'] != 1) { ?>
                                                        <input type="radio" name="f8" class="f83" value="1">
    <?php } ?>
                                                    [1] Bekerja (full time/part time)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <?php if ($data_kuisioner['f8'] == 2) { ?>
                                                        <input type="radio" name="f8" class="f83" value="2" checked>
                                                    <?php } elseif ($data_kuisioner['f8'] != 2) { ?>
                                                        <input type="radio" name="f8" class="f83" value="2">
    <?php } ?>
                                                    [2] Belum memungkinkan bekerja  
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <?php if ($data_kuisioner['f8'] == 3) { ?>
                                                        <input type="radio" name="f8" class="f83" value="3" checked>
                                                    <?php } elseif ($data_kuisioner['f8'] != 3) { ?>
                                                        <input type="radio" name="f8" class="f83" value="3">
    <?php } ?>
                                                    [3] Wiraswasta
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <?php if ($data_kuisioner['f8'] == 4) { ?>
                                                        <input type="radio" name="f8" class="f83" value="4" checked>
                                                    <?php } elseif ($data_kuisioner['f8'] != 4) { ?>
                                                        <input type="radio" name="f8" class="f83" value="4">
    <?php } ?>
                                                    [4] Melanjutkan Pendidikan 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <?php if ($data_kuisioner['f8'] == 5) { ?>
                                                        <input type="radio" name="f8" class="f83" value="5" checked>
                                                    <?php } elseif ($data_kuisioner['f8'] != 5) { ?>
                                                        <input type="radio" name="f8" class="f83" value="5">
    <?php } ?>
                                                    [5] Tidak Kerja tetapi sedang mencari kerja 
                                                </label>
                                            </div>                
                                        </td>
                                    </tr>     
                                    <script type="text/javascript">
                                        $(function () {
                                            $(":radio.f83").click(function () {
                                                if ($(this).val() != "3") {
                                                    $("#wiraswasta").hide();
                                                } else {
                                                    $("#wiraswasta").show();
                                                }
                                                if ($(this).val() != "4") {
                                                    $("#lanjut_pendidikan").hide();
                                                } else {
                                                    $("#lanjut_pendidikan").show();
                                                }
                                            });
                                        });
                                    </script>
                                    <tr>
                                        <td>Apakah anda telah mendapatkan pekerjaan <= 6 bulan / termasuk bekerja sebelum lulus ?</td>
                                        <td>
                                            <div class="radio ">
                                                <label>
                                                    <?php if ($data_kuisioner['f504'] == 1) { ?>
                                                        <input type="radio" name="f504" value="1" checked>
                                                    <?php } elseif ($data_kuisioner['f504'] != 1) { ?>
                                                        <input type="radio" name="f504" value="1">
    <?php } ?>
                                                    [1] Ya                        
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <?php if ($data_kuisioner['f504'] == 2) { ?>
                                                        <input type="radio" name="f504" value="2" checked>
                                                    <?php } elseif ($data_kuisioner['f504'] != 2) { ?>
                                                        <input type="radio" name="f504" value="2">
    <?php } ?>
                                                    [2] Tidak
                                                </label>  
                                            </div>                
                                            <br/>
                                            Dalam berapa bulan anda mendapatkan pekerjaan ?
                                            <input class="form-control col-sm-1" name="masa_tunggu" value="<?php echo $data_kuisioner['masa_tunggu']; ?>" size="15" type="text" />
                                            <br/>
                                            Berapa rata-rata pendapatan anda per bulan ? (take home pay)?
                                            <input class="form-control col-sm-3" name="pendapatan_rata" value="<?php echo $data_kuisioner['pendapatan_rata']; ?>" size="15" type="text" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kesesuaian Bidang Kerja / Bagian / Unit Kerja</td>
                                        <td>
                                            <div class="radio ">
                                                <label>
                                                    <?php if ($data_kuisioner['f504'] == 1) { ?>
                                                        <input type="radio" name="f504" value="1" checked>
                                                    <?php } elseif ($data_kuisioner['f504'] != 1) { ?>
                                                        <input type="radio" name="f504" value="1">
    <?php } ?>
                                                    [1] Sesuai                       
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <?php if ($data_kuisioner['f504'] == 2) { ?>
                                                        <input type="radio" name="f504" value="2" checked>
                                                    <?php } elseif ($data_kuisioner['f504'] != 2) { ?>
                                                        <input type="radio" name="f504" value="2">
    <?php } ?>
                                                    [2] Tidak Sesuai
                                                </label>  
                                            </div>                
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dimana lokasi tempat Anda bekerja? ?</td>
                                        <td>
                                            Propinsi :
                                            <select class="form-control" name="f5a1" id="propinsi">
                                                <option value="">-- PILIH --</option>
                                                <?php
                                                $propinsi = mysqli_query($mysqli, "SELECT * FROM provinsi");
                                                while ($data_propinsi = mysqli_fetch_array($propinsi)) {
                                                    ?>
                                                    <?php if ($data_propinsi['id'] == $data_kuisioner['f5a1']) { ?>
                                                        <option value="<?php echo $data_propinsi['id']; ?>" selected><?php echo strtoupper($data_propinsi['nama_provinsi']); ?></option>
                                                    <?php } else { ?>                                            
                                                        <option value="<?php echo $data_propinsi['id']; ?>"><?php echo strtoupper($data_propinsi['nama_provinsi']); ?></option>
                                                    <?php } ?>
    <?php } ?>
                                            </select>
                                            <br/>
                                            Kabupaten/Kota :
                                            <select class="form-control" name="f5a2" id="kabupaten"> 
                                                <?php if ($data_kuisioner['f5a2'] == "") { ?>
                                                    <option value="">-- PILIH --</option>
                                                <?php } elseif ($data_kuisioner['f5a2'] != "") { ?>   
                                                    <option value="">-- PILIH --</option>
                                                    <?php
                                                    $propinsi = $data_kuisioner['f5a1'];
                                                    $kabupaten = mysqli_query($mysqli, "SELECT * FROM kota WHERE provinsi_id='$propinsi'");
                                                    while ($data_kabupaten = mysqli_fetch_array($kabupaten)) {
                                                        ?>
                                                        <?php if ($data_kabupaten['kode_kota'] == $data_kuisioner['f5a2']) { ?>
                                                            <option value="<?php echo $data_kabupaten['kode_kota']; ?>" selected><?php echo strtoupper($data_kabupaten['nama_kota']); ?></option>
                                                        <?php } else { ?>                                            
                                                            <option value="<?php echo $data_kabupaten['kode_kota']; ?>"><?php echo strtoupper($data_kabupaten['nama_kota']); ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
    <?php } ?>
                                            </select>
                                            <br/>
                                        </td>
                                    <script type="text/javascript">
                                        $("#propinsi").change(function () {
                                            // variabel dari nilai combo box kendaraan
                                            var id_wilayah = $("#propinsi").val();
                                            $.ajax({
                                                method: "POST",
                                                dataType: "html",
                                                url: "kabupaten.php",
                                                data: {
                                                    wilayah: id_wilayah
                                                },
                                                success: function (data) {
                                                    $("#kabupaten").html(data);
                                                }
                                            });
                                        });
                                    </script>
                                    </tr>                                    
                                </table>
                                <div class="form-group">
                                    <div class="col-sm-offset-4">
                                        <input class="btn btn-default" name="commit" type="submit" value="Kirimkan" />
                                    </div>
                                </div>
                            </form>
<?php } ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>                
            </div>          <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/metisMenu/metisMenu.min.js"></script>
        <script src="vendor/raphael/raphael.min.js"></script>
        <script src="vendor/morrisjs/morris.min.js"></script>
        <script src="dist/js/sb-admin-2.js"></script>
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