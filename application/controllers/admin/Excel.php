<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Penduduk');
        $this->load->model('M_Setting');
        $this->load->model('M_Profil');
        $this->load->model('M_Komentar');
        $this->load->model('M_Cetak');
        $this->load->model('M_Statistik');
        login();
    }
    public function export()
    {
        $index = $this->M_Penduduk->index();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'NIK')
            ->setCellValue('C1', 'Nama Lengkap')
            ->setCellValue('D1', 'No.KK')
            ->setCellValue('E1', 'Status')
            ->setCellValue('F1', 'Jenis Kelamin')
            ->setCellValue('G1', 'Agama')
            ->setCellValue('H1', 'Status Pernikahan')
            ->setCellValue('I1', 'Tempat Lahir')
            ->setCellValue('J1', 'Tanggal Lahir')
            ->setCellValue('K1', 'Penolong Kelahiran')
            ->setCellValue('L1', 'Pendidikan Terakhir')
            ->setCellValue('M1', 'Pekerjaan')
            ->setCellValue('N1', 'Pendapatan')
            ->setCellValue('O1', 'Alamat')
            ->setCellValue('P1', 'Asuransi')
            ->setCellValue('Q1', 'Golongan Darag')
            ->setCellValue('R1', 'Sakit')
            ->setCellValue('S1', 'Cacat');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['nik_penduduk'])
                ->setCellValue('C' . $kolom, $x['nama_lengkap'])
                ->setCellValue('D' . $kolom, $x['no_kk'])
                ->setCellValue('E' . $kolom, $x['status_kk'])
                ->setCellValue('F' . $kolom, $x['jenis_kelamin'])
                ->setCellValue('G' . $kolom, $x['agama'])
                ->setCellValue('H' . $kolom, $x['status_nikah'])
                ->setCellValue('I' . $kolom, $x['tempat_lahir'])
                ->setCellValue('J' . $kolom, date('j F Y', strtotime($x['tanggal_lahir'])))
                ->setCellValue('K' . $kolom, $x['penolong_kelahiran'])
                ->setCellValue('L' . $kolom, $x['pendidikan_kk'])
                ->setCellValue('M' . $kolom, $x['pekerjaan'])
                ->setCellValue('N' . $kolom, $x['pendapatan'])
                ->setCellValue('O' . $kolom, $x['alamat_sekarang'])
                ->setCellValue('P' . $kolom, $x['asuransi'])
                ->setCellValue('Q' . $kolom, $x['golongan_darah'])
                ->setCellValue('R' . $kolom, $x['sakit'])
                ->setCellValue('S' . $kolom, $x['cacat']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data_Penduduk.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function pekerjaan()
    {
        $index = $this->M_Statistik->pekerjaan();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Pekerjaan')
            ->setCellValue('C1', 'Jumlah')
            ->setCellValue('D1', 'Persentase')
            ->setCellValue('E1', 'Laki-Laki')
            ->setCellValue('F1', 'Perempuan');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['pekerjaan'])
                ->setCellValue('C' . $kolom, $x['jumlah'])
                ->setCellValue('D' . $kolom, $x['persentasi'])
                ->setCellValue('E' . $kolom, $x['jumlahco'])
                ->setCellValue('F' . $kolom, $x['jumlahce']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data_Pekerjaan_Penduduk.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function umur()
    {
        $index = $this->M_Statistik->rentang_umur();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Rentang Umur')
            ->setCellValue('C1', 'Jumlah')
            ->setCellValue('D1', 'Persentase')
            ->setCellValue('E1', 'Laki-Laki')
            ->setCellValue('F1', 'Perempuan');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['rentang'])
                ->setCellValue('C' . $kolom, $x['jumlah'])
                ->setCellValue('D' . $kolom, $x['persentasi'])
                ->setCellValue('E' . $kolom, $x['jumlahco'])
                ->setCellValue('F' . $kolom, $x['jumlahce']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data_Umur_Penduduk.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function status_nikah()
    {
        $index = $this->M_Statistik->status_kawin();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Status')
            ->setCellValue('C1', 'Jumlah')
            ->setCellValue('D1', 'Persentase')
            ->setCellValue('E1', 'Laki-Laki')
            ->setCellValue('F1', 'Perempuan');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['status_kawin'])
                ->setCellValue('C' . $kolom, $x['jumlah'])
                ->setCellValue('D' . $kolom, $x['persentasi'])
                ->setCellValue('E' . $kolom, $x['jumlahco'])
                ->setCellValue('F' . $kolom, $x['jumlahce']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="nikah.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function agama()
    {
        $index = $this->M_Statistik->agama();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Agama')
            ->setCellValue('C1', 'Jumlah')
            ->setCellValue('D1', 'Persentase')
            ->setCellValue('E1', 'Laki-Laki')
            ->setCellValue('F1', 'Perempuan');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['agama'])
                ->setCellValue('C' . $kolom, $x['jumlah'])
                ->setCellValue('D' . $kolom, $x['persentasi'])
                ->setCellValue('E' . $kolom, $x['jumlahco'])
                ->setCellValue('F' . $kolom, $x['jumlahce']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="agama.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function jenis_kelamin()
    {
        $index = $this->M_Statistik->jenis_kelamin();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Jenis Kelamin')
            ->setCellValue('C1', 'Jumlah')
            ->setCellValue('D1', 'Persentase')
            ->setCellValue('E1', 'Laki-Laki')
            ->setCellValue('F1', 'Perempuan');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['jenis_kelamin'])
                ->setCellValue('C' . $kolom, $x['jumlah'])
                ->setCellValue('D' . $kolom, $x['persentasi'])
                ->setCellValue('E' . $kolom, $x['jumlahco'])
                ->setCellValue('F' . $kolom, $x['jumlahce']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="JK.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function status_kk()
    {
        $index = $this->M_Statistik->status_kk();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Status')
            ->setCellValue('C1', 'Jumlah')
            ->setCellValue('D1', 'Persentase')
            ->setCellValue('E1', 'Laki-Laki')
            ->setCellValue('F1', 'Perempuan');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['status_kk'])
                ->setCellValue('C' . $kolom, $x['jumlah'])
                ->setCellValue('D' . $kolom, $x['persentasi'])
                ->setCellValue('E' . $kolom, $x['jumlahco'])
                ->setCellValue('F' . $kolom, $x['jumlahce']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="status_keluarga.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function status_wn()
    {
        $index = $this->M_Statistik->status_wn();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Status')
            ->setCellValue('C1', 'Jumlah')
            ->setCellValue('D1', 'Persentase')
            ->setCellValue('E1', 'Laki-Laki')
            ->setCellValue('F1', 'Perempuan');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['status_wn'])
                ->setCellValue('C' . $kolom, $x['jumlah'])
                ->setCellValue('D' . $kolom, $x['persentasi'])
                ->setCellValue('E' . $kolom, $x['jumlahco'])
                ->setCellValue('F' . $kolom, $x['jumlahce']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data_WN.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function golongan_darah()
    {
        $index = $this->M_Statistik->golongan_darah();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Golongan')
            ->setCellValue('C1', 'Jumlah')
            ->setCellValue('D1', 'Persentase')
            ->setCellValue('E1', 'Laki-Laki')
            ->setCellValue('F1', 'Perempuan');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['id_golongan_darah'])
                ->setCellValue('C' . $kolom, $x['jumlah'])
                ->setCellValue('D' . $kolom, $x['persentasi'])
                ->setCellValue('E' . $kolom, $x['jumlahco'])
                ->setCellValue('F' . $kolom, $x['jumlahce']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="golongan_darah.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function disabilitas()
    {
        $index = $this->M_Statistik->cacat();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Disabilitas')
            ->setCellValue('C1', 'Jumlah')
            ->setCellValue('D1', 'Persentase')
            ->setCellValue('E1', 'Laki-Laki')
            ->setCellValue('F1', 'Perempuan');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['cacat'])
                ->setCellValue('C' . $kolom, $x['jumlah'])
                ->setCellValue('D' . $kolom, $x['persentasi'])
                ->setCellValue('E' . $kolom, $x['jumlahco'])
                ->setCellValue('F' . $kolom, $x['jumlahce']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="diasbilitas.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function sakit()
    {
        $index = $this->M_Statistik->sakit();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Disabilitas')
            ->setCellValue('C1', 'Jumlah')
            ->setCellValue('D1', 'Persentase')
            ->setCellValue('E1', 'Laki-Laki')
            ->setCellValue('F1', 'Perempuan');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['sakit'])
                ->setCellValue('C' . $kolom, $x['jumlah'])
                ->setCellValue('D' . $kolom, $x['persentasi'])
                ->setCellValue('E' . $kolom, $x['jumlahco'])
                ->setCellValue('F' . $kolom, $x['jumlahce']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="sakit.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function asuransi()
    {
        $index = $this->M_Statistik->asuransi();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'asuransi')
            ->setCellValue('C1', 'Jumlah')
            ->setCellValue('D1', 'Persentase')
            ->setCellValue('E1', 'Laki-Laki')
            ->setCellValue('F1', 'Perempuan');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['asuransi'])
                ->setCellValue('C' . $kolom, $x['jumlah'])
                ->setCellValue('D' . $kolom, $x['persentasi'])
                ->setCellValue('E' . $kolom, $x['jumlahco'])
                ->setCellValue('F' . $kolom, $x['jumlahce']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="asuransi.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function pendapatan()
    {
        $index = $this->M_Statistik->pendapatan();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Pendapatan')
            ->setCellValue('C1', 'Jumlah')
            ->setCellValue('D1', 'Persentase')
            ->setCellValue('E1', 'Laki-Laki')
            ->setCellValue('F1', 'Perempuan');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['pendapatan'])
                ->setCellValue('C' . $kolom, $x['jumlah'])
                ->setCellValue('D' . $kolom, $x['persentasi'])
                ->setCellValue('E' . $kolom, $x['jumlahco'])
                ->setCellValue('F' . $kolom, $x['jumlahce']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="pendapatan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}