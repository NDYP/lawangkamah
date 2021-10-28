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
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/pejabat'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Pejabat Sekarang</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Pejabat Sebelumnya</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="box">
                                <div class="box-header">
                                    <a href="<?= base_url('admin/pejabat_desa/tambah'); ?>" class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Ubah Biodata"><i class="fa fa-plus-circle"></i> Tambah Pejabat</a>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>No.</th>
                                                            <th>Aksi</th>
                                                            <th>Foto</th>
                                                            <th>Nama, NIK, NIPD</th>
                                                            <th>Jabatan</th>
                                                            <th>Nomor SK Pengangkatan <br>Tanggal </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 0;
                                                        foreach ($pejabat as $x) :
                                                            $no++; ?>
                                                            <?php if ($x['no_sk_pemberhentian'] == NULL) : ?>
                                                                <tr role="row" class="odd">
                                                                    <td style="text-align: center;"><?= $no; ?></td>
                                                                    <td style="text-align: center;">
                                                                        <div class="btn-group">
                                                                            <button type="button" class="btn bg-purple btn-social btn-flat btn-info btn-sm" data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i> Pilih Aksi</button>
                                                                            <ul class="dropdown-menu" role="menu">
                                                                                <li>
                                                                                    <a href="<?= base_url('admin/pejabat_desa/edit/' . $x['id_pejabat']); ?>" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="<?= base_url('admin/pejabat_desa/hapus/' . $x['id_pejabat']); ?>" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-trash-o"></i> Hapus</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                        <?php if ($x['foto_pejabat'] == NULL) : ?>
                                                                            <img src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                                        <?php elseif ($x['foto_pejabat']) : ?>
                                                                            <img src="<?= base_url('assets/foto/pejabat/' . $x['foto_pejabat']); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td><?= $x['nama_lengkap']; ?>
                                                                        <br> NIK : <?= $x['nik']; ?>
                                                                        <br> NIPD : <?= $x['nip_nipd']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $x['jabatan']; ?></td>
                                                                    <td>SK :<?= $x['no_sk_pengangkatan']; ?>
                                                                        <br><?= $x['tgl_sk_pengangkatan']; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="box">
                                <div class="box-header">
                                    <a href="<?= base_url('admin/pejabat_desa/tambah_pejabat_sebelumnya'); ?>" class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Ubah Biodata"><i class="fa fa-plus-circle"></i> Tambah Pejabat Sebelumnya</a>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>No.</th>
                                                            <th>Aksi</th>
                                                            <th>Foto</th>
                                                            <th>Nama, NIK, NIPD</th>
                                                            <th>Jabatan</th>
                                                            <th>Nomor SK dan Tanggal <br> Pengangkatan </th>
                                                            <th>Nomor SK dan Tanggal <br> Pemberhentian </th>
                                                            <th>Masa Kerja</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 0;
                                                        foreach ($pejabat as $x) :
                                                            $no++; ?>
                                                            <?php if ($x['no_sk_pemberhentian']) : ?>
                                                                <tr role="row" class="odd">
                                                                    <td style="text-align: center;"><?= $no; ?></td>
                                                                    <td style="text-align: center;">
                                                                        <div class="btn-group">
                                                                            <button type="button" class="btn bg-purple btn-social btn-flat btn-info btn-sm" data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i> Pilih Aksi</button>
                                                                            <ul class="dropdown-menu" role="menu">
                                                                                <li>
                                                                                    <a href="<?= base_url('admin/pejabat_desa/edit/' . $x['id_pejabat']); ?>" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="<?= base_url('admin/pejabat_desa/hapus/' . $x['id_pejabat']); ?>" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-trash-o"></i> Hapus</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                        <?php if ($x['foto_pejabat'] == NULL) : ?>
                                                                            <img src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                                        <?php elseif ($x['foto_pejabat']) : ?>
                                                                            <img src="<?= base_url('assets/foto/pejabat/' . $x['foto_pejabat']); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td><?= $x['nama_lengkap']; ?>
                                                                        <br> NIK : <?= $x['nik']; ?>
                                                                        <br> NIPD : <?= $x['nip_nipd']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $x['jabatan']; ?></td>
                                                                    <td>SK :<?= $x['no_sk_pengangkatan']; ?>
                                                                        <br><?= $x['tgl_sk_pengangkatan']; ?>
                                                                    </td>
                                                                    <td>SK :<?= $x['no_sk_pemberhentian']; ?>
                                                                        <br><?= $x['tgl_sk_pemberhentian']; ?>
                                                                    </td>
                                                                    <td><?= $x['masa_jabatan']; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>