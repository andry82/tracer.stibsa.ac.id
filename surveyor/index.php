<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HALAMAN DEPAN | Survey Alumni - AMA YPK Yogyakarta</title>

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
                        <h4 class="page-header"><i class="fa fa-home fa-fw"></i> HALAMAN DEPAN</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <div class="alert alert-warning" role="alert">
                        <b>PERHATIAN ... !</b><br/>
                        - Sebelum Malekukan Survei diharuskan menglengkapi terlebih dahulu data <a href="surveyor.php">IDENTITAS PENILAI</a><br/>
                        - Survei hanya dapat dilakukan satu kali dan tidak bisa di perbaiki
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <b>IDENTITAS KARYAWAN YANG DI NILAI</b><br/><br/>
                        <?php
                        $nim = $_SESSION['nim'];
                        $mhs = mysqli_query($mysqli, "SELECT * FROM msmhs WHERE NIMHSMSMHS='$nim'");
                        $cekmhs = mysqli_num_rows($mhs);
                        while ($dmhs = mysqli_fetch_array($mhs)) {
                            $nama_alumni = $dmhs['NMMHSMSMHS'];
                            $jenis_kelamin = $dmhs['KDJEKMSMHS'];
                        }
                        ?>
                        Nama Pegawai : <?php echo $nama_alumni; ?><br/>
                        Bagian / Departemen : <?php echo $_SESSION['departemen'] ?><br/>
                        Jabatan : <?php echo $_SESSION['jabatan'] ?> <br/>
                        Jenis Kelamin : <?php echo $jenis_kelamin; ?><br/>
                    </div> 
                    <div class="col-lg-6">
                        <?php
                        $id = $_SESSION['id'];
                        $survei = mysqli_query($mysqli, "select * from surveyor where pekerjaan_id='$id'");
                        while ($dsurvei = mysqli_fetch_array($survei)) {
                            $nama_surveyor = $dsurvei['nama_surveyor'];
                            $jabatan_surveyor = $dsurvei['jabatan_surveyor'];
                            $alamat_instansi = $dsurvei['alamat_instansi'];
                            $telp = $dsurvei['telp'];
                            $fax = $dsurvei['fax'];
                        }
                        ?>                        
                        <b>IDENTITAS PENILAI PADA INSTANSI ATAU PERUSAHAAN</b><br/><br/>
                        Nama : <?php echo $nama_surveyor; ?><br/>
                        Jabatan : <?php echo $jabatan_surveyor; ?><br/>
                        Instansi / Perusahaan : <?php echo $_SESSION['instansi']; ?><br/>
                        Alamat : <?php echo $alamat_instansi; ?><br/>
                        No Telp : <?php echo $telp; ?><br/>
                        No Fax : <?php echo $fax; ?><br/> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header"><i class="fa fa-check fa-fw"></i> SURVEY KOMPETENSI LULUSAN</h4>
                    </div>
                    <?php
                    $id_pekerjaan = $_SESSION['id'];
                    $surveyor = mysqli_query($mysqli, "SELECT * FROM surveyor WHERE pekerjaan_id=$id_pekerjaan");
                    $countsurveyor = mysqli_num_rows($surveyor);
                    while ($datasurvei = mysqli_fetch_array($surveyor)) {
                        $poin_1 = $datasurvei['poin_1'];
                        $poin_2 = $datasurvei['poin_2'];
                        $poin_3 = $datasurvei['poin_3'];
                        $poin_4 = $datasurvei['poin_4'];
                        $poin_5 = $datasurvei['poin_5'];
                        $poin_6 = $datasurvei['poin_6'];
                        $poin_7 = $datasurvei['poin_7'];
                        $poin_8 = $datasurvei['poin_8'];
                        $poin_9 = $datasurvei['poin_9'];
                    }
                    ?>
                    <div class="col-lg-12">
                        Integritas (Etika dan Moral) ! <b><?php echo $poin_1; ?></b>
                        <?php
                        if ($poin_1 == 'Kurang') {
                            $prosentase = 25;
                            $progress = 'danger';
                        } elseif ($poin_1 == 'Cukup') {
                            $prosentase = 50;
                            $progress = 'warning';
                        } elseif ($poin_1 == 'Baik') {
                            $prosentase = 75;
                            $progress = 'primary';
                        } elseif ($poin_1 == 'Sangat Baik') {
                            $prosentase = 100;
                            $progress = 'success';
                        }
                        ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-<?php echo $progress; ?>" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $prosentase; ?>%">
                                <?php echo $prosentase; ?>% Complete
                            </div>
                        </div>
                        Keahlian Berdasarkan Bidang Ilmu (Profesionalisme) ! <b><?php echo $poin_2; ?></b>
                        <?php
                        if ($poin_2 == 'Kurang') {
                            $prosentase = 25;
                            $progress = 'danger';
                        } elseif ($poin_2 == 'Cukup') {
                            $prosentase = 50;
                            $progress = 'warning';
                        } elseif ($poin_2 == 'Baik') {
                            $prosentase = 75;
                            $progress = 'primary';
                        } elseif ($poin_2 == 'Sangat Baik') {
                            $prosentase = 100;
                            $progress = 'success';
                        }
                        ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-<?php echo $progress; ?>" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $prosentase; ?>%">
                                <?php echo $prosentase; ?>% Complete
                            </div>
                        </div>
                        Kemampuan Bahasa Inggris ! <b><?php echo $poin_3; ?></b>
                        <?php
                        if ($poin_3 == 'Kurang') {
                            $prosentase = 25;
                            $progress = 'danger';
                        } elseif ($poin_3 == 'Cukup') {
                            $prosentase = 50;
                            $progress = 'warning';
                        } elseif ($poin_3 == 'Baik') {
                            $prosentase = 75;
                            $progress = 'primary';
                        } elseif ($poin_3 == 'Sangat Baik') {
                            $prosentase = 100;
                            $progress = 'success';
                        }
                        ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-<?php echo $progress; ?>" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $prosentase; ?>%">
                                <?php echo $prosentase; ?>% Complete
                            </div>
                        </div>
                        Kemampuan Berkomunikasi ! <b><?php echo $poin_4; ?></b>
                        <?php
                        if ($poin_4 == 'Kurang') {
                            $prosentase = 25;
                            $progress = 'danger';
                        } elseif ($poin_4 == 'Cukup') {
                            $prosentase = 50;
                            $progress = 'warning';
                        } elseif ($poin_4 == 'Baik') {
                            $prosentase = 75;
                            $progress = 'primary';
                        } elseif ($poin_4 == 'Sangat Baik') {
                            $prosentase = 100;
                            $progress = 'success';
                        }
                        ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-<?php echo $progress; ?>" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $prosentase; ?>%">
                                <?php echo $prosentase; ?>% Complete
                            </div>
                        </div>
                        Leadership / Kepemimpinan ! <b><?php echo $poin_5; ?></b>
                        <?php
                        if ($poin_5 == 'Kurang') {
                            $prosentase = 25;
                            $progress = 'danger';
                        } elseif ($poin_5 == 'Cukup') {
                            $prosentase = 50;
                            $progress = 'warning';
                        } elseif ($poin_5 == 'Baik') {
                            $prosentase = 75;
                            $progress = 'primary';
                        } elseif ($poin_5 == 'Sangat Baik') {
                            $prosentase = 100;
                            $progress = 'success';
                        }
                        ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-<?php echo $progress; ?>" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $prosentase; ?>%">
                                <?php echo $prosentase; ?>% Complete
                            </div>
                        </div>
                        Penguasaan Teknologi Informasi ! <b><?php echo $poin_6; ?></b>
                        <?php
                        if ($poin_6 == 'Kurang') {
                            $prosentase = 25;
                            $progress = 'danger';
                        } elseif ($poin_6 == 'Cukup') {
                            $prosentase = 50;
                            $progress = 'warning';
                        } elseif ($poin_6 == 'Baik') {
                            $prosentase = 75;
                            $progress = 'primary';
                        } elseif ($poin_6 == 'Sangat Baik') {
                            $prosentase = 100;
                            $progress = 'success';
                        }
                        ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-<?php echo $progress; ?>" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $prosentase; ?>%">
                                <?php echo $prosentase; ?>% Complete
                            </div>
                        </div>
                        Kerjasama Tim ! <b><?php echo $poin_7; ?></b>
                        <?php
                        if ($poin_7 == 'Kurang') {
                            $prosentase = 25;
                            $progress = 'danger';
                        } elseif ($poin_7 == 'Cukup') {
                            $prosentase = 50;
                            $progress = 'warning';
                        } elseif ($poin_7 == 'Baik') {
                            $prosentase = 75;
                            $progress = 'primary';
                        } elseif ($poin_7 == 'Sangat Baik') {
                            $prosentase = 100;
                            $progress = 'success';
                        }
                        ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-<?php echo $progress; ?>" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $prosentase; ?>%">
                                <?php echo $prosentase; ?>% Complete
                            </div>
                        </div>
                        Pengembangan Diri ! <b><?php echo $poin_8; ?></b>
                        <?php
                        if ($poin_8 == 'Kurang') {
                            $prosentase = 25;
                            $progress = 'danger';
                        } elseif ($poin_8 == 'Cukup') {
                            $prosentase = 50;
                            $progress = 'warning';
                        } elseif ($poin_8 == 'Baik') {
                            $prosentase = 75;
                            $progress = 'primary';
                        } elseif ($poin_8 == 'Sangat Baik') {
                            $prosentase = 100;
                            $progress = 'success';
                        }
                        ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-<?php echo $progress; ?>" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $prosentase; ?>%">
                                <?php echo $prosentase; ?>% Complete
                            </div>
                        </div>
                        Penilaian Kualitas secara Keseluruhan ! <b><?php echo $poin_9; ?></b>
                        <?php
                        if ($poin_9 == 'Kurang') {
                            $prosentase = 25;
                            $progress = 'danger';
                        } elseif ($poin_9 == 'Cukup') {
                            $prosentase = 50;
                            $progress = 'warning';
                        } elseif ($poin_9 == 'Baik') {
                            $prosentase = 75;
                            $progress = 'primary';
                        } elseif ($poin_9 == 'Sangat Baik') {
                            $prosentase = 100;
                            $progress = 'success';
                        }
                        ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-<?php echo $progress; ?>" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $prosentase; ?>%">
                                <?php echo $prosentase; ?>% Complete
                            </div>
                        </div>
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