<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/setting/logo'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/setting/ubahlogopengunjung'); ?>" method="post" class="form-horizontal">
                <!-- /.col (left) -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <!-- /.box -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/setting/logo'); ?>" class="btn bg-purple btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Logo Login</label>
                                    <center>
                                        <img class="img-identitas img-responsive" src="<?= base_url('assets/foto/setting/' . $setting['logo_pengunjung']) ?>" alt="logo" style="width: 50%">
                                    </center>
                                    <p class="text-red text-center">*Kosongkan jika tidak ingin diubah*</p>
                                    <input name="logo_pengunjung" type="file" class="form-control input-sm">
                                    <input type="hidden" name="id_setting" value="<?= $setting['id_setting'] ?>">
                                </div>
                            </div>
                            <br>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-left"><i class="fa fa-check"></i> Simpan</button>
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