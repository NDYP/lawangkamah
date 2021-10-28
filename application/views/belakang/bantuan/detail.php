<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/bantuan/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box">
                    <div class="box-header with-border">
                        <a href="<?= base_url('admin/bantuan/index'); ?>" class="btn bg-purple btn-social btn-flat btn btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <h4>Nama Bantuan</h4>
                                    </tr>
                                    <tr>
                                        <td width="300">Sasaran</td>
                                        <td width="1">:</td>
                                        <td> <?= $bantuan['sasaran']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Asal Dana</td>
                                        <td>:</td>
                                        <td> <?= $bantuan['asal_dana']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td> <?= $bantuan['keterangan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td> <?= $bantuan['status']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h4>Penerima Bantuan</h4>

                            <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">

                                        <th>No.</th>
                                        <th>Aksi</th>
                                        <th>Foto</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tempat, <br> Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($anggota as $bantuan) :
                                        $no++; ?>
                                        <tr role="row" class="odd">
                                            <td><?= $no; ?></td>
                                            <td><a href="<?= base_url('admin/bantuan/hapusanggota/' . $bantuan['id_bantuan_penerima']); ?>" class="btn btn-social btn-flat btn-warning btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Hapus"><i class="fa fa-trash-o"></i> Hapus</a></td>

                                            <td style="text-align: center;">
                                                <?php if ($bantuan['foto_penduduk'] == NULL) : ?>
                                                    <img src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                <?php elseif ($bantuan['foto_penduduk']) : ?>
                                                    <img src="<?= base_url('assets/foto/penduduk/' . $bantuan['foto_penduduk']); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $bantuan['nik_penduduk']; ?></td>
                                            <td><?= $bantuan['nama_lengkap']; ?></td>
                                            <td><?= $bantuan['tempat_lahir']; ?>, <?= $bantuan['tanggal_lahir']; ?></td>
                                            <td><?= $bantuan['jenis_kelamin']; ?></td>
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
<script>
    function val() {
        var x =
            document.forms["myform"]
            ["id_anggota"].value;

        if (x == "") {
            alert("Hubungan keluarga Tidak Boleh Kosong");
            return false;
        }
    }
</script>