<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('user/C_beranda') ?>">Beranda</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <script type="text/javascript" src="<?= base_url() ?>jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            setInterval(function() {
                $("#cek_suhu").load("<?php echo site_url('user/C_monitoring/ceksuhu'); ?>");
                $("#cek_salinitas").load("<?php echo site_url('user/C_monitoring/ceksalinitas'); ?>");
                $("#cek_ph").load("<?php echo site_url('user/C_monitoring/cekph'); ?>");
                $("#fuzzy-set").load("<?php echo site_url('user/C_monitoring/fuzzyset'); ?>");
                $("#hasil").load("<?php echo site_url('user/C_monitoring/hasil'); ?>");
                $("#grade").load("<?php echo site_url('user/C_monitoring/grade'); ?>");
                $("#bacasuhu").load("<?php echo site_url('user/C_monitoring/bacasuhu'); ?>");
                $("#bacasalinitas").load("<?php echo site_url('user/C_monitoring/bacasalinitas'); ?>");
                $("#bacaph").load("<?php echo site_url('user/C_monitoring/bacaph'); ?>");
            }, 1000); //1 detik
        });
    </script>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills bg-white p-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-suhu-tab" data-toggle="pill" href="#pills-suhu" role="tab" aria-controls="pills-suhu" aria-selected="true">Suhu</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-salinitas-tab" data-toggle="pill" href="#pills-salinitas" role="tab" aria-controls="pills-salinitas" aria-selected="false">Salinitas</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-ph-tab" data-toggle="pill" href="#pills-ph" role="tab" aria-controls="pills-ph" aria-selected="false">pH</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-suhu" role="tabpanel" aria-labelledby="pills-suhu-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Grafik Suhu
                                </h3>
                            </div>
                            <div class="card-body" id="bacasuhu">
                                <!-- <div id="mine" style="height: 300px;"></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-salinitas" role="tabpanel" aria-labelledby="pills-salinitas-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Grafik Salinitas
                                </h3>
                            </div>
                            <div class="card-body" id="bacasalinitas">
                                <!-- <div id="mine2" style="height: 300px;"></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-ph" role="tabpanel" aria-labelledby="pills-ph-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Grafik pH
                                </h3>
                            </div>
                            <div class="card-body" id="bacaph">
                                <!-- <div id="mine3" style="height: 300px;"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-success text-center">Hasil perhitungan adalah</p>
                <div class="row justify-content-center">
                    <div class="col-sm-8 text-center">
                        <h1 id="grade">-</h1>
                    </div>
                </div>
                <table id="example2" class="table table-bordered table-hover mt-2">
                    <thead>
                        <tr>
                            <th class="text-center">Suhu</th>
                            <th class="text-center">Salinitas</th>
                            <th class="text-center">pH</th>
                            <th class="text-center">Fuzzy Set</th>
                            <th class="text-center">Hasil Domain</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" id="cek_suhu">0</td>
                            <td class="text-center" id="cek_salinitas">0</td>
                            <td class="text-center" id="cek_ph">0</td>
                            <td class="text-center" id="fuzzy-set">-</td>
                            <td class="text-center" id="hasil">-</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right mt-3">
                    <a href="<?= base_url('user/C_monitoring/reset') ?>" class="btn btn-secondary">reset</a>
                </div>
            </div>
        </div>
    </section>
</div>