<style>
fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow: 0px 0px 0px 0px #000;
    box-shadow: 0px 0px 0px 0px #000;
    border: 2px solid black !important;
    border-radius: 12px;
}

legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    width: auto;
    padding: 0 10px;
    border-bottom: none;
    margin-bottom: 5px;
}
</style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Data SKM Persemester</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php echo base_url() ?>Admin/data_skm" method="POST">
                                            <input type="hidden" name="nilaifilter" value="1">
                                            <div class="form-group col-sm-4">
                                                <select name="semester" class="form-control" id="">
                                                    <option value="" selected="selected">--Semester--</option>
                                                    <option value="1">SEM 1</option>
                                                    <option value="2">SEM 2</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <select name="tahun" class="form-control" id="">
                                                    <option value="" selected="selected">--Tahun--</option>
                                                    <?php for ($i = 0; $i < 5; $i++) {  ?>
                                                    <option
                                                        value="<?php echo date('Y', strtotime('-' . $i . ' year', strtotime(date('Y'))));  ?>">
                                                        <?php echo date('Y', strtotime('-' . $i . ' year', strtotime(date('Y'))));  ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <button type="submit"
                                                    class="btn btn-primary btn-sm form-control">Cari</button>
                                            </div>

                                        </form>


                                        <?php if (!empty($Kuesioner)) { ?>


                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">
                                                    <?= $title; ?> (semester
                                                    <?php echo $semester . " tahun " . $tahun . ")"; ?>
                                                </h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive"><br>
                                                    <table class="table table-bordered text-center" id="dataTable"
                                                        width="100%" cellspacing="0">
                                                        <thead>

                                                            <?= $this->session->flashdata('message'); ?>
                                                            <fieldset class="scheduler-border" style="width:300px;">
                                                                <legend class="scheduler-border">Detail SKM</legend>
                                                                <p><strong>Tahun</strong> :
                                                                    <?php echo $tahun;  ?></p>
                                                                <p><strong>Semester</strong> : <?php echo $semester; ?>
                                                                </p>
                                                                <p><strong>Jumlah Responden</strong> :
                                                                    <?php echo $jmlh_responden; ?></p>
                                                                <p><strong>Nilai SKM</strong> :
                                                                    <?php echo $nilai_SKM; ?></p>
                                                            </fieldset>

                                                            <tr>
                                                                <td>No. Responden</td>
                                                                <td>Umur</td>
                                                                <td>Jenis Kelamin</td>
                                                                <td>Pendidikan Terakhir</td>
                                                                <td>Pekerjaan</td>
                                                                <td>Alamat</td>
                                                                <td>Jenis Pelayanan</td>
                                                                <td>NIK</td>
                                                                <td>Tanggal</td>
                                                                <td>P1</td>
                                                                <td>P2</td>
                                                                <td>P3</td>
                                                                <td>P4</td>
                                                                <td>P5</td>
                                                                <td>P6</td>
                                                                <td>P7</td>
                                                                <td>P8</td>
                                                                <td>P9</td>
                                                                <td>Aksi</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
																foreach ($Kuesioner as $key => $value) { ?>
                                                            <tr>
                                                                <td><?php echo $no++; ?></td>
                                                                <td><?= $value->umur;  ?></td>
                                                                <td><?= $value->jenis_kelamin; ?></td>
                                                                <td><?= $value->pendidikan; ?></td>
                                                                <td><?= $value->pekerjaan; ?></td>
                                                                <td><?= $value->alamat; ?></td>
                                                                <td><?= $value->pelayanan; ?></td>
                                                                <td><?= $value->NIK;  ?></td>
                                                                <td><?= $value->tgl_entri;  ?></td>
                                                                <?php $jawaban = $this->db->query("SELECT * FROM skm_kuesioner WHERE id_skm_biodata='$value->id_skm_biodata'")->result(); ?>
                                                                <?php foreach ($jawaban as $key => $value) { ?>
                                                                <td><?= $value->jawaban; ?></td>
                                                                <?php } ?>
                                                                <td>
                                                                    <a data-toggle="modal"
                                                                        data-target="#modal-delete<?php echo  $value->id_skm_biodata; ?>"
                                                                        href="" class="btn btn-danger btn-sm"><span
                                                                            class="fa fa-trash"></span></a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <?php if (!empty($Kuesioner)) { ?>
            <?php foreach ($Kuesioner as $key => $value) { ?>
            <div class="modal fade" id="modal-edit<?php echo $value->id_skm_biodata ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-blue">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data</h4>
                        </div>
                        <form action="<?php echo  base_url('Admin/Ubah_data'); ?>" Method="Post">
                            <div class="modal-body">
                                <?php $jawaban = $this->db->query("SELECT * FROM skm_kuesioner WHERE id_skm_biodata='$value->id_skm_biodata'")->result(); ?>
                                <?php foreach ($jawaban as $key => $value) { ?>
                                <div class="form-group">
                                    <label for="">jawaban pertanyaan ke <?= $value->id_pertanyaan; ?></label>
                                    <input type="text" class="form-control" id="" value="<?= $value->jawaban; ?>"
                                        name="<?= $value->id_pertanyaan; ?>" placeholder="" required>
                                </div>
                                <?php } ?>
                                <input type="hidden" name="id_skm_biodata"
                                    value="<?php echo $value->id_skm_biodata; ?>">
                                <input type="hidden" name="semester" value="<?php echo $semester ?>">
                                <input type="hidden" name="tahun" value="<?php echo $tahun; ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->

                </div>
                <!-- /.modal-dialog -->
            </div>
            <?php } ?>

            <?php foreach ($Kuesioner as $key => $value) { ?>
            <div class="modal modal fade" id="modal-delete<?php echo  $value->id_skm_biodata; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-gradient-danger">
                            <h4 class="modal-title text-gray-100">Hapus Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin Ingin Menghapus Data ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="<?php echo  base_url('Admin/Hapus_data_skm/' . $value->id_skm_biodata . '/' . $semester . '/' . $tahun); ?>"
                                class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
       
         <!-- /.modal-dialog -->
            </div>
            <?php }
			} ?>

            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->
    </div>
</body>