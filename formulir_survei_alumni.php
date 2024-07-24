<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<?php
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    ?>
    <div class="alert alert-warning alert-dismissible fade in">
        <center><?php echo $_SESSION['pesan']; ?></center>
    </div>
    <?php
}
$_SESSION['pesan'] = '';
$survei = mysqli_query($mysqli, "SELECT * FROM survei_alumni_bekerja WHERE nim='$nim' AND reff='$reff'");                
$count_survei = mysqli_num_rows($survei);
$data_survei = mysqli_fetch_array($survei);
if($count_survei == 1){
     $jabatan_penilai = $data_survei['jabatan_penilai'];
}else{
     $jabatan_penilai = "";
}
?>
<form accept-charset="UTF-8" action="proses_survei.php" onsubmit="return validasi_input(this)" class="form-horizontal" method="post" style="padding: 12px;">
    <input name="reff" type="hidden" value="<?php echo $reff; ?>">
    <input name="nim" type="hidden" value="<?php echo $nim; ?>">
    <input name="count_survei" type="hidden" value="<?php echo $count_survei; ?>">
    <h4 class="page-header"><i class="fa fa-edit fa-fw"></i> INFORMASI PEMBERI PENILAIAN</h4>
    <table width="100%" class="table table-bordered">
        <tr>
            <td width="30%">Instansi / Perusahaan</td>
            <td width="70%"><?php echo $data_pekerjaan['instansi']; ?></td>
        </tr>
        <tr>
            <td width="30%">Jabatan Penilai</td>
            <td width="70%"><input type="text" name="jabatan_penilai" class="form-control" value="<?php echo $jabatan_penilai; ?>" placeholder="Jabatan Penilai"></td>
        </tr>
    </table>
    <h4 class="page-header"><i class="fa fa-edit fa-fw"></i> SURVEI ALUMNI</h4>
    <table width="100%" class="table table-bordered">
        <tr>
            <td width="80%" style="text-align: center">PERTANYAAN</td>
            <td width="5%" style="text-align: center">4</td>
            <td width="5%" style="text-align: center">3</td>
            <td width="5%" style="text-align: center">2</td>
            <td width="5%" style="text-align: center">1</td>
        </tr>
        <tr>
            <td width="80%">1. Etika</td>
            <?php if ($count_survei == 1 && $data_survei['q1']  == 1) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="1" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q1'] == 2) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="2" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q1'] == 3) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="3" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q1'] == 4) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="4" checked></td>
            <?php } else {?>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="1" value="4"></td>
            <?php } ?>
        </tr>
        <tr>
            <td width="80%">2. Kompetensi</td>
            <?php if ($count_survei == 1 && $data_survei['q2'] == 1) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="1" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q2'] == 2) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="2" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q2'] == 3) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="3" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q2'] == 4) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="4" checked></td>
            <?php } else {?>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="2" value="4"></td>
            <?php } ?>
        </tr>
        <tr>
            <td width="80%">3. Kemampuan Berbahasa Asing</td>
            <?php if ($count_survei == 1 && $data_survei['q3'] == 1) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="1" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q3'] == 2) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="2" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q3'] == 3) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="3" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q3'] == 4) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="4" checked></td>
            <?php } else {?>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="3" value="4"></td>
            <?php } ?>
        </tr>
        <tr>
            <td width="80%">4. Pengusaan Tehnologi Informasi</td>
            <?php if ($count_survei == 1 && $data_survei['q4'] == 1) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="1" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q4'] == 2) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="2" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q4'] == 3) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="3" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q4'] == 4) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="4" checked></td>
            <?php } else {?>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="4" value="4"></td>
            <?php } ?>
        </tr>
        <tr>
            <td width="80%">5. Kemampuan Berkomunikasi</td>
            <?php if ($count_survei == 1 && $data_survei['q5'] == 1) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="1" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q5'] == 2) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="2" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q5'] == 3) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="3" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q5'] == 4) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="4" checked></td>
            <?php } else {?>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="5" value="4"></td>
            <?php } ?>
        </tr>
        <tr>
            <td width="80%">6. Kerjasama TIM</td>
            <?php if ($count_survei == 1 && $data_survei['q6'] == 1) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="1" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q6'] == 2) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="2" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q6'] == 3) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="3" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q6'] == 4) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="4" checked></td>
            <?php } else {?>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="6" value="4"></td>
            <?php } ?>
        </tr>
        <tr>
            <td width="80%">7. Pengembangan Diri</td>
            <?php if ($count_survei == 1 && $data_survei['q7'] == 1) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="1" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q7'] == 2) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="2" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q7'] == 3) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="3" checked></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="4"></td>
            <?php } elseif ($count_survei == 1 && $data_survei['q7'] == 4) { ?>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="4" checked></td>
            <?php } else {?>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="1"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="2"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="3"></td>
              <td width="5%" style="text-align: center"><input type="radio" name="7" value="4"></td>
            <?php } ?>
        </tr>
    </table>
    <div class="form-group">
        <div class="col-sm-offset-4">
            <input class="btn btn-default" name="commit" type="submit" value="Kirimkan" />
        </div>
    </div>
</form>
