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
        font-size: 12px;
    }

    table {
        font-size: 12px;
    }

    th {
        text-align: center;
    }
</style>

<body>
    <center>
        <div class="row">
            <div class="col-md-12">
                <img src="<?= base_url('assets'); ?>/foto/desa/x.jpeg" alt="" style="padding:0%;position: absolute; width: 80px; height: auto;">
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
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr style="font-size: 14;">
                    <td>Kode Kelompok</td>
                    <td>:</td>
                    <td> <?= $kelompok['kode_kelompok']; ?></td>
                </tr>
                <tr style="font-size: 14;">
                    <td width="130">Nama kelompok</td>
                    <td width="1">:</td>
                    <td> <?= $kelompok['nama_kelompok']; ?></td>
                </tr>
                <tr style="font-size: 14;">
                    <td>Kategori</td>
                    <td>:</td>
                    <td> <?= $kelompok['nama_kategori']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>
    <table class="table-responsive" style="width: 100%; page-break-after: never;" border="1" cellspacing="">
        <tr>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>
                Jenis Kelamin
            </th>
            <th>Tempat, <br> Tanggal Lahir</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
            <th>Status <br> dalam <br> kelompok</th>
        </tr>
        <?php $no = 0;
        foreach ($anggota as $x) : $no++; ?>
            <tr>
                <td style="text-align: center;"><?= $x['nik_penduduk'] ?></td>
                <td><?= $x['nama_lengkap'] ?></td>
                <td>
                    <?= $x['jenis_kelamin'] ?>
                </td>
                <td><?= $x['tempat_lahir'] ?>,<?= date('d-m-Y', strtotime($x['tempat_lahir'])); ?></td>
                <td><?= $x['pendidikan'] ?></td>
                <td><?= $x['pekerjaan'] ?></td>
                <td><?= $x['nama_jabatan'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <br>
    <br>
    <table class="table-responsive" style="width: 100%; page-break-after: never;" border="" cellspacing="0">
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: left;">
                <font face="Times New Roman" font size="12px">
                    <?= tanggal(); ?>,<br>
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td width="500">
            </td>
            <td></td>
            <?php foreach ($kades as $x) : ?>
                <td align="left">
                    <font face="Times New Roman" font size="14px">Kepala Desa, <br> <br> <br><br>
                        <p><?= $x['nama_lengkap']; ?></p>
                </td>
            <?php endforeach; ?>
            <td></td>
        </tr>
    </table>
</body>

</html>