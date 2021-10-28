<style>
    th {
        text-align: center;
    }
</style>
<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/user'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('admin/user/tambah'); ?>" class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Ubah Biodata"><i class="fa fa-plus-circle"></i> Tambah User</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>No.</th>
                                                <th>Aksi</th>
                                                <th>Foto</th>
                                                <th>Username</th>
                                                <th>Nama, NIK, NIP/NIPD</th>
                                                <th>Pangkat/Golongan <br> Jabatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($user as $x) :
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td style="text-align: center;"><?= $no; ?></td>
                                                    <td style="text-align: center;">
                                                        <a href="<?= base_url('admin/user/edit/' . $x['id_user']); ?>" class="btn btn-warning btn-sm btn-flat" title="Edit"><i class="fa fa-edit"></i></a>
                                                        <a href="<?= base_url('admin/user/hapus/' . $x['id_user']); ?>" class="btn btn-danger btn-sm btn-flat" title="Hapus"><i class="fa fa-trash"></i></a>
                                                        <?php if ($x['status'] == 'Aktif') : ?>
                                                            <a title="Nonaktifkan" href="<?= base_url('admin/user/nonaktif/' . $x['id_user']); ?>" class="btn bg-purple btn-sm btn-flat"><i class="fa fa-lock"></i></a>
                                                        <?php else : ?>
                                                            <a title="Aktifkan" href="<?= base_url('admin/user/aktif/' . $x['id_user']); ?>" class="btn bg-purple btn-sm btn-flat"><i class="fa fa-unlock"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <?php if ($x['foto'] == NULL) : ?>
                                                            <img src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                        <?php elseif ($x['foto']) : ?>
                                                            <img src="<?= base_url('assets/foto/user/' . $x['foto']); ?>" alt="" style="width: auto; max-width: 45px; height: auto;">
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= $x['username']; ?></td>
                                                    <td><?= $x['nama_lengkap']; ?>
                                                        <br> NIK : <?= $x['nik']; ?>
                                                        <br> NIP/NIPD : <?= $x['nip_nipd']; ?>
                                                    </td>
                                                    <td><?= $x['pangkat_golongan']; ?> <br>
                                                        <?= $x['jabatan']; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>