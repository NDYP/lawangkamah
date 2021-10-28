<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/tentang'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box ">
                    <div class="box-header with-border">
                        <div class="btn-group">
                            <button type="button" class="btn bg-purple btn-social btn-flat btn-info btn-sm" data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i> Pilih Aksi</button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?= base_url('admin/tentang/edit'); ?>" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-edit"></i> Ubah Sejarah Singkat</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/tentang/editvisi'); ?>" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-edit"></i> Ubah Visi</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/tentang/editmisi'); ?>" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-edit"></i> Ubah Misi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php foreach ($tentang as $x) : ?>
                            <div class="box-body bg-identitas">
                                <h3 style="text-align: center;">Sejarah Singkat</h3>
                                <p><?= $x['profil_singkat']; ?></p>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h3 style="text-align: center;">Visi</h3>
                                    <p><?= $x['visi']; ?></p>
                                </div>
                                <div class="col-xs-6">
                                    <h3 style="text-align: center;">Misi</h3>
                                    <p><?= $x['misi']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>