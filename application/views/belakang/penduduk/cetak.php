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
            <h4>BIODATA PENDUDUK </h4>
    </p>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <td>Nomor Kartu Keluarga</td>
                    <td>:</td>
                    <td> <?= $penduduk['no_kk']; ?></td>
                </tr>
                <tr>
                    <td width="200">NIK</td>
                    <td width="1">:</td>
                    <td> <?= $penduduk['nik_penduduk']; ?></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td> <?= $penduduk['nama_lengkap']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td> <?= $penduduk['alamat_sekarang']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td> <?= $penduduk['email']; ?></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td> <?= $penduduk['telepon']; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td> <?= $penduduk['status_nikah']; ?></td>
                </tr>
                <tr>
                    <td>Hubungan Dalam Keluarga</td>
                    <td>:</td>
                    <td> <?= $penduduk['status_kk']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td> <?= $penduduk['jenis_kelamin']; ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td> <?= $penduduk['agama']; ?></td>
                </tr>
                <tr>
                    <td>No. Akta Kelahiran</td>
                    <td>:</td>
                    <td> <?= $penduduk['no_akta']; ?></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>:</td>
                    <td> <?= $penduduk['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($penduduk['tempat_lahir'])); ?></td>
                </tr>

                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>:</td>
                    <td> <?= $penduduk['pendidikan_kk']; ?></td>
                </tr>

                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td> <?= $penduduk['pekerjaan']; ?></td>
                </tr>

                <tr>
                    <td>Golongan Darah</td>
                    <td>:</td>
                    <td> <?= $penduduk['golongan_darah']; ?></td>
                </tr>
                <tr>
                    <td>Asuransi</td>
                    <td>:</td>
                    <td> <?= $penduduk['asuransi']; ?></td>
                </tr>
                <tr>
                    <td>Sakit</td>
                    <td>:</td>
                    <td> <?= $penduduk['sakit']; ?></td>
                </tr>
                <tr>
                    <td>Cacat</td>
                    <td>:</td>
                    <td> <?= $penduduk['cacat']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
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
                        <p><?= $x['nama_lengkap']; ?></p>
                        <p>NIP.<?= $x['nip_nipd']; ?></p>
                </td>
            <?php endforeach; ?>
        </tr>
    </table>
</body>

</html>