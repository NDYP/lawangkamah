<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> <?= $title; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $pejabat; ?></h3>
                        <p>Pejabat/Pemerintah Desa</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-man"></i>
                    </div>
                    <a href="<?= site_url('admin/Pejabat_Desa/index'); ?>" class="small-box-footer">Lihat <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $kelompok; ?></h3>
                        <p>Kelompok</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-people"></i>
                    </div>
                    <a href="<?= site_url('admin/kelompok/index') ?>" class="small-box-footer">Lihat <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $penduduk; ?></h3>
                        <p>Penduduk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?= site_url('admin/penduduk/index') ?>" class="small-box-footer">Lihat <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= $keluarga; ?></h3>
                        <p>Keluarga</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="<?= site_url('admin/keluarga/index') ?>" class="small-box-footer">Lihat <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $online; ?></h3>
                        <p>Pengunjung Online</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $today; ?></h3>
                        <p>Pengunjung hari ini</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $total; ?></h3>
                        <p>Total Pengunjung</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="content-header">
                <h1 class="text-center">
                    <?= $title2; ?>
                    <hr>
                </h1>
            </section>
            <section class="col-lg-6 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <div class="tab-pane" id="tab_2">
                        <div class="chart-container">
                            <div class="bar-chart-container">
                                <canvas id="bar-chart" style="height: 30px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col-lg-6 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <div class="tab-pane" id="tab_2">
                        <div class="chart-container">
                            <div class="bar-chart-container">
                                <canvas id="bar-chart2" style="height: 30px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->