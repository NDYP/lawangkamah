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
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/pejabat_desa/ubah'); ?>" method="post" class="form-horizontal">
                <div class="col-md-4">
                    <div class="box ">
                        <div class="box-body box-profile">
                            <div class="col-sm-12">
                                <img class="profile-user-img img-responsive" src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" alt="Logo" style="width: 60%">
                            </div>
                            <br>
                            <p class="text-red text-center"><b>*Ukuran Foto 4x6, Kosongkan jika tidak ingin diubah*</b></p>
                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="file" class="" id="file" name="foto_pejabat">
                            </div>
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
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/pejabat_desa/index'); ?>" class="btn bg-green-gradient btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-8">
                                    <label for="">Pilih NIK</label>
                                    <select name="nik" class="form-control select22 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($penduduk as $x) : ?>
                                            <?php if ($pejabat['nik'] == $x['nik_penduduk']) : ?>
                                                <option name="nik" value="<?= $x['nik_penduduk']; ?>" selected>NIK : <?= $x['nik_penduduk']; ?> | Nama : <?= $x['nama_lengkap']; ?></option>
                                            <?php else : ?>
                                                <option name="nik" value="<?= $x['nik_penduduk']; ?>">NIK : <?= $x['nik_penduduk']; ?> | Nama : <?= $x['nama_lengkap']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">NIPD</label>
                                    <input value="<?= $pejabat['nip_nipd']; ?>" name="nip_nipd" type="text" class="form-control input-sm">
                                    <input value="<?= $pejabat['id_pejabat']; ?>" name="id_pejabat" type="hidden" class="form-control input-sm">
                                </div>

                                <div class="col-xs-4">
                                    <label class="">Jabatan</label>
                                    <input value="<?= $pejabat['jabatan']; ?>" name="jabatan" type="text" class="form-control input-sm">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">No. SK Pengangkatan</label>
                                    <input value="<?= $pejabat['no_sk_pengangkatan']; ?>" name="no_sk_pengangkatan" type="text" class="form-control input-sm">
                                </div>
                                <div class="col-xs-4">
                                    <label for="">No. SK Pemberhentian</label>
                                    <input value="<?= $pejabat['no_sk_pemberhentian']; ?>" name="no_sk_pemberhentian" type="text" class="form-control input-sm">
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Tanggal SK Pengangkatan</label>
                                    <input value="<?= $pejabat['tgl_sk_pengangkatan']; ?>" id="datepicker1" name="tgl_sk_pengangkatan" type="text" class="form-control input-sm">
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Masa Jabatan</label>
                                    <input value="<?= $pejabat['masa_jabatan']; ?>" name="masa_jabatan" type="text" class="form-control input-sm">
                                </div>
                            </div>
                            <br>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
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