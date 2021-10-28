<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
            <?php $no = 0;
            foreach ($baner as $x) :
                $no++; ?>
                <!-- Slide 1 -->
                <?php if ($x['status'] == 'Aktif') : ?>
                    <div class="carousel-item active" style="background-image: url(<?= base_url('assets/foto/baner/' . $x['foto_baner']); ?>)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Lawang Kamah</span></h2>

                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="carousel-item" style="background-image: url(<?= base_url('assets/foto/baner/' . $x['foto_baner']); ?>)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Lawang Kamah</span></h2>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section><!-- End Hero -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row content">
                <div class="col-lg-12 pt-4 pt-lg-0">
                    <h2>Sejarah Singkat</h2>
                    <?php foreach ($tentang as $x) : ?>
                        <h3><?= $x['profil_singkat']; ?></h3>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </section><!-- End About Section -->
</main><!-- End #main -->