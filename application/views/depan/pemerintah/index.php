<!-- ======= Team Section ======= -->
<section id="team" class="team ">
    <div class="container">

        <div class="row">
            <?php $no = 0;
            foreach ($pejabat as $x) :
                $no++; ?>
                <div class="col-lg-6">
                    <div class="member d-flex align-items-start">
                        <?php if ($x['foto_pejabat'] == NULL) : ?>
                            <div class="pic"><img src="<?= base_url('assets/foto/penduduk/kuser.png'); ?>" class="img-fluid" alt=""></div>
                        <?php else : ?>
                            <div class="pic"><img src="<?= base_url('assets/foto/pejabat/' . $x['foto_pejabat']); ?>" class="img-fluid" alt=""></div>
                        <?php endif; ?>
                        <div class="member-info">
                            <h4><?= $x['nama_lengkap']; ?></h4>
                            <span><?= $x['jabatan']; ?></span>
                            <p>NIP : <?= $x['nip_nipd']; ?></p>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section><!-- End Team Section -->

</main>