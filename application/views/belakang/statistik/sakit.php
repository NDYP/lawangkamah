<div class="col-md-9">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <div class="box-header with-border">
                <a class="btn btn-social btn-flat bg-orange btn-sm" title="Tabel Data" href="#tab_1" data-toggle="tab">
                    <i class="fa fa-table"></i>Tabel Data
                </a>
                <a class="btn btn-social btn-flat bg-purple btn-sm" title="Pie Data" href="#tab_2" data-toggle="tab">
                    <i class="fa fa-pie-chart"></i>Pie Data
                </a>
                <a class="btn btn-social btn-flat bg-blue btn-sm" title="Line Data" href="#tab_3" data-toggle="tab">
                    <i class="fa fa-line-chart"></i>Line Data
                </a>
                <a class="btn btn-social btn-flat bg-red btn-sm" title="Line Data"
                    href="<?= base_url('admin/excel/sakit') ?>">
                    <i class="fa fa-book"></i>Export
                </a>
            </div>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-striped dataTable active">
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
                                <td class="text-left"><?= $x['sakit']; ?></td>
                                <td class="text-right">
                                    <a target="_blank"><?= $x['jumlah']; ?></a>
                                </td>
                                <td class="text-right"><?= $x['persentasi']; ?></td>
                                <td class="text-left"><a target="_blank"><?= $x['jumlahco']; ?></a></td>
                                <td class="text-left"><a target="_blank"><?= $x['jumlahce']; ?></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.tab-pane -->
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
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>
</div>
</form>
</section>
</div>