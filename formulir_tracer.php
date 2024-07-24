<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<?php
session_start();
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    ?>
    <div class="alert alert-warning alert-dismissible fade in">
        <center><?php echo $_SESSION['pesan']; ?></center>
    </div>
    <?php
}
$_SESSION['pesan'] = '';
?>
<form accept-charset="UTF-8" action="proses_kuisioner.php" onsubmit="return validasi_input(this)" class="form-horizontal" method="post" style="padding: 12px;">
    <input name="nikeymhs" type="hidden" value="<?php echo $nikeymhs; ?>">
    <input name="nimmhs" type="hidden" value="<?php echo $nimmhs; ?>">
    <h4 class="page-header"><i class="fa fa-edit fa-fw"></i> FORMULIR PEKERJAAN</h4>
    <table width="100%" class="table table-bordered">
        <tr>
            <td width="30%">Instansi / Perusahaan</td>
            <td width="70%">
                <input type="text" name="instansi" class="form-control" value='<?php echo $data_pekerjaan['nama_ip']; ?>' placeholder="Instansi Bekerja">
            </td>
        </tr>
        <tr>
            <td width="30%">Alamat</td>
            <td width="70%">
                <textarea type="text" cols="5" name="alamat" class="form-control" placeholder="Alamat"><?php echo $data_pekerjaan['alamat']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td width="30%">Jabatan</td>
            <td width="70%">
                <input type="text" name="jabatan" class="form-control" value="<?php echo $data_pekerjaan['jabatan']; ?>" placeholder="Jabatan">
            </td>
        </tr>
        <tr>
            <td width="30%">Website/Email/Medsos Perusahaan</td>
            <td width="70%">
                <input type="text" name="medsos" class="form-control" value="<?php echo $data_pekerjaan['medsos']; ?>" placeholder="Website/Email/Medsos Perusahaan">
            </td>
        </tr>
        <tr>
            <td width="30%">Tanggal Masuk</td>
            <td width="70%">
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar fa-fw"></i>
                    </div>
                    <?php if($data_pekerjaan['tgl_masuk'] == '0000-00-00'){ ?>
                    <input type="text" name="tanggal_masuk" class="form-control datepicker" placeholder="Tanggal Masuk (DD/MM/YYYY)">
                    <?php }else{ ?>
                    <input type="text" name="tanggal_masuk" class="form-control datepicker" value="<?php echo date('d-m-Y', strtotime($data_pekerjaan['tgl_masuk'])); ?>" placeholder="Tanggal Masuk (DD/MM/YYYY)">
                    <?php }?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="30%">Jenis Perusahaan/Instansi</td>
            <td width="70%">
                <select class="form-control" name="jenis_perusahaan">
                    <option value="">-- PILIH --</option>
                    <?php
                    $jenis_perusahaan = mysqli_query($mysqli, "SELECT * FROM jenis_perusahaan");
                    while ($data_perusahaan = mysqli_fetch_array($jenis_perusahaan)) {
                        $jenis_perusahaan_id = $data_perusahaan['id'];
                        if ($data_pekerjaan['jenis_instansi'] == $jenis_perusahaan_id) {
                            ?>
                    <option value="<?php echo $data_perusahaan['id']; ?>" selected><?php echo strtoupper($data_perusahaan['name']); ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $data_perusahaan['id']; ?>"><?php echo strtoupper($data_perusahaan['name']); ?></option>
    <?php }
} ?>
                </select>
            </td>
        </tr>
    </table>
    <h4 class="page-header"><i class="fa fa-edit fa-fw"></i> FORMULIR TRACER</h4>
    <table width="100%" class="table table-bordered">
        <tr>
            <td width="30%">Jelaskan Status Anda ??</td>
            <td width="70%">
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f8'] == 1) { ?>
                            <input type="radio" name="f8" class="f83" value="1" checked>
                        <?php } elseif ($data_kuisioner['f8'] != 1) { ?>
                            <input type="radio" name="f8" class="f83" value="1">
<?php } ?>
                        [1] Bekerja (full time/part time)
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f8'] == 2) { ?>
                            <input type="radio" name="f8" class="f83" value="2" checked>
                        <?php } elseif ($data_kuisioner['f8'] != 2) { ?>
                            <input type="radio" name="f8" class="f83" value="2">
<?php } ?>
                        [2] Belum memungkinkan bekerja  
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f8'] == 3) { ?>
                            <input type="radio" name="f8" class="f83" value="3" checked>
                        <?php } elseif ($data_kuisioner['f8'] != 3) { ?>
                            <input type="radio" name="f8" class="f83" value="3">
<?php } ?>
                        [3] Wiraswasta
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f8'] == 4) { ?>
                            <input type="radio" name="f8" class="f83" value="4" checked>
                        <?php } elseif ($data_kuisioner['f8'] != 4) { ?>
                            <input type="radio" name="f8" class="f83" value="4">
<?php } ?>
                        [4] Melanjutkan Pendidikan 
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f8'] == 5) { ?>
                            <input type="radio" name="f8" class="f83" value="5" checked>
                        <?php } elseif ($data_kuisioner['f8'] != 5) { ?>
                            <input type="radio" name="f8" class="f83" value="5">
<?php } ?>
                        [5] Tidak Kerja tetapi sedang mencari kerja 
                    </label>
                </div>                
            </td>
        </tr>     
        <script type="text/javascript">
            $(function () {
                $("#wiraswasta").hide();
                $("#lanjut_pendidikan").hide();
                $(":radio.f83").click(function () {
                    $("#wiraswasta_edit").hide();
                    $("#lanjut_pendidikan_edit").hide();
                    if ($(this).val() != "3") {
                        $("#wiraswasta").hide();
                    } else {
                        $("#wiraswasta").show();
                    }
                    if ($(this).val() != "4") {
                        $("#lanjut_pendidikan").hide();
                    } else {
                        $("#lanjut_pendidikan").show();
                    }
                });
            });
        </script>
        <tr>
            <td>Apakah anda telah mendapatkan pekerjaan <= 6 bulan / termasuk bekerja sebelum lulus ?</td>
            <td>
                <div class="radio ">
                    <label>
                        <?php if ($data_kuisioner['f504'] == 1) { ?>
                            <input type="radio" name="f504" value="1" checked>
                        <?php } elseif ($data_kuisioner['f504'] != 1) { ?>
                            <input type="radio" name="f504" value="1">
<?php } ?>
                        [1] Ya                        
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f504'] == 2) { ?>
                            <input type="radio" name="f504" value="2" checked>
                        <?php } elseif ($data_kuisioner['f504'] != 2) { ?>
                            <input type="radio" name="f504" value="2">
<?php } ?>
                        [2] Tidak
                    </label>  
                </div>                
                <br/>
                Dalam berapa bulan anda mendapatkan pekerjaan ?
                <input class="form-control col-sm-1" name="f502" value="<?php echo $data_kuisioner['f502']; ?>" size="15" type="text" />
                <br/>
                Berapa rata-rata pendapatan anda per bulan ? (take home pay)?
                <input class="form-control col-sm-3" name="f505" value="<?php echo $data_kuisioner['f505']; ?>" size="15" type="text" />
            </td>
        </tr>
        <tr>
            <td>Dimana lokasi tempat Anda bekerja? ?</td>
            <td>
                Propinsi :
                <select class="form-control" name="f5a1" id="propinsi">
                    <option value="">-- PILIH --</option>
                    <?php
                    $propinsi = mysqli_query($mysqli, "SELECT * FROM provinsi");
                    while ($data_propinsi = mysqli_fetch_array($propinsi)) {
                        ?>
                        <?php if ($data_propinsi['id'] == $data_kuisioner['f5a1']) { ?>
                            <option value="<?php echo $data_propinsi['id']; ?>" selected><?php echo strtoupper($data_propinsi['nama_provinsi']); ?></option>
                        <?php } else { ?>                                            
                            <option value="<?php echo $data_propinsi['id']; ?>"><?php echo strtoupper($data_propinsi['nama_provinsi']); ?></option>
    <?php } ?>
<?php } ?>
                </select>
                <br/>
                Kabupaten/Kota :
                <select class="form-control" name="f5a2" id="kabupaten"> 
                    <?php if ($data_kuisioner['f5a2'] == "") { ?>
                        <option value="">-- PILIH --</option>
                    <?php } elseif ($data_kuisioner['f5a2'] != "") { ?>   
                        <option value="">-- PILIH --</option>
                        <?php
                        $propinsi = $data_kuisioner['f5a1'];
                        $kabupaten = mysqli_query($mysqli, "SELECT * FROM kota WHERE provinsi_id='$propinsi'");
                        while ($data_kabupaten = mysqli_fetch_array($kabupaten)) {
                            ?>
                            <?php if ($data_kabupaten['kode_kota'] == $data_kuisioner['f5a2']) { ?>
                                <option value="<?php echo $data_kabupaten['kode_kota']; ?>" selected><?php echo strtoupper($data_kabupaten['nama_kota']); ?></option>
                            <?php } else { ?>                                            
                                <option value="<?php echo $data_kabupaten['kode_kota']; ?>"><?php echo strtoupper($data_kabupaten['nama_kota']); ?></option>
                            <?php } ?>
    <?php } ?>
<?php } ?>
                </select>
                <br/>
            </td>
        <script type="text/javascript">
            $("#propinsi").change(function () {
                // variabel dari nilai combo box kendaraan
                var id_wilayah = $("#propinsi").val();
                $.ajax({
                    method: "POST",
                    dataType: "html",
                    url: "kabupaten.php",
                    data: {
                        wilayah: id_wilayah
                    },
                    success: function (data) {
                        $("#kabupaten").html(data);
                    }
                });
            });
        </script>
        </tr>
        <tr>
            <td>Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?</td>
            <td>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1101'] == 1) { ?>
                            <input type="radio" name="f1101" class="institusi" value="1" checked>
                        <?php } elseif ($data_kuisioner['f1101'] != 1) { ?>
                            <input type="radio" name="f1101" class="institusi" value="1">
<?php } ?>
                        [1] Instansi pemerintah
                    </label>

                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1101'] == 6) { ?>
                            <input type="radio" name="f1101" class="institusi" value="6" checked>
                        <?php } elseif ($data_kuisioner['f1101'] != 6) { ?>
                            <input type="radio" name="f1101" class="institusi" value="6">
<?php } ?>
                        [6] BUMN/BUMD
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1101'] == 7) { ?>
                            <input type="radio" name="f1101" class="institusi" value="7" checked>
                        <?php } elseif ($data_kuisioner['f1101'] != 7) { ?>
                            <input type="radio" name="f1101" class="institusi" value="7">
<?php } ?>
                        [7] Institusi/Organisasi Multilateral
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1101'] == 2) { ?>
                            <input type="radio" name="f1101" class="institusi" value="2" checked>
                        <?php } elseif ($data_kuisioner['f1101'] != 2) { ?>
                            <input type="radio" name="f1101" class="institusi" value="2">
<?php } ?>
                        [2] Organisasi non-profit/Lembaga Swadaya Masyarakat
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1101'] == 3) { ?>
                            <input type="radio" name="f1101" class="institusi" value="3" checked>
                        <?php } elseif ($data_kuisioner['f1101'] != 3) { ?>
                            <input type="radio" name="f1101" class="institusi" value="3">
<?php } ?>
                        [3] Perusahaan swasta
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1101'] == 4) { ?>
                            <input type="radio" name="f1101" class="institusi" value="4" checked>
                        <?php } elseif ($data_kuisioner['f1101'] != 4) { ?>
                            <input type="radio" name="f1101" class="institusi" value="4">
<?php } ?>
                        [4] Wiraswasta/perusahaan sendiri
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1101'] == 5) { ?>
                            <input type="radio" name="f1101" class="institusi" value="5" checked>
                        <?php } elseif ($data_kuisioner['f1101'] != 5) { ?>
                            <input type="radio" name="f1101" class="institusi" value="5">
<?php } ?>
                        [5] Lainnya
                    </label>                                            
                </div>
                <div id="catatan">
                    <hr/>                    
                    Tuliskan :<br/>
                    <input class="form-control col-sm-3" name="f1102" value="<?php echo $data_kuisioner['f1102'] ?>" size="15" type="text" />
                </div>   
