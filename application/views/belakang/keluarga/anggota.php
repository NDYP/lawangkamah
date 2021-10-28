<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/keluarga/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box ">
                    <div class="box-header with-border">
                        <a href="<?= base_url('admin/keluarga/index'); ?>" class="btn bg-green-gradient btn-social btn-flat btn btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <div class="box-body">

                        <div class="table-responsive">

                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr role="row">
                                        <th>No.</th>
                                        <th>Foto</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tempat, <br> Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Hubungan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($anggota as $keluarga) :
                                        $no++; ?>
                                        <tr role="row" class="odd">
                                            <td><?= $no; ?></td>
                                            <td style="text-align: center;">
                                                <?php if ($keluarga['foto_penduduk'] == NULL) : ?>
                                                    <img src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                <?php elseif ($keluarga['foto_penduduk']) : ?>
                                                    <img src="<?= base_url('assets/foto/penduduk/' . $keluarga['foto_penduduk']); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $keluarga['nik_penduduk']; ?></td>
                                            <td><?= $keluarga['nama_lengkap']; ?></td>
                                            <td><?= $keluarga['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($keluarga['tanggal_lahir'])); ?></td>
                                            <td><?= $keluarga['jenis_kelamin']; ?></td>
                                            <td><?= $keluarga['status_kk']; ?></td>
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