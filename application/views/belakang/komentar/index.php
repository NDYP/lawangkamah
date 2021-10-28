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
            <li><a href="<?= base_url('admin/beranda/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/komentar/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

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
                                                <th>Opsi - Status</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Judul Artikel
                                                    <br>Komentar
                                                </th>

                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($komentar as $x) :
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td style="text-align: center;"><?= $no; ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a href="<?= base_url('admin/komentar/hapus/' . $x['id_komentar']); ?>" class="btn btn-danger btn-sm btn-flat" title="Hapus"><i class="fa fa-trash"></i></a>
                                                        <?php if ($x['status_komentar'] == 'Aktif') : ?>
                                                            <a title="Read" href="<?= base_url('admin/komentar/nonaktif/' . $x['id_komentar']); ?>" class="btn bg-purple btn-sm btn-flat"><i class="fa fa-lock"></i></a>
                                                        <?php else : ?>
                                                            <a title="Unread" href="<?= base_url('admin/komentar/aktif/' . $x['id_komentar']); ?>" class="btn bg-purple btn-sm btn-flat"><i class="fa fa-unlock"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <?= $x['nama']; ?>
                                                    </td>
                                                    <td><?= $x['email']; ?></td>
                                                    <td>
                                                        <?php if ($x['judul'] == NULL) : ?>
                                                            <b> SARAN PENGUNJUNG</b>
                                                        <?php else : ?>
                                                            <b><?= $x['judul']; ?></b>
                                                        <?php endif; ?>

                                                        <br> <?= $x['isi_komentar']; ?>
                                                    </td>
                                                    <td style="text-align: center;"><?= $x['tanggal_artikel']; ?></td>
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