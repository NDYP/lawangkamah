<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/penduduk'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box ">
                    <div class="box-header with-border">
                        <?php foreach ($penduduk as $x) : ?>
                            <a href="<?= base_url('admin/penduduk/index'); ?>" class="btn bg-green-gradient btn-social btn-flat btn btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <div class="box-body">
                        <div class="box-body bg-identitas">
                            <?php if ($x['foto_penduduk'] == NULL) : ?>
                                <center>
                                    <img src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" alt="" style="width: auto;max-height: 250px;max-width: 200px; vertical-align: middle;">
                                </center>
                            <?php elseif ($x['foto_penduduk']) : ?>
                                <center>
                                    <img class="img-identitas img-responsive" src="<?= base_url('assets/foto/penduduk/' . $x['foto_penduduk']) ?>" alt="logo" style="width: auto;max-height: 250px;max-width: 200px; vertical-align: middle;">
                                </center>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th style="background-color:gray;" colspan="3" class="subtitle_head"><strong>DATA KELAHIRAN</strong></th>
                                    </tr>
                                    <tr>
                                        <td width="300">NIK</td>
                                        <td width="1">:</td>
                                        <td> <?= $x['nik_penduduk']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>:</td>
                                        <td> <?= $x['nama_lengkap']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. KK</td>
                                        <td>:</td>
                                        <td> <?= $x['no_kk']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hubungan Dalam Keluarga</td>
                                        <td>:</td>
                                        <td> <?= $x['status_kk']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td> <?= $x['jenis_kelamin']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>:</td>
                                        <td> <?= $x['agama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Pernikahan</td>
                                        <td>:</td>
                                        <td> <?= $x['status_nikah']; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:gray;" colspan="3" class="subtitle_head"><strong>DATA KELAHIRAN</strong></th>
                                    </tr>

                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td>:</td>
                                        <td> <?= $x['tempat_lahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>:</td>
                                        <td> <?= date('d-m-Y', strtotime($x['tanggal_lahir'])); ?></td>
                                    </tr>

                                    <tr>
                                        <td>Penolong Kelahiran</td>
                                        <td>:</td>
                                        <td> <?= $x['penolong_kelahiran']; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:gray;" colspan="3" class="subtitle_head"><strong>PENDIDIKAN DAN PEKERJAAN</strong></th>
                                    </tr>
                                    <tr>
                                        <td>Pendidikan Terakhir</td>
                                        <td>:</td>
                                        <td> <?= $x['pendidikan_kk']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td>:</td>
                                        <td> <?= $x['pekerjaan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pendapatan Perbulan</td>
                                        <td>:</td>
                                        <td> <?= $x['pendapatan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:gray;" colspan="3" class="subtitle_head"><strong>DATA KEWARGANEGARAAN</strong></th>
                                    </tr>
                                    <tr>
                                        <td>Status Warga Negara</td>
                                        <td>:</td>
                                        <td> <?= $x['warga_negara']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Paspor</td>
                                        <td>:</td>
                                        <td> <?= $x['tgl_paspor']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Paspor</td>
                                        <td>:</td>
                                        <td> <?= $x['no_paspor']; ?></td>
                                    </tr>


                                    <tr>
                                        <th style="background-color:gray;" colspan="3" class="subtitle_head"><strong>ALAMAT</strong></th>
                                    </tr>
                                    <tr>
                                        <td>Alamat Sebelumnya</td>
                                        <td>:</td>
                                        <td> <?= $x['alamat_sebelum']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Sekarang</td>
                                        <td>:</td>
                                        <td> <?= $x['alamat_sekarang']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>RT</td>
                                        <td>:</td>
                                        <td> <?= $x['rt']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>RW</td>
                                        <td>:</td>
                                        <td> <?= $x['rw']; ?></td>
                                    </tr>

                                    <tr>
                                        <th style="background-color:gray;" colspan="3" class="subtitle_head"><strong>DATA KESEHATAN</strong></th>
                                    </tr>
                                    <tr>
                                        <td>Golongan Darah</td>
                                        <td>:</td>
                                        <td> <?= $x['golongan_darah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Asuransi</td>
                                        <td>:</td>
                                        <td> <?= $x['asuransi']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sakit</td>
                                        <td>:</td>
                                        <td> <?= $x['sakit']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Cacat</td>
                                        <td>:</td>
                                        <td> <?= $x['cacat']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <th style="background-color:gray;" colspan="3" class="subtitle_head"><strong>BERKAS</strong></th>
                                </tr>
                                <table id="example2" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th width="250">Aksi</th>
                                            <th>Berkas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($berkas as $x) : ?>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <a href="<?= base_url('admin/penduduk/hapusberkas/' . $x['id_berkas']); ?>" class="btn btn-social btn-flat btn-warning btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Hapus"><i class="fa fa-trash-o"></i> Hapus</a>
                                                </td>
                                                <td colspan="5">
                                                    <a target="_blank" href="<?= site_url('assets/berkas/penduduk/' . $x['berkas']) ?>">
                                                        <span class="fa fa-file-pdf-o"></span> <?= $x['judul']; ?></a>
                                                </td>
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