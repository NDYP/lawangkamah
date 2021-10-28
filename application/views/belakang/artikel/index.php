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
            <li><a href="<?= base_url('admin/artikel/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('admin/artikel/tambah'); ?>" class="btn btn-social btn-flat bg-green btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus-circle"></i> Tambah Artikel</a>
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
                                                <th>Gambar</th>
                                                <th>Judul</th>
                                                <th>Author</th>
                                                <th>Publish</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($artikel as $x) :
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td style="text-align: center;"><?= $no; ?></td>
                                                    <td style="text-align: center;">
                                                        <a href="<?= base_url('admin/artikel/edit/' . $x['id_artikel']); ?>" class="btn btn-warning btn-sm btn-flat" title="Lihat"><i class="fa fa-list"></i></a>
                                                        <a href="<?= base_url('admin/artikel/hapus/' . $x['id_artikel']); ?>" class="btn btn-danger btn-sm btn-flat" title="Hapus"><i class="fa fa-trash"></i></a>
                                                        <?php if ($x['status'] == 'Aktif') : ?>
                                                            <a title="Nonaktifkan" href="<?= base_url('admin/artikel/nonaktif/' . $x['id_artikel']); ?>" class="btn bg-purple btn-sm btn-flat"><i class="fa fa-lock"></i></a>
                                                        <?php else : ?>
                                                            <a title="Aktifkan" href="<?= base_url('admin/artikel/aktif/' . $x['id_artikel']); ?>" class="btn bg-purple btn-sm btn-flat"><i class="fa fa-unlock"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <img src="<?= base_url('assets/foto/artikel/' . $x['gambar']); ?>" alt="" style="width: auto; max-width: 80px; height: auto;">
                                                    </td>
                                                    <td><?= $x['judul']; ?></td>
                                                    <td><?= $x['author']; ?></td>
                                                    <td style="text-align: center;"><?= $x['tanggal_upload']; ?></td>
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
        <?php $no = 0;
        foreach ($artikel as $x) :
            $no++; ?>
            <div class="modal fade" id="modal-edit<?= $x['id_artikel']; ?>" style="display: none;">
                <div class="modal-dialog">
                    <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form" action="<?= base_url('admin/artikel/upload'); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Upload Berkas Kependudukan</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="">Nama Berkas</label>
                                        <input name="judul" type="text" class="form-control input-sm">
                                        <input value="<?= $x['id_artikel']; ?>" name="id_artikel" type="hidden" class="form-control input-sm">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">File <text class="text-red text-center"><b>*Ukuran PDF tidak lebih dari 1mb*</b></text></label>
                                        <input class="form-control input-sm" type="file" class="" id="file" name="berkas">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php endforeach; ?>
    </section>
    <!-- /.content -->
</div>
<script>
    function val() {
        var x =
            document.forms["myform"]
            ["judul"].value;

        if (x == "") {
            alert("Judul Tidak Boleh Kosong");
            return false;
        }
    }
</script>