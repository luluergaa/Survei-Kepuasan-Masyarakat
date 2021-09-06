<!-- Highchart -->
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
                <li><a href="index.html">Home</a></li>
                <li>Laporan SKM</li>
            </ol>
            <h2 class="title text-black">Survei Kepuasan Masyarakat -
                <?php echo $tahun . " semester " . $semester; ?></h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="DATA_SKM-tab" data-toggle="tab" href="#DATA_SKM"
                                        role="tab" aria-controls="DATA_SKM" aria-selected="true">DATA SKM</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="GRAFIK-tab" data-toggle="tab" href="#GRAFIK" role="tab"
                                        aria-controls="GRAFIK" aria-selected="false">Grafik</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade show active" id="DATA_SKM" role="tabpanel"
                                    aria-labelledby="DATA_SKM-tab">
                                    <p>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>No. Responden</th>
                                                <th>Umur</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Pendidikan terkahir</th>
                                                <th>Pekerjaan</th>
                                                <th>Alamat</th>
                                                <th>Jenis Pelayanan</th>
                                                <th>P1</th>
                                                <th>P2</th>
                                                <th>P3</th>
                                                <th>P4</th>
                                                <th>P5</th>
                                                <th>P6</th>
                                                <th>P7</th>
                                                <th>P8</th>
                                                <th>P9</th>
                                            </tr>
                                            <?php $no = 1;
											foreach ($data_skm as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $value->umur; ?></td>
                                                <td><?php echo $value->jenis_kelamin; ?></td>
                                                <td><?php echo $value->pendidikan; ?></td>
                                                <td><?php echo $value->pekerjaan; ?></td>
                                                <td><?php echo $value->alamat; ?></td>
                                                <td><?php echo $value->pelayanan; ?></td>
                                                <?php $jawaban = $this->db->query("SELECT * FROM skm_kuesioner WHERE id_skm_biodata='$value->id_skm_biodata'")->result(); ?>
                                                <?php foreach ($jawaban as $key => $value) { ?>
                                                <td><?= $value->jawaban; ?></td>
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="GRAFIK" role="tabpanel" aria-labelledby="GRAFIK-tab">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <p style="color:#4000ff;font-weight:bold;">Grafik Berdasarkan Alamat
                                                        </p>
                                                    </div>
                                                    <figure class="highcharts-figure">
                                                        <div id="grafik_alamat"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <p style="color:#4000ff;font-weight:bold;">Grafik Berdasarkan
                                                            Pekerjaan</p>
                                                    </div>
                                                    <figure class="highcharts-figure">
                                                        <div id="grafik_pekerjaan"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <p style="color:#4000ff;font-weight:bold;">Grafik Berdasarkan
                                                            Pendidikan Terakhir</p>
                                                    </div>
                                                    <figure class="highcharts-figure">
                                                        <div id="grafik_pendidikan"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <p style="color:#4000ff;font-weight:bold;">Grafik Berdasarkan Layanan
                                                        </p>
                                                    </div>
                                                    <figure class="highcharts-figure">
                                                        <div id="grafik_layanan"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end main-content -->

    <!-- java script -->


    <script>
    Highcharts.chart('grafik_alamat', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Biodata Alamat'
        },

        accessibility: {
            announceNewData: {
                enabled: true
            },
            point: {
                valueSuffix: '%'
            }
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Presentase',
            colorByPoint: true,
            data: [{
                    name: 'Hadimulyo Barat',
                    y: <?php echo $hadimulyo_barat; ?>
                },
                {
                    name: 'Hadimulyo Timur',
                    y: <?php echo $hadimulyo_timur; ?>
                },
                {
                    name: 'Metro',
                    y: <?php echo $metro; ?>
                },
                {
                    name: 'Yosomulyo',
                    y: <?php echo $yosomulyo; ?>
                },
            ]
        }]
    });
    </script>

    <script type="text/javascript">
    Highcharts.chart('grafik_pekerjaan', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Biodata Pekerjaan'
        },

        accessibility: {
            announceNewData: {
                enabled: true
            },
            point: {
                valueSuffix: '%'
            }
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Presentase',
            colorByPoint: true,
            data: [{
                    name: 'PNS/TNI/POLRI',
                    y: <?php echo $PNS_TNI_POLRI; ?>
                },
                {
                    name: 'Pegawai Swasta',
                    y: <?php echo $P_swasta; ?>
                },
                {
                    name: 'Wiraswasta/Usaha',
                    y: <?php echo $Wiraswasta; ?>
                },
                {
                    name: 'Pelajar Mahasiswa',
                    y: <?php echo $Mahasiswa; ?>
                },
                {
                    name: 'Petani',
                    y: <?php echo $Petani; ?>
                },
                {
                    name: 'Pedagang',
                    y: <?php echo $Pedagang; ?>
                },
                {
                    name: 'Buruh',
                    y: <?php echo $Buruh; ?>
                },
                {
                    name: 'Lainnya',
                    y: <?php echo $Lainnya; ?>
                },
            ]
        }]
    });
    </script>

    <script>
    Highcharts.chart('grafik_pendidikan', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Biodata Pendidikan'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            },
            point: {
                valueSuffix: '%'
            }
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Presentase',
            colorByPoint: true,
            data: [{
                    name: 'SD Ke Bawah',
                    y: <?php echo $SD; ?>

                },
                {
                    name: 'SLTP',
                    y: <?php echo $SLTP; ?>
                },
                {
                    name: 'SLTA',
                    y: <?php echo $SLTA; ?>
                },

                {
                    name: 'D1, D3, D4',
                    y: <?php echo $Diploma; ?>
                },
                {
                    name: 'S1',
                    y: <?php echo $S1; ?>
                },
                {
                    name: 'S2 Ke Atas',
                    y: <?php echo $S2; ?>
                }
            ]


        }]
    });
    </script>

    <script>
    Highcharts.chart('grafik_layanan', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Biodata Pelayanan'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            },
            point: {
                valueSuffix: '%'
            }
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Presentase',
            colorByPoint: true,
            data: [{
                    name: 'KTP',
                    y: <?php echo $KTP; ?>

                },
                {
                    name: 'KK',
                    y: <?php echo $KK; ?>
                },
                {
                    name: 'IMB',
                    y: <?php echo $IMB; ?>
                },
                {
                    name: 'HO',
                    y: <?php echo $HO; ?>
                },
                {
                    name: 'SKTM',
                    y: <?php echo $SKTM; ?>
                }
            ]
        }]
    });
    </script>



    </body>

    </html>