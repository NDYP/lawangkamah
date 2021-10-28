<section id="blog" class="blog">
    <div class="container">
        <div class="row">
            <?php foreach ($galeri as $x) : ?>
                <div class="col-lg-4" data-aos="fade-up">
                    <article class="entry">
                        <div class="entry-img">

                            <img style="height:300px" src="<?= base_url('assets/foto/album/galeri/' . $x['galeri']); ?>" alt="" class="img-fluid rounded mx-auto d-block" style="width: 100%;">

                        </div>
                        <h2 class="entry-title">
                            <a id="clickbutton" type="button" value="Click" onclick="showimage()" href="<?= base_url('assets/foto/album/galeri/' . $x['galeri']); ?>" data-gall="portfolioGallery"><?= $x['judul_galeri']; ?></a>
                        </h2>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i>
                                    <a id="clickbutton" type="button" value="Click" onclick="showimage()" href="<?= base_url('assets/foto/album/galeri/' . $x['galeri']); ?>" data-gall="portfolioGallery"><?= $x['tanggal_upload']; ?></time></a>
                                </li>
                            </ul>
                        </div>

                    </article><!-- End blog entry -->
                </div>
            <?php endforeach; ?>
        </div>
        <div class="blog-pagination" data-aos="fade-up">
            <ul class="justify-content-center">
                <?php echo $pagination; ?>
            </ul>
        </div>
    </div>
</section><!-- End Blog Section -->