<main id="main" style="padding-top: 0px;">
    <!-- ======= About Section ======= -->
    <section id="about" class="about" style="padding-top: 0px;">
        <div class="container">
            <div class="row content">
                <div class="col-lg-12 pt-4 pt-lg-0">
                    <center>
                        <h2>Visi</h2>
                        <?php foreach ($tentang as $x) : ?>
                            <h4><?= $x['visi']; ?></h4>
                        <?php endforeach; ?>
                    </center>
                </div>
                <div class="col-lg-12 pt-4 pt-lg-0">
                    <center>
                        <h2>Misi</h2>
                    </center>
                    <?php foreach ($tentang as $x) : ?>
                        <h4><?= $x['misi']; ?></h4>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section><!-- End About Section -->
</main><!-- End #main -->