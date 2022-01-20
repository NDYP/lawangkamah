<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/penduduk'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/penduduk/tambah'); ?>"
                method="post" class="form-horizontal">

                <!-- /.col (left) -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <!-- /.box -->
                    <div class="box ">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/penduduk/index'); ?>"
                                class="btn bg-green-gradient btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <center>
                                <h4 class="text-bold">Keterangan : <br> Tanda * wajib diisi atau dipilih sesuai menu
                                </h4>
                            </center>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">NIK <text class="text-danger">*</text> </label>
                                    <input name="nik_penduduk" type="text" class="form-control input-sm"
                                        value="<?= set_value('nik_penduduk'); ?>">
                                    <?= form_error('nik_penduduk', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-8">
                                    <label for="">Nama Lengkap <text class="text-danger">*</text> </label>
                                    <input name="nama_lengkap" type="text" class="form-control input-sm"
                                        value="<?= set_value('nama_lengkap'); ?>">
                                    <?= form_error('nama_lengkap', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">No. KK <text class="text-danger">*</text> </label>
                                    <input name="no_kk" type="text" class="form-control input-sm"
                                        value="<?= set_value('no_kk'); ?>">
                                    <?= form_error('no_kk', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-4">
                                    <label class="">Hubungan Dalam Keluarga <text class="text-danger">*</text> </label>
                                    <select name="id_status_kk" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="id_status_kk" value="">--Pilih--</option>
                                        <?php foreach ($status_kk as $x) : ?>
                                        <option name="id_status_kk"
                                            value=<?= $x['id_status_kk']; ?><?= set_select('id_status_kk', $x['id_status_kk']); ?>>
                                            <?= $x['status_kk']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_status_kk', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Jenis kelamin <text class="text-danger">*</text> </label>
                                    <select name="jenis_kelamin" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="jenis_kelamin" value="">--Pilih--</option>
                                        <option name="jenis_kelamin" value="Laki-Laki"
                                            <?= set_select('jenis_kelamin', 'Laki-Laki'); ?>>Laki-Laki</option>
                                        <option name="jenis_kelamin" value="Perempuan"
                                            <?= set_select('jenis_kelamin', 'Perempuan'); ?>>Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Agama <text class="text-danger">*</text> </label>
                                    <select name="id_agama" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="id_agama" value="">--Pilih--</option>
                                        <?php foreach ($agama as $x) : ?>
                                        <option name="id_agama"
                                            value=<?= $x['id_agama']; ?><?= set_select('id_agama', $x['id_agama']); ?>>
                                            <?= $x['agama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_agama', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class=" col-xs-4">
                                    <label for="">Status Pernikahan <text class="text-danger">*</text> </label>
                                    <select name="id_status_nikah"
                                        class="form-control select21 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="id_status_nikah" value="">--Pilih--</option>
                                        <?php foreach ($status_nikah as $x) : ?>
                                        <option name="id_status_nikah"
                                            value=<?= $x['id_status_nikah']; ?><?= set_select('id_status_nikah', $x['id_status_nikah']); ?>>
                                            <?= $x['status_nikah']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_status_nikah', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-4">

                                    <label for="">Foto</label>
                                    <input class="form-control input-sm" type="file" class="" id="file"
                                        name="foto_penduduk" value="<?= set_value('foto_penduduk'); ?>">

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button style="background-color:green;" type="button"
                                        class="btn btn-info btn-block btn-md"><strong>DATA KELAHIRAN</strong></button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Tempat Lahir <text class="text-danger">*</text> </label>
                                    <input name="tempat_lahir" type="text" class="form-control input-sm"
                                        value="<?= set_value('tempat_lahir'); ?>">
                                    <?= form_error('tempat_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Tanggal Lahir <text class="text-danger">*</text> </label>
                                    <input id="datepicker" name="tanggal_lahir" type="text"
                                        class="form-control input-sm" value="<?= set_value('tanggal_lahir'); ?>">
                                    <?= form_error('tanggal_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Penolong Kelahiran <text class="text-danger">*</text> </label>
                                    <select name="id_penolong_kelahiran"
                                        class="form-control select21 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="id_penolong_kelahiran" value="" selected>--Pilih--</option>
                                        <?php foreach ($penolong_kelahiran as $x) : ?>
                                        <option name="id_penolong_kelahiran"
                                            value=<?= $x['id_penolong_kelahiran']; ?><?= set_select('id_penolong_kelahiran', $x['id_penolong_kelahiran']); ?>>
                                            <?= $x['penolong_kelahiran']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_penolong_kelahiran', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class=" row">
                                <div class="col-xs-12">
                                    <button style="background-color:green;" type="button"
                                        class="btn btn-info btn-block btn-md"><strong>PENDIDIKAN DAN
                                            PEKERJAAN</strong></button>
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <div class="col-xs-6">
                                    <label for="">Pekerjaan <text class="text-danger">*</text> </label>
                                    <select id="x" name="id_pekerjaan"
                                        class="form-control select27 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="id_pekerjaan" value="">--Pilih--</option>
                                        <?php foreach ($pekerjaan as $x) : ?>
                                        <option name="id_pekerjaan"
                                            <?= $pekerjaan_selected == $x['id_pekerjaan'] ? 'selected="selected"' : '' ?>
                                            value="<?= $x['id_pekerjaan']; ?>">
                                            <?= $x['pekerjaan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_pekerjaan', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label for="">Pendapatan Perbulan <text class="text-danger">*</text> </label>
                                    <select id="y" name="id_pendapatan"
                                        class="form-control select21 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="id_pendapatan" value="">--Pilih--</option>
                                        <?php foreach ($pendapatan as $x) : ?>
                                        <option name="id_pendapatan"
                                            <?= $pendapatan_selected == $x['id_pendapatan'] ? 'selected="selected"' : '' ?>
                                            value="<?= $x['id_pendapatan']; ?>" class="<?= $x['id_pekerjaan_fk']; ?>">
                                            <?= $x['pendapatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_pendapatan', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class=" row">
                                <div class="col-xs-6">
                                    <label for="">Pendidikan Terakhir <text class="text-danger">*</text> </label>
                                    <select name="id_pendidikan_kk"
                                        class="form-control select21 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="id_pendidikan_kk" value="" selected>--Pilih--</option>
                                        <?php foreach ($pendidikan as $x) : ?>
                                        <option name="id_pendidikan_kk"
                                            value=<?= $x['id_pendidikan']; ?><?= set_select('id_pendidikan', $x['id_pendidikan']); ?>>
                                            <?= $x['pendidikan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_pendidikan_kk', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button style="background-color:green;" type="button"
                                        class="btn btn-info btn-block btn-md"><strong>DATA
                                            KEWARGANEGARAAN</strong></button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Status Warga Negara <text class="text-danger">*</text> </label>
                                    <select name="id_status_wn" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="id_status_wn" value="">--Pilih--</option>
                                        <?php foreach ($wn as $x) : ?>
                                        <option name="id_status_wn"
                                            value=<?= $x['id_status_wn']; ?><?= set_select('id_status_wn', $x['id_status_wn']); ?>>
                                            <?= $x['warga_negara']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_status_wn', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Tanggal Paspor</label>
                                    <input id="datepicker1" name="tgl_paspor" type="text" class="form-control input-sm"
                                        value="<?= set_value('tgl_paspor'); ?>">
                                </div>
                                <div class="col-xs-4">
                                    <label for="">No. Paspor</label>
                                    <input name="no_paspor" type="text" class="form-control input-sm"
                                        value="<?= set_value('no_paspor'); ?>">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button style="background-color:green;" type="button"
                                        class="btn btn-info btn-block btn-md"><strong>ALAMAT</strong></button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-5">
                                    <label for="">Alamat Sebelumnya</label>
                                    <input name="alamat_sebelum" type="text" class="form-control input-sm"
                                        value="<?= set_value('alamat_sebelum'); ?>">
                                </div>
                                <div class="col-xs-3">
                                    <label for="">RT</label>
                                    <input name="rt" type="text" class="form-control input-sm"
                                        value="<?= set_value('rt'); ?>">
                                </div>
                                <div class="col-xs-3">
                                    <label for="rw">RW</label>
                                    <input name="rw" type="text" class="form-control input-sm"
                                        value="<?= set_value('rw'); ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-5">
                                    <label for="">ALamat Sekarang</label>
                                    <input name="alamat_sekarang" type="text" class="form-control input-sm"
                                        value="<?= set_value('alamat_sekarang'); ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button style="background-color:green;" type="button"
                                        class="btn btn-info btn-block btn-md"><strong>DATA KESEHATAN</strong></button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-2">
                                    <label for="">Gol. Darah <text class="text-danger">*</text> </label>
                                    <select name="id_golongan_darah"
                                        class="form-control select21 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="id_asuransi" value="">--Pilih--</option>
                                        <?php foreach ($golongan_darah as $x) : ?>
                                        <option name="id_golongan_darah"
                                            value=<?= $x['id_golongan_darah']; ?><?= set_select('id_golongan_darah', $x['id_golongan_darah']); ?>>
                                            <?= $x['golongan_darah']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_golongan_darah', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-3">
                                    <label for="">Asuransi <text class="text-danger">*</text> </label>
                                    <select name="id_asuransi" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="id_asuransi" value="">--Pilih--</option>
                                        <?php foreach ($asuransi as $x) : ?>
                                        <option name="id_asuransi"
                                            value=<?= $x['id_asuransi']; ?><?= set_select('id_asuransi', $x['id_asuransi']); ?>>
                                            <?= $x['asuransi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </select>
                                    <?= form_error('id_asuransi', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Sakit <text class="text-danger">*</text> </label>
                                    <select name="id_sakit" class="form-control select212 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="id_sakit" value="">--Pilih--</option>
                                        <?php foreach ($sakit as $x) : ?>
                                        <option name="id_sakit"
                                            value=<?= $x['id_sakit']; ?><?= set_select('id_sakit', $x['id_sakit']); ?>>
                                            <?= $x['sakit']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_sakit', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="col-xs-3">
                                    <label for="">Cacat <text class="text-danger">*</text> </label>
                                    <select name="id_cacat" class="form-control select213 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="id_cacat" value="">--Pilih--</option>
                                        <?php foreach ($kecacatan as $x) : ?>
                                        <option name="id_cacat"
                                            value=<?= $x['id_cacat']; ?><?= set_select('id_cacat', $x['id_cacat']); ?>>
                                            <?= $x['cacat']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_cacat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-left"><i
                                    class="fa fa-check"></i> Simpan</button>
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