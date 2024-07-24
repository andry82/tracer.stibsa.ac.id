<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>DETAIL MAHASISWA | Administrator Verifikasi Data Mahasiswa - AMA YPK Yogyakarta</title>

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
                        <h4 class="page-header"><i class="fa fa-eye fa-fw"></i> DETAIL MAHASISWA</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">                    
                    <div class="col-lg-12">
                        <?php
//getting id from url
                        $nim = $_GET['nim'];
//selecting data associated with this particular id
                        $res = mysqli_query($mysqli, "SELECT * FROM msmhs m, kelasparalel_mhs km, kelasparalel k, msdos md, transkrip tr WHERE m.NIMHSMSMHS=km.nimhs AND km.nmkelas=k.namakelas AND k.nodos=md.NODOSMSDOS AND m.NIMHSMSMHS='$nim' AND tr.nim='$nim'");
                        while ($data = mysqli_fetch_array($res)) {
                            $no_transkrip = $data['no_transkrip'];
                            $nik = $data['NIKMSMHS'];
                            $nama = $data['NMMHSMSMHS'];
                            $kelas = $data['nmkelas'];
                            $no_dos = $data['nodos'];
                            $nama_dosen = $data['NMDOSMSDOS'];
                            $tplahir = $data['TPLHRMSMHS'];
                            $tglahir = $data['TGLHRMSMHS'];
                            $jenis_kelamin = $data['KDJEKMSMHS'];
                            $alamat_sekarang = $data['ALAMATYOGYA'];
                            $alamat_lengkap = $data['ALAMATLENGKAP'];
                            $propinsi = $data['ASSMAMSMHS'];
                            $agama = $data['AGAMA'];
                            $telp = $data['TELP'];
                            $email = $data['EMAIL'];
                            $asal_sekolah = $data['NAMASEKOLAH'];
                            $nama_ortu = $data['NAMAORTUWALI'];
                            $telp_ortu = $data['TELPORTUWALI'];
                            $alamat_ortu = $data['ALAMATORTUWALI'];
                            $keahlian = $data['keahlian'];
                            $profesi = $data['profesi'];
                            $images = $data['ktpkk'];
                            $status_data = $data['tgl_update'];
                            $konsentrasi = $data['kdkonsen'];
                            $thmskmhs = $data['TAHUNMSMHS'];
                            $statusmhs = $data['STMHSMSMHS'];
                        }
                        ?>                        
                        <?php if ($status_data) { ?>
                            <a href="proses_status_data_mahasiswa.php?nim=<?php echo $nim; ?>&status_data=1"><span class="label label-success">VALID</span></a>
                            <a href="proses_status_data_mahasiswa.php?nim=<?php echo $nim; ?>&status_data=2"><span class="label label-default">BELUM VALID</span></a>
                        <?php } else { ?>
                            <a href="proses_status_data_mahasiswa.php?nim=<?php echo $nim; ?>&status_data=1"><span class="label label-default">VALID</span></a>
                            <a href="proses_status_data_mahasiswa.php?nim=<?php echo $nim; ?>&status_data=2"><span class="label label-success">BELUM VALID</span></a>
                        <?php } ?>
                        <br/><br/>
                        <center><label>DATA AKADEMIK</label></center>
                        <br/>
                        <table width="100%" class="table table-bordered">                            
                            <tr>
                                <th class="col-lg-3">NOMOR INDUK MAHASISWA</th>
                                <td><?php echo $nim; ?></td>
                            </tr>
                            <tr>
                                <th class="col-lg-3">NOMOR IJAZAH</th>
                                <td><?php echo $no_transkrip; ?></td>
                            </tr>
                            <tr>
                                <th class="col-lg-3">KONSENTRASI</th>
                                <td>
                                    <?php if ($konsentrasi == 'MARS') { ?>
                                        D3 - MANAJEMEN ADMINISTRASI RUMAH SAKIT
                                    <?php } elseif ($konsentrasi == 'MAOF') { ?>
                                        D3 - MANAJEMEN ADMINISTRASI OBAT DAN FARMASI
                                    <?php } elseif ($konsentrasi == 'MAP') { ?>
                                        D3 - MANAJEMEN ADMINISTRASI PERKANTORAN
                                    <?php } ?>
                                </td>
                            </tr>                     
                        </table>
                        <center><label>DATA MAHASISWA</label></center>
                        <br/>
                        <table width="100%" class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="col-lg-3">STATUS MAHASISWA</th>
                                    <td>