<?php if ($data_kuisioner['f1101'] == 5) { ?>
                    <div id="catatan_edit">
                        <hr/>                    
                        Tuliskan :<br/>
                        <input class="form-control col-sm-3" name="f1102" value="<?php echo $data_kuisioner['f1102'] ?>" size="15" type="text" />
                    </div> 
<?php } ?>
                <script type="text/javascript">
                    $(function () {
                        $("#catatan").hide();
                        $(":radio.institusi").click(function () {
                            $("#catatan_edit").hide();
                            if ($(this).val() != "5") {
                                $("#catatan").hide();
                            } else {
                                $("#catatan").show();
                            }
                        });
                    });
                </script>
            </td>
        </tr>
        <tr>
            <td>Apa nama perusahaan/kantor tempat Anda bekerja ?</td>
            <td>
                <input class="form-control col-sm-3" name="f5b" value="<?php echo $data_kuisioner['f5b'] ?>" size="15" type="text" />
            </td>
        </tr>
        <tr id="wiraswasta">
            <td>Bila berwiraswasta, apa posisi/jabatan Anda saat ini ? (Apabila F8 menjawab [3] Wiraswasta) </td>
            <td>
                <select class="form-control" name="f5c">
                    <?php if ($data_kuisioner['f5c'] == 1) { ?>
                        <option value="1" selected>[1] Founder</option>
                    <?php } elseif ($data_kuisioner['f5c'] != 1) { ?>
                        <option value="1">[1] Founder</option>
                    <?php } ?>
                    <?php if ($data_kuisioner['f5c'] == 2) { ?>
                        <option value="2" selected>[2] Co Founder</option>
                    <?php } elseif ($data_kuisioner['f5c'] != 2) { ?>
                        <option value="2">[2] Co Founder</option>
                    <?php } ?>
                    <?php if ($data_kuisioner['f5c'] == 3) { ?>
                        <option value="3" selected>[3] Staff</option>
                    <?php } elseif ($data_kuisioner['f5c'] != 3) { ?>
                        <option value="3">[3] Staff</option>
                    <?php } ?>
                    <?php if ($data_kuisioner['f5c'] == 4) { ?>
                        <option value="4" selected>[4] Frelance / Pekerja Lepas</option>
                    <?php } elseif ($data_kuisioner['f5c'] != 4) { ?>
                        <option value="4">[4] Frelance / Pekerja Lepas</option>
<?php } ?>                    
                </select>
            </td>
        </tr>
