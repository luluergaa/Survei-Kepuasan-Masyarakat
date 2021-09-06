<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?>

                        <a href="" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#modal-tambah"><span class="fa fa-plus"></span> Tambah</a>
                </div>
                <!-- Main content -->

                <div class="card-body">

                    <div class="table-responsive"><br>
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <?= form_error('member', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                                <?= $this->session->flashdata('message'); ?>
                                <tr>
                                    <td>No.</td>
                                    <td>Tahun</td>
                                    <td>Nilai</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
								foreach ($Rekap_SKM as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $value->tahun; ?></td>
                                    <td><?php echo $value->nilai; ?></td>
                                    <td>
                                        <a href="" title="Edit" class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#modal-edit<?php echo  $value->id_skm_rekap; ?>"><span
                                                class="fa fa-edit"></span></a>
                                        <a href="" title="Delete" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#modal-delete<?php echo $value->id_skm_rekap; ?>"><span
                                                class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- /.content -->
            </div>
        </div>
    </div>
</body>

<!-- Modal -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h4 class="modal-title text-gray-100">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?php echo base_url() ?>Member/Tambah_data_rekap" Method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="number" class="form-control" id="" name="tahun" placeholder="Masukan Tahun"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">Nilai <code>Koma Menggunakan titik('.')</code></label>
                        <input type="text" class="form-control" id="" name="nilai" placeholder="Masukan Nilai" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal edit -->
<?php foreach ($Rekap_SKM as $key => $value) { ?>
<div class="modal fade" id="modal-edit<?php echo $value->id_skm_rekap; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-success">
                <h4 class="modal-title text-gray-100">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo  base_url('Member/Ubah_data_rekap'); ?>" Method="Post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="number" class="form-control" id="tahun" value="<?php echo $value->tahun; ?>"
                            name="tahun" placeholder="Masukan Tahun" required>
                        <input type="hidden" name="id_skm_rekap" value="<?php echo $value->id_skm_rekap; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nilai</label>
                        <input type="text" class="form-control" id="nilai" value="<?php echo $value->nilai; ?>"
                            name="nilai" placeholder="Masukan Nilai" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>

<!-- modal hapus -->
<?php foreach ($Rekap_SKM as $key => $value) { ?>
<div class="modal modal fade" id="modal-delete<?php echo  $value->id_skm_rekap; ?>">
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
                <a href="<?php echo  base_url('Member/Hapus_data_rekap/' . $value->id_skm_rekap); ?>"
                    class="btn btn-danger">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /modal -->