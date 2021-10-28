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
            <li><a href="<?= base_url('admin/keluarga/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                       
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
                                                <th>Nomor KK</th>
                                                <th>Kepala Keluarga</th>
                                                <th>Alamat</th>
                                                <th>Nomor Telepon/Hp</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($keluarga as $x) :
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td style="text-align: center;"><?= $no; ?></td>
                                                    <td style="text-align: center;">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn bg-purple btn-social btn-flat btn-info btn-sm" data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i> Pilih Aksi</button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a href="<?= base_url('admin/keluarga/anggotakeluarga/' . $x['no_kk']); ?>" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-list-ol"></i> Lihat Rincian Keluarga</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url('admin/keluarga/cetak/' . $x['no_kk']); ?>" target="_blank" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-print"></i> Cetak Kartu Keluarga</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td><?= $x['no_kk']; ?></td>
                                                    <td><?= $x['nama_lengkap']; ?></td>
                                                    <td><?= $x['alamat_sekarang']; ?></td>
                                                    <td><?= $x['telepon']; ?></td>
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
        foreach ($keluarga as $z) :
            $no++; ?>
            <div class="modal fade" id="modal-edit<?= $z['id_penduduk']; ?>">
                <div class="modal-dialog">
                    <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form" action="<?= base_url('admin/keluarga/tambahkeluarga'); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Tambah Anggota Keluarga</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label class="">Piling Anggota Keluarga</label>
                                        <input type="hidden" value="<?= $z['id_penduduk']; ?>" name="id_kepala_keluarga">
                                        <select name="id_anggota" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <?php foreach ($penduduk as $x) : ?>
                                                <option name="id_anggota" value="<?= $x['id_penduduk']; ?>" selected><?= $x['nama_lengkap']; ?> -- <?= $x['nik_penduduk']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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