<?php if ($statusmhs == 'A') { ?>
                                            <a href="proses_status_akademik_mahasiswa.php?nim=<?php echo $nim; ?>&status_akademik=1"><span class="label label-success">AKTIF</span></a>
                                            <a href="proses_status_akademik_mahasiswa.php?nim=<?php echo $nim; ?>&status_akademik=2"><span class="label label-default">LULUS</span></a>
                                            <a href="proses_status_akademik_mahasiswa.php?nim=<?php echo $nim; ?>&status_akademik=3"><span class="label label-default">KELUAR</span></a>
<?php } elseif ($statusmhs == 'L') { ?>
                                            <a href="proses_status_akademik_mahasiswa.php?nim=<?php echo $nim; ?>&status_akademik=1"><span class="label label-default">AKTIF</span></a>
                                            <a href="proses_status_akademik_mahasiswa.php?nim=<?php echo $nim; ?>&status_akademik=2"><span class="label label-success">LULUS</span></a>
                                            <a href="proses_status_akademik_mahasiswa.php?nim=<?php echo $nim; ?>&status_akademik=3"><span class="label label-default">KELUAR</span></a>
<?php } elseif ($statusmhs == 'K') { ?>
                                            <a href="proses_status_akademik_mahasiswa.php?nim=<?php echo $nim; ?>&status_akademik=1"><span class="label label-default">AKTIF</span></a>
                                            <a href="proses_status_akademik_mahasiswa.php?nim=<?php echo $nim; ?>&status_akademik=2"><span class="label label-default">LULUS</span></a>
                                            <a href="proses_status_akademik_mahasiswa.php?nim=<?php echo $nim; ?>&status_akademik=3"><span class="label label-success">KELUAR</span></a>
<?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-lg-3">NIK (KTP / KK)</th>
                                    <td><?php echo $nik; ?></td>
                                </tr>
                                <tr>
                                    <th>NAMA LENGKAP</th>
                                    <td><?php echo $nama; ?></td>
                                </tr>
                                <tr>
                                    <th>TEMPAT TANGGAL LAHIR</th>
                                    <td><?php echo $tplahir; ?>, <?php echo date('d-m-Y', strtotime($tglahir)); ?></td>
                                </tr>
                                <tr>
                                    <th>ALAMAT SEKARANG</th>
                                    <td><?php echo $alamat_sekarang; ?></td>
                                </tr>
                                <tr>
                                    <th>ALAMAT ASAL</th>
                                    <td><?php echo $alamat_lengkap; ?></td>
                                </tr>
                                <tr>
                                    <th>PROPINSI</th>
                                    <td><?php
                                        $pro = mysqli_query($mysqli, "SELECT * FROM tbpro WHERE KDPROTBPRO='$propinsi'");
                                        $datapro = mysqli_fetch_array($pro);
                                        $KDPROTBPRO = $datapro["KDPROTBPRO"];
                                        $NMPROTBPRO = $datapro["NMPROTBPRO"];
                                        ?>
<?php echo $KDPROTBPRO; ?> - <?php echo $NMPROTBPRO; ?></td>
                                </tr>
                                <tr>
                                    <th>JENIS KELAMIN</th>
                                    <td>
                                        <?
                                        if($jenis_kelamin=="L")
                                        {
                                        ?>
                                        LAKI LAKI
                                        <?
                                        }elseif($jenis_kelamin=="P")
                                        {
                                        ?>
                                        PEREMPUAN
                                        <?
                                        }?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>AGAMA</th>
                                    <td>
                                        <?
                                        if($agama=="B")
                                        {
                                        ?>
                                        BUDHA
                                        <?
                                        }elseif($agama=="H")
                                        {
                                        ?>
                                        HINDU
                                        <?
                                        }elseif($agama=="I")
                                        {
                                        ?>
                                        ISLAM
                                        <?
                                        }elseif($agama=="K")
                                        {
                                        ?>
                                        KATOLIK
                                        <?
                                        }elseif($agama=="L")
                                        {
                                        ?>
                                        LAIN-LAIN
                                        <?
                                        }elseif($agama =="P")
                                        {
                                        ?>
                                        PROTESTAN
                                        <?
                                        }elseif($agama =="C")
                                        {
                                        ?>
                                        KEPERCAYAAN
                                        <?
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>E-MAIL</th>
                                    <td><?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <th>ASAL SEKOLAH</th>
                                    <td><?php echo $asal_sekolah; ?></td>
                                </tr>
                                <tr>
                                    <th>NO HANDPHONE</th>
                                    <td><?php echo $telp; ?></td>
                                </tr>
                                <tr>
                                    <th>KEAHLIAN</th>
                                    <td><?php echo $keahlian; ?></td>
                                </tr>
                                <tr>
                                    <th>PROFESI YANG DIINGINKAN</th>
                                    <td><?php echo $profesi; ?></td>
                                </tr>
                                <tr>
                                    <th>KTP / KK SCAN</th>
                                    <td><?php
                                        $filename = "../document/ktp/$images";
                                        //print($filename);				
                                        if (file_exists($filename)) {
                                            ?>
                                            <img src="../document/ktp/<?php echo $images; ?>" width="400">
<?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <center><label>DATA ORANG TUA / WALI</label></center>
                        <br/>
                        <table width="100%" class="table table-bordered">                            
                            <tr>
                                <th class="col-lg-3">NAMA LENGKAP</th>
                                <td><?php echo $nama_ortu; ?></td>
                            </tr>
                            <tr>
                                <th class="col-lg-3">TELP / HP</th>
                                <td><?php echo $telp_ortu; ?></td>
                            </tr>
                            <tr>
                                <th class="col-lg-3">ALAMAT</th>
                                <td><?php echo $alamat_ortu; ?></td>
                            </tr>
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
        <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
        </script>
    </body>
</html>
