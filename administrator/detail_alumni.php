<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>DETAIL DATA ALUMNI | SISTEM INFORMASI TRACER STUDY - SEKOLAH TINGGI ILMU BISNIS KUMALA NUSA</title>

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
                        <h4 class="page-header"><i class="fa fa-eye fa-fw"></i> DETAIL ALUMNI</h4>
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
                            $nama_alumni = $data['nama_mhs'];
                            $thn_lulus = $data['thn_lulus'];
                            $prodi = $data['prodi_id'];
                            $konsentrasi = $data['peminatan_id'];
                        }
                        $res_prodi = mysqli_query($mysqli, "SELECT * FROM programstudi WHERE id='$prodi'");
                        $data_prodi = mysqli_fetch_array($res_prodi);
                        $res_peminatan = mysqli_query($mysqli, "SELECT * FROM peminatan_prodi WHERE id='$konsentrasi'");
                        $data_peminatan = mysqli_fetch_array($res_peminatan);
                        ?> 
                        <center><label>DATA ALUMNI</label></center>
                        <br/>
                        <table width="100%" class="table table-bordered">                            
                            <tr>
                                <th class="col-lg-3">NOMOR INDUK MAHASISWA</th>
                                <td><?php echo $nim; ?></td>
                            </tr>
                            <tr>
                                <th class="col-lg-3">NOMOR INDUK ALUMNI</th>
                                <td><?php echo $nia; ?></td>
                            </tr>
                            <tr>
                                <th class="col-lg-3">NAMA ALUMNI</th>
                                <td><?php echo $nama_alumni; ?></td>
                            </tr>
                            <tr>
                                <th class="col-lg-3">PROGRAM STUDI</th>
                                <td>
                                  <?php echo $data_prodi['jenjang']; ?> - <?php echo $data_prodi['nama_prodi']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-lg-3">KONSENTRASI</th>
                                <td>
                                    <?php echo $data_peminatan['nama_peminatan']; ?>
                                </td>
                            </tr> 
                            <tr>
                                <th class="col-lg-3">TAHUN LULUS</th>
                                <td><?php echo $thn_lulus; ?></td>
                            </tr>
                        </table>
                        <a href="edit_data_alumni.php?nim=<?php echo $nim; ?>" class="btn btn-success btn-sm"><i class="fa fa-edit fa-fw"></i> EDIT DATA ALUMNI</a>
                        <br />
                        <center><label>DATA PEKERJAAN</label></center>
                        <br/>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="col-lg-1">NO</th>
                                    <th class="col-lg-6">INFORMASI PPEKERJAAN</th>
                                    <th class="col-lg-6">LINK SURVEI</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                               <?php 
                               $result = mysqli_query($mysqli, "SELECT * FROM alumni_kerja ak, jenis_perusahaan jp WHERE ak.jenis_instansi=jp.id AND ak.nim='$nim' ORDER BY ak.tgl_masuk ASC");
                               $no = 1;
                               while ($data = mysqli_fetch_array($result)) {?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>
                                       INSTANSI : <?php echo $data['nama_ip']; ?><br/>
                                       ALAMAT : <?php echo $data['alamat']; ?><br/>
                                       TANGGAL MASUK : <?php echo date('d-m-Y', strtotime($data['tgl_masuk'])); ?><br/>
                                       JABATAN : <?php echo $data['jabatan']; ?><br/>
                                       JENIS PERUSAHAAN / INSTANSI : <?php echo $data['name']; ?><br/>
                                    </td>
                                    <td>
                                        <a href="../survei_alumni.php?nim=<?php echo $nim; ?>&key=<?php echo $data['reff']; ?>" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-link fa-fw"></i> LINK SURVEY KEPUASAN</a>
                                        <a href="edit_pekerjaan_alumni.php?nim=<?php echo $nim; ?>&key=<?php echo $data['reff']; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit fa-fw"></i> EDIT PEKERJAAN</a>
                                    </td>
                                    
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="tambah_pekerjaan_alumni.php?nim=<?php echo $nim; ?>" class="btn btn-success btn-sm"><i class="fa fa-plus fa-fw"></i> TAMBAH PEKERJAAN</a>
                        <br />
                        <br/>
                        <br/>
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
