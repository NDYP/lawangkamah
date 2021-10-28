<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/setting'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/setting/ubahtitle'); ?>" method="post" class="form-horizontal">
                <!-- /.col (left) -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <!-- /.box -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <?php foreach ($index as $x) : ?>
                                <a href="<?= base_url('admin/setting/title'); ?>" class="btn bg-purple btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-8">
                                    <label for="">Title Admin</label>
                                    <input value="<?= $x['title_admin']; ?>" name="title_admin" type="text" class="form-control input-sm">
                                    <input value="<?= $x['id_setting']; ?>" name="id_setting" type="hidden" class="form-control input-sm">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-8">
                                    <label for="">Title Pengunjung</label>
                                    <input value="<?= $x['title_pengunjung']; ?>" name="title_pengunjung" type="text" class="form-control input-sm">
                                    <input value="<?= $x['id_setting']; ?>" name="id_setting" type="hidden" class="form-control input-sm">
                                </div>
                            </div>
                            <br>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-left"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                    <?php endforeach; ?>
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