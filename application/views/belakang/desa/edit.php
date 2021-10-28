<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/desa'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/desa/ubah'); ?>" method="post" class="form-horizontal">

                <!-- /.col (left) -->
                <div class="col-md-12">
                    <div class="box ">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/desa'); ?>" class="btn bg-green-gradient btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-left"></i> kembali</a>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Nama Desa</label>
                                <div class="col-sm-7">
                                    <input name="nama_desa" value="<?= $profil_get['nama_desa']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                    <input name="id_desa" value="<?= $profil_get['id_desa']; ?>" type="hidden" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label-left">Kode Desa</label>
                                <div class="col-sm-3">
                                    <input name="kode_desa" value="<?= $profil_get['kode_desa']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group" data-select2-id="">
                                <label class="col-sm-3 control-label-left">Kepala Desa</label>
                                <div class="col-sm-7">
                                    <select name="id_kades" class=" form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($pejabat as $x) : ?>
                                            <?php if ($profil_get['id_kades'] == $x['id_pejabat']) : ?>
                                                <option name="id_kades" value="<?= $x['id_pejabat']; ?>" selected><?= $x['nik']; ?> - <?= $x['nama_lengkap']; ?></option>
                                            <?php else : ?>
                                                <option name="id_kades" value="<?= $x['id_pejabat']; ?>"><?= $x['nik']; ?> - <?= $x['nama_lengkap']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Kode Pos</label>
                                <div class="col-sm-3">
                                    <input name="kode_pos" value="<?= $profil_get['kode_pos']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Alamat Kantor</label>
                                <div class="col-sm-7">
                                    <input name="alamat_kantor" value="<?= $profil_get['alamat_kantor']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Telepon/Handphone</label>
                                <div class="col-sm-3">
                                    <input name="telepon_desa" value="<?= $profil_get['telepon_desa']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Nama Kecamatan</label>
                                <div class="col-sm-7">
                                    <input name="nama_kecamatan" value="<?= $profil_get['nama_kecamatan']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Kode Kecamatan</label>
                                <div class="col-sm-3">
                                    <input name="kode_kecamatan" value="<?= $profil_get['kode_kecamatan']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Nama Camat</label>
                                <div class="col-sm-7">
                                    <input name="nama_camat" value="<?= $profil_get['nama_camat']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">NIP Camat</label>
                                <div class="col-sm-5">
                                    <input name="nip_camat" value="<?= $profil_get['nip_camat']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Nama Kabupaten</label>
                                <div class="col-sm-7">
                                    <input name="nama_kabupaten" value="<?= $profil_get['nama_kabupaten']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Kode Kabupaten</label>
                                <div class="col-sm-3">
                                    <input name="kode_kabupaten" value="<?= $profil_get['kode_kabupaten']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Nama Provinsi</label>
                                <div class="col-sm-7">
                                    <input name="nama_provinsi" value="<?= $profil_get['nama_provinsi']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Kode Provinsi</label>
                                <div class="col-sm-3">
                                    <input name="kode_provinsi" value="<?= $profil_get['kode_provinsi']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>

                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>

                        </div>
                        <!-- /.box-footer -->
                    </div>
            </form>

        </div>

</div>
<!-- /.col (right) -->

</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->