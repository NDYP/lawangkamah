<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/baner/tambahdropdown'); ?>" method="post" class="form-horizontal">

                <!-- /.col (left) -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <!-- /.box -->
                    <div class="box box">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/baner/index'); ?>" class="btn bg-green btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="">Gambar</label>
                                    <select name="foto_baner" id="foto_baner" name="foto_baner" class="form-control select2 select2-hidden-accessible required" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="foto_baner" selected>--Pilih--</option>
                                        <?php foreach ($galeri as $x) : ?>
                                            <option style="background-image:url(<?= base_url('assets/foto/album/galeri/' . $x['gambar']); ?>);" name="foto_baner" value="<?= $x['gambar'] ?>">
                                                <?= $x['gambar'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
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