<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 entries">
                <article class="entry entry-single">
                    <div class="entry-img">
                        <img src="<?= base_url('assets/foto/artikel/' . $artikel['gambar']); ?>" alt="" class="img-fluid rounded mx-auto d-block">
                    </div>
                    <h2 class="entry-title">
                        <a href=""><?= $artikel['judul']; ?></a>
                    </h2>
                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href=""><?= $artikel['author']; ?></a></li>
                            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href=""><time datetime="2020-01-01"><?= $artikel['tgl1']; ?></time></a></li>
                            <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href=""> <?= $artikel['jumlah']; ?> Komentar</a></li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p>
                            <?= $artikel['x']; ?>
                        </p>
                    </div>
                </article><!-- End blog entry -->
                <div class="blog-comments">
                    <h4 class="comments-count"> <?= $artikel['jumlah']; ?> Komentar</h4>
                    <?php foreach ($komentar as $x) : ?>
                        <div id="" class="comment clearfix">
                            <img src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" class="comment-img  float-left" alt="">
                            <h5><a href=""><?= $x['nama'] ?></a></h5>
                            <time datetime="2020-01-01"><?= $x['tgl'] ?></time>
                            <p>
                                <?= $x['komentar'] ?>
                            </p>
                        </div><!-- End comment #1 -->
                    <?php endforeach; ?>
                    <div class="reply-form">
                        <h4>Berikan Komentar</h4>
                        <form enctype="multipart/form-data" role="form" method="post" action="<?= base_url('berita/komentar'); ?>">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input name="nama" type="text" class="form-control" placeholder="Nama Anda*" required>
                                    <input name="id_artikel" type="hidden" value="<?= $artikel['id_artikel']; ?>" class="form-control" placeholder="Your Name*">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="email" type="text" class="form-control" placeholder="Email*" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <textarea name="isi" class="form-control" placeholder="Isi Komentar*" required></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Komentar</button>
                        </form>
                    </div>
                </div><!-- End blog comments -->
            </div><!-- End blog entries list -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <h3 class="sidebar-title">Berita Terbaru</h3>
                    <div class="sidebar-item recent-posts">
                        <?php $no = 0;
                        foreach ($index as $z) :
                            $no++; ?>
                            <div class="post-item clearfix">
                                <img src="<?= base_url('assets/foto/artikel/' . $z['gambar']); ?>" alt="">
                                <h4><a href="<?= base_url('berita/get/' . $z['id_artikel']) ?>"><?= $z['judul'] ?></a></h4>
                                <time><?= $z['tanggal_upload'] ?></time>
                            </div>
                        <?php endforeach; ?>
                    </div><!-- End sidebar recent posts-->
                </div><!-- End sidebar -->
            </div><!-- End blog sidebar -->
        </div>
    </div>
</section><!-- End Blog Section -->