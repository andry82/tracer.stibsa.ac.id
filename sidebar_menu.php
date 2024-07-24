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
                <br />
                <span id="clock"></span>
                <br />
                <?php
                include 'config.php';
                $nim = $_SESSION['NIM'];
                $mail = 'email@domain.com';
                $hash = md5(strtolower(trim($mail)));
                $size = 150;
                $grav_url = "https://www.gravatar.com/avatar/" . $hash . "?s=" . $size;
                ?>
                <img src="<?php echo $grav_url; ?>" style="padding: 33px;">
                <br />
                SELAMAT DATANG<br/>
                <?php echo $_SESSION['NAMA_ALUMNI']  ; ?>, A.Md M<br/>
                TAHUN MASUK : <?php echo $_SESSION['TAHUNMSMHS'] ; ?>
            </center>

            <!-- /input-group -->
            </li>
            <li>
                <a href="index.php"><i class="fa fa-home fa-fw"></i> HALAMAN DEPAN</a>
            </li>
            <li>
                <a href="biodata.php"><i class="fa fa-user fa-fw"></i> BIODATA</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-list fa-fw"></i> PEKERJAAN<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="historis_pekerjaan.php"><i class="fa fa-th-list fa-fw"></i> HISTORIS PEKERJAAN</a>
                    </li>
                    <li>
                        <a href="tambah_pekerjaan.php"><i class="fa fa-plus fa-fw"></i> TAMBAH PEKERJAAN</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="kuisioner.php"><i class="fa fa-question fa-fw"></i> KUISIONER</a>
            </li>            
            <li>
                <a href="ganti_password.php"><i class="fa fa-th-list fa-fw"></i> GANTI PASSWORD</a>
            </li>
            <!--<li>
                <a href="generate_link_publik.php"><i class="fa fa-link fa-fw"></i> GENERATE URL PUBLIK</a>
            </li>-->
            <li>
                <a href="hasil_survei_alumni.php"><i class="fa fa-th-list fa-fw"></i> HASIL SURVEY ALUMNI</a>
            </li>
            <!--<li>
                <a href="#"><i class="fa fa-th-list fa-fw"></i> INVENTARIS<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="inventaris.php"><i class="fa fa-th-list fa-fw"></i> DAFTAR INVENTARIS</a>
                    </li>
                    <li>
                        <a href="tambah_inventaris.php"><i class="fa fa-plus fa-fw"></i> TAMBAH INVENTARIS</a>
                    </li>
                </ul>
            <!-- /.nav-second-level
        </li>
        <li>
            <a href="rekam_data.php"><i class="fa fa-th-list fa-fw"></i> DAFTAR REKAM DATA</a>
        </li>-->
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
