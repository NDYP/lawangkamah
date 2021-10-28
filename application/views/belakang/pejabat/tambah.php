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
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/pejabat_desa/tambah'); ?>" method="post" class="form-horizontal">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <!-- /.box -->
                    <div class="box ">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/pejabat_desa'); ?>" class="btn bg-green-gradient btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="">Pilih NIK</label>
                                    <select name="nik" class="form-control select22 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($penduduk as $x) : ?>
                                            <option name="nik" value="<?= $x['nik_penduduk']; ?>">NIK : <?= $x['nik_penduduk']; ?> | Nama : <?= $x['nama_lengkap']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="">Foto</label>
                                    <input class="form-control input-sm" type="file" class="" id="file" name="foto_pejabat">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">NIPD</label>
                                    <input name="nip_nipd" type="text" value="<?= set_value('nip_nipd'); ?>" class="form-control input-sm">
                                </div>
                                <div class="col-xs-4">
                                    <label class="">Jabatan</label>
                                    <input name="jabatan" type="text" class="form-control input-sm" value="<?= set_value('jabatan'); ?>">
                                    <?= form_error('jabatan', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">No. SK Pengangkatan</label>
                                    <input name="no_sk_pengangkatan" type="text" class="form-control input-sm" value="<?= set_value('no_sk_pengangkatan'); ?>">
                                    <?= form_error('no_sk_pengangkatan', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Tanggal SK Pengangkatan</label>
                                    <input id="datepicker1" name="tgl_sk_pengangkatan" type="text" class="form-control input-sm" value="<?= set_value('tgl_sk_pengangkatan'); ?>">
                                    <?= form_error('tgl_sk_pengangkatan', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
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