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
            <li><a href="<?= base_url('admin/bantuan/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('admin/bantuan/tambah'); ?>"
                            class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i
                                class="fa fa-plus-circle"></i> Tambah Data</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-striped dataTable"
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>No.</th>
                                                <th>Aksi</th>
                                                <th>Sasaran</th>
                                                <th>Nama bantuan</th>
                                                <th>Asal Dana</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($bantuan as $x) :
                                                $no++; ?>
                                            <tr role="row" class="odd">
                                                <td style="text-align: center;"><?= $no; ?></td>
                                                <td style="text-align: center;">
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn bg-purple btn-social btn-flat btn-info btn-sm"
                                                            data-toggle="dropdown"><i
                                                                class="fa fa-arrow-circle-down"></i> Pilih Aksi</button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a data-id_bantuan="<?= $x['id_bantuan']; ?>"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-anggota<?= $x['id_bantuan']; ?>"
                                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                        class="fa fa-plus"></i> Tambah Penerima</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url('admin/bantuan/detail/' . $x['id_bantuan']); ?>"
                                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                        class="fa fa-list"></i> Rincian Bantuan</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url('admin/bantuan/edit/' . $x['id_bantuan']); ?>"
                                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                        class="fa fa-upload"></i> Edit Bantuan</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url('admin/bantuan/hapus/' . $x['id_bantuan']); ?>"
                                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                        class="fa fa-trash-o"></i> Hapus Bantuan</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?= $x['sasaran']; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?= $x['nama_bantuan']; ?>
                                                </td>
                                                <td><?= $x['asal_dana']; ?></td>
                                                <td><?= $x['keterangan']; ?></td>
                                                <td><?= $x['status']; ?></td>
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
        foreach ($bantuan as $z) :
            $no++; ?>

        <div class="modal fade" id="modal-anggota<?= $z['id_bantuan']; ?>">
            <div class="modal-dialog">
                <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                    action="<?= base_url('admin/bantuan/tambahanggota'); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Tambah Penerima</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" value="<?= $z['id_bantuan']; ?>" name="id_bantuan" id=""
                                    class="form-control input-sm">
                                <div class="col-xs-12">
                                    <label class="">Pilih Penerima Bantuan</label>
                                    <?php if ($z['sasaran'] == 'Penduduk') : ?>
                                    <select name="id_penerima" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($penduduk as $x) : ?>
                                        <option name="id_penerima" value="<?= $x['id_penduduk']; ?>">NIK :
                                            <?= $x['nik_penduduk']; ?> - <?= $x['nama_lengkap']; ?>
                                            (<?= $x['pendapatan'] ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php elseif ($z['sasaran'] == 'Keluarga') : ?>
                                    <select name="id_penerima" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($keluarga as $x) : ?>
                                        <option name="id_penerima" value="<?= $x['id_penduduk']; ?>">NO.KK :
                                            <?= $x['no_kk']; ?> - <?= $x['nama_lengkap']; ?> (<?= $x['pendapatan'] ?>)
                                        </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <?php endif; ?>

                                </div>
                                <br>
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
        ["nama_bantuan"].value;
    if (x == "") {
        alert("Nama Bantuan Tidak Boleh Kosong");
        return false;
    }
}
</script>