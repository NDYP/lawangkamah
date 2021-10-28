<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('assets/foto/setting/' . $setting['logo_admin']) ?>" class="img-circle">
            </div>
            <div class="pull-left info">
                <?php foreach ($profil as $x) : ?>
                    <b> Desa <?= $x['nama_desa']; ?></b>
                    <br>Kec. <?= $x['nama_kecamatan']; ?>
                    <br>Kab. <?= $x['nama_kabupaten']; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>
            <li class="<?= $this->uri->segment(2) == 'beranda' ? 'active' : ''; ?>"><a href="<?= base_url('administrasi/index') ?>"><i class="fa fa-book"></i> <span>Administrasi</span></a></li>
            <li class="<?= $this->uri->segment(2) == 'akun' ? 'active' : ''; ?>"><a href="<?= base_url('akun/index') ?>"><i class="fa fa-user"></i> <span>Akun</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>