<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="row portfolio-container" style="position: relative; height: 494.062px;">
            <?php $no = 0;
            foreach ($galeri as $x) :
                $no++; ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card" style="position: absolute; left: 0px; top: 0px;">
                    <div class="portfolio-wrap">
                        <img src="<?= base_url('assets/foto/album/galeri/' . $x['galeri']); ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $x['judul_galeri']; ?></h4>
                            <p><?= $x['tanggal_upload_galeri']; ?></p>
                            <p><?= $x['author']; ?></p>
                            <div class="portfolio-links">
                                <a id="clickbutton" type="button" value="Click" onclick="showimage()" href="<?= base_url('assets/foto/album/galeri/' . $x['gambar']); ?>" data-gall="portfolioGallery" class="venobox vbox-item" title="Lihat"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>