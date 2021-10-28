<div class="content-wrapper" style="min-height: 608px;">
    <section class="content-header">
        <h1>Statistik Kependudukan</h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda/index'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Statistik Kependudukan </li>
        </ol>
    </section>
    <section class="content" id="maincontent">
        <form id="mainform" name="mainform" action="" method="post">
            <div class="row">
                <div class="col-md-3">
                    <div id="penduduk" class="box box-info 1">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?= $title; ?></h3>
                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="<?= $this->uri->segment(3) == 'rentang_umur' ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/statistik/rentang_umur'); ?>">Umur (Rentang)</a>
                                </li>
                                <li class="<?= $this->uri->segment(3) == 'pekerjaan' ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/statistik/pekerjaan'); ?>">Pekerjaan</a>
                                </li>
                                <li class="<?= $this->uri->segment(3) == 'status_kawin' ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/statistik/status_kawin'); ?>">Status Perkawinan</a>
                                </li>
                                <li class="<?= $this->uri->segment(3) == 'agama' ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/statistik/agama'); ?>">Agama</a>
                                </li>
                                <li class="<?= $this->uri->segment(3) == 'jenis_kelamin' ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/statistik/jenis_kelamin'); ?>">Jenis Kelamin</a>
                                </li>
                                <li class="<?= $this->uri->segment(3) == 'status_kk' ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/statistik/status_kk'); ?>">Hubungan Dalam KK</a>
                                </li>
                                <li class="<?= $this->uri->segment(3) == 'status_wn' ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/statistik/status_wn'); ?>">Warga Negara</a>
                                </li>
                                <!--
                                <li class="<?= $this->uri->segment(3) == 'status_kependudukan' ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/statistik/status_kependudukan'); ?>">Status Penduduk</a>
                                </li>-->
                                <li class="<?= $this->uri->segment(3) == 'golongan_darah' ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/statistik/golongan_darah'); ?>">Golongan Darah</a>
                                </li>
                                <li class="<?= $this->uri->segment(3) == 'cacat' ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/statistik/cacat'); ?>">Penyandang Cacat</a>
                                </li>
                                <li class="<?= $this->uri->segment(3) == 'sakit' ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/statistik/sakit'); ?>">Penyakit yang diderita</a>
                                </li>
                                <li class="<?= $this->uri->segment(3) == 'asuransi' ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/statistik/asuransi'); ?>">Asuransi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>