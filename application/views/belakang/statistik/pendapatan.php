<style>
th {
    text-align: center;
}
</style>
<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/penduduk/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <a class="btn btn-social btn-flat bg-orange btn-sm" title="Tabel Data" href="#tab_1"
                                        data-toggle="tab">
                                        <i class="fa fa-table"></i>Tabel Data
                                    </a>
                                    <a class="btn btn-social btn-flat bg-purple btn-sm" title="Pie Data" href="#tab_2"
                                        data-toggle="tab">
                                        <i class="fa fa-pie-chart"></i>Pie Data
                                    </a>
                                    <a class="btn btn-social btn-flat bg-blue btn-sm" title="Line Data" href="#tab_3"
                                        data-toggle="tab">
                                        <i class="fa fa-line-chart"></i>Line Data
                                    </a>
                                    <a class="btn btn-social btn-flat bg-red btn-sm" title="Line Data"
                                        href="<?= base_url('admin/excel/pendapatan') ?>">
                                        <i class="fa fa-book"></i>Export
                                    </a>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="example2"
                                                        class="table table-bordered table-striped dataTable active">
                                                        <thead class="bg-gray color-palette">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Jenis Kelompok</th>
                                                                <th colspan="2">Jumlah</th>
                                                                <th colspan="">Laki-Laki</th>
                                                                <th colspan="">Perempuan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0;
                                                            foreach ($statistik as $x) : $no++; ?>
                                                            <tr>
                                                                <td class="padat"><?= $no; ?></td>
                                                                <td class="text-left"><?= $x['pendapatan']; ?></td>
                                                                <td class="text-right">
                                                                    <a target="_blank"><?= $x['jumlah']; ?></a>
                                                                </td>
                                                                <td class="text-right"><?= $x['persentasi']; ?></td>
                                                                <td class="text-left"><a
                                                                        target="_blank"><?= $x['jumlahco']; ?></a></td>
                                                                <td class="text-left"><a
                                                                        target="_blank"><?= $x['jumlahce']; ?></a></td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        <div class="chart-container">
                                            <div class="bar-chart-container">
                                                <canvas id="bar-chart" style="height: 30px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_3">
                                        <div class="chart-container">
                                            <div class="bar-chart-container">
                                                <canvas id="line-chart" style="height: 30px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <!-- /.tab-pane -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>