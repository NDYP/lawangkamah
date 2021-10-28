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
    <p align="center">
        <font face="Times New Roman" font size="">
            <h4><u>SURAT PERNYATAAN PENGHASILAN ORANG TUA</u></h4>
    </p>
    <p align="">
        <font face="Times New Roman" font size="">
            Yang bertanda tangan dibawah ini, saya :
    </p>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td> <?= $akun['nama_lengkap']; ?></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>:</td>
                    <td> <?= $akun['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($akun['tempat_lahir'])); ?></td>
                </tr>
                <tr>
                    <td width="200">Pekerjaan</td>
                    <td width="1">:</td>
                    <td> <?= $akun['pekerjaan']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td> <?= $akun['alamat_sebelum']; ?></td>
                </tr>

            </tbody>
        </table>
    </div>
    <br>
    <p align="">
        <font face="Times New Roman" font size="">
            Adalah orang tua dari :
    </p>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td> <?= $form['nama_lengkap']; ?></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>:</td>
                    <td> <?= $form['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($form['tempat_lahir'])); ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td> <?= $form['jenis_kelamin']; ?></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td> <?= $form['jurusan']; ?></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td>:</td>
                    <td><?= $form['fakultas']; ?></td>
                </tr>
                <tr>
                    <td>Universitas</td>
                    <td>:</td>
                    <td><?= $form['universitas']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <p align="">
        <font face="Times New Roman" font size="">
            menyatakan bahwa saat ini, kami selaku orang tua mempunyai penghasilan keluarga rata-rata sebesar Rp.<?= $akun['pendapatan']; ?>.
    </p>
    <br>
    <p align="justify">
        <font face="Times New Roman" font size="">
            Demikian, pernyataan ini kami buat dengan sebenar-benarnya dan penuh rasa tanggung jawab. Apabila pernyataan ini tidak benar/menyimpang dengan keadaan yang sebenarnya, kami bersedia menerima sanksi sesuai dengan peraturan perundang-undangan, termasuk pembatalan anak kami sebagai mahasiswa jurusan <?= $form['jurusan']; ?>, fakultas <?= $form['fakultas']; ?>, <?= $form['universitas']; ?>.
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
                <font face="Times New Roman" font size="14px">Yang membuat pernyataan<br> <br> <br><br>
                    <p><?= $akun['nama_lengkap']; ?></p>
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
</body>

</html>