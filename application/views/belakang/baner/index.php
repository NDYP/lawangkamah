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
            <li><a href="<?= base_url('admin/baner/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('admin/baner/tambah'); ?>" class="btn bg-green-gradient btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus-circle"></i> Tambah Baru</a>
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
                                                <th>Opsi</th>
                                                <th>Baner</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($baner as $x) :
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td style="text-align: center;"><?= $no; ?></td>
                                                    <td style="text-align: center;">
                                                        <a title="Ubah" data-id_baner="<?= $x['id_baner']; ?>" data-toggle="modal" data-target="#modal-edit<?= $x['id_baner']; ?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a title="Hapus" href="<?= base_url('admin/baner/hapus/' . $x['id_baner']); ?>" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash-o"></i></a>
                                                        <?php if ($x['status'] == 'Aktif') : ?>
                                                            <a title="Nonaktifkan" href="<?= base_url('admin/baner/nonaktif/' . $x['id_baner']); ?>" class="btn bg-purple btn-sm btn-flat"><i class="fa fa-lock"></i></a>
                                                        <?php else : ?>
                                                            <a title="Aktifkan" href="<?= base_url('admin/baner/aktif/' . $x['id_baner']); ?>" class="btn bg-purple btn-sm btn-flat"><i class="fa fa-unlock"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <img src="<?= base_url('assets/foto/baner/' . $x['foto_baner']); ?>" alt="" style="width: auto; max-width: 30%; height: auto;">
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

        <?php $no = 0;
        foreach ($baner as $x) :
            $no++; ?>
            <div class="modal fade" id="modal-edit<?= $x['id_baner']; ?>" style="display: none;">
                <div class="modal-dialog">
                    <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form" action="<?= base_url('admin/baner/ubah'); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Ubah Baner <?= $x['foto_baner']; ?> </h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Baner</label>
                                        <input name="foto_baner" type="file" class="form-control input-sm" accept="image/*" title="Hanya gambar yang disetujui">
                                        <input name="id_baner" type="hidden" class="form-control input-sm" value="<?= $x['id_baner']; ?>">
                                        <input name="foto_baner" type="hidden" class="form-control input-sm" value="<?= $x['foto_baner']; ?>">
                                        <br>
                                        <img class="img-identitas img-responsive" src="<?= base_url('assets/foto/baner/' . $x['foto_baner']) ?>" alt="logo" style="width: 50%">
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