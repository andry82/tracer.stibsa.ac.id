<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LAPORAN PENGGUNA | SISTEM INFORMASI TRACER STUDY - SEKOLAH TINGGI ILMU BISNIS KUMALA NUSA</title>

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
    $angkatan = $_GET['angkatan'];

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] != "tracer") {
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
                        <h4 class="page-header"><i class="fa fa-list fa-fw"></i> LAPORAN PENGGUNA ANGKATAN <?php echo $angkatan; ?></h4>
                        <div style="width: 800px;margin: 0px auto;">
                            <canvas id="myChart"></canvas>
                        </div>
                        <br/>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">                    
                    <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center">NAMA PRODI</th>                                    
                                    <th style="text-align: center">JUMLAH ALUMNI BEKERJA</th>
                                    <th style="text-align: center">JUMLAH PENGGUNA</th>
                                </tr>
                            </thead>
                            <tbody>    
                                <?php
                                $result = mysqli_query($mysqli, "SELECT * FROM mspst");
                                while ($data = mysqli_fetch_array($result)) {
                                    $kode_ps = $data['KDPSTMSPST'];
                                    ?>                          
                                    <tr>
                                        <td><?php echo strtoupper($data['NMPSTMSPST']); ?></td>
                                        <?php
                                        $alumni = mysqli_query($mysqli, "SELECT DISTINCT ak.nim FROM msmhs m, alumni_bekerja ak WHERE ak.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='$kode_ps' AND m.TAHUNMSMHS='$angkatan'");
                                        $count_alumni = mysqli_num_rows($alumni);
                                        ?>
                                        <td style="text-align: center"><?php echo $count_alumni; ?></td>
                                        <?php
                                        $perusahaan = mysqli_query($mysqli, "SELECT * FROM msmhs m, alumni_bekerja ak WHERE ak.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='$kode_ps' AND m.TAHUNMSMHS='$angkatan'");
                                        $count_perusahaan = mysqli_num_rows($perusahaan);
                                        ?>
                                        <td style="text-align: center"><?php echo $count_perusahaan; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br />
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center">TOPIK</th>                                    
                                    <th style="text-align: center">1</th>
                                    <th style="text-align: center">2</th>
                                    <th style="text-align: center">3</th>
                                    <th style="text-align: center">4</th>
                                </tr>
                            </thead>
                            <tbody>    
                                <tr>
                                    <td>ETIKA</td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q11a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q1='1'");
                                    $count_re_q11a = mysqli_num_rows($re_q11a);
                                    $re_q11b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q1='1'");
                                    $count_re_q11b = mysqli_num_rows($re_q11b);
                                    echo $count_re_q11a .' | '. $count_re_q11b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q12a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q1='2'");
                                    $count_re_q12a = mysqli_num_rows($re_q12a);
                                    $re_q12b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q1='2'");
                                    $count_re_q12b = mysqli_num_rows($re_q12b);
                                    echo $count_re_q12a .' | '. $count_re_q12b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q13a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q1='3'");
                                    $count_re_q13a = mysqli_num_rows($re_q13a);
                                    $re_q13b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q1='3'");
                                    $count_re_q13b = mysqli_num_rows($re_q13b);
                                    echo $count_re_q13a .' | '. $count_re_q13b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q14a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q1='4'");
                                    $count_re_q14a = mysqli_num_rows($re_q14a);
                                    $re_q14b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q1='4'");
                                    $count_re_q14b = mysqli_num_rows($re_q14b);
                                    echo $count_re_q14a .' | '. $count_re_q14b;
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>KOMPETENSI</td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q21a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q2='1'");
                                    $count_re_q21a = mysqli_num_rows($re_q21a);
                                    $re_q21b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q2='1'");
                                    $count_re_q21b = mysqli_num_rows($re_q21b);
                                    echo $count_re_q21a .' | '. $count_re_q21b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q22a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q2='2'");
                                    $count_re_q22a = mysqli_num_rows($re_q22a);
                                    $re_q22b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q2='2'");
                                    $count_re_q22b = mysqli_num_rows($re_q22b);
                                    echo $count_re_q22a .' | '. $count_re_q22b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q23a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q2='3'");
                                    $count_re_q23a = mysqli_num_rows($re_q23a);
                                    $re_q23b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q2='3'");
                                    $count_re_q23b = mysqli_num_rows($re_q23b);
                                    echo $count_re_q23a .' | '. $count_re_q23b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q24a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q2='4'");
                                    $count_re_q24a = mysqli_num_rows($re_q24a);
                                    $re_q24b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q2='4'");
                                    $count_re_q24b = mysqli_num_rows($re_q24b);
                                    echo $count_re_q24a .' | '. $count_re_q24b;
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>KEMAMPUAN BAHASA ASING</td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q31a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q3='1'");
                                    $count_re_q31a = mysqli_num_rows($re_q31a);
                                    $re_q31b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q3='1'");
                                    $count_re_q31b = mysqli_num_rows($re_q31b);
                                    echo $count_re_q31a .' | '. $count_re_q31b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q32a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q3='2'");
                                    $count_re_q32a = mysqli_num_rows($re_q32a);
                                    $re_q32b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q3='2'");
                                    $count_re_q32b = mysqli_num_rows($re_q32b);
                                    echo $count_re_q32a .' | '. $count_re_q32b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q33a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q3='3'");
                                    $count_re_q33a = mysqli_num_rows($re_q33a);
                                    $re_q33b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q3='3'");
                                    $count_re_q33b = mysqli_num_rows($re_q33b);
                                    echo $count_re_q33a .' | '. $count_re_q33b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q34a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q3='4'");
                                    $count_re_q34a = mysqli_num_rows($re_q34a);
                                    $re_q34b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q3='4'");
                                    $count_re_q34b = mysqli_num_rows($re_q34b);
                                    echo $count_re_q34a .' | '. $count_re_q34b;
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PENGGUNAAN TEKNOLOGI INFORMASI</td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q41a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q4='1'");
                                    $count_re_q41a = mysqli_num_rows($re_q41a);
                                    $re_q41b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q4='1'");
                                    $count_re_q41b = mysqli_num_rows($re_q41b);
                                    echo $count_re_q41a .' | '. $count_re_q41b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q42a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q4='2'");
                                    $count_re_q42a = mysqli_num_rows($re_q42a);
                                    $re_q42b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q4='2'");
                                    $count_re_q42b = mysqli_num_rows($re_q42b);
                                    echo $count_re_q42a .' | '. $count_re_q42b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q43a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q4='3'");
                                    $count_re_q43a = mysqli_num_rows($re_q43a);
                                    $re_q43b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q4='3'");
                                    $count_re_q43b = mysqli_num_rows($re_q43b);
                                    echo $count_re_q43a .' | '. $count_re_q43b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q44a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q4='4'");
                                    $count_re_q44a = mysqli_num_rows($re_q44a);
                                    $re_q44b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q4='4'");
                                    $count_re_q44b = mysqli_num_rows($re_q44b);
                                    echo $count_re_q44a .' | '. $count_re_q44b;
                                    ?>
                                </tr>
                                <tr>
                                    <td>KEMAMPUAN BERKOMINIKASI</td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q51a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q5='1'");
                                    $count_re_q51a = mysqli_num_rows($re_q51a);
                                    $re_q51b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q5='1'");
                                    $count_re_q51b = mysqli_num_rows($re_q51b);
                                    echo $count_re_q51a .' | '. $count_re_q51b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q52a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q5='2'");
                                    $count_re_q52a = mysqli_num_rows($re_q52a);
                                    $re_q52b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q5='2'");
                                    $count_re_q52b = mysqli_num_rows($re_q52b);
                                    echo $count_re_q52a .' | '. $count_re_q52b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q53a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q5='3'");
                                    $count_re_q53a = mysqli_num_rows($re_q53a);
                                    $re_q53b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q5='3'");
                                    $count_re_q53b = mysqli_num_rows($re_q53b);
                                    echo $count_re_q53a .' | '. $count_re_q53b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q54a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q5='4'");
                                    $count_re_q54a = mysqli_num_rows($re_q54a);
                                    $re_q54b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q5='4'");
                                    $count_re_q54b = mysqli_num_rows($re_q54b);
                                    echo $count_re_q54a .' | '. $count_re_q54b;
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>KEJASAMA TIM</td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q61a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q6='1'");
                                    $count_re_q61a = mysqli_num_rows($re_q61a);
                                    $re_q61b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q6='1'");
                                    $count_re_q61b = mysqli_num_rows($re_q61b);
                                    echo $count_re_q61a .' | '. $count_re_q61b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q62a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q6='2'");
                                    $count_re_q62a = mysqli_num_rows($re_q62a);
                                    $re_q62b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q6='2'");
                                    $count_re_q62b = mysqli_num_rows($re_q62b);
                                    echo $count_re_q62a .' | '. $count_re_q62b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q63a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q6='3'");
                                    $count_re_q63a = mysqli_num_rows($re_q63a);
                                    $re_q63b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q6='3'");
                                    $count_re_q63b = mysqli_num_rows($re_q63b);
                                    echo $count_re_q63a .' | '. $count_re_q63b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q64a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q6='4'");
                                    $count_re_q64a = mysqli_num_rows($re_q64a);
                                    $re_q64b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q6='4'");
                                    $count_re_q64b = mysqli_num_rows($re_q64b);
                                    echo $count_re_q64a .' | '. $count_re_q64b;
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PENGAMBANGAN DIRI</td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q71a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q7='1'");
                                    $count_re_q71a = mysqli_num_rows($re_q71a);
                                    $re_q71b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q7='1'");
                                    $count_re_q71b = mysqli_num_rows($re_q71b);
                                    echo $count_re_q71a .' | '. $count_re_q71b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q72a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q7='2'");
                                    $count_re_q72a = mysqli_num_rows($re_q72a);
                                    $re_q72b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q7='2'");
                                    $count_re_q72b = mysqli_num_rows($re_q72b);
                                    echo $count_re_q72a .' | '. $count_re_q72b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q73a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q7='3'");
                                    $count_re_q73a = mysqli_num_rows($re_q73a);
                                    $re_q73b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q7='3'");
                                    $count_re_q73b = mysqli_num_rows($re_q73b);
                                    echo $count_re_q73a .' | '. $count_re_q73b;
                                    ?>
                                    </td>
                                    <td style='text-align: center;'>
                                    <?php 
                                    $re_q74a = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401' AND m.TAHUNMSMHS='$angkatan' AND sab.q7='4'");
                                    $count_re_q74a = mysqli_num_rows($re_q74a);
                                    $re_q74b = mysqli_query($mysqli, "SELECT * FROM msmhs m, survei_alumni_bekerja sab WHERE sab.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201' AND m.TAHUNMSMHS='$angkatan' AND sab.q7='4'");
                                    $count_re_q74b = mysqli_num_rows($re_q74b);
                                    echo $count_re_q74a .' | '. $count_re_q74b;
                                    ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
        <script type="text/javascript" src="../chartjs/Chart.js"></script>
        <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true,
                ordering: false
            });
        });
        </script>
        <?php
        $alumni_1 = mysqli_query($mysqli, "SELECT DISTINCT ak.nim FROM msmhs m, alumni_bekerja ak WHERE ak.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401'");
        $count_alumni_1 = mysqli_num_rows($alumni_1);
        $alumni_2 = mysqli_query($mysqli, "SELECT DISTINCT ak.nim FROM msmhs m, alumni_bekerja ak WHERE ak.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201'");
        $count_alumni_2 = mysqli_num_rows($alumni_2);
        $perusahaan_1 = mysqli_query($mysqli, "SELECT * FROM msmhs m, alumni_bekerja ak WHERE ak.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61401'");
        $count_perusahaan_1 = mysqli_num_rows($perusahaan_1);
        $perusahaan_2 = mysqli_query($mysqli, "SELECT * FROM msmhs m, alumni_bekerja ak WHERE ak.nim=m.NIMHSMSMHS AND m.STMHSMSMHS='L' AND m.KDPSTMSMHS='61201'");
        $count_perusahaan_2 = mysqli_num_rows($perusahaan_2);
        ?>
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["MANAJEMEN ADMINISTRASI", "MANAJEMEN"],
                    datasets: [{
                            label: 'Jumlah Alumni Bekerja',
                            data: [<?php echo $count_alumni_1; ?>, <?php echo $count_alumni_2; ?>],
                            borderColor: ['black', 'black'],
                            backgroundColor: ['black', 'black'],
                            borderWidth: 3,
                            pointRadius: 5,
                        }, {
                            label: 'Jumlah Pengguna',
                            data: [<?php echo $count_perusahaan_1; ?>, <?php echo $count_perusahaan_2; ?>],
                            borderColor: ['blue', 'blue'],
                            backgroundColor: ['blue', 'blue'],
                            borderWidth: 3,
                            pointRadius: 5,
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>
</html>