<?php if ($data_kuisioner['f8'] == 3) { ?>
            <tr id="wiraswasta_edit">
                <td>Bila berwiraswasta, apa posisi/jabatan Anda saat ini ? (Apabila F8 menjawab [3] Wiraswasta) </td>
                <td>
                    <select class="form-control" name="f5c">
                        <?php if ($data_kuisioner['f5c'] == 1) { ?>
                            <option value="1" selected>[1] Founder</option>
                        <?php } elseif ($data_kuisioner['f5c'] != 1) { ?>
                            <option value="1">[1] Founder</option>
                        <?php } ?>
                        <?php if ($data_kuisioner['f5c'] == 2) { ?>
                            <option value="2" selected>[2] Co Founder</option>
                        <?php } elseif ($data_kuisioner['f5c'] != 2) { ?>
                            <option value="2">[2] Co Founder</option>
                        <?php } ?>
                        <?php if ($data_kuisioner['f5c'] == 3) { ?>
                            <option value="3" selected>[3] Staff</option>
                        <?php } elseif ($data_kuisioner['f5c'] != 3) { ?>
                            <option value="3">[3] Staff</option>
                        <?php } ?>
                        <?php if ($data_kuisioner['f5c'] == 4) { ?>
                            <option value="4" selected>[4] Frelance / Pekerja Lepas</option>
                        <?php } elseif ($data_kuisioner['f5c'] != 4) { ?>
                            <option value="4">[4] Frelance / Pekerja Lepas</option>
    <?php } ?>                    
                    </select>
                </td>
            </tr>
<?php } ?>
        <tr>
            <td>Apa tingkat tempat kerja Anda ?</td>
            <td>
                <select class="form-control" name="f5d">
                    <?php if ($data_kuisioner['f5d'] == 1) { ?>
                        <option value="1" selected>[1] Lokal/Wilayah/Wiraswasra yang tidak berbadan hukum</option>
                    <?php } elseif ($data_kuisioner['f5d'] != 1) { ?>
                        <option value="1">[1] Lokal/Wilayah/Wiraswasra yang tidak berbadan hukum</option>
                    <?php } ?>
                    <?php if ($data_kuisioner['f5d'] == 2) { ?>
                        <option value="2"  selected=>[2] Nasional / Wiraswasra yang berbadan hukum</option>
                    <?php } elseif ($data_kuisioner['f5d'] != 2) { ?>
                        <option value="2">[2] Nasional / Wiraswasra yang berbadan hukum</option>
                    <?php } ?>
                    <?php if ($data_kuisioner['f5d'] == 3) { ?>
                        <option value="3" selected>[3] Multinasional / Internasional</option>
                    <?php } elseif ($data_kuisioner['f5d'] != 3) { ?>
                        <option value="3">[3] Multinasional / Internasional</option>
<?php } ?>

                </select>
            </td>
        </tr>
        <tr id="lanjut_pendidikan">
            <td>Pertanyaan studi lanjut (Apabila F8 menjawab [4] Melanjutkan Pendidikan)</td>
            <td>
                Sumber Biaya :<br/>
                <select class="form-control" name="f18a">
                    <?php if ($data_kuisioner['f18a'] == 1) { ?>
                        <option value="1" selected>[1] Biaya Sendiri</option>
                    <?php } elseif ($data_kuisioner['f18a'] != 1) { ?>
                        <option value="1">[1] Biaya Sendiri</option>
                    <?php } if ($data_kuisioner['f18a'] == 2) { ?>
                        <option value="2" selected>[2] Beasiswa</option>
                    <?php } elseif ($data_kuisioner['f18a'] != 2) { ?>
                        <option value="2">[2] Beasiswa</option>
<?php } ?>                    
                </select>
                Perguruan Tinggi :<br/>
                <input class="form-control col-sm-3" name="f18b" value="<?php echo $data_kuisioner['f18b']; ?>" size="15" type="text" />
                Program Studi :<br/>
                <input class="form-control col-sm-3" name="f18c" value="<?php echo $data_kuisioner['f18c']; ?>" size="15" type="text" />
                Tanggal Masuk :<br/>
                <input class="form-control col-sm-3" name="f18d" value="<?php echo $data_kuisioner['f18d']; ?>" size="15" type="text" />
            </td>
        </tr>        
<?php if ($data_kuisioner['f8'] == 4) { ?>
            <tr id="lanjut_pendidikan_edit">
                <td>Pertanyaan studi lanjut (Apabila F8 menjawab [4] Melanjutkan Pendidikan)</td>
                <td>
                    Sumber Biaya :<br/>
                    <select class="form-control" name="f18a">
                        <?php if ($data_kuisioner['f18a'] == 1) { ?>
                            <option value="1" selected>[1] Biaya Sendiri</option>
                        <?php } elseif ($data_kuisioner['f18a'] != 1) { ?>
                            <option value="1">[1] Biaya Sendiri</option>
                        <?php } if ($data_kuisioner['f18a'] == 2) { ?>
                            <option value="2" selected>[2] Beasiswa</option>
                        <?php } elseif ($data_kuisioner['f18a'] != 2) { ?>
                            <option value="2">[2] Beasiswa</option>
    <?php } ?>                    
                    </select>
                    Perguruan Tinggi :<br/>
                    <input class="form-control col-sm-3" name="f18b" value="<?php echo $data_kuisioner['f18b']; ?>" size="15" type="text" />
                    Program Studi :<br/>
                    <input class="form-control col-sm-3" name="f18c" value="<?php echo $data_kuisioner['f18c']; ?>" size="15" type="text" />
                    Tanggal Masuk :<br/>
                    <input class="form-control col-sm-3" name="f18d" value="<?php echo $data_kuisioner['f18d']; ?>" size="15" type="text" />
                </td>
            </tr>
<?php } ?>
        <tr>
            <td>Sebutkan sumberdana dalam pembiayaan kuliah? (bukan ketika Studi Lanjut)</td>
            <td>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1201'] == 1) { ?>
                            <input type="radio" name="f1201" class="biaya" value="1" checked>
                        <?php } elseif ($data_kuisioner['f1201'] != 1) { ?>
                            <input type="radio" name="f1201" class="biaya" value="1">
<?php } ?>
                        [1] Biaya Sendiri / Keluarga
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1201'] == 2) { ?>
                            <input type="radio" name="f1201" class="biaya" value="2" checked>
                        <?php } elseif ($data_kuisioner['f1201'] != 2) { ?>
                            <input type="radio" name="f1201" class="biaya" value="2">
<?php } ?>
                        [2] Beasiswa ADIK
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1201'] == 3) { ?>
                            <input type="radio" name="f1201" class="biaya" value="3" checked>
                        <?php } elseif ($data_kuisioner['f1201'] != 3) { ?>
                            <input type="radio" name="f1201" class="biaya" value="3">
<?php } ?>
                        [3] Beasiswa BIDIKMISI
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1201'] == 4) { ?>
                            <input type="radio" name="f1201" class="biaya" value="4" checked>
                        <?php } elseif ($data_kuisioner['f1201'] != 4) { ?>
                            <input type="radio" name="f1201" class="biaya" value="4">
<?php } ?>
                        [4] Beasiswa PPA
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1201'] == 5) { ?>
                            <input type="radio" name="f1201" class="biaya" value="5" checked>
                        <?php } elseif ($data_kuisioner['f1201'] != 5) { ?>
                            <input type="radio" name="f1201" class="biaya" value="5">
<?php } ?>                        
                        [5] Beasiswa AFIRMASI
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1201'] == 6) { ?>
                            <input type="radio" name="f1201" class="biaya" value="6" checked>
                        <?php } elseif ($data_kuisioner['f1201'] != 6) { ?>
                            <input type="radio" name="f1201" class="biaya" value="6">
<?php } ?>                        
                        [6] Beasiswa Perusahaan/Swasta
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1201'] == 7) { ?>
                            <input type="radio" name="f1201" class="biaya" value="7" checked>
                        <?php } elseif ($data_kuisioner['f1201'] != 7) { ?>
                            <input type="radio" name="f1201" class="biaya" value="7">
<?php } ?>
                        [7] Lainnya
                    </label>                                            
                </div>      
                <div id="catatan_biaya">
                    <hr/>
                    Tuliskan :<br/>
                    <input class="form-control col-sm-3" name="f1202" value="<?php echo $data_kuisioner['f1202']; ?>" size="15" type="text" />
                </div>
