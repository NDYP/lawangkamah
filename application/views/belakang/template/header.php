<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $setting['title_admin']; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/skins/_all-skins.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/select2/dist/css/select2.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/skins/_all-skins.min.css">
    <link href="<?= base_url('assets/foto/setting/' . $setting['logo_admin']) ?>" rel="icon">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
.content-wrapper {
    font-size: small;
}
</style>

<body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url('admin/beranda/index'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b></b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"> <?php foreach ($profil as $x) : ?>
                    <b><?= $x['nama_desa']; ?></b>

                    <?php endforeach; ?></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success"><?= $jumlah; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Anda memiliki <?= $jumlah; ?> komentar belum dibaca</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <?php $no = 0;
                                        foreach ($komentar_header as $x) :
                                            $no++; ?>
                                        <li>
                                            <a href="<?= base_url('admin/komentar/nonaktif/' . $x['id_komentar']); ?>">
                                                <div class="pull-left">
                                                    <img src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>"
                                                        class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    <?= $x['nama']; ?>
                                                    <small><i class="fa fa-clock-o"></i>
                                                        <?= date('d-m-Y', strtotime($x['tanggal_upload'])); ?></small>
                                                </h4>
                                                <p><?= $x['isi']; ?></p>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="footer"><a href="<?= base_url('admin/komentar'); ?>">Lihat Semua</a></li>
                            </ul>
                        </li>
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-success"><?= $jumlahadministrasi; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Anda memiliki <?= $jumlahadministrasi; ?> Pengajuan belum dibaca</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <?php $no = 0;
                                        foreach ($pengajuan_header as $x) :
                                            $no++; ?>
                                        <li>
                                            <a href="">
                                                <div class="pull-left">
                                                    <?php if ($x['foto_penduduk'] == NULL) : ?>
                                                    <img src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>"
                                                        class="img-circle" alt="User Image">
                                                    <?php elseif ($x['foto_penduduk']) : ?>
                                                    <img src="<?= base_url('assets/foto/penduduk/' . $x['foto_penduduk']); ?>"
                                                        alt="" class="img-circle" alt="User Image">
                                                    <?php endif; ?>
                                                </div>
                                                <h4>
                                                    <?= $x['nama_lengkap']; ?>
                                                    <small><i class=" fa fa-clock-o"></i>
                                                        <?= date('d-m-Y', strtotime($x['tanggal'])); ?></small>
                                                </h4>
                                                <p><?= $x['opsi']; ?></p>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="footer"><a href="<?= base_url('admin/administrasi/index'); ?>">Lihat
                                        Semua</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('assets/foto/user/' . $this->session->userdata('foto')); ?>"
                                    class=" user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->session->userdata('username'); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url('assets/foto/user/' . $this->session->userdata('foto')); ?>"
                                        class="img-circle" alt="User Image">

                                    <p>
                                        <?= $this->session->userdata('username'); ?> -
                                        <?= $this->session->userdata('jabatan'); ?>
                                        <small>Admin sejak <?= $this->session->userdata('tanggal_daftar'); ?></small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= base_url('admin/akun/index'); ?>"
                                            class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('admin/login/logout'); ?>"
                                            class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                    </ul>
                </div>
            </nav>
        </header>