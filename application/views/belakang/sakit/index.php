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
            <li><a href="<?= base_url('admin/sakit/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('admin/Dropdown_Sakit/tambah'); ?>" class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus-circle"></i> Tambah Data</a>
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
                                                <th>Nama Penyakit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($sakit as $x) :
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td style="text-align: center;"><?= $no; ?></td>
                                                    <td style="text-align: center;">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn bg-purple btn-social btn-flat btn-info btn-sm" data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i> Pilih Aksi</button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a data-id_sakit="<?= $x['id_sakit']; ?>" data-toggle="modal" data-target="#modal-edit<?= $x['id_sakit']; ?>" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-upload"></i> Edit Bantuan</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url('admin/Dropdown_Sakit/hapus/' . $x['id_sakit']); ?>" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-trash-o"></i> Hapus Bantuan</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td><?= $x['sakit']; ?></td>
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
        foreach ($sakit as $z) :
            $no++; ?>

            <div class="modal fade" id="modal-edit<?= $z['id_sakit']; ?>">
                <div class="modal-dialog">
                    <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form" action="<?= base_url('admin/Dropdown_Sakit/ubah'); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Tambah Penyakit</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" value="<?= $z['id_sakit']; ?>" name="id_sakit" id="" class="form-control input-sm">
                                    <div class="col-xs-12">
                                        <label class="">Nama Penyakit</label>
                                        <input type="text" value="<?= $z['sakit']; ?>" name="sakit" id="" class="form-control input-sm">

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
            ["nama_bantuan"].value;
        if (x == "") {
            alert("Nama Bantuan Tidak Boleh Kosong");
            return false;
        }
    }
</script>