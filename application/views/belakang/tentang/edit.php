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
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/tentang/ubah'); ?>" method="post" class="form-horizontal">
                <!-- /.col (left) -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <!-- /.box -->
                    <div class="box ">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/tentang'); ?>" class="btn bg-green-gradient btn-social btn-flat btn btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="box-body">
                            <div class="col-sm-12">
                                <h3>Misi</h3>
                            </div>
                            <br>
                            <div class="col-sm-12">
                                <input type="hidden" name="id_tentang" value="<?= $tentang['id_tentang']; ?>">
                                <div class="box-body pad">
                                    <form>
                                        <textarea class="textarea" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="<?= $tentang['profil_singkat']; ?>" name="profil_singkat">
                                        <?= $tentang['profil_singkat']; ?>
                                        </textarea>
                                    </form>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
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