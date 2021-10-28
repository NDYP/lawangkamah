<div class="col-md-9">
    <div class="box box-info">
        <div class="box-header with-border">
            <a href="https://demo.opensid.or.id/statistik/dialog/cetak" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Cetak Laporan" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Laporan"><i class="fa fa-print "></i>Cetak
            </a>
            <a href="https://demo.opensid.or.id/statistik/dialog/unduh" class="btn btn-social btn-flat bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Unduh Laporan" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Laporan"><i class="fa fa-print "></i>Unduh
            </a>
            <a class="btn btn-social btn-flat bg-orange btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block grafikType" title="Grafik Data" id="#chart-container" data-toggle="chart">
                <i class="fa fa-bar-chart"></i>Grafik Data
            </a>
            <a class="btn btn-social btn-flat btn-primary btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block pieType" title="Pie Data" id="pieType">
                <i class="fa fa-pie-chart"></i>Pie Data
            </a>
            <a href="https://demo.opensid.or.id/statistik/clear/5" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-refresh"></i>Bersihkan Filter</a>
        </div>
        <div class="box-body">
            <h4 class="box-title text-center"><b><?= $title2; ?></b></h4>
            <div id="chart" hidden="true"> </div>
        </div>

        <div class="box-body">
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
                                <td class="text-left"><?= $x['pendidikan_kk']; ?></td>
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


    </div>
</div>
<div class="col-md-6">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <div class="box-header with-border">
                <a class="btn btn-social btn-flat bg-orange btn-sm" title="Grafik Data" href="#tab_1" data-toggle="tab">
                    <i class="fa fa-bar-chart"></i>Grafik Data
                </a>
                <a class="btn btn-social btn-flat bg-purple btn-sm" title="Pie Data" href="#tab_2" data-toggle="tab">
                    <i class="fa fa-pie-chart"></i>Pie Data
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
                                    <td class="text-left"><?= $x['pendidikan_kk']; ?></td>
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
                        <canvas id="bar-chart" style="height: 180px;"></canvas>
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