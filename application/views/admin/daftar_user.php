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
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> User

                <a href="<?= base_url() ?>Admin/registrasi/" class="btn btn-primary float-right"><span
                        class="fa fa-plus"></span> Tambah Akun</a>

        </div>
        <div class="card-body">
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td scope="col">No</td>
                            <td scope="col">Name</td>
                            <td scope="col">Email</td>
                            <td scope="col">Image</td>
                            <td scope="col">Role</td>
                            <td scope="col">Active</td>
                            <td scope="col">Aksi</td>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        <?php $no = 1; ?>
                        <?php foreach ($user as $u) : ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $u['name']; ?></td>
                            <td><?= $u['email']; ?></td>
                            <td><?= $u['image']; ?></td>
                            <td><?= $u['role_id']; ?></td>
                            <td><?= $u['is_active']; ?></td>
                            <td>
                                <a href="" title="Edit" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modal-edit<?php echo  $u['id']; ?>"><span
                                        class="fa fa-edit"></span></a>

                                <a href="" title="Delete" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#modal-delete<?php echo $u['id']; ?>"><span
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


<!-- modal edit -->
<?php foreach ($user as $u) : ?>
<div class="modal fade" id="modal-edit<?php echo $u['id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-success">
                <h4 class="modal-title text-gray-100">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo  base_url('Admin/Ubah_data_user'); ?>" Method="Post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control form-control-user" id="name" name="name"
                            value="<?= set_value('name'); ?><?php echo $u['name']; ?>" required>
                        <input type="hidden" name="id" value="<?php echo $u['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control form-control-user" id="email" name="email"
                            value="<?= set_value('email'); ?><?php echo $u['email']; ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Role <code>Admin = 1, Member = 2</code></label>
                        <input type="number" class="form-control form-control-user" id="role_id" name="role_id"
                            value="<?php echo $u['role_id']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Aktif <code>Jika aktif isi 1, jika tidak isi 0</code></label>
                        <input type="number" class="form-control form-control-user" id="is_active" name="is_active"
                            value="<?php echo $u['is_active']; ?>" required>
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
<?php foreach ($user as $u) : ?>
<div class="modal modal fade" id="modal-delete<?php echo  $u['id']; ?>">
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
                <a href="<?php echo  base_url('Admin/Hapus_data_user/' . $u['id']); ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- /modal -->