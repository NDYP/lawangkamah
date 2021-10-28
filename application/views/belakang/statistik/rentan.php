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
                    <div class="box-header">
                        <center>
                            <h3><?= $judul; ?></h3>
                        </center>
                        <hr>
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
                                                <th>NIK</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($penduduk as $x) :
                                                $no++; ?>

                                                <tr role="row" class="odd">
                                                    <td style="text-align: center;"><?= $no; ?></td>
                                                    <td><a href="<?= base_url('admin/statistik/detailrentan/' . $x['id_penduduk']); ?>" class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-eye"></i> Lihat Biodata</a></td>
                                                    <td style="text-align: center;">
                                                        <?php if ($x['foto_penduduk'] == NULL) : ?>
                                                            <img src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                        <?php elseif ($x['foto_penduduk']) : ?>
                                                            <img src="<?= base_url('assets/foto/penduduk/' . $x['foto_penduduk']); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= $x['nik_penduduk']; ?></td>
                                                    <td><?= $x['nama_lengkap']; ?></td>
                                                    <td style="text-align: center;"><?= $x['jenis_kelamin']; ?></td>
                                                    <td><?= $x['alamat_sekarang']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
<script>
    function val() {
        var x =
            document.forms["myform"]
            ["judul"].value;

        if (x == "") {
            alert("Judul Tidak Boleh Kosong");
            return false;
        }
    }
</script>