<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Galeri Album <?= $album['nama_album']; ?></h1>
        <p>Tanggal Dibuat : <?= $album['tanggal_upload']; ?></p>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/album/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box">
                    <div class="box-header with-border">
                        <a href="<?= base_url('admin/album/index'); ?>" class="btn bg-green-gradient btn-social btn-flat btn btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <a href="<?= base_url('admin/album/tambahgaleri'); ?>" class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus-circle"></i> Tambah Galeri</a>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr role="row">
                                        <th>No.</th>
                                        <th>Aksi</th>
                                        <th>Foto</th>
                                        <th>Judul</th>
                                        <th>Tanggal Upload</th>
                                        <th>Author</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($galeri as $x) :
                                        $no++; ?>
                                        <tr role="row" class="odd">
                                            <td><?= $no; ?></td>
                                            <td><a href="<?= base_url('admin/album/hapusgaleri/' . $x['id_galeri']); ?>" class="btn btn-social btn-flat btn-warning btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Hapus"><i class="fa fa-trash-o"></i> Hapus</a></td>
                                            <td style="text-align: center;">
                                                <img src="<?= base_url('assets/foto/album/galeri/' . $x['galeri']); ?>" alt="" style="width: auto; max-width: 60px; height: auto;">
                                            </td>
                                            <td><?= $x['judul_galeri']; ?></td>
                                            <td><?= $x['tanggal_upload_galeri']; ?></td>
                                            <td><?= $x['author']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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
<script>
    function val() {
        var x =
            document.forms["myform"]
            ["id_anggota"].value;

        if (x == "") {
            alert("Hubungan keluarga Tidak Boleh Kosong");
            return false;
        }
    }
</script>