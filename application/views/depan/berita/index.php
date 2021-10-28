<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container">
        <div class="row">
            <?php $no = 0;
            foreach ($artikel as $x) :
                $no++; ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                    <article class="entry">
                        <div class="entry-img">
                            <img style="height:200px" class="img-fluid rounded mx-auto d-block" style="width: 300px;" src="<?= base_url('assets/foto/artikel/' . $x['gambar']); ?>" alt="" class="img-fluid">
                        </div>
                        <h2 class="entry-title">
                            <a href="<?= base_url('berita/get/' . $x['id_artikel']) ?>"><?= $x['judul']; ?></a>
                        </h2>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center">
                                    <i class="icofont-user"></i>
                                    <a href="<?= base_url('berita/get/' . $x['id_artikel']) ?>"><?= $x['author']; ?>
                                    </a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="icofont-wall-clock"></i>
                                    <a href="<?= base_url('berita/get/' . $x['id_artikel']) ?>"><time datetime="2020-01-01"><?= $x['tanggal_upload']; ?></time>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            <p>
                                <?= word_limiter($x['isi'], 10); ?>
                            </p>
                            <hr>
                            <div class="read-more">
                                <a href="<?= base_url('berita/get/' . $x['id_artikel']) ?>">Lihat Selengkapnya</a>
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