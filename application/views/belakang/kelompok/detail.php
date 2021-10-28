<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/kelompok/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box ">
                    <div class="box-header with-border">
                        <a href="<?= base_url('admin/kelompok/index'); ?>" class="btn bg-green-gradient btn-social btn-flat btn btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <div class="box-body">

                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <h4>Rincian kelompok</h4>
                                    </tr>
                                    <tr>
                                        <td width="300">Kode Kelompok</td>
                                        <td width="1">:</td>
                                        <td> <?= $kelompok['kode_kelompok']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Kelompok</td>
                                        <td>:</td>
                                        <td> <?= $kelompok['nama_kelompok']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>:</td>
                                        <td> <?= $kelompok['nama_kategori']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td> <?= $kelompok['deskripsi']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h4>Anggota Kelompok</h4>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr role="row">
                                        <th>Aksi</th>
                                        <th>No.</th>
                                        <th>Foto</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tempat, <br> Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($anggota as $kelompok) :
                                        $no++; ?>
                                        <tr role="row" class="odd">
                                            <td><a href="<?= base_url('admin/kelompok/hapusanggota/' . $kelompok['id_kelompok_anggota']); ?>" class="btn btn-social btn-flat btn-warning btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Hapus"><i class="fa fa-trash-o"></i> Hapus</a></td>
                                            <td><?= $no; ?></td>
                                            <td style="text-align: center;">
                                                <?php if ($kelompok['foto_penduduk'] == NULL) : ?>
                                                    <img src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                <?php elseif ($kelompok['foto_penduduk']) : ?>
                                                    <img src="<?= base_url('assets/foto/penduduk/' . $kelompok['foto_penduduk']); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $kelompok['nik_penduduk']; ?></td>
                                            <td><?= $kelompok['nama_lengkap']; ?></td>
                                            <td><?= $kelompok['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($kelompok['tempat_lahir'])); ?></td>
                                            <td><?= $kelompok['jenis_kelamin']; ?></td>
                                            <td><?= $kelompok['nama_jabatan']; ?></td>
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