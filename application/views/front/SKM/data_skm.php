<!-- Highchart  -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <!-- Start main-content -->
  <div class="main-content">

      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">

              <ol>
                  <li><a href="<?= base_url('home') ?>">Home</a></li>
                  <li>Laporan SKM</li>
              </ol>
              <h2><?= $title; ?></h2>

          </div>
      </section><!-- End Breadcrumbs -->

  </div>
  </section>


  <section>
      <div class="container mt-30 mb-30 pt-30 pb-30">
          <div class="row">
              <div class="col-md-9">
                  <div class="row">
                      <div class="col-sm-12 col-md-12">
                          <div class="card shadow mb-4">
                              <div class="card-header py-3">
                                  <p style="font-weight:bold;">DATA SKM</p>
                              </div>
                              <div class="card-body">
                                  <form action="<?php echo base_url() ?>Data_SKM" method="POST">
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
                                              class="btn btn-primary btn-sm form-control">Lihat</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-12 col-md-12">
                          <div class="card shadow mb-4">
                              <div class="card-header py-3">
                                  <p style="font-weight:bold;">DATA SKM BERDASARKAN PELAYANAN</p>
                              </div>
                              <div class="card-body">
                                  <form action="<?php echo base_url() ?>Data_Pelayanan" method="POST">
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
                                      <div class="form-group col-sm-4">
                                        <select name="pelayanan" class="form-control" id="">
                                          <option value="" selected="selected">--Pelayanan--</option>
                                          <option value="Kartu Tanda Penduduk(KTP)">Kartu Tanda Penduduk(KTP)</option>
                                          <option value="Kartu Keluarga(KK)">Kartu Keluarga(KK)</option>
                                          <option value="Izin Membuat Bangunan (IMB)">Izin Membuat Bangunan (IMB)</option>
                                          <option value="HO (gangguan)">HO (gangguan)</option>
                                          <option value="Surat Keterangan Tidak Mampu (SKTM)">Surat Keterangan Tidak Mampu (SKTM)</option>
                                        </select>
                                      </div>
                                      <div class="form-group col-sm-2">
                                          <button type="submit"
                                              class="btn btn-primary btn-sm form-control">Lihat</button>
                                      </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <p style="font-weight:bold;">REKAP DATA SKM</p>
                            </div>
                            <figure class="highcharts-figure">
                              <div id="grafik_batang"></div>
                          </figure>
                         </div>
                    </div>
                      
                  <div class="row">
                      <div class="col-12">
                      </div>
                  </div>
              </div>
          </div>
      </div>


  </section>

  <!-- end main-content -->


  <script type="text/javascript">
Highcharts.chart('grafik_batang', {
    chart: {
        type: 'column'
    },
    title: {
        text: '<?= $judul;?>'
    },
    subtitle: {
        text: ''
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'TOTAL NILAI SKM'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series:[{
        name: "SKM",
        colorByPoint: true,
        data: [ 
        <?php foreach($skm_rekap as $rekap) : ?>
            {
                name: '<?php echo $rekap['tahun']; ?>',
                y: <?php echo $rekap['nilai']; ?> ,
                drilldown : '<?php echo $rekap['tahun']; ?>'
            }, 
        <?php endforeach ?> 
      ]
    }],

});
</script>


  <script type="text/javascript">
Highcharts.chart('grafik_batang', {
    chart: {
        type: 'column'
    },
    title: {
        text: '<?= $judul;?>'
    },
    subtitle: {
        text: ''
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'TOTAL NILAI SKM'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series:[{
        name: "SKM",
        colorByPoint: true,
        data: [ 
        <?php foreach($skm_rekap as $rekap) : ?>
            {
                name: '<?php echo $rekap['tahun']; ?>',
                y: <?php echo $rekap['nilai']; ?> ,
                drilldown : '<?php echo $rekap['tahun']; ?>'
            }, 
        <?php endforeach ?> 
      ]
    }],

});
</script>

  <!-- java script -->

  <!-- contoh -->
 <script type="text/javascript">
Highcharts.chart('grafik_batang', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'SURVEY KEPUASAN MASYARAKAT(SKM) KECAMATAN METRO PUSAT'
    },
    subtitle: {
        text: ''
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'TOTAL NILAI SKM'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [{
        name: "SKM",
        colorByPoint: true,
        data: [ 
        <?php foreach($skm_rekap as $key => $value) { ?>
            {
                name: "<?php echo $value->tahun; ?>",
                y: <?php echo $value -> nilai; ?> ,
                drilldown : "<?php echo $value->tahun; ?>"
            }, 
        <?php } ?> 
        ]
    }],

});
</script>




