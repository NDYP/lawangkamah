<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('beranda/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('akun/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form enctype="multipart/form-data" role="form" action="<?= base_url('akun/ubah'); ?>" method="post" class="form-horizontal">
                <div class="col-md-4">
                    <div class="box ">
                        <div class="box-body box-profile">
                            <div class="row">
                                <div class="col-sm-12">

                                    <?php if ($this->session->userdata('foto') == NULL) : ?>
                                        <img class="profile-user-img img-responsive" src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" alt="Logo" style="width: auto;max-height: 250px;max-width: 200px; vertical-align: middle;">
                                    <?php else : ?>
                                        <img class="profile-user-img img-responsive" src="<?= base_url('assets/foto/penduduk/' . $this->session->userdata('foto_penduduk')) ?>" alt="Logo" style="width: auto;max-height: 250px;max-width: 200px; vertical-align: middle;">
                                    <?php endif; ?>
                                </div>
                                <br>
                                <p class=" text-red text-center"><b>*Kosongkan jika tidak ingin diubah*</b></p>
                                <div class="col-sm-12">
                                    <input class="form-control input-sm" type="file" class="" id="file" name="foto">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="">Username</label>
                                    <?php if ($akun['username'] == NULL) : ?>
                                        <input name="nik_penduduk" value="<?= $akun['nik_penduduk']; ?>" type="text" class="form-control input-sm">
                                    <?php else : ?>
                                        <input name="nik_penduduk" value="<?= $akun['username']; ?>" type="text" class="form-control input-sm">
                                    <?php endif; ?>
                                    <input name="id_penduduk" value="<?= $akun['id_penduduk']; ?>" type="hidden" class="form-control input-sm">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="">Password</label>
                                    <?php if ($akun['password'] == NULL) : ?>
                                        <input name="tanggal_lahir" value="<?= date('d-m-Y', strtotime($akun['tanggal_lahir'])); ?>" type="text" class="form-control input-sm">
                                    <?php else : ?>
                                        <input name="tanggal_lahir" value="<?= $akun['password']; ?>" type="text" class="form-control input-sm">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-left"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col (left) -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <!-- /.box -->
                    <div class="box ">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <button style="background-color:green;" type="button" class="btn btn-info btn-block btn-md"><strong>DATA KEPENDUDUKAN</strong></button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">No. KK</label>
                                    <input value="<?= $akun['no_kk']; ?>" type="text" class="form-control input-sm" disabled>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">NIK</label>
                                    <input value="<?= $akun['nik_penduduk']; ?>" type="text" class="form-control input-sm" disabled>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Nama Lengkap</label>
                                    <input id="datepicker" value="<?= $akun['nama_lengkap']; ?>" type="text" class="form-control input-sm" disabled>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Tempat Lahir</label>
                                    <input value="<?= $akun['tempat_lahir']; ?>" type="text" class="form-control input-sm" disabled>
                                </div>
                                <div class="col-xs-3">
                                    <label for="">Tanggal Lahir</label>
                                    <input value="<?= date('d-m-Y', strtotime($akun['tanggal_lahir'])); ?>" type="text" class="form-control input-sm" disabled>
                                </div>
                                <div class="col-xs-5">
                                    <label for="">Alamat</label>
                                    <input id="datepicker" value="<?= $akun['alamat_sekarang']; ?>" type="text" class="form-control input-sm" disabled>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Pendidikan</label>
                                    <input value="<?= $akun['pendidikan_kk']; ?>" type="text" class="form-control input-sm" disabled>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Pekerjaan</label>
                                    <input value="<?= $akun['pekerjaan']; ?>" type="text" class="form-control input-sm" disabled>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Agama</label>
                                    <input id="datepicker" value="<?= $akun['agama']; ?>" type="text" class="form-control input-sm" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </form>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->