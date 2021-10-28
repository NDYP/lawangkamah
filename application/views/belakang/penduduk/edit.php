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
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/penduduk/ubah'); ?>"
                method="post" class="form-horizontal">
                <div class="col-md-4">
                    <div class="box ">
                        <div class="box-body box-profile">
                            <div class="col-sm-12">
                                <?php if ($penduduk_get['foto_penduduk'] == NULL) : ?>
                                <img class="profile-user-img img-responsive"
                                    src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" alt="Logo"
                                    style="width: auto;max-height: 250px;max-width: 200px; vertical-align: middle;">
                                <?php else : ?>
                                <img class="profile-user-img img-responsive"
                                    src="<?= base_url('assets/foto/penduduk/' . $penduduk_get['foto_penduduk']) ?>"
                                    alt="Logo"
                                    style="width: auto;max-height: 250px;max-width: 200px; vertical-align: middle;">
                                <?php endif; ?>
                            </div>
                            <br>
                            <p class=" text-red text-center"><b>*Ukuran Foto 4x6, Kosongkan jika tidak ingin diubah*</b>
                            </p>
                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="file" class="" id="file"
                                    name="foto_penduduk">
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
                            <a href="<?= base_url('admin/penduduk'); ?>"
                                class="btn bg-green-gradient btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">NIK</label>
                                    <input name="nik_penduduk" value="<?= $penduduk_get['nik_penduduk'] ?>" type="text"
                                        class="form-control input-sm">
                                    <input name="id_penduduk" value="<?= $penduduk_get['id_penduduk'] ?>" type="hidden"
                                        class="form-control input-sm">
                                </div>
                                <div class="col-xs-8">
                                    <label for="">Nama Lengkap</label>
                                    <input name="nama_lengkap" value="<?= $penduduk_get['nama_lengkap'] ?>" type="text"
                                        class="form-control input-sm">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">No. KK</label>
                                    <input name="no_kk" value="<?= $penduduk_get['no_kk'] ?>" type="text"
                                        class="form-control input-sm">
                                </div>
                                <div class="col-xs-4">
                                    <label class="">Hubungan Dalam Keluarga</label>
                                    <select name="id_status_kk" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($status_kk as $x) : ?>
                                        <?php if ($penduduk_get['id_status_kk'] == $x['id_status_kk']) : ?>
                                        <option name="id_status_kk" value="<?= $x['id_status_kk']; ?>" selected>
                                            <?= $x['status_kk']; ?></option>
                                        <?php else : ?>
                                        <option name="id_status_kk" value="<?= $x['id_status_kk']; ?>">
                                            <?= $x['status_kk']; ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Jenis kelamin</label>
                                    <select name="jenis_kelamin" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="jenis_kelamin" value="">--Pilh--</option>
                                        <option name="jenis_kelamin" value="Laki-Laki"
                                            <?php if ($penduduk_get['jenis_kelamin'] === 'Laki-Laki') echo 'selected="selected"'; ?>>
                                            Laki-Laki</option>
                                        <option name="jenis_kelamin" value="Perempuan"
                                            <?php if ($penduduk_get['jenis_kelamin'] === 'Perempuan') echo 'selected="selected"'; ?>>
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Agama</label>
                                    <select name="id_agama" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($agama as $x) : ?>
                                        <?php if ($penduduk_get['id_agama'] == $x['id_agama']) : ?>
                                        <option name="id_agama" value="<?= $x['id_agama']; ?>" selected>
                                            <?= $x['agama']; ?></option>
                                        <?php else : ?>
                                        <option name="id_agama" value="<?= $x['id_agama']; ?>"><?= $x['agama']; ?>
                                        </option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Status Pernikahan</label>
                                    <select name="id_status_nikah"
                                        class="form-control select21 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($status_nikah as $x) : ?>
                                        <?php if ($penduduk_get['id_status_nikah'] == $x['id_status_nikah']) : ?>
                                        <option name="id_status_nikah" value="<?= $x['id_status_nikah']; ?>" selected>
                                            <?= $x['status_nikah']; ?></option>
                                        <?php else : ?>
                                        <option name="id_status_nikah" value="<?= $x['id_status_nikah']; ?>">
                                            <?= $x['status_nikah']; ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button style="background-color:gray;" type="button"
                                        class="btn btn-info btn-block btn-md"><strong>DATA KELAHIRAN</strong></button>
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <div class="col-xs-4">
                                    <label for="">Tempat Lahir</label>
                                    <input name="tempat_lahir" value="<?= $penduduk_get['tempat_lahir'] ?>" type="text"
                                        class="form-control input-sm">
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Tanggal Lahir</label>
                                    <input id="datepicker" name="tanggal_lahir"
                                        value="<?= date('d/m/Y', strtotime($penduduk_get['tempat_lahir'])); ?>"
                                        type="text" class="form-control input-sm">
                                </div>


                                <div class="col-xs-4">
                                    <label for="">Penolong Kelahiran</label>
                                    <select name="id_penolong_kelahiran"
                                        class="form-control select21 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($penolong_kelahiran as $x) : ?>
                                        <?php if ($penduduk_get['id_penolong_kelahiran'] == $x['id_penolong_kelahiran']) : ?>
                                        <option name="id_penolong_kelahiran" value="<?= $x['id_penolong_kelahiran']; ?>"
                                            selected><?= $x['penolong_kelahiran']; ?></option>
                                        <?php else : ?>
                                        <option name="id_penolong_kelahiran"
                                            value="<?= $x['id_penolong_kelahiran']; ?>"><?= $x['penolong_kelahiran']; ?>
                                        </option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button style="background-color:gray;" type="button"
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
                                            <?= $selected['id_pekerjaan'] == $x['id_pekerjaan'] ? 'selected="selected"' : '' ?>
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
                                            <?= $selected['id_pendapatan'] == $x['id_pendapatan'] ? 'selected="selected"' : '' ?>
                                            value="<?= $x['id_pendapatan']; ?>" class="<?= $x['id_pekerjaan_fk']; ?>">
                                            <?= $x['pendapatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_pendapatan', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="">Pendidikan Terakhir</label>
                                    <select name="id_pendidikan_kk"
                                        class="form-control select25 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($pendidikan as $x) : ?>
                                        <?php if ($penduduk_get['id_pendidikan_kk'] == $x['id_pendidikan']) : ?>
                                        <option name="id_pendidikan_kk" value="<?= $x['id_pendidikan']; ?>" selected>
                                            <?= $x['pendidikan']; ?></option>
                                        <?php else : ?>
                                        <option name="id_pendidikan_kk" value="<?= $x['id_pendidikan']; ?>">
                                            <?= $x['pendidikan']; ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button style="background-color:gray;" type="button"
                                        class="btn btn-info btn-block btn-md"><strong>DATA
                                            KEWARGANEGARAAN</strong></button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Status Warga Negara</label>
                                    <select name="id_status_wn" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($wn as $x) : ?>
                                        <?php if ($penduduk_get['id_status_wn'] == $x['id_status_wn']) : ?>
                                        <option name="id_status_wn" value="<?= $x['id_status_wn']; ?>" selected>
                                            <?= $x['warga_negara']; ?></option>
                                        <?php else : ?>
                                        <option name="id_status_wn" value="<?= $x['id_status_wn']; ?>">
                                            <?= $x['warga_negara']; ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-xs-4">
                                    <label for="">Tanggal Paspor</label>
                                    <input id="datepicker1" name="tgl_paspor" value="<?= $penduduk_get['tgl_paspor'] ?>"
                                        type="text" class="form-control input-sm">
                                </div>
                                <div class="col-xs-4">
                                    <label for="">No. Paspor</label>
                                    <input name="no_paspor" value="<?= $penduduk_get['no_paspor'] ?>" type="text"
                                        class="form-control input-sm">
                                </div>

                            </div>
                            <br>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button style="background-color:gray;" type="button"
                                        class="btn btn-info btn-block btn-md"><strong>ALAMAT</strong></button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-5">
                                    <label for="">Alamat Sebelumnya</label>
                                    <input name="alamat_sebelum" value="<?= $penduduk_get['alamat_sebelum'] ?>"
                                        type="text" class="form-control input-sm">
                                </div>
                                <div class="col-xs-3">
                                    <label for="">RT</label>
                                    <input name="rt" value="<?= $penduduk_get['rt'] ?>" type="text"
                                        class="form-control input-sm">
                                </div>
                                <div class="col-xs-3">
                                    <label for="rw">RW</label>
                                    <input name="" value="<?= $penduduk_get['rw'] ?>" type="text"
                                        class="form-control input-sm">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-5">
                                    <label for="">ALamat Sekarang</label>
                                    <input name="alamat_sekarang" value="<?= $penduduk_get['alamat_sekarang'] ?>"
                                        type="text" class="form-control input-sm">
                                </div>

                            </div>
                            <br>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button style="background-color:gray;" type="button"
                                        class="btn btn-info btn-block btn-md"><strong>DATA KESEHATAN</strong></button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-2">
                                    <label for="">Gol. Darah</label></label>
                                    <select name="id_golongan_darah"
                                        class="form-control select21 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($golongan_darah as $x) : ?>
                                        <?php if ($penduduk_get['id_golongan_darah'] == $x['id_golongan_darah']) : ?>
                                        <option name="id_golongan_darah" value="<?= $x['id_golongan_darah']; ?>"
                                            selected><?= $x['golongan_darah']; ?></option>
                                        <?php else : ?>
                                        <option name="id_golongan_darah" value="<?= $x['id_golongan_darah']; ?>">
                                            <?= $x['golongan_darah']; ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <label for="">Asuransi</label>
                                    <select name="id_asuransi" class="form-control select21 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($asuransi as $x) : ?>
                                        <?php if ($penduduk_get['id_asuransi'] == $x['id_asuransi']) : ?>
                                        <option name="id_asuransi" value="<?= $x['id_asuransi']; ?>" selected>
                                            <?= $x['asuransi']; ?></option>
                                        <?php else : ?>
                                        <option name="id_asuransi" value="<?= $x['id_asuransi']; ?>">
                                            <?= $x['asuransi']; ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Sakit</label>
                                    <select name="id_sakit" class="form-control select212 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($sakit as $x) : ?>
                                        <?php if ($penduduk_get['id_sakit'] == $x['id_sakit']) : ?>
                                        <option name="id_sakit" value="<?= $x['id_sakit']; ?>" selected>
                                            <?= $x['sakit']; ?></option>
                                        <?php else : ?>
                                        <option name="id_sakit" value="<?= $x['id_sakit']; ?>"><?= $x['sakit']; ?>
                                        </option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <label for="">Cacat</label>
                                    <select name="id_cacat" class="form-control select213 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <?php foreach ($kecacatan as $x) : ?>
                                        <?php if ($penduduk_get['id_cacat'] == $x['id_cacat']) : ?>
                                        <option name="id_cacat" value="<?= $x['id_cacat']; ?>" selected>
                                            <?= $x['cacat']; ?></option>
                                        <?php else : ?>
                                        <option name="id_cacat" value="<?= $x['id_cacat']; ?>"><?= $x['cacat']; ?>
                                        </option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
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