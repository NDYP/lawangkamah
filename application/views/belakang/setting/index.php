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
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/setting/ubah'); ?>" method="post" class="form-horizontal">

                <!-- /.col (left) -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <!-- /.box -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <?php foreach ($index as $x) : ?>
                                <a href="<?= base_url('admin/setting/editlogologin/' . $x['id_setting']); ?>" class="btn bg-purple btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-edit"></i> Edit Logo Login</a>
                                <a href="<?= base_url('admin/setting/editlogoadmin/' . $x['id_setting']); ?>" class="btn bg-purple btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-edit"></i> Edit Logi Admin</a>
                                <a href="<?= base_url('admin/setting/editlogopengunjung/' . $x['id_setting']); ?>" class="btn bg-purple btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-edit"></i> Edit Logo Pengunjung</a>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-4" style="align-items: left;">
                                    <label for="">Logo Login</label>
                                    <center>
                                        <img class="img-identitas img-responsive" src="<?= base_url('assets/foto/setting/' . $x['logo_login']) ?>" alt="logo" style="width: 50%">
                                    </center>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Logo Admin</label>
                                    <center>
                                        <img class="img-identitas img-responsive" src="<?= base_url('assets/foto/setting/' . $x['logo_admin']) ?>" alt="logo" style="width: 50%">
                                    </center>
                                </div>
                                <div class="col-xs-4">
                                    <label for="">Logo Pengunjung</label>
                                    <center>
                                        <img class="img-identitas img-responsive" src="<?= base_url('assets/foto/setting/' . $x['logo_pengunjung']) ?>" alt="logo" style="width: 50%">
                                    </center>
                                </div>
                            <?php endforeach; ?>
                            </div>
                            <br>
                        </div>
                        <!-- /.box-body -->
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