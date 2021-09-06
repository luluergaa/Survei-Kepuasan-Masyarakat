<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?>
                <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-tambah"><span
                        class="fa fa-plus"></span> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Menu</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
						foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <a href="" title="Edit" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modal-edit<?php echo  $m['id']; ?>"><span
                                        class="fa fa-edit"></span></a>
                                <a href="" title="Delete" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#modal-delete<?php echo $m['id']; ?>"><span
                                        class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h4 class="modal-title text-gray-100">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?php echo base_url() ?>Menu/Tambah_data_menu" Method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Menu</label>
                        <input type="text" class="form-control" id="" name="menu" placeholder="Masukan Nama Menu"
                            required>
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
<?php foreach ($menu as $m) : ?>
<div class="modal fade" id="modal-edit<?php echo $m['id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-success">
                <h4 class="modal-title text-gray-100">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo  base_url('Menu/Ubah_data_menu'); ?>" Method="Post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Menu</label>
                        <input type="text" class="form-control" id="menu" value="<?php echo $m['menu']; ?>" name="menu"
                            placeholder="Masukan Nama Menu" required>
                        <input type="hidden" name="id" value="<?php echo $m['id']; ?>">
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
<?php endforeach; ?>

<!-- modal hapus -->
<?php foreach ($menu as $m) : ?>
<div class="modal modal fade" id="modal-delete<?php echo  $m['id']; ?>">
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
                <a href="<?php echo  base_url('Menu/Hapus_data_menu/' . $m['id']); ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
<!-- /modal -->