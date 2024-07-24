<option value="">-- PILIH --</option>
<?php
include '../config.php';
$prodi_id = $_POST['data_prodi'];
$konsentrasi = mysqli_query($mysqli, "SELECT * FROM peminatan_prodi WHERE prodi_id='$prodi_id' ORDER BY id ASC");
while ($data_konsentrasi = mysqli_fetch_array($konsentrasi)) { ?>
    <option value="<?php echo $data_konsentrasi['id'] ?>">[<?php echo $data_konsentrasi['kode'] ?>]: <?php echo $data_konsentrasi['nama_peminatan'] ?></option>
<?php } ?>