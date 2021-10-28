<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/desa'); ?>"><?= $title; ?></a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box ">
                    <div class="box-header with-border">
                        <?php foreach ($profil as $x) : ?>
                            <a href="<?= base_url('admin/desa/edit'); ?>" class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-edit"></i> Ubah Data Desa</a>
                    </div>
                    <div class="box-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th style="background-color:grey;" colspan="3" class="subtitle_head"><strong>DESA</strong></th>
                                    </tr>
                                    <tr>
                                        <td width="300">Nama Desa</td>
                                        <td width="1">:</td>
                                        <td> <?= $x['nama_desa']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Desa</td>
                                        <td>:</td>
                                        <td> <?= $x['kode_desa']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pos Desa</td>
                                        <td>:</td>
                                        <td> <?= $x['kode_pos']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kepala Desa</td>
                                        <td>:</td>
                                        <td> <?= $x['nama_lengkap']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIP/NIDN Kepala Desa</td>
                                        <td>:</td>
                                        <td> <?= $x['nip_nipd']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Kantor Desa</td>
                                        <td>:</td>
                                        <td> <?= $x['alamat_kantor']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Telepon/HP Desa</td>
                                        <td>:</td>
                                        <td> <?= $x['telepon_desa']; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:gray;" colspan="3" class="subtitle_head"><strong>KECAMATAN</strong></th>
                                    </tr>
                                    <tr>
                                        <td>Nama Kecamatan</td>
                                        <td>:</td>
                                        <td> <?= $x['nama_kecamatan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Kecamatan</td>
                                        <td>:</td>
                                        <td> <?= $x['kode_kecamatan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Camat</td>
                                        <td>:</td>
                                        <td> <?= $x['nama_camat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIP Camat</td>
                                        <td>:</td>
                                        <td> <?= $x['nip_camat']; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:gray;" colspan="3" class="subtitle_head"><strong>KABUPATEN</strong></th>
                                    </tr>
                                    <tr>
                                        <td>Nama Kabupaten</td>
                                        <td>:</td>
                                        <td> <?= $x['nama_kabupaten']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Kabupaten</td>
                                        <td>:</td>
                                        <td> <?= $x['kode_kabupaten']; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:gray;" colspan="3" class="subtitle_head"><strong>Provinsi</strong></th>
                                    </tr>
                                    <tr>
                                        <td>Nama Provinsi</td>
                                        <td>:</td>
                                        <td> <?= $x['nama_provinsi']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Provinsi</td>
                                        <td>:</td>
                                        <td> <?= $x['kode_provinsi']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>