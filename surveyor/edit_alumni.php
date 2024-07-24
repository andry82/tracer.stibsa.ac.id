<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>EDIT MAHASISWA | Administrator Verifikasi Data Mahasiswa - AMA YPK Yogyakarta</title>

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
                        <h4 class="page-header"><i class="fa fa-eye fa-fw"></i> EDIT MAHASISWA</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">                    
                    <div class="col-lg-12">
                        <?php
//getting id from url
                        $nim = $_GET['nim'];
//selecting data associated with this particular id
                        $res = mysqli_query($mysqli, "SELECT * FROM msmhs WHERE NIMHSMSMHS='$nim'");
                        while ($data = mysqli_fetch_array($res)) {
                            $nik = $data['NIKMSMHS'];
                            $nama = $data['NMMHSMSMHS'];
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
                        }
                        ?>
                        <!-- /.col-lg-12 -->
                        <form name="form" method="post" action="proses_edit_mahasiswa.php" enctype="multipart/form-data">
                            <input type="hidden" name="NIMHSMSMHS" value="<?php echo $nim; ?>">
                            <div class="form-group">
                                <label for="NamaLengkap">NIK (KTP / KK)</label>
                                <input type="text" class="form-control" name="NIKMSMHS" value="<?php echo $nik; ?>" placeholder="NIK">
                            </div>
                            <div class="form-group">
                                <label for="NamaLengkap">NAMA LENGKAP</label>
                                <input type="text" class="form-control" name="NMMHSMSMHS" value="<?php echo $nama; ?>" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="TempatLahir">TEMPAT LAHIR</label>
                                <input type="text" class="form-control" name="TPLHRMSMHS" value="<?php echo $tplahir; ?>" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group">
                                <label for="TanggalLahir">TANGGAL LAHIR</label>
                                <input type="text" class="form-control" name="TGLHRMSMHS" value="<?php echo date('d-m-Y', strtotime($tglahir)); ?>" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label for="AlamatSekarang">ALAMAT SEKARANG</label>
                                <input type="text" class="form-control" name="ALAMATYOGYA" value="<?php echo $alamat_sekarang; ?>" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label for="AlamatAsal">ALAMAT ASAL</label>
                                <input type="text" class="form-control" name="ALAMATLENGKAP" value="<?php echo $alamat_lengkap; ?>" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label for="Propinsi">PROPINSI</label>
                                <select class="form-control" name="ASSMAMSMHS">
                                    <?php
                                    $pro = mysqli_query($mysqli, "SELECT * FROM tbpro WHERE KDPROTBPRO='$propinsi'");
                                    $datapro = mysqli_fetch_array($pro);
                                    $KDPROTBPRO = $datapro["KDPROTBPRO"];
                                    $NMPROTBPRO = $datapro["NMPROTBPRO"];
                                    ?>
                                    <option value="<?php echo $KDPROTBPRO; ?>"><?php echo $KDPROTBPRO; ?> - <?php echo $NMPROTBPRO; ?></option>
                                    <?php
                                    $qpeg2 = "SELECT distinct(KDPROTBPRO),NMPROTBPRO FROM tbpro order by KDPROTBPRO ASC";
                                    $datapeg2 = mysqli_query($mysqli, $qpeg2);

                                    while ($dataall2 = mysqli_fetch_array($datapeg2)) {
                                        $KDPROTBPRO = $dataall2["KDPROTBPRO"];
                                        $NMPROTBPRO = $dataall2["NMPROTBPRO"]; ?>
                                    <option value="<?php echo $KDPROTBPRO; ?>"><?php echo $KDPROTBPRO; ?> - <?php echo $NMPROTBPRO; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jeniskelamnin">JENIS KELAMIN</label>
                                <select class="form-control" name="KDJEKMSMHS">
                                    <?
                                    if($jenis_kelamin=="L")
                                    {
                                    ?>
                                    <option value="L">LAKI LAKI</option>
                                    <?
                                    }elseif($jenis_kelamin=="P")
                                    {
                                    ?>
                                    <option value="P">PEREMPUAN</option>
                                    <?
                                    }?>
                                    <option value="L">LAKI LAKI</option>
                                    <option value="P">PEREMPUAN</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Agama">AGAMA</label>
                                <select class="form-control" name="AGAMA">
                                    <?
                                    if($agama=="B")
                                    {
                                    ?>
                                    <option value="B">BUDHA</option>
                                    <?
                                    }elseif($agama=="H")
                                    {
                                    ?>
                                    <option value="H">HINDU</option>
                                    <?
                                    }elseif($agama=="I")
                                    {
                                    ?>
                                    <option value="I">ISLAM</option>
                                    <?
                                    }elseif($agama=="K")
                                    {
                                    ?>
                                    <option value="K">KATOLIK</option>
                                    <?
                                    }elseif($agama=="L")
                                    {
                                    ?>
                                    <option value="L">LAIN-LAIN</option>
                                    <?
                                    }elseif($agama =="P")
                                    {
                                    ?>
                                    <option value="P">PROTESTAN</option>
                                    <?
                                    }elseif($agama =="C")
                                    {
                                    ?>
                                    <option value="C">KEPERCAYAAN</option>
                                    <?
                                    }else
                                    {
                                    ?>
                                    <option value="">--SILAHKAN PILIH--</option>
                                    <?
                                    }
                                    ?>
                                    <option value="B">BUDHA</option>
                                    <option value="H">HINDU</option>
                                    <option value="I">ISLAM</option>
                                    <option value="K">KATOLIK</option>
                                    <option value="L">LAIN-LAIN</option>
                                    <option value="P">PROTESTAN</option>
                                    <option value="C">KEPERCAYAAN</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Email">EMAIL</label>
                                <input type="text" class="form-control" name="EMAIL" value="<?php echo $email; ?>" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="AsalSekolah">ASAL SEKOLAH</label>
                                <input type="text" class="form-control" name="ASAl_SEKOLAH" value="<?php echo $asal_sekolah; ?>" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="NomorHp">NOMOR HP</label>
                                <input type="text" class="form-control" name="TELP" value="<?php echo $telp; ?>" placeholder="Nomor HP">
                            </div>
                            <div class="form-group">
                                <label for="keahlian">KEAHLIAN</label>
                                <input type="text" class="form-control" name="KEAHLIAN" value="<?php echo $keahlian; ?>" placeholder="Keahlian">
                            </div>
                            <div class="form-group">
                                <label for="profesi">PROFESI YANG DIINGINKAN</label>
                                <input type="text" class="form-control" name="PROFESI" value="<?php echo $profesi; ?>" placeholder="Profesi Yang Diinginkan">
                            </div>
                            <?php
                            $filename = "../document/ktp/$images";
                            //print($filename);				
                            if (file_exists($filename)) {
                                ?>
                            <img src="../document/ktp/<?php echo $images; ?>" width="400">
                                <br /><br />
                            <?php } ?>
                            <div class="form-group">
                                <label for="KTPKK">UPLOAD KTP / KK (JPG, JPEG)</label>
                                <input type="file" name="ktp_kk" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="NamaOrtu">NAMA ORANG TUA / WALI</label>
                                <input type="text" class="form-control" name="NAMAORTU" value="<?php echo $nama_ortu; ?>" placeholder="Nama Orang Tua / Wali">
                            </div>
                            <div class="form-group">
                                <label for="NamaOrtu">TELP / HP ORANG TUA / WALI</label>
                                <input type="text" class="form-control" name="TELPORTUWALI" value="<?php echo $telp_ortu; ?>" placeholder="Telp / HP Orang Tua / Wali">
                            </div>
                            <div class="form-group">
                                <label for="NamaOrtu">ALAMAT ORANG TUA / WALI</label>
                                <input type="text" class="form-control" name="ALAMATORTUWALI" value="<?php echo $alamat_ortu; ?>" placeholder="Alamat Orang Tua / Wali">
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
        <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
        </script>
    </body>
</html>
