<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/artikel'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/artikel/tambah'); ?>" method="post" class="form-horizontal">

                <!-- /.col (left) -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <!-- /.box -->
                    <div class="box box">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/artikel/index'); ?>" class="btn bg-green btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-8">
                                    <label for="">Judul</label>
                                    <input name="judul" type="text" class="form-control input-sm">
                                    <?= form_error('judul', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Gambar</label>
                                    <input name="gambar" type="file" class="form-control input-sm">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button style="background-color:green;" type="button" class="btn btn-info btn-block btn-md"><strong>ISI ARTIKEL</strong></button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <form>
                                        <textarea class="textarea" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="isi">
                                        </textarea>
                                    </form>
                                    <?= form_error('isi', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
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