<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">
        <div>
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127624.5793516507!2d114.45917484743342!3d-1.5972437044204446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfba1ff24e9ae8f%3A0xaf3a5b9582be3758!2sLawang%20Kamah%2C%20Kec.%20Timpah%2C%20Kabupaten%20Kapuas%2C%20Kalimantan%20Tengah!5e0!3m2!1sid!2sid!4v1627116678286!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="row mt-5">
            <?php foreach ($profil as $x) : ?>
                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Alamat:</h4>
                            <p><?= $x['alamat_kantor']; ?></p>
                        </div>
                       
                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Telepon/HP:</h4>
                            <p><?= $x['telepon_desa']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-lg-8 mt-5 mt-lg-0">
                <form enctype="multipart/form-data" role="form" method="post" action="<?= base_url('berita/komentar'); ?>">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input name="nama" type="text" class="form-control" placeholder="Nama Anda*" required>
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
                    <button type="submit" class="btn btn-primary">Post Saran</button>
                </form>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->