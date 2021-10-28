<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $setting['title_pengunjung']; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="<?= base_url('assets/foto/setting/' . $setting['logo_pengunjung']) ?>" rel="icon">
    <link href="<?= base_url('assets/foto/setting/' . $setting['logo_pengunjung']) ?>" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/depan/assets'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/depan/assets'); ?>/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/depan/assets'); ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/depan/assets'); ?>/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/depan/assets'); ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets/depan/assets'); ?>/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url('assets/depan/assets'); ?>/vendor/owl.carousel/assets/owl.carousel.min.css"
        rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/depan/assets'); ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- =======================================================
  * Template Name: Sailor - v2.3.1
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo"><img src="<?= base_url('assets/foto/setting/' . $setting['logo_pengunjung']) ?>"
                    class="img-circle">
                <?php foreach ($profil as $x) : ?>
                <b> <?= $x['nama_desa']; ?></b>
                <?php endforeach; ?>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="<?= base_url('assets/depan/assets'); ?>/img/logo.png" alt="" class="img-fluid"></a>-->
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="<?= $this->uri->segment(1) == 'beranda' ? 'active' : ''; ?>"><a
                            href="<?= base_url('beranda'); ?>">Beranda</a></li>
                    <li class="drop-down"><a>Profil</a>
                        <ul>
                            <li class="<?= $this->uri->segment(1) == 'tentang' ? 'active' : ''; ?>"><a
                                    href="<?= base_url('tentang') ?>">Biodata</a></li>
                            <li class="<?= $this->uri->segment(1) == 'pemerintahdesa' ? 'active' : ''; ?>"><a
                                    href="<?= base_url('pemerintahdesa') ?>">Pemerintah Desa</a></li>
                            <li class="<?= $this->uri->segment(1) == 'visimisi' ? 'active' : ''; ?>"><a
                                    href="<?= base_url('visimisi') ?>">Visi & Misi</a></li>
                        </ul>
                    </li>
                    <li class="<?= $this->uri->segment(1) == 'album' ? 'active' : ''; ?>"><a
                            href="<?= base_url('album') ?>">Galeri</a></li>
                    <li class="<?= $this->uri->segment(1) == 'berita' ? 'active' : ''; ?>"><a
                            href="<?= base_url('berita') ?>">Berita</a></li>
                    <li class="<?= $this->uri->segment(1) == 'kontak' ? 'active' : ''; ?>"><a
                            href="<?= base_url('kontak') ?>">Kontak</a></li>
                </ul>
            </nav><!-- .nav-menu -->
            <a target="_blank" href="<?= base_url('login') ?>" class="get-started-btn ml-auto">Administrasi</a>
        </div>
    </header><!-- End Header -->
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2><?= $title; ?>
                    </h2>
                    <ol>
                        <li><a href="<?= base_url('beranda'); ?>">Beranda</a></li>
                        <li><?= $title; ?></li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->