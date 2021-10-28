<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/pejabat'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/user/tambah'); ?>" method="post" class="form-horizontal">

                <!-- /.col (left) -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <!-- /.box -->
                    <div class="box ">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/user/index'); ?>" class="btn bg-green-gradient btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-8">
                                    <label for="">Pilih Pemerintah Desa</label>
                                    <select name="id_pejabat" class="form-control select22 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($pejabat as $x) : ?>
                                            <option name="nik" value="<?= $x['id_pejabat']; ?>">NIP : <?= $x['nip_nipd']; ?> - Nama : <?= $x['nama_lengkap']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Username</label>
                                    <input name="username" type="text" class="form-control input-sm">
                                    <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Password</label>
                                    <input name="password" type="password" class="form-control input-sm">
                                    <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Foto</label>
                                    <input accept="image/*" title="Hanya gambar yang disetujui" name="foto" type="file" class="form-control input-sm">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">

                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-left"><i class="fa fa-check"></i> Simpan</button>
                        </div>
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