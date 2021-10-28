<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">

                    <li data-filter="*" class="filter-active">Card</li>

                </ul>
            </div>
        </div>
        <div class="row portfolio-container" style="position: relative; height: 494.062px;">
            <?php foreach ($album as $x) : ?>
                <div class="col-lg-4 portfolio-item filter-card" style="position: absolute; left: 0px; top: 0px;">
                    <div class="portfolio-wrap">
                        <img src="<?= base_url('assets/foto/album/' . $x['gambar']); ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $x['nama_album']; ?></h4>
                            <p><?= $x['tanggal_upload']; ?></p>
                            <div class="portfolio-links">
                                <a id="clickbutton" type="button" value="Click" onclick="showimage()" href="<?= base_url('assets/foto/album/' . $x['gambar']); ?>" data-gall="portfolioGallery" class="venobox vbox-item" title="Thumbnail"><i class="bx bx-plus"></i></a>
                                <a href="<?= base_url('album/galeri/' . $x['id_album']) ?>" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox vbox-item" title="Lihat Galeri"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>