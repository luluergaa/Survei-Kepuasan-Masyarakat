<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>KUESIONER SKM</title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url() ?>asset_SKM/vendor/mdi-font/css/material-design-iconic-font.min.css"
        rel="stylesheet" media="all">
    <link href="<?php echo base_url() ?>asset_SKM/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet"
        media="all">
    <!-- Font special for pages-->
    <link
        href="<?php echo base_url() ?>asset_SKM/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url() ?>asset_SKM/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() ?>asset_SKM/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Favicon and Touch Icons -->
    <link href="<?php echo base_url() ?>assets/img/favicion_metro.ico" rel="shortcut icon" type="image/png">

    <!-- sweat alert -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/aksesoris/SweetAlert/sweetalert.min.js">
    </script>

    <!-- Main CSS-->
    <link href="<?php echo base_url() ?>asset_SKM/css/main.css" rel="stylesheet" media="all">
</head>

<body>


    <?php if ($this->session->flashdata('msg') == 'Berhasil_simpan') { ?>
    <script>
    swal({
        title: "Sukses",
        text: "Data Berhasil Disimpan",
        icon: "success",
    });
    </script>
    <?php } ?>


    <?php unset($_SESSION['msg']); ?>

    <div class="page-wrapper p-t-45 p-b-50" style="background-color:#edf4f5;">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <p style="text-align:center;"><img src="<?php echo base_url() ?>asset_SKM/logo_metro.png"
                            style="width:30px;height:40px;" alt=""></p>
                    <h2 class="title">KUESIONER SKM </h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo base_url() ?>SKM/SKM/Tambah_data">
                        <div class="form-row">
                            <div class="name">Tanggal</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" value="<?php echo date('Y-m-d'); ?>"
                                        name="tanggal" placeholder="Masukan Umur" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">NIK</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="NIK" placeholder="Masukan NIK"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Umur</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="umur" placeholder="Masukan Umur"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Jenis Kelamin</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="JK" required class="custom-select my-1 mr-sm-2">
                                            <option value="" selected="selected">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Pendidikan Terakhir</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="pendidikan" required>
                                            <option value="" selected="selected">Pilih Pendidikan Terakhir</option>
                                            <option value="SD Ke Bawah">SD Ke Bawah</option>
                                            <option value="SLTP">SLTP</option>
                                            <option value="SLTA">SLTA</option>
                                            <option value="D1, D3, D4">D1, D3, D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2 Ke Atas">S2 Ke Atas</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Pekerjaan</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="pekerjaan" required>
                                            <option value="" selected="selected">Pilih Pekerjaan</option>
                                            <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                                            <option value="Wirausaha/Usaha">Wirausaha/Usaha</option>
                                            <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                            <option value="Petani">Petani</option>
                                            <option value="Pedagang">Pedagang</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Alamat</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="alamat" required>
                                            <option value="" selected="selected">Alamat</option>
                                            <option value="Hadimulyo Barat">Hadimulyo Barat</option>
                                            <option value="Hadimulyo Timur">Hadimulyo Timur</option>
                                            <option value="Metro">Metro</option>
                                            <option value="Yosomulyo">Yosomulyo</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Pelayanan</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="pelayanan" required>
                                            <option value="" selected="selected">Ket Layanan</option>
                                            <option value="Kartu Tanda Penduduk(KTP)">Kartu Tanda Penduduk(KTP)</option>
                                            <option value="Kartu Keluarga(KK)">Kartu Keluarga(KK)</option>
                                            <option value="Izin Membuat Bangunan (IMB)">Izin Membuat Bangunan (IMB)
                                            </option>
                                            <option value="HO (gangguan)">HO (gangguan)</option>
                                            <option value="Surat Keterangan Tidak Mampu (SKTM)">Surat Keterangan Tidak
                                                Mampu (SKTM)</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <br>
                        <h3 style="text-align:center;"></h3>

                        <?php $no = 1;
						foreach ($Pertanyaan as $key => $value) { ?>
                        <div class="form-row p-t-20">
                            <label class="label label--block"><?php echo  $no++ . ". " . $value->uraian; ?></label>
                            <div class="p-t-15">
                                <?php
									$kd = $value->id_pertanyaan;
									$pilihan = $this->db->query("SELECT * FROM master_pertanyaan WHERE id_pertanyaan = '$kd' "); ?>
                                <?php foreach ($pilihan->result() as $key => $value) { ?>
                                <input type="hidden" name="id_pertanyaan_<?= $value->id_pertanyaan; ?>"
                                    value="<?= $value->id_pertanyaan; ?>">
                                <label class="radio-container m-r-55"
                                    style="margin-bottom:3px;"><?php echo $value->pilihan4; ?>
                                    <input type="radio" value="4" name="<?php echo "jwbn" . $value->id_pertanyaan; ?>"
                                        required>
                                    <span class="checkmark"></span>
                                </label>
                                <br>
                                <label class="radio-container m-r-55"
                                    style="margin-bottom:3px;"><?php echo $value->pilihan3; ?>
                                    <input type="radio" value="3" name="<?php echo "jwbn" . $value->id_pertanyaan; ?>">
                                    <span class="checkmark"></span>
                                </label>
                                <br>
                                <label class="radio-container m-r-55"
                                    style="margin-bottom:3px;"><?php echo $value->pilihan2; ?>
                                    <input type="radio" value="2" name="<?php echo "jwbn" . $value->id_pertanyaan; ?>">
                                    <span class="checkmark"></span>
                                </label>
                                <br>
                                <label class="radio-container m-r-55"
                                    style="margin-bottom:3px;"><?php echo $value->pilihan1; ?>
                                    <input type="radio" value="1" name="<?php echo "jwbn" . $value->id_pertanyaan; ?>">
                                    <span class="checkmark"></span>
                                </label>
                                <br>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <div>
                            <button class="btn-block btn--radius-2 btn--red" type="submit">SIMPAN</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</body>

</html>






























<script src="<?php echo base_url() ?>asset_SKM/vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="<?php echo base_url() ?>asset_SKM/vendor/select2/select2.min.js"></script>
<script src="<?php echo base_url() ?>asset_SKM/vendor/datepicker/moment.min.js"></script>
<script src="<?php echo base_url() ?>asset_SKM/vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="<?php echo base_url() ?>asset_SKM/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->