<?php if ($data_kuisioner['f1201'] == 7) { ?>
                    <div id="catatan_biaya_edit">
                        <hr/>
                        Tuliskan :<br/>
                        <input class="form-control col-sm-3" name="f1202" value="<?php echo $data_kuisioner['f1202']; ?>" size="15" type="text" />
                    </div>
<?php } ?>
                <script type="text/javascript">
                    $(function () {
                        $("#catatan_biaya").hide();
                        $(":radio.biaya").click(function () {
                            $("#catatan_biaya_edit").hide();
                            if ($(this).val() != "7") {
                                $("#catatan_biaya").hide();
                            } else {
                                $("#catatan_biaya").show();
                            }
                        });
                    });
                </script>
            </td>
        </tr>
        <tr>
            <td>Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?</td>
            <td>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f14'] == 1) { ?>
                            <input type="radio" name="f14" value="1" checked>
                        <?php } elseif ($data_kuisioner['f14'] != 1) { ?>
                            <input type="radio" name="f14" value="1">
<?php } ?>
                        [1] Sangat Erat
                    </label>

                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f14'] == 2) { ?>
                            <input type="radio" name="f14" value="2" checked>
                        <?php } elseif ($data_kuisioner['f14'] != 2) { ?>
                            <input type="radio" name="f14" value="2">
<?php } ?>
                        [2] Erat
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f14'] == 3) { ?>
                            <input type="radio" name="f14" value="3" checked>
                        <?php } elseif ($data_kuisioner['f14'] != 3) { ?>
                            <input type="radio" name="f14" value="3">
<?php } ?>
                        [3] Cukup Erat
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f14'] == 4) { ?>
                            <input type="radio" name="f14" value="4" checked>
                        <?php } elseif ($data_kuisioner['f14'] != 4) { ?>
                            <input type="radio" name="f14" value="4">
<?php } ?>
                        [4] Kurang Erat
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f14'] == 5) { ?>
                            <input type="radio" name="f14" value="5" checked>
                        <?php } elseif ($data_kuisioner['f14'] != 5) { ?>
                            <input type="radio" name="f14" value="5">
<?php } ?>
                        [5] Tidak Sama Sekali
                    </label>                                            
                </div>   
            </td>
        </tr>
        <tr>
            <td>Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini? </td>
            <td>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f15'] == 1) { ?>
                            <input type="radio" name="f15" value="1" checked>
                        <?php } elseif ($data_kuisioner['f15'] != 1) { ?>
                            <input type="radio" name="f15" value="1">
<?php } ?>
                        [1] Setingkat Lebih Tinggi
                    </label>

                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f15'] == 2) { ?>
                            <input type="radio" name="f15" value="2" checked>
                        <?php } elseif ($data_kuisioner['f15'] != 2) { ?>
                            <input type="radio" name="f15" value="2">
<?php } ?>
                        [2] Tingkat yang Sama
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f15'] == 3) { ?>
                            <input type="radio" name="f15" value="3" checked>
                        <?php } elseif ($data_kuisioner['f15'] != 3) { ?>
                            <input type="radio" name="f15" value="3">
<?php } ?>
                        [3] Setingkat Lebih Rendah
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f15'] == 4) { ?>
                            <input type="radio" name="f15" value="4" checked>
                        <?php } elseif ($data_kuisioner['f15'] != 4) { ?>
                            <input type="radio" name="f15" value="4">
<?php } ?>
                        [4] Tidak Perlu Pendidikan Tinggi
                    </label>                                            
                </div> 
            </td>
        </tr>
        <tr>
            <td>Pada saat lulus, pada tingkat mana kompetensi di bawah ini anda kuasai? (<b>A</b>)
                Pada saat ini, pada tingkat mana kompetensi di bawah ini diperlukan dalam pekerjaan? (<b>B</b>)</td>
            <td>
                <table width="100%" class="table table-bordered">
                    <tr>
                        <td colspan="5">A</td>
                        <td></td>
                        <td colspan="5">B</td>
                    </tr><tr>
                        <td colspan="2">Sangat Rendah</td>
                        <td></td>
                        <td colspan="2">Sangat Tinggi</td>
                        <td></td>
                        <td colspan="2">Sangat Rendah</td>
                        <td></td>
                        <td colspan="2">Sangat Tinggi</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td></td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <?php if ($data_kuisioner['f1761'] == 1) { ?>
                            <td><input type="radio" name="f1761" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1761'] != 1) { ?>
                            <td><input type="radio" name="f1761" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1761'] == 2) { ?>
                            <td><input type="radio" name="f1761" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1761'] != 2) { ?>
                            <td><input type="radio" name="f1761" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1761'] == 3) { ?>
                            <td><input type="radio" name="f1761" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1761'] != 3) { ?>
                            <td><input type="radio" name="f1761" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1761'] == 4) { ?>
                            <td><input type="radio" name="f1761" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1761'] != 4) { ?>
                            <td><input type="radio" name="f1761" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1761'] == 5) { ?>
                            <td><input type="radio" name="f1761" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1761'] != 5) { ?>
                            <td><input type="radio" name="f1761" value="5"></td>
                        <?php } ?>
                        <td>Etika</td>
                        <?php if ($data_kuisioner['f1762'] == 1) { ?>
                            <td><input type="radio" name="f1762" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1762'] != 1) { ?>
                            <td><input type="radio" name="f1762" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1762'] == 2) { ?>
                            <td><input type="radio" name="f1762" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1762'] != 2) { ?>
                            <td><input type="radio" name="f1762" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1762'] == 3) { ?>
                            <td><input type="radio" name="f1762" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1762'] != 3) { ?>
                            <td><input type="radio" name="f1762" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1762'] == 4) { ?>
                            <td><input type="radio" name="f1762" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1762'] != 4) { ?>
                            <td><input type="radio" name="f1762" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1762'] == 5) { ?>
                            <td><input type="radio" name="f1762" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1762'] != 5) { ?>
                            <td><input type="radio" name="f1762" value="5"></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if ($data_kuisioner['f1763'] == 1) { ?>
                            <td><input type="radio" name="f1763" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1763'] != 1) { ?>
                            <td><input type="radio" name="f1763" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1763'] == 2) { ?>
                            <td><input type="radio" name="f1763" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1763'] != 2) { ?>
                            <td><input type="radio" name="f1763" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1763'] == 3) { ?>
                            <td><input type="radio" name="f1763" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1763'] != 3) { ?>
                            <td><input type="radio" name="f1763" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1763'] == 4) { ?>
                            <td><input type="radio" name="f1763" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1763'] != 4) { ?>
                            <td><input type="radio" name="f1763" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1763'] == 5) { ?>
                            <td><input type="radio" name="f1763" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1763'] != 5) { ?>
                            <td><input type="radio" name="f1763" value="5"></td>
                        <?php } ?>
                        <td>Keahlian berdasarkan bidang ilmu</td>
                        <?php if ($data_kuisioner['f1764'] == 1) { ?>
                            <td><input type="radio" name="f1764" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1764'] != 1) { ?>
                            <td><input type="radio" name="f1764" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1764'] == 2) { ?>
                            <td><input type="radio" name="f1764" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1764'] != 2) { ?>
                            <td><input type="radio" name="f1764" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1764'] == 3) { ?>
                            <td><input type="radio" name="f1764" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1764'] != 3) { ?>
                            <td><input type="radio" name="f1764" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1764'] == 4) { ?>
                            <td><input type="radio" name="f1764" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1764'] != 4) { ?>
                            <td><input type="radio" name="f1764" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1764'] == 5) { ?>
                            <td><input type="radio" name="f1764" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1764'] != 5) { ?>
                            <td><input type="radio" name="f1764" value="5"></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if ($data_kuisioner['f1765'] == 1) { ?>
                            <td><input type="radio" name="f1765" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1765'] != 1) { ?>
                            <td><input type="radio" name="f1765" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1765'] == 2) { ?>
                            <td><input type="radio" name="f1765" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1765'] != 2) { ?>
                            <td><input type="radio" name="f1765" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1765'] == 3) { ?>
                            <td><input type="radio" name="f1765" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1765'] != 3) { ?>
                            <td><input type="radio" name="f1765" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1765'] == 4) { ?>
                            <td><input type="radio" name="f1765" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1765'] != 4) { ?>
                            <td><input type="radio" name="f1765" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1765'] == 5) { ?>
                            <td><input type="radio" name="f1765" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1765'] != 5) { ?>
                            <td><input type="radio" name="f1765" value="5"></td>
                        <?php } ?>
                        <td>Bahasa Inggris</td>
                        <?php if ($data_kuisioner['f1766'] == 1) { ?>
                            <td><input type="radio" name="f1766" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1766'] != 1) { ?>
                            <td><input type="radio" name="f1766" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1766'] == 2) { ?>
                            <td><input type="radio" name="f1766" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1766'] != 2) { ?>
                            <td><input type="radio" name="f1766" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1766'] == 3) { ?>
                            <td><input type="radio" name="f1766" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1766'] != 3) { ?>
                            <td><input type="radio" name="f1766" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1766'] == 4) { ?>
                            <td><input type="radio" name="f1766" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1766'] != 4) { ?>
                            <td><input type="radio" name="f1766" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1766'] == 5) { ?>
                            <td><input type="radio" name="f1766" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1766'] != 5) { ?>
                            <td><input type="radio" name="f1766" value="5"></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if ($data_kuisioner['f1767'] == 1) { ?>
                            <td><input type="radio" name="f1767" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1767'] != 1) { ?>
                            <td><input type="radio" name="f1767" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1767'] == 2) { ?>
                            <td><input type="radio" name="f1767" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1767'] != 2) { ?>
                            <td><input type="radio" name="f1767" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1767'] == 3) { ?>
                            <td><input type="radio" name="f1767" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1767'] != 3) { ?>
                            <td><input type="radio" name="f1767" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1767'] == 4) { ?>
                            <td><input type="radio" name="f1767" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1767'] != 4) { ?>
                            <td><input type="radio" name="f1767" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1767'] == 5) { ?>
                            <td><input type="radio" name="f1767" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1767'] != 5) { ?>
                            <td><input type="radio" name="f1767" value="5"></td>
                        <?php } ?>
                        <td>Penggunaan Teknologi Informasi</td>
                        <?php if ($data_kuisioner['f1768'] == 1) { ?>
                            <td><input type="radio" name="f1768" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1768'] != 1) { ?>
                            <td><input type="radio" name="f1768" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1768'] == 2) { ?>
                            <td><input type="radio" name="f1768" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1768'] != 2) { ?>
                            <td><input type="radio" name="f1768" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1768'] == 3) { ?>
                            <td><input type="radio" name="f1768" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1768'] != 3) { ?>
                            <td><input type="radio" name="f1768" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1768'] == 4) { ?>
                            <td><input type="radio" name="f1768" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1768'] != 4) { ?>
                            <td><input type="radio" name="f1768" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1768'] == 5) { ?>
                            <td><input type="radio" name="f1768" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1768'] != 5) { ?>
                            <td><input type="radio" name="f1768" value="5"></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if ($data_kuisioner['f1769'] == 1) { ?>
                            <td><input type="radio" name="f1769" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1769'] != 1) { ?>
                            <td><input type="radio" name="f1769" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1769'] == 2) { ?>
                            <td><input type="radio" name="f1769" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1769'] != 2) { ?>
                            <td><input type="radio" name="f1769" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1769'] == 3) { ?>
                            <td><input type="radio" name="f1769" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1769'] != 3) { ?>
                            <td><input type="radio" name="f1769" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1769'] == 4) { ?>
                            <td><input type="radio" name="f1769" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1769'] != 4) { ?>
                            <td><input type="radio" name="f1769" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1769'] == 5) { ?>
                            <td><input type="radio" name="f1769" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1769'] != 5) { ?>
                            <td><input type="radio" name="f1769" value="5"></td>
                        <?php } ?>
                        <td>Komunikasi</td>
                        <?php if ($data_kuisioner['f1770'] == 1) { ?>
                            <td><input type="radio" name="f1770" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1770'] != 1) { ?>
                            <td><input type="radio" name="f1770" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1770'] == 2) { ?>
                            <td><input type="radio" name="f1770" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1770'] != 2) { ?>
                            <td><input type="radio" name="f1770" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1770'] == 3) { ?>
                            <td><input type="radio" name="f1770" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1770'] != 3) { ?>
                            <td><input type="radio" name="f1770" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1770'] == 4) { ?>
                            <td><input type="radio" name="f1770" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1770'] != 4) { ?>
                            <td><input type="radio" name="f1770" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1770'] == 5) { ?>
                            <td><input type="radio" name="f1770" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1770'] != 5) { ?>
                            <td><input type="radio" name="f1770" value="5"></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if ($data_kuisioner['f1771'] == 1) { ?>
                            <td><input type="radio" name="f1771" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1771'] != 1) { ?>
                            <td><input type="radio" name="f1771" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1771'] == 2) { ?>
                            <td><input type="radio" name="f1771" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1771'] != 2) { ?>
                            <td><input type="radio" name="f1771" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1770'] == 3) { ?>
                            <td><input type="radio" name="f1771" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1771'] != 3) { ?>
                            <td><input type="radio" name="f1771" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1771'] == 4) { ?>
                            <td><input type="radio" name="f1771" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1771'] != 4) { ?>
                            <td><input type="radio" name="f1771" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1771'] == 5) { ?>
                            <td><input type="radio" name="f1771" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1771'] != 5) { ?>
                            <td><input type="radio" name="f1771" value="5"></td>
                        <?php } ?>
                        <td>Kerja sama tim</td>
                        <?php if ($data_kuisioner['f1772'] == 1) { ?>
                            <td><input type="radio" name="f1772" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1772'] != 1) { ?>
                            <td><input type="radio" name="f1772" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1772'] == 2) { ?>
                            <td><input type="radio" name="f1772" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1772'] != 2) { ?>
                            <td><input type="radio" name="f1772" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1772'] == 3) { ?>
                            <td><input type="radio" name="f1772" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1772'] != 3) { ?>
                            <td><input type="radio" name="f1772" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1772'] == 4) { ?>
                            <td><input type="radio" name="f1772" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1772'] != 4) { ?>
                            <td><input type="radio" name="f1772" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1772'] == 5) { ?>
                            <td><input type="radio" name="f1772" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1772'] != 5) { ?>
                            <td><input type="radio" name="f1772" value="5"></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if ($data_kuisioner['f1773'] == 1) { ?>
                            <td><input type="radio" name="f1773" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1773'] != 1) { ?>
                            <td><input type="radio" name="f1773" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1773'] == 2) { ?>
                            <td><input type="radio" name="f1773" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1773'] != 2) { ?>
                            <td><input type="radio" name="f1773" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1773'] == 3) { ?>
                            <td><input type="radio" name="f1773" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1773'] != 3) { ?>
                            <td><input type="radio" name="f1773" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1773'] == 4) { ?>
                            <td><input type="radio" name="f1773" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1773'] != 4) { ?>
                            <td><input type="radio" name="f1773" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1773'] == 5) { ?>
                            <td><input type="radio" name="f1773" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1773'] != 5) { ?>
                            <td><input type="radio" name="f1773" value="5"></td>
                        <?php } ?>
                        <td>Pengembangan Diri</td>
                        <?php if ($data_kuisioner['f1774'] == 1) { ?>
                            <td><input type="radio" name="f1774" value="1" checked></td>
                        <?php } elseif ($data_kuisioner['f1774'] != 1) { ?>
                            <td><input type="radio" name="f1774" value="1"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1774'] == 2) { ?>
                            <td><input type="radio" name="f1774" value="2" checked></td>
                        <?php } elseif ($data_kuisioner['f1774'] != 2) { ?>
                            <td><input type="radio" name="f1774" value="2"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1774'] == 3) { ?>
                            <td><input type="radio" name="f1774" value="3" checked></td>
                        <?php } elseif ($data_kuisioner['f1774'] != 3) { ?>
                            <td><input type="radio" name="f1774" value="3"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1774'] == 4) { ?>
                            <td><input type="radio" name="f1774" value="4" checked></td>
                        <?php } elseif ($data_kuisioner['f1774'] != 4) { ?>
                            <td><input type="radio" name="f1774" value="4"></td>
                        <?php } ?>
                        <?php if ($data_kuisioner['f1774'] == 5) { ?>
                            <td><input type="radio" name="f1774" value="5" checked></td>
                        <?php } elseif ($data_kuisioner['f1774'] != 5) { ?>
                            <td><input type="radio" name="f1774" value="5"></td>
<?php } ?>
                    </tr>

                </table>
            </td>
        </tr>
        <tr><td colspan="3">Kuisioner Opsional</td></tr>
        <tr>
            <td>
                Menurut anda seberapa besar penekanan pada metode pembelajaran di bawah ini dilaksanakan di program studi anda?
            </td>
            <td>
                Perkuliahan<br/>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f21'] == 1) { ?>
                            <input type="radio" name="f21" value="1" checked>
                        <?php } elseif ($data_kuisioner['f21'] != 1) { ?>
                            <input type="radio" name="f21" value="1">
<?php } ?>
                        [1] Sangat Besar
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f21'] == 2) { ?>
                            <input type="radio" name="f21" value="2" checked>
                        <?php } elseif ($data_kuisioner['f21'] != 2) { ?>
                            <input type="radio" name="f21" value="2">
<?php } ?>
                        [2] Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f21'] == 3) { ?>
                            <input type="radio" name="f21" value="3" checked>
                        <?php } elseif ($data_kuisioner['f21'] != 3) { ?>
                            <input type="radio" name="f21" value="3">
<?php } ?>
                        [3] Cukup Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f21'] == 4) { ?>
                            <input type="radio" name="f21" value="4" checked>
                        <?php } elseif ($data_kuisioner['f21'] != 4) { ?>
                            <input type="radio" name="f21" value="4">
<?php } ?>
                        [4] Kurang
                    </label>                                            
                </div> 
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f21'] == 5) { ?>
                            <input type="radio" name="f21" value="5" checked>
                        <?php } elseif ($data_kuisioner['f21'] != 5) { ?>
                            <input type="radio" name="f21" value="5">
<?php } ?>
                        [5] Tidak Sama Sekali
                    </label>                                            
                </div> 
                <br/>
                Demonstrasi<br/>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f22'] == 1) { ?>
                            <input type="radio" name="f22" value="1" checked>
                        <?php } elseif ($data_kuisioner['f22'] != 1) { ?>
                            <input type="radio" name="f22" value="1">
<?php } ?>
                        [1] Sangat Besar
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f22'] == 2) { ?>
                            <input type="radio" name="f22" value="2" checked>
                        <?php } elseif ($data_kuisioner['f22'] != 2) { ?>
                            <input type="radio" name="f22" value="2">
<?php } ?>
                        [2] Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f22'] == 3) { ?>
                            <input type="radio" name="f22" value="3" checked>
                        <?php } elseif ($data_kuisioner['f22'] != 3) { ?>
                            <input type="radio" name="f22" value="3">
<?php } ?>
                        [3] Cukup Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f22'] == 4) { ?>
                            <input type="radio" name="f22" value="4" checked>
                        <?php } elseif ($data_kuisioner['f22'] != 4) { ?>
                            <input type="radio" name="f22" value="4">
<?php } ?>
                        [4] Kurang
                    </label>                                            
                </div> 
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f22'] == 5) { ?>
                            <input type="radio" name="f22" value="5" checked>
                        <?php } elseif ($data_kuisioner['f22'] != 5) { ?>
                            <input type="radio" name="f22" value="5">
<?php } ?>
                        [5] Tidak Sama Sekali
                    </label>                                            
                </div> 
                <br/>
                Partisipasi dalam Proyek Riset<br/>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f23'] == 1) { ?>
                            <input type="radio" name="f23" value="1" checked>
                        <?php } elseif ($data_kuisioner['f23'] != 1) { ?>
                            <input type="radio" name="f23" value="1">
<?php } ?>
                        [1] Sangat Besar
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f23'] == 2) { ?>
                            <input type="radio" name="f23" value="2" checked>
                        <?php } elseif ($data_kuisioner['f23'] != 2) { ?>
                            <input type="radio" name="f23" value="2">
<?php } ?>
                        [2] Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f23'] == 3) { ?>
                            <input type="radio" name="f23" value="3" checked>
                        <?php } elseif ($data_kuisioner['f23'] != 3) { ?>
                            <input type="radio" name="f23" value="3">
<?php } ?>
                        [3] Cukup Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f23'] == 4) { ?>
                            <input type="radio" name="f23" value="4" checked>
                        <?php } elseif ($data_kuisioner['f23'] != 4) { ?>
                            <input type="radio" name="f23" value="4">
<?php } ?>
                        [4] Kurang
                    </label>                                            
                </div> 
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f23'] == 5) { ?>
                            <input type="radio" name="f23" value="5" checked>
                        <?php } elseif ($data_kuisioner['f23'] != 5) { ?>
                            <input type="radio" name="f23" value="5">
<?php } ?>
                        [5] Tidak Sama Sekali
                    </label>                                            
                </div> 
                <br/>
                Magang<br/>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f24'] == 1) { ?>
                            <input type="radio" name="f24" value="1" checked>
                        <?php } elseif ($data_kuisioner['f24'] != 1) { ?>
                            <input type="radio" name="f24" value="1">
<?php } ?>
                        [1] Sangat Besar
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f24'] == 2) { ?>
                            <input type="radio" name="f24" value="2" checked>
                        <?php } elseif ($data_kuisioner['f24'] != 2) { ?>
                            <input type="radio" name="f24" value="2">
<?php } ?>
                        [2] Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f24'] == 3) { ?>
                            <input type="radio" name="f24" value="3" checked>
                        <?php } elseif ($data_kuisioner['f24'] != 3) { ?>
                            <input type="radio" name="f24" value="3">
<?php } ?>
                        [3] Cukup Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f24'] == 4) { ?>
                            <input type="radio" name="f24" value="4" checked>
                        <?php } elseif ($data_kuisioner['f24'] != 4) { ?>
                            <input type="radio" name="f24" value="4">
<?php } ?>
                        [4] Kurang
                    </label>                                            
                </div> 
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f24'] == 5) { ?>
                            <input type="radio" name="f24" value="5" checked>
                        <?php } elseif ($data_kuisioner['f24'] != 5) { ?>
                            <input type="radio" name="f24" value="5">
<?php } ?>
                        [5] Tidak Sama Sekali
                    </label>                                            
                </div> 
                <br/>
                Praktikum<br/>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f25'] == 1) { ?>
                            <input type="radio" name="f25" value="1" checked>
                        <?php } elseif ($data_kuisioner['f25'] != 1) { ?>
                            <input type="radio" name="f25" value="1">
<?php } ?>
                        [1] Sangat Besar
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f25'] == 2) { ?>
                            <input type="radio" name="f25" value="2" checked>
                        <?php } elseif ($data_kuisioner['f25'] != 2) { ?>
                            <input type="radio" name="f25" value="2">
<?php } ?>
                        [2] Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f25'] == 3) { ?>
                            <input type="radio" name="f25" value="3" checked>
                        <?php } elseif ($data_kuisioner['f25'] != 3) { ?>
                            <input type="radio" name="f25" value="3">
<?php } ?>
                        [3] Cukup Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f25'] == 4) { ?>
                            <input type="radio" name="f25" value="4" checked>
                        <?php } elseif ($data_kuisioner['f25'] != 4) { ?>
                            <input type="radio" name="f25" value="4">
<?php } ?>
                        [4] Kurang
                    </label>                                            
                </div> 
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f25'] == 5) { ?>
                            <input type="radio" name="f25" value="5" checked>
                        <?php } elseif ($data_kuisioner['f25'] != 5) { ?>
                            <input type="radio" name="f25" value="5">
<?php } ?>
                        [5] Tidak Sama Sekali
                    </label>                                            
                </div> 
                <br/>
                Kerja Lapangan<br/>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f26'] == 1) { ?>
                            <input type="radio" name="f26" value="1" checked>
                        <?php } elseif ($data_kuisioner['f26'] != 1) { ?>
                            <input type="radio" name="f26" value="1">
<?php } ?>
                        [1] Sangat Besar
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f26'] == 2) { ?>
                            <input type="radio" name="f26" value="2" checked>
                        <?php } elseif ($data_kuisioner['f26'] != 2) { ?>
                            <input type="radio" name="f26" value="2">
<?php } ?>
                        [2] Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f26'] == 3) { ?>
                            <input type="radio" name="f26" value="3" checked>
                        <?php } elseif ($data_kuisioner['f26'] != 3) { ?>
                            <input type="radio" name="f26" value="3">
<?php } ?>
                        [3] Cukup Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f26'] == 4) { ?>
                            <input type="radio" name="f26" value="4" checked>
                        <?php } elseif ($data_kuisioner['f26'] != 4) { ?>
                            <input type="radio" name="f26" value="4">
<?php } ?>
                        [4] Kurang
                    </label>                                            
                </div> 
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f26'] == 5) { ?>
                            <input type="radio" name="f26" value="5" checked>
                        <?php } elseif ($data_kuisioner['f26'] != 5) { ?>
                            <input type="radio" name="f26" value="5">
<?php } ?>
                        [5] Tidak Sama Sekali
                    </label>                                            
                </div> 
                <br/>
                Diskusi<br/>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f27'] == 1) { ?>
                            <input type="radio" name="f27" value="1" checked>
                        <?php } elseif ($data_kuisioner['f27'] != 1) { ?>
                            <input type="radio" name="f27" value="1">
<?php } ?>
                        [1] Sangat Besar
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f27'] == 2) { ?>
                            <input type="radio" name="f27" value="2" checked>
                        <?php } elseif ($data_kuisioner['f27'] != 2) { ?>
                            <input type="radio" name="f27" value="2">
<?php } ?>
                        [2] Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f27'] == 3) { ?>
                            <input type="radio" name="f27" value="3" checked>
                        <?php } elseif ($data_kuisioner['f27'] != 3) { ?>
                            <input type="radio" name="f27" value="3">
<?php } ?>
                        [3] Cukup Besar
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f27'] == 4) { ?>
                            <input type="radio" name="f27" value="4" checked>
                        <?php } elseif ($data_kuisioner['f27'] != 4) { ?>
                            <input type="radio" name="f27" value="4">
<?php } ?>
                        [4] Kurang
                    </label>                                            
                </div> 
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f27'] == 5) { ?>
                            <input type="radio" name="f27" value="5" checked>
                        <?php } elseif ($data_kuisioner['f27'] != 5) { ?>
                            <input type="radio" name="f27" value="5">
<?php } ?>
                        [5] Tidak Sama Sekali
                    </label>                                            
                </div> 
            </td>
        </tr>
        <tr>
            <td>Kapan anda mulai mencari pekerjaan? Mohon pekerjaan sambilan tidak dimasukkan</td>
            <td>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f301'] == 1) { ?>
                            <input type="radio" name="f301" value="1" checked>
                        <?php } elseif ($data_kuisioner['f301'] != 1) { ?>
                            <input type="radio" name="f301" value="1">
<?php } ?>
                        [1] Kira-kira <input class="form-control col-sm-1" name="f302" value="<?php echo $data_kuisioner['f302']; ?>" size="15" type="text" /> bulan sebelum lulus  
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f301'] == 2) { ?>
                            <input type="radio" name="f301" value="2" checked>
                        <?php } elseif ($data_kuisioner['f301'] != 2) { ?>
                            <input type="radio" name="f301" value="2">
<?php } ?>
                        [2] Kira-kira <input class="form-control col-sm-1" name="f303"value="<?php echo $data_kuisioner['f303']; ?>" size="15" type="text" />  bulan setelah lulus  
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f301'] == 3) { ?>
                            <input type="radio" name="f301" value="3" checked>
                        <?php } elseif ($data_kuisioner['f301'] != 3) { ?>
                            <input type="radio" name="f301" value="3">
<?php } ?>
                        [3] Saya tidak mencari kerja
                    </label>                                            
                </div> 
            </td>
        </tr>
        <tr>
            <td>Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu</td>
            <td>
                <?php if ($data_kuisioner['f401'] == 1) { ?>
                    <input type="checkbox" name="f401" value="1" checked>
                <?php } elseif ($data_kuisioner['f401'] == 0) { ?>
                    <input type="checkbox" name="f401" value="1">
                <?php } ?>
                [1] Melalui iklan di koran/majalah, brosur<br>
                <?php if ($data_kuisioner['f402'] == 1) { ?>
                    <input type="checkbox" name="f402" value="1" checked>
                <?php } elseif ($data_kuisioner['f402'] == 0) { ?>
                    <input type="checkbox" name="f402" value="1">
                <?php } ?>
                [1] Melamar ke perusahaan tanpa mengetahui lowongan yang ada<br>
                <?php if ($data_kuisioner['f403'] == 1) { ?>
                    <input type="checkbox" name="f403" value="1" checked>
                <?php } elseif ($data_kuisioner['f403'] == 0) { ?>
                    <input type="checkbox" name="f403" value="1">
                <?php } ?>
                [1] Pergi ke bursa/pameran kerja<br>
                <?php if ($data_kuisioner['f404'] == 1) { ?>
                    <input type="checkbox" name="f404" value="1" checked>
                <?php } elseif ($data_kuisioner['f404'] == 0) { ?>
                    <input type="checkbox" name="f404" value="1">
                <?php } ?>
                [1] Mencari lewat internet/iklan online/milis<br>
                <?php if ($data_kuisioner['f405'] == 1) { ?>
                    <input type="checkbox" name="f405" value="1" checked>
                <?php } elseif ($data_kuisioner['f405'] == 0) { ?>
                    <input type="checkbox" name="f405" value="1">
                <?php } ?>
                [1] Dihubungi oleh perusahaan<br>
                <?php if ($data_kuisioner['f406'] == 1) { ?>
                    <input type="checkbox" name="f406" value="1" checked>
                <?php } elseif ($data_kuisioner['f406'] == 0) { ?>
                    <input type="checkbox" name="f406" value="1">
                <?php } ?>
                [1] Menghubungi Kemenakertrans<br>
                <?php if ($data_kuisioner['f407'] == 1) { ?>
                    <input type="checkbox" name="f407" value="1" checked>
                <?php } elseif ($data_kuisioner['f407'] == 0) { ?>
                    <input type="checkbox" name="f407" value="1">
                <?php } ?>
                [1] Menghubungi agen tenaga kerja komersial/swasta<br>
                <?php if ($data_kuisioner['f408'] == 1) { ?>
                    <input type="checkbox" name="f408" value="1" checked>
                <?php } elseif ($data_kuisioner['f408'] == 0) { ?>
                    <input type="checkbox" name="f408" value="1">
                <?php } ?> 
                [1] Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas<br>
                <?php if ($data_kuisioner['f409'] == 1) { ?>
                    <input type="checkbox" name="f409" value="1" checked>
                <?php } elseif ($data_kuisioner['f409'] == 0) { ?>
                    <input type="checkbox" name="f409" value="1">
                <?php } ?> 
                [1] Menghubungi kantor kemahasiswaan/hubungan alumni<br>
                <?php if ($data_kuisioner['f410'] == 1) { ?>
                    <input type="checkbox" name="f410" value="1" checked>
                <?php } elseif ($data_kuisioner['f410'] == 0) { ?>
                    <input type="checkbox" name="f410" value="1">
                <?php } ?>  
                [1] Membangun jejaring (network) sejak masih kuliah<br>
                <?php if ($data_kuisioner['f411'] == 1) { ?>
                    <input type="checkbox" name="f411" value="1" checked>
                <?php } elseif ($data_kuisioner['f411'] == 0) { ?>
                    <input type="checkbox" name="f411" value="1">
                <?php } ?> 
                [1] Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)<br>
                <?php if ($data_kuisioner['f412'] == 1) { ?>
                    <input type="checkbox" name="f412" value="1" checked>
                <?php } elseif ($data_kuisioner['f412'] == 0) { ?>
                    <input type="checkbox" name="f412" value="1">
                <?php } ?>
                [1] Membangun bisnis sendiri<br>
                <?php if ($data_kuisioner['f413'] == 1) { ?>
                    <input type="checkbox" name="f413" value="1" checked>
                <?php } elseif ($data_kuisioner['f413'] == 0) { ?>
                    <input type="checkbox" name="f413" value="1">
                <?php } ?> 
                [1] Melalui penempatan kerja atau magang<br>
                <?php if ($data_kuisioner['f414'] == 1) { ?>
                    <input type="checkbox" name="f414" value="1" checked>
                <?php } elseif ($data_kuisioner['f414'] == 0) { ?>
                    <input type="checkbox" name="f414" value="1">
                <?php } ?> 
                [1] Bekerja di tempat yang sama dengan tempat kerja semasa kuliah<br>
                <?php if ($data_kuisioner['f415'] == 1) { ?>
                    <input type="checkbox" name="f415" value="1" checked>
                <?php } elseif ($data_kuisioner['f415'] == 0) { ?>
                    <input type="checkbox" name="f415" value="1">
<?php } ?>  
                [1] Lainnya:<br>
                <input class="form-control col-sm-3" name="f416" value="<?php echo $data_kuisioner['f416']; ?>" size="15" type="text" />
            </td>
        </tr>
        <tr>
            <td>Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama ?</td>
            <td><input class="form-control col-sm-1" name="f6" value="<?php echo $data_kuisioner['f6']; ?>" size="15" type="text" /> perusahaan/instansi/institusi</td>
        </tr>
        <tr>
            <td>Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda? </td>
            <td><input class="form-control col-sm-1" name="f7" value="<?php echo $data_kuisioner['f7']; ?>" size="15" type="text" /> perusahaan/instansi/institusi</td>
        </tr>
        <tr>
            <td>Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?</td>
            <td><input class="form-control col-sm-1" name="f7a" value="<?php echo $data_kuisioner['f7a']; ?>" size="15" type="text" /> perusahaan/instansi/institusi</td>
        </tr>
        <tr>
            <td>Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? Pilihlah Satu Jawaban.</td>
            <td>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1001'] == 1) { ?>
                            <input type="radio" name="f1001" class='f1001' value="1" checked>
                        <?php } elseif ($data_kuisioner['f1001'] != 1) { ?>
                            <input type="radio" name="f1001" class='f1001' value="1">
<?php } ?>
                        [1] Tidak
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1001'] == 2) { ?>
                            <input type="radio" name="f1001" class='f1001' value="2" checked>
                        <?php } elseif ($data_kuisioner['f1001'] != 2) { ?>
                            <input type="radio" name="f1001" class='f1001' value="2">
<?php } ?>
                        [2] Tidak, tapi saya sedang menunggu hasil lamaran kerja
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1001'] == 3) { ?>
                            <input type="radio" name="f1001" class='f1001' value="3" checked>
                        <?php } elseif ($data_kuisioner['f1001'] != 3) { ?>
                            <input type="radio" name="f1001" class='f1001' value="3">
<?php } ?>
                        [3] Ya, saya akan mulai bekerja dalam 2 minggu ke depan
                    </label>                                            
                </div>      
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1001'] == 4) { ?>
                            <input type="radio" name="f1001" class='f1001' value="4" checked>
                        <?php } elseif ($data_kuisioner['f1001'] != 4) { ?>
                            <input type="radio" name="f1001" class='f1001' value="4">
<?php } ?>
                        [4] Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan
                    </label>                                            
                </div> 
                <div class="radio">
                    <label>
                        <?php if ($data_kuisioner['f1001'] == 5) { ?>
                            <input type="radio" name="f1001" class='f1001' value="5" checked>
                        <?php } elseif ($data_kuisioner['f1001'] != 5) { ?>
                            <input type="radio" name="f1001" class='f1001' value="5">
<?php } ?>
                        [5] Lainnya
                    </label>                                            
                </div> 
                <div id="f1002">
                    <hr/>
                    Tuliskan :<br/>
                    <input class="form-control col-sm-2" name="f1002" value="<?php echo $data_kuisioner['f1002'] ?>" size="15" type="text" />
                </div>
