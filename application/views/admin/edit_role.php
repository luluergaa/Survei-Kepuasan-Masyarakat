<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <?php foreach ($role as $r) { ?>
            <form action="<?= base_url('Admin/proses_edit_role'); ?>" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="hidden" name="id" value="<?= $r->id; ?>">
                    <input type="text" class="form-control" name="title" value="<?= $r->role; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
