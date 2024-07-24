<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">SISTEM INFORMASI ALUMNI</a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<?php
include '../config.php';
?>
<ul class="nav navbar-top-links navbar-right">
    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> KELUAR</a>
</ul>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">

            <center>
                <?php
                $hari = date('l');
                /* $new = date('l, F d, Y', strtotime($Today)); */
                if ($hari == "Sunday") {
                    echo "Minggu";
                } elseif ($hari == "Monday") {
                    echo "Senin";
                } elseif ($hari == "Tuesday") {
                    echo "Selasa";
                } elseif ($hari == "Wednesday") {
                    echo "Rabu";
                } elseif ($hari == "Thursday") {
                    echo("Kamis");
                } elseif ($hari == "Friday") {
                    echo "Jum'at";
                } elseif ($hari == "Saturday") {
                    echo "Sabtu";
                }
                ?>,
                <?php
                $tgl = date('d');
                echo $tgl;
                $bulan = date('F');
                if ($bulan == "January") {
                    echo " Januari ";
                } elseif ($bulan == "February") {
                    echo " Februari ";
                } elseif ($bulan == "March") {
                    echo " Maret ";
                } elseif ($bulan == "April") {
                    echo " April ";
                } elseif ($bulan == "May") {
                    echo " Mei ";
                } elseif ($bulan == "June") {
                    echo " Juni ";
                } elseif ($bulan == "July") {
                    echo " Juli ";
                } elseif ($bulan == "August") {
                    echo " Agustus ";
                } elseif ($bulan == "September") {
                    echo " September ";
                } elseif ($bulan == "October") {
                    echo " Oktober ";
                } elseif ($bulan == "November") {
                    echo " November ";
                } elseif ($bulan == "December") {
                    echo " Desember ";
                }
                $tahun = date('Y');
                echo $tahun;
                ?>
                <br/>
                <span id="clock"></span>
            </center>           
            <?php
            $mail = 'alumni@tracer.amayogyakarta.ac.id';
            $hash = md5(strtolower(trim($mail)));
            $size = 150;
            $grav_url = "https://www.gravatar.com/avatar/" . $hash . "?s=" . $size;
            ?>
            <img src="<?php echo $grav_url; ?>" style="padding: 33px;">

            <!-- /input-group -->
            </li>
            <li>
                <a href="index.php"><i class="fa fa-home fa-fw"></i> HALAMAN DEPAN</a>
            </li>

            <li>
                <a href="kuisioner.php"><i class="fa fa-book fa-fw"></i> KUISIONER</a>
            </li>
            <li>            
                <a href="#"><i class="fa fa-list fa-fw"></i> LAPORAN <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="laporan_kuisioner.php">KUISIONER</a>
                    </li>
                    <li>
                        <a href="laporan_pengguna.php">PENGGUNA</a>
                    </li>            
                    <!--<li>
                        <a href="laporan_keselarasan_vertikal.php">KESELARASAN VERTIKAL</a>
                    </li>            
                    <li>
                        <a href="laporan_keselarasan_horisontal.php">KESELARASAN HORISONTAL</a>
                    </li>-->            
                    <li>
                        <a href="laporan_kesesuaian_kerja.php">KESESUAIAN KERJA</a>
                    </li>
                    <li>
                        <a href="laporan_lama_tunggu.php">LAMA TUNGGU</a>
                    </li>
                </ul>
            </li>
            <li>            
                <a href="#"><i class="fa fa-list fa-fw"></i> KELOLA ALUMNI<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href=angkatan.php>DATA ANGKATAN</a>
                    </li>            
                    <li>
                        <a href="program_studi.php">DATA PROGRAM STUDI</a>
                    </li>            
                    <li>
                        <a href="konsentrasi.php">DATA KONSENTRASI</a>
                    </li>            
                    <li>
                        <a href="alumni.php">DATA ALUMNI</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
