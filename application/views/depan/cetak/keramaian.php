<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bootstrap-4.3.1/dist/css/bootstrap.min.css">
</head>
<style>
    body {

        font-size: 10px;
    }

    table {

        font-size: 14px;
    }

    th {
        text-align: center;
    }
</style>

<body>
    <center>
        <div class="row">
            <div class="col-md-12">
                <img src="<?= base_url('assets'); ?>/foto/desa/x.jpeg" alt="" style="padding:0%;position: absolute; width: 75px; height: auto;">
            </div>
            <div class="col-md-12">
                <span style="line-height: 1; font-weight: bold;">
                    <font style="line-height: 0.9;" face="Arial" font size="16">
                        PEMERINTAH KABUPATEN KAPUAS
                        <br>KECAMATAN TIMPAH
                        <br>DESA LAWANG KAMAH
                </span>
                <br>
                <span style="line-height: 2;">
                    <font style="line-height: 0.9;" face="Times New Roman" font size="">
                        Alamat : Desa Lawang Kamah RT.02 Kode Pos 73554
                </span>
            </div>
        </div>
    </center>
    <br>
    <hr>

    <font face="Times New Roman" font size="">
        <h4 align="center"><u>Permohonan Surat Ijin Keramaian</u></h4>
    </font>
    <table class="table-responsive" style="width: 100%; page-break-after: never;" border="" cellspacing="0">
        <tr>
            <td></td>
            <td>
                <p align="left">
                    <font face="Times New Roman" font size="14px">
                        Lawang Kamah, <?= tanggal(); ?><br>
                </p>
            </td>
        </tr>
        <tr>
            <td width="350">

            </td>
            <td align="left">
                <font face="Times New Roman" font size="14px">Kepada <br>Yth. Bapak Kapolsek Timpah <br>di-
                    <text align="center">Timpah</text>
            </td>
        </tr>
    </table>
    <p align="">
        <font face="Times New Roman" font size="14px">
            Mohon di Rekomendasi Surat Ijin Keramaian Pesta Perkawinan An. :
    </p>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td> <?= $akun['nama_lengkap']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td> <?= $akun['nama_lengkap']; ?></td>
                    </tr>

                    <tr>
                        <td>Tempat</td>
                        <td>:</td>
                        <td> <?= $akun['alamat_sekarang']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p align="">
            <font face="Times New Roman" font size="14px">
                Atas dasar tersebut diatas kami Pemerintah Desa Lawang Kamah memberikan rekomendasi kepada :
        </p>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td> <?= $akun['nik_penduduk']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td> <?= $akun['nama_lengkap']; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td> <?= $akun['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td> <?= $akun['pekerjaan']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td> <?= $akun['alamat_sekarang']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <p align="">
            <font face="Times New Roman" font size="14px">
                Dengan Catatan :
        </p>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                    <tr>
                        <td>1. Pemohon bertanggung jawab sepenuhnya atas segala kegiatan/acara yang dilaksanakan dan bersedia mengindahkan dan mentaati peraturan dan ketentuan yang berlaku.</td>
                    </tr>

                    <tr>
                        <td>2. Menjaga sebaik-baiknya kegiatan/acara guna menciptakan suasana yang aman sehingga tidak menimbulkan hal-hal yang bertentangan Peraturan dan Perundang-undangan yang berlaku.</td>
                    </tr>
                    <tr>
                        <td>3. Rekomendasi ini diberikan kepada Ybs, untuk selanjutnya diteruskan kepada pihak yang terkait, dan jika bertentangan dengan ketentuan lain, akan dilakukan perubahan/ perbaikan serta akan mentaati dan memenuhi ketentuan sebagaimana poin tersebut diatas.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <p align="">
            <font face="Times New Roman" font size="14px">
                Demikian rekomendasi ini diberikan guna menjadi bahan seperlunya.
        </p>
        <br>
        <br>
        <br>
        <table class="table-responsive" style="width: 100%; page-break-after: never;" border="" cellspacing="0">
            <tr>
                <td></td>
                <td>
                    <p align="left">
                        <font face="Times New Roman" font size="14px">
                            Lawang Kamah, <?= tanggal(); ?><br>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="350">

                </td>
                <?php foreach ($kades as $x) : ?>
                    <td align="left">
                        <font face="Times New Roman" font size="14px">Kepala Desa, <br> <br> <br><br>
                        <p><u><?= $x['nama_lengkap']; ?></u></p>
                        <p>NIP.<?= $x['nip_nipd']; ?></p>
                    </td>
                <?php endforeach; ?>
            </tr>
        </table>
        <br>
        <p align="">
            <font face="Times New Roman" font size="14px">
                Tembusan disampaikan kepada Yth :
        </p>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                    <tr>
                        <td>1. Camat Timpah di-TIMPAH.</td>
                    </tr>
                    <tr>
                        <td>2. Badan BPTP Kab, Kapuas, di-Kuala Kapuas.</td>
                    </tr>
                </tbody>
            </table>
        </div>
</body>

</html>