<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3 col-lg-8">
        <div class=" row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $login['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $login['name']; ?></h5>
                    <p class="card-text"><?= $login['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Login Terakhir :
                            <?php echo date('d F Y'); ?></small></p>
                    <p class="card-text"><span class="badge badge-info">Selamat bekerja
                            <?= $login['name']; ?>,
                            Semoga selalu semangat!</span></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>



<!-- End of Main Content -->
