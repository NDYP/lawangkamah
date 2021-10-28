<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq">
    <div class="container">
        <?php foreach ($profil as $x) : ?>
            <div class="row">
                <div class="col-lg-12">
                    <img class="rounded mx-auto d-block img-responsive" src="<?= base_url('assets/foto/desa/' . $x['lambang_desa']) ?>" alt="logo" style="width: 100%">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>F.A.Q</h2>
                        <p>Desa</p>
                    </div>
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Nama Desa</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['nama_desa']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Kode Desa</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['kode_desa']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Kode Pos</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['kode_pos']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Kepala Desa</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['nama_lengkap']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>NIP/NIDN</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['nip_nipd']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Alamat Kantor</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['alamat_kantor']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->

                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Telepon/HP</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['telepon_desa']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->

                </div>
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>F.A.Q</h2>
                        <p>Kecamatan</p>
                    </div>
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Nama Kecamatan</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['nama_kecamatan']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Kode Kecamatan</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['kode_kecamatan']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Nama Camat</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['nama_camat']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>NIP</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['nip_camat']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                    <div class="section-title">
                        <h2>F.A.Q</h2>
                        <p>Kabupaten</p>
                    </div>
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Nama Kabupaten</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['nama_kabupaten']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Kode Kabupaten</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['kode_kabupaten']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                    <div class="section-title">
                        <h2>F.A.Q</h2>
                        <p>Provinsi</p>
                    </div>
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Nama Provinsi</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['nama_provinsi']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                    <div class="row faq-item d-flex align-items-stretch">
                        <div class="col-lg-6">
                            <i class="bx bx-help-circle"></i>
                            <h4>Kode Provinsi</h4>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <?= $x['kode_provinsi']; ?>
                            </p>
                        </div>
                    </div><!-- End F.A.Q Item-->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section><!-- End Frequently Asked Questions Section -->