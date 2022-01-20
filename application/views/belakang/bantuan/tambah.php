<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/bantuan'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/bantuan/tambah'); ?>"
                method="post" class="form-horizontal">
                <!-- /.col (left) -->
                <div class="col-md-12">
                    <div class="box ">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/bantuan/index'); ?>"
                                class="btn bg-green-gradient btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                title="Ubah Biodata"><i class="fa fa-arrow-left"></i> kembali</a>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label id="sasaran" class="col-sm-3 control-label-left">Sasaran</label>
                                <div class="col-sm-7">
                                    <select name="sasaran" class="form-control select2 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="sasaran" value="" selected>--Pilih--</option>
                                        <option name="sasaran" value="Penduduk">Penduduk (Perorangan)</option>
                                        <option name="sasaran" value="Keluarga">Keluarga</option>
                                    </select>
                                    <?= form_error('sasaran', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="inputPassword3" class="col-sm-3 control-label-left">Nama Bantuan</label>
                                <div class="col-sm-3">
                                    <input type="text" name="nama_bantuan" id="" class="form-control input-sm">
                                    <?= form_error('nama_bantuan', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group" data-select2-id="">
                                <label id="asal_dana" for="asal_dana" class="col-sm-3 control-label-left">Asal
                                    Dana</label>
                                <div class="col-sm-7">
                                    <select id="asal_dana" name="asal_dana"
                                        class="form-control select2 select2-hidden-accessible required"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="asal_dana" value="" selected>--Pilih--</option>
                                        <option name="asal_dana" value="Desa">Desa</option>
                                        <option name="asal_dana" value="Kab/Kota">Kab/Kota</option>
                                        <option name="asal_dana" value="Provinsi">Provinsi</option>
                                        <option name="asal_dana" value="Lain-Lain (Hibah)">Lain-Lain (Hibah)</option>
                                    </select>
                                    <?= form_error('asal_dana', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Keterangan</label>
                                <div class="col-sm-3">
                                    <input name="keterangan" type="text" class="form-control input-sm" id=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label id="status" for="inputEmail3" class="col-sm-3 control-label-left">Status</label>
                                <div class="col-sm-7">
                                    <select id="status" name="status"
                                        class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="asal_dana" value="" selected>--Pilih--</option>
                                        <option name="status" value="Aktif">Aktif</option>
                                        <option name="status" value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                    <?= form_error('status', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">

                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-left"><i
                                    class="fa fa-check"></i> Simpan</button>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<!-- /.col (right) -->