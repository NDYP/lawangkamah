</main>
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">

                        <?php foreach ($profil as $x) : ?>
                        <h3> <?= $x['nama_desa']; ?></h3>
                        <p>
                            <?= $x['alamat_kantor']; ?> <br>
                            <?= $x['kode_pos']; ?>, <?= $x['nama_provinsi']; ?><br><br>
                            <strong>Telepon/Hp:</strong> <?= $x['telepon_desa']; ?><br>
                        </p>
                        <?php endforeach; ?>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 footer-links">
                    <center>
                        <img src="<?= base_url('assets/foto/setting/' . $setting['logo_pengunjung']) ?>" class="img"
                            style="width:200px;height:200px;">
                    </center>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Link</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('beranda') ?>">Beranda</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('tentang') ?>">Tentang</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('pemerintahdesa') ?>">Pemerintah
                                Desa</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('visimisi') ?>">Visi & Misi</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-1 col-md-6 footer-links">
                    <h4><br></h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('album') ?>">Galeri</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('berita') ?>">Berita</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('kontak') ?>">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>
                    <?php foreach ($profil as $x) : ?>
                    <b> <?= $x['nama_desa']; ?></b>
                    <?php endforeach; ?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<!-- Vendor JS Files -->
<script src="<?= base_url('assets/depan/assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/depan/assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/depan/assets'); ?>/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/depan/assets'); ?>/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url('assets/depan/assets'); ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url('assets/depan/assets'); ?>/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url('assets/depan/assets'); ?>/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/depan/assets'); ?>/vendor/owl.carousel/owl.carousel.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!-- Template Main JS File -->
<script src="<?= base_url('assets/depan/assets'); ?>/js/main.js"></script>
<script type="text/javascript">
function showimage() {
    $("body").css("background-image",
        "url('<?= base_url('assets/foto/album/' . $x['gambar']); ?>')"
    ); // Onclick of button the background image of body will be test here. Give the image path in url
    $('#clickbutton').hide(); //This will hide the button specified in html
}
</script>

</body>

</html>