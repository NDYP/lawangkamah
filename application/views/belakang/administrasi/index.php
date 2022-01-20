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
            <li><a href="<?= base_url('beranda/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('administrasi/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

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
                                                <th>NIK</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Nama Pengajuan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($pengajuan as $x) : $no++; ?>
                                            <tr role="row" class="odd">
                                                <td style="text-align: center;"><?= $no; ?></td>
                                                <td><?= $x['nik_penduduk'] ?></td>
                                                <td><?= $x['nama_lengkap'] ?></td>
                                                <td style="text-align: center;"><?= $x['jenis_kelamin'] ?></td>
                                                <td>
                                                    <?= $x['opsi'] ?> (<?= $x['timestamp'] ?>)
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php if ($x['status'] == 'Pengajuan') : ?>
                                                    <a class="btn btn-success btn-sm"
                                                        href="<?= base_url('admin/administrasi/proses/' . $x['id_pengajuan']) ?>">
                                                        <i class="fa fa-check"> Proses</i>
                                                    </a>
                                                    <a class="btn btn-warning btn-sm"
                                                        href=" <?= base_url('admin/administrasi/decline/' . $x['id_pengajuan']) ?>">
                                                        <i class="fa fa-close"></i> Tolak
                                                    </a>
                                                    <?php elseif ($x['status'] == 'Proses') : ?>
                                                    <a class="btn btn-success btn-sm"
                                                        href="<?= base_url('admin/administrasi/accept/' . $x['id_pengajuan']) ?>">
                                                        <i class="fa fa-check"> Terima</i>
                                                    </a>
                                                    <a class="btn btn-warning btn-sm"
                                                        href=" <?= base_url('admin/administrasi/decline/' . $x['id_pengajuan']) ?>">
                                                        <i class="fa fa-close"></i> Tolak
                                                    </a>
                                                    <?php else : ?>
                                                    <?= $x['status'] ?>
                                                    <?php endif; ?>
                                                </td>
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
        <div class="modal fade" id="modal-tambah-keramaian">
            <div class="modal-dialog">
                <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                    action="<?= base_url('administrasi/keramaian'); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true">×</i></button>
                            <h4 class="modal-title">Tambah Izin Keramaian</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="">Acara Pernikahan an.</label>
                                    <input type="text" name="nama" id="" class="form-control input-sm" required>
                                </div>
                                <br>
                                <div class="col-xs-12">
                                    <label class="">Tempat</label>
                                    <input type="text" name="tempat" id="" class="form-control input-sm" required>
                                </div>
                                <br>
                                <div class="col-xs-12">
                                    <label class="">tanggal</label>
                                    <input id="datepicker" type="text" name="tanggal" id=""
                                        class="form-control input-sm" required>
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
        <div class="modal fade" id="modal-tambah-npwp">
            <div class="modal-dialog">
                <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                    action="<?= base_url('administrasi/npwp'); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true">×</i></button>
                            <h4 class="modal-title">Tambah Data Kehilangan NPWP</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="">Nomor NPWP</label>
                                    <input type="text" name="npwp" id="" class="form-control input-sm" required>
                                </div>
                                <br>
                                <div class="col-xs-12">
                                    <label class="">Tanggal Hilang</label>
                                    <input id="datepicker1" type="text" name="tanggal" id=""
                                        class="form-control input-sm" required>
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
        <div class="modal fade" id="modal-tambah-penghasilan">
            <div class="modal-dialog">
                <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                    action="<?= base_url('administrasi/penghasilan'); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true">×</i></button>
                            <h4 class="modal-title">Tambah Keterangan Penghasilan Orang Tua</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="">Nama Mahasiswa/Siswa</label>
                                    <input type="text" name="nama" id="" class="form-control input-sm" required>
                                </div>
                                <br>
                                <div class="col-xs-12">
                                    <label class="">Tempat Lahir</label>
                                    <input type="text" name="tempat" id="" class="form-control input-sm" required>
                                </div>
                                <br>
                                <div class="col-xs-12">
                                    <label class="">Tanggal Lahir</label>
                                    <input type="text" name="tanggal" id="datepicker2" class="form-control input-sm"
                                        required>
                                </div>
                                <br>
                                <div class="col-xs-12">
                                    <label class="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="jenis_kelamin" value="">--Pilih--</option>
                                        <option name="jenis_kelamin" value="Laki-Laki"
                                            <?= set_select('jenis_kelamin', 'Laki-Laki'); ?>>Laki-Laki</option>
                                        <option name="jenis_kelamin" value="Perempuan"
                                            <?= set_select('jenis_kelamin', 'Perempuan'); ?>>Perempuan</option>
                                    </select>
                                </div>
                                <br>
                                <div class="col-xs-12">
                                    <label class="">Jurusan</label>
                                    <input type="text" name="jurusan" id="" class="form-control input-sm"
                                        required></input>
                                </div>
                                <br>
                                <div class="col-xs-12">
                                    <label class="">Fakultas</label>
                                    <input type="text" name="fakultas" id="" class="form-control input-sm" required>
                                    </inp>
                                </div>
                                <br>
                                <div class="col-xs-12">
                                    <label class="">Universitas</label>
                                    <input type="text" name="universitas" id="" class="form-control input-sm"
                                        required></input>
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
        <div class="modal fade" id="modal-tambah-usaha">
            <div class="modal-dialog">
                <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                    action="<?= base_url('administrasi/usaha'); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true">×</i></button>
                            <h4 class="modal-title">Tambah Kelompok Desa</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="">Nama Usaha</label>
                                    <input type="text" name="nama_usaha" id="" class="form-control input-sm" required>
                                </div>
                                <br>
                                <div class="col-xs-12">
                                    <label class="">Jenis Usaha</label>
                                    <input type="text" name="jenis_usaha" id="" class="form-control input-sm" required>
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
    </section>
    <!-- /.content -->
</div>