<section id="blog" class="blog">
    <div class="container">
        <div class="row">
            <?php foreach ($album as $x) : ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                    <article class="entry">
                        <div class="entry-img">
                            <img style="height:300px" src="<?= base_url('assets/foto/album/' . $x['gambar']); ?>" alt="" class="img-fluid rounded mx-auto d-block" style="width: 100%;">
                        </div>
                        <h class="entry-title">
                            <a href="<?= base_url('album/get/' . $x['id_album']) ?>"><?= $x['nama_album']; ?></a>
                        </h>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="<?= base_url('album/get/' . $x['id_album']) ?>"><?= $x['tanggal_upload']; ?></time></a></li>
                            </ul>
                        </div>
                        <hr>
                        <div class="entry-content">
                            <div class="read-more">
                                <a href="<?= base_url('album/get/' . $x['id_album']) ?>">Lihat Galeri</a>
                            </div>
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