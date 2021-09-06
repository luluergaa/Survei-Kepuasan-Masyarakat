<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Main content -->

    <section>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Laporan SKM Persemester</h6>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url() ?>Laporan/data_skm" method="POST">
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
                                        <button type="submit" class="btn btn-primary btn-sm form-control">
                                            <li class="fa fa-print"></li>&nbsp;&nbsp;Print
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Laporan SKM Pertahun</h6>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url() ?>Laporan/data_skm_pertahun" method="POST">

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
                                        <button type="submit" class="btn btn-primary btn-sm form-control">
                                            <li class="fa fa-print"></li>&nbsp;&nbsp;Print
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </section>












































    <!-- End filter by tahun -->