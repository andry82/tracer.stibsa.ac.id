<option value="">-- PILIH --</option>
<?php
include 'config.php';
$id = $_POST['wilayah'];
$kabupaten = mysqli_query($mysqli, "SELECT * FROM  kota WHERE provinsi_id='$id'");
while ($data_kabupaten = mysqli_fetch_array($kabupaten)) {
    ?>
    <option value="<?php echo $data_kabupaten['kode_kota'] ?>"><?php echo strtoupper($data_kabupaten['nama_kota']); ?></option>
<?php } ?>

