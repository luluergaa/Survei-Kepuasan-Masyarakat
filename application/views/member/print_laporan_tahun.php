<body class="hold-transition skin-blue sidebar-mini" onload="window.print()">
    <div class="wrapper">

        <table border="0"
            style="border-collapse:collapse;margin-top:2cm;font-weight:bold;width:100%;text-align:center;">
            <tbody>
                <tr>
                    <td style="color:black"><strong>
                            REKAPITULASI HASIL SURVEY INDEKS KEPUASAN MASYARAKAT ATAS PELAYANAN PUBLIK
                        </strong></td>
                </tr>
                <tr>
                    <td style="color:black"><strong>
                            PADA KECAMATAN METRO PUSAT
                        </strong></td>
                </tr>
            </tbody>
        </table>

        <?php if (!empty($Kuesioner)) { ?>

        <div class="table-responsive"><br>
            <table class="table table-bordered text-center" width="100%" cellspacing="0" style="color: #000;">
                <thead>
                    <font color="black">
                        <p>Tahun : <?php echo $tahun;  ?>
                    </font>
                    <tr>
                        <td style="border:1px solid #000;"><strong>No. Responden</strong></td>
                        <td style="border:1px solid #000;"><strong>Umur</strong></td>
                        <td style="border:1px solid #000;"><strong>Jenis Kelamin</strong></td>
                        <td style="border:1px solid #000;"><strong>Pendidikan Terakhir</strong></td>
                        <td style="border:1px solid #000;"><strong>Pekerjaan</strong></td>
                        <td style="border:1px solid #000;"><strong>Alamat</strong></td>
                        <td style="border:1px solid #000;"><strong>Jenis Pelayanan</strong></td>
                        <td style="border:1px solid #000;"><strong>P1</strong></td>
                        <td style="border:1px solid #000;"><strong>P2</strong></td>
                        <td style="border:1px solid #000;"><strong>P3</strong></td>
                        <td style="border:1px solid #000;"><strong>P4</strong></td>
                        <td style="border:1px solid #000;"><strong>P5</strong></td>
                        <td style="border:1px solid #000;"><strong>P6</strong></td>
                        <td style="border:1px solid #000;"><strong>P7</strong></td>
                        <td style="border:1px solid #000;"><strong>P8</strong></td>
                        <td style="border:1px solid #000;"><strong>P9</strong></td>

                    </tr>
                </thead>
                <tbody class="text-left">
                    <?php $no = 1;
						foreach ($Kuesioner as $key => $value) { ?>
                    <tr>
                        <td style="border:1px solid #000;"><?php echo $no++; ?></td>
                        <td style="border:1px solid #000;"><?= $value->umur;  ?></td>
                        <td style="border:1px solid #000;"><?= $value->jenis_kelamin; ?></td>
                        <td style="border:1px solid #000;"><?= $value->pendidikan; ?></td>
                        <td style="border:1px solid #000;"><?= $value->pekerjaan; ?></td>
                        <td style="border:1px solid #000;"><?= $value->alamat; ?></td>
                        <td style="border:1px solid #000;"><?= $value->pelayanan; ?></td>
                        <?php $jawaban = $this->db->query("SELECT * FROM skm_kuesioner WHERE id_skm_biodata='$value->id_skm_biodata'")->result(); ?>
                        <?php foreach ($jawaban as $key => $value) { ?>
                        <td style="border:1px solid #000;"><?= $value->jawaban; ?></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } ?>

        <table border="0" style="border-collapse:collapse;width:100%;">
            <tbody>
                <tr>
                    <td>
                        <font color="black"><strong> Responden : <?php echo $jmlh_responden; ?></strong></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="black"><strong>SKM Unit Pelayanan : <?php echo $nilai_SKM; ?></strong></font>
                    </td>
                </tr>
            </tbody>

        </table>

        <table border="0" style="border-collapse:collapse;width:100%;text-align:right;">
            <tbody>
                <tr>
                    <td>
                        <font color="black">Metro, <?php echo date('d - m - Y'); ?></font>
                    </td>

                </tr>
                <tr>
                    <td>
                        <font color="black">
                            Camat Kecamatan Metero Pusat
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <br>
                        <br>
                        <br>
                        <font color="black">Triana Aprisia, S.STP</font>
                    </td>
                </tr>
            </tbody>

        </table>




























       
 </d iv>
</body>