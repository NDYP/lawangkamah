<style>
    th {
        text-align: center;
    }
</style>
<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?> <?= $this->uri->segment('4') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/penduduk/index'); ?>"><?= $title; ?> <?= $this->uri->segment('4') ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('admin/statistik/golongan_darah'); ?>" class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                                                <th>Foto</th>
                                                <th>NIK</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Telepon/Hp</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($darah as $x) :
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td style="text-align: center;"><?= $no; ?></td>
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
                                                    <td style="text-align: center;"><?= $x['telepon']; ?></td>
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
        <?php $no = 0;
        foreach ($darah as $x) :
            $no++; ?>
            <div class="modal fade" id="modal-edit<?= $x['id_penduduk']; ?>" style="display: none;">
                <div class="modal-dialog">
                    <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form" action="<?= base_url('admin/penduduk/upload'); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Upload Berkas Kependudukan</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="">Nama Berkas</label>
                                        <input name="judul" type="text" class="form-control input-sm">
                                        <input value="<?= $x['id_penduduk']; ?>" name="id_penduduk" type="hidden" class="form-control input-sm">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">File <text class="text-red text-center"><b>*Ukuran PDF tidak lebih dari 1mb*</b></text></label>
                                        <input class="form-control input-sm" type="file" class="" id="file" name="berkas">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php endforeach; ?>
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