<?php if ($data_kuisioner['f1001'] == 5) { ?>
                    <div id="f1002_edit">
                        <hr/>
                        Tuliskan :<br/>
                        <input class="form-control col-sm-2" name="f1002" value="<?php echo $data_kuisioner['f1002'] ?>" size="15" type="text" />
                    </div>
<?php } ?>
            </td>
        </tr>
        <script type="text/javascript">
            $(function () {
                $("#f1002").hide();
                $(":radio.f1001").click(function () {
                    $("#f1002_edit").hide();
                    if ($(this).val() != "5") {
                        $("#f1002").hide();
                    } else {
                        $("#f1002").show();
                    }
                });
            });
        </script>
        <tr>
            <td>Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu </td>
            <td>
                <?php if ($data_kuisioner['f1601'] == 1) { ?>
                    <input type="checkbox" name="f1601" value="1" checked>
                <?php } elseif ($data_kuisioner['f1601'] != 1) { ?>
                    <input type="checkbox" name="f1601" value="1">
                <?php } ?>
                [1] Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya<br/>
                <?php if ($data_kuisioner['f1602'] == 2) { ?>
                    <input type="checkbox" name="f1602" value="2" checked>
                <?php } elseif ($data_kuisioner['f1602'] != 2) { ?>
                    <input type="checkbox" name="f1602" value="2">
                <?php } ?>
                [2] Saya belum mendapatkan pekerjaan yang lebih sesuai.<br/>
                <?php if ($data_kuisioner['f1603'] == 3) { ?>
                    <input type="checkbox" name="f1603" value="3" checked>
                <?php } elseif ($data_kuisioner['f1603'] != 3) { ?>
                    <input type="checkbox" name="f1603" value="3">
                <?php } ?> 
                [3] Di pekerjaan ini saya memeroleh prospek karir yang baik.<br/>
                <?php if ($data_kuisioner['f1604'] == 4) { ?>
                    <input type="checkbox" name="f1604" value="4" checked>
                <?php } elseif ($data_kuisioner['f1604'] != 4) { ?>
                    <input type="checkbox" name="f1604" value="4">
                <?php } ?>
                [4] Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya.<br/>
                <?php if ($data_kuisioner['f1605'] == 5) { ?>
                    <input type="checkbox" name="f1605" value="5" checked>
                <?php } elseif ($data_kuisioner['f1605'] != 5) { ?>
                    <input type="checkbox" name="f1605" value="5">
                <?php } ?>
                [5] Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.<br/>
                <?php if ($data_kuisioner['f1606'] == 6) { ?>
                    <input type="checkbox" name="f1606" value="6" checked>
                <?php } elseif ($data_kuisioner['f1606'] != 6) { ?>
                    <input type="checkbox" name="f1606" value="6">
                <?php } ?>
                [6] Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini.<br/>
                <?php if ($data_kuisioner['f1607'] == 7) { ?>
                    <input type="checkbox" name="f1607" value="7" checked>
                <?php } elseif ($data_kuisioner['f1607'] != 7) { ?>
                    <input type="checkbox" name="f1607" value="7">
                <?php } ?>
                [7] Pekerjaan saya saat ini lebih aman/terjamin/secured<br/>
                <?php if ($data_kuisioner['f1608'] == 8) { ?>
                    <input type="checkbox" name="f1608" value="8" checked>
                <?php } elseif ($data_kuisioner['f1608'] != 8) { ?>
                    <input type="checkbox" name="f1608" value="8">
                <?php } ?>
                [8] Pekerjaan saya saat ini lebih menarik<br/>
                <?php if ($data_kuisioner['f1609'] == 9) { ?>
                    <input type="checkbox" name="f1609" value="9" checked>
                <?php } elseif ($data_kuisioner['f1609'] != 9) { ?>
                    <input type="checkbox" name="f1609" value="9">
                <?php } ?>
                [9] Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll<br/>
                <?php if ($data_kuisioner['f1610'] == 10) { ?>
                    <input type="checkbox" name="f1610" value="10" checked>
                <?php } elseif ($data_kuisioner['f1610'] != 10) { ?>
                    <input type="checkbox" name="f1610" value="10">
                <?php } ?>
                [10] Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.<br/>
                <?php if ($data_kuisioner['f1611'] == 11) { ?>
                    <input type="checkbox" name="f1611" value="11" checked>
                <?php } elseif ($data_kuisioner['f1611'] != 11) { ?>
                    <input type="checkbox" name="f1611" value="11">
                <?php } ?>
                [11] Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.<br/>
                <?php if ($data_kuisioner['f1612'] == 12) { ?>
                    <input type="checkbox" name="f1612" value="12" checked>
                <?php } elseif ($data_kuisioner['f1612'] != 12) { ?>
                    <input type="checkbox" name="f1612" value="12">
                <?php } ?>
                [12] Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.<br/>
                <?php if ($data_kuisioner['f1613'] == 13) { ?>
                    <input type="checkbox" name="f1613" value="13" checked>
                <?php } elseif ($data_kuisioner['f1613'] != 13) { ?>
                    <input type="checkbox" name="f1613" value="13">
<?php } ?>
                [13] Lainnya.<BT/>
        <hr/>
        <input class="form-control col-sm-2" name="f1614" value="<?php echo $data_kuisioner['f1614']; ?>" size="15" type="text" />
        </td>
        </tr>
    </table>
    <div class="form-group">
        <div class="col-sm-offset-4">
            <input class="btn btn-default" name="commit" type="submit" value="Kirimkan" />
        </div>
    </div>
</form>
