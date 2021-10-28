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
            <li class="<?= $this->uri->segment(2) == 'beranda' ? 'active' : ''; ?>"><a
                    href="<?= base_url('admin/beranda/index') ?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li
                class="treeview <?= ($this->uri->segment(1) == 'tentang' || $this->uri->segment(2) == 'desa' || $this->uri->segment(2) == 'Pejabat_Desa') ? 'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Info Desa</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $this->uri->segment(2) == 'desa' ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/desa/index') ?>"><i class="fa fa-id-card"></i> Identitas Desa</a>
                    </li>
                    <li class="<?= $this->uri->segment(2) == 'tentang' ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/tentang/index') ?>"><i class="fa fa-building"></i> Visi dan
                            Misi</a></li>
                    <li class="<?= $this->uri->segment(2) == 'Pejabat_Desa' ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/Pejabat_Desa/index') ?>"><i class="fa fa-sitemap"></i> Pejabat
                            Desa</a></li>
                </ul>
            </li>
            <li
                class="treeview <?= ($this->uri->segment(2) == 'penduduk' || $this->uri->segment(2) == 'keluarga' || $this->uri->segment(2) == 'kelompok') ? 'active' : ''; ?>">
                <a href="">
                    <i class="fa fa-users"></i> <span>Kependudukan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= ($this->uri->segment(2) == 'penduduk') ? 'active' : ''; ?>"><a
                            href=" <?= base_url('admin/penduduk/index') ?>"><i class="fa fa-user"></i> Penduduk</a></li>
                    <li class="<?= ($this->uri->segment(2) == 'keluarga') ? 'active' : ''; ?>"><a
                            href=" <?= base_url('admin/keluarga/index') ?>"><i class="fa fa-users"></i> Keluarga</a>
                    </li>
                    <li class="<?= ($this->uri->segment(2) == 'kelompok') ? 'active' : ''; ?>"><a
                            href=" <?= base_url('admin/kelompok/index') ?>"><i class="fa fa-sitemap"></i> Kelompok</a>
                    </li>
                </ul>
            </li>
            <li
                class="treeview <?= ($this->uri->segment(3) == 'rentang_umur' || $this->uri->segment(3) == 'pendapatan' || $this->uri->segment(3) == 'kelompok_rentan') ? 'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-line-chart"></i> <span>Statistik</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= ($this->uri->segment(3) == 'rentang_umur') ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/statistik/rentang_umur') ?>"><i class="fa fa-table"></i>
                            Penduduk</a></li>
                    <li class="<?= ($this->uri->segment(3) == 'pendapatan') ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/statistik/pendapatan') ?>"><i class="fa fa-dollar"></i>
                            Pendapatan</a></li>
                    <li class="<?= ($this->uri->segment(3) == 'kelompokrentan') ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/statistik/kelompokrentan') ?>"><i class="fa fa-users"></i>
                            Kelompok Rentan</a></li>
                </ul>

            </li>
            <li><a href="<?= base_url('admin/bantuan/index') ?>"><i class="fa fa-info-circle"></i> <span>Bantuan
                        Desa</span></a></li>
            <li
                class="treeview <?= ($this->uri->segment(2) == 'artikel' || $this->uri->segment(2) == 'baner' || $this->uri->segment(2) == 'album' || $this->uri->segment(2) == 'komentar') ? 'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-laptop"></i> <span>Admin Web</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= ($this->uri->segment(2) == 'artikel') ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/artikel/index') ?>"><i class="fa fa-newspaper-o"></i> Artikel</a>
                    </li>
                    <li class="<?= ($this->uri->segment(2) == 'baner') ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/baner/index') ?>"><i class="far fa-sliders"></i> Baner</a></li>
                    <li class="<?= ($this->uri->segment(2) == 'album') ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/album/index') ?>"><i class="fa fa-image"></i> Galeri</a></li>
                    <li class="<?= ($this->uri->segment(2) == 'komentar') ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/komentar') ?>"><i class="fa fa-comments"></i> Komentar</a></li>
                </ul>
            </li>
            <li
                class="treeview <?= ($this->uri->segment(2) == 'Dropdown_sakit' || $this->uri->segment(2) == 'Dropdown_cacat' || $this->uri->segment(2) == 'Dropdown_pekerjaan' || $this->uri->segment(2) == 'Dropdown_kategori_kelompok') ? 'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-list"></i> <span>Dropdown Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= ($this->uri->segment(2) == 'Dropdown_sakit') ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/Dropdown_sakit/index') ?>"><i class="fa fa-wheelchair"></i>
                            Penyakit</a></li>
                    <li class="<?= ($this->uri->segment(2) == 'Dropdown_cacat') ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/Dropdown_cacat/index') ?>"><i class="fa  fa-user-md"></i>
                            Cacat</a></li>
                    <li class="<?= ($this->uri->segment(2) == 'Dropdown_pekerjaan') ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/Dropdown_pekerjaan/index') ?>"><i class="fa fa-industry"></i>
                            Pekerjaan</a></li>
                    <!-- <li class="<?= ($this->uri->segment(2) == 'Dropdown_kategori_kelompok') ? 'active' : ''; ?>"><a href="<?= base_url('admin/Dropdown_kategori_kelompok/index') ?>"><i class="fa fa-list"></i> Kategori Kelompok</a></li> -->
                </ul>
            </li>
            <li
                class="treeview <?= ($this->uri->segment(3) == 'logo' || $this->uri->segment(3) == 'title') ? 'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= ($this->uri->segment(3) == 'logo') ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/setting/logo') ?>"><i class="fa fa-picture-o"></i> Logo Web</a>
                    </li>
                    <li class="<?= ($this->uri->segment(3) == 'title') ? 'active' : ''; ?>"><a
                            href="<?= base_url('admin/setting/title') ?>"><i class="fa fa-tag"></i> Title Web</a></li>
                </ul>
            </li>
            <li class="<?= ($this->uri->segment(2) == 'user') ? 'active' : ''; ?>"><a
                    href="<?= base_url('admin/user/index') ?>"><i class="fa fa-desktop"></i> <span>User</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>