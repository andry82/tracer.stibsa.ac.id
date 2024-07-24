<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">SURVEY ALUMNI AMA YPK YOGYAKARTA</a>
</div>
<?php
include 'config.php';
$nim = $_SESSION['nim'];
$aturan = mysqli_query($mysqli, "select * from config");
$dataaturan = mysqli_fetch_array($aturan);
$tahunajar = $dataaturan['tahun'];
$status_pembimbing_pkl = $dataaturan['setting_pembimbing_pkl'];
$ta = substr($tahunajar, 0, 4);
$result = mysqli_query($mysqli, "SELECT * FROM msmhs m, ta t WHERE t.nim='$nim' AND m.NIMHSMSMHS='$nim'");
$count = mysqli_num_rows($result);
while ($data = mysqli_fetch_array($result)) {
    $nama = $data['NMMHSMSMHS'];
    $email = $data['EMAIL'];
    $th_masuk = $data['TAHUNMSMHS'];
    $th_keluar = $data['BTSTUMSMHS'];
    $status = $data['status'];
    $th_lulus = substr($th_keluar, 0, -1);
}
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
            $mail = $email;
            $hash = md5(strtolower(trim($mail)));
            $size = 150;
            $grav_url = "https://www.gravatar.com/avatar/" . $hash . "?s=" . $size;
            ?>
            <img src="<?php echo $grav_url; ?>" style="padding: 33px;">
            <center>
                PERIODE : <?php echo $tahunajar ?><br/>
            </center>

            <!-- /input-group -->
            </li>
            <li>
                <a href="index.php"><i class="fa fa-home fa-fw"></i> HALAMAN DEPAN</a>
            </li>
            <li>
                <a href="surveyor.php"><i class="fa fa-user fa-fw"></i> IDENTITAS PENILAI</a>
            </li>
            <li>
                <a href="survei_alumni.php"><i class="fa fa-navicon fa-fw"></i> SURVEY ALUMNI</a>
            </li>
            
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
