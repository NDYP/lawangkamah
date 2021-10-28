<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/keluarga'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/keluarga/tambah'); ?>" method="post" class="form-horizontal">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <!-- /.box -->
                    <div class="box ">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/keluarga/index'); ?>" class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Nomor KK</label>
                                    <input name="nomor_kk" type="text" class="form-control input-sm">
                                    <?= form_error('nomor_kk', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label class="">Kepala Keluarga</label>
                                    <select name="id_kepala_keluarga" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($penduduk as $x) : ?>
                                            <option name="id_kepala_keluarga" value="<?= $x['id_penduduk']; ?>"><?= $x['nama_lengkap']; ?> -- <?= $x['nik_penduduk']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">

                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"><i class="fa fa-check"></i> Simpan</button>
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