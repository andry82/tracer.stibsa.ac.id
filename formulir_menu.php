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
                ?>
            </center>

            <!-- /input-group -->
            </li>
            <!--<li>
                <a href="index.php"><i class="fa fa-home fa-fw"></i> FORMULIR</a>
            </li>-->
            
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
