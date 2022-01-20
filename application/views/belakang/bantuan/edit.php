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
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/bantuan/ubah'); ?>"
                method="post" class="form-horizontal">
                <!-- /.col (left) -->
                <div class="col-md-12">
                    <div class="box ">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/bantuan/index'); ?>"
                                class="btn bg-green-gradient btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i
                                    class="fa fa-arrow-left"></i> kembali</a>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label id="sasaran" class="col-sm-3 control-label-left">Sasaran</label>
                                <div class="col-sm-7">
                                    <select name="sasaran" class="form-control select2 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="sasaran" value="">--Pilih--</option>
                                        <option name="sasaran" value="Penduduk"
                                            <?php if ($bantuan['sasaran'] === 'Penduduk') echo 'selected="selected"'; ?>>
                                            Penduduk (Perorangan)</option>
                                        <option name="sasaran" value="Keluarga"
                                            <?php if ($bantuan['sasaran'] === 'keluarga') echo 'selected="selected"'; ?>>
                                            Keluarga</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label-left">Nama Bantuan</label>
                                <div class="col-sm-3">
                                    <input type="text" value="<?= $bantuan['nama_bantuan']; ?>" name="nama_bantuan"
                                        id="" class="form-control input-sm">
                                    <input type="hidden" value="<?= $bantuan['id_bantuan']; ?>" name="id_bantuan" id=""
                                        class="form-control input-sm">
                                </div>
                            </div>
                            <div class="form-group" data-select2-id="">
                                <label id="asal_dana" for="asal_dana" class="col-sm-3 control-label-left">Asal
                                    Dana</label>
                                <div class="col-sm-7">
                                    <select id="asal_dana" name="asal_dana"
                                        class="form-control select2 select2-hidden-accessible required"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="asal_dana" value="">--Pilih--</option>
                                        <option name="asal_dana" value="Desa"
                                            <?php if ($bantuan['asal_dana'] === 'Desa') echo 'selected="selected"'; ?>>
                                            Desa</option>
                                        <option name="asal_dana" value="Kab/Kota"
                                            <?php if ($bantuan['asal_dana'] === 'Kab/Kota') echo 'selected="selected"'; ?>>
                                            Kab/Kota</option>
                                        <option name="asal_dana" value="Provinsi"
                                            <?php if ($bantuan['asal_dana'] === 'Provinsi') echo 'selected="selected"'; ?>>
                                            Provinsi</option>
                                        <option name="asal_dana" value="Lain-Lain (Hibah)"
                                            <?php if ($bantuan['asal_dana'] === 'Lain-Lain (Hibah)') echo 'selected="selected"'; ?>>
                                            Lain-Lain (Hibah)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Keterangan</label>
                                <div class="col-sm-3">
                                    <input name="keterangan" value="<?= $bantuan['keterangan']; ?>" type="text"
                                        class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label id="status" for="inputEmail3" class="col-sm-3 control-label-left">Status</label>
                                <div class="col-sm-7">
                                    <select id="status" name="status"
                                        class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="asal_dana" value="">--Pilih--</option>
                                        <option name="status" value="Aktif"
                                            <?php if ($bantuan['status'] === 'Aktif') echo 'selected="selected"'; ?>>
                                            Aktif</option>
                                        <option name="status" value="Tidak Aktif"
                                            <?php if ($bantuan['status'] === 'Tidak Aktif') echo 'selected="selected"'; ?>>
                                            Tidak Aktif</option>
                                    </select>
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