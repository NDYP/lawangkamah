<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/Dropdown_Sakit/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/Dropdown_Sakit/tambah'); ?>" method="post" class="form-horizontal">
                <!-- /.col (left) -->
                <div class="col-md-12">
                    <div class="box ">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/Dropdown_Sakit/index'); ?>" class="btn bg-green-gradient btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Ubah Biodata"><i class="fa fa-arrow-left"></i> kembali</a>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label-left">Nama Kecacatan</label>
                                <div class="col-sm-3">
                                    <input type="text" name="sakit" id="" class="form-control input-sm">
                                    <?= form_error('sakit', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-left"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<!-- /.col (right) -->