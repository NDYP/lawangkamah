<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Cetak');
        $this->load->model('M_Setting');
        $this->load->model('M_Setting');
        $this->load->model('M_Akun');
        $this->load->model('M_Profil');
        $this->load->model('M_Penduduk');
        $this->load->model('M_Artikel');
        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }

    public function biodata()
    {
        $data['title'] = "Cetak Biodata";
        $id_penduduk = $this->session->userdata('id_penduduk');
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['penduduk'] = $this->M_Penduduk->get($id_penduduk)->row_array();
        $data['kades'] = $this->M_Profil->index();
        $this->pdf->set_base_path(base_url());
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "datadiri.pdf";
        $this->pdf->load_view('belakang/penduduk/cetak', $data);
    }
    public function keluarga()
    {
        $data['title'] = "Cetak Biodata Keluarga";
        $no_kk = $this->session->userdata('no_kk');
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['kades'] = $this->M_Profil->index();
        $data['keluarga'] = $this->M_Cetak->keluarga($no_kk);
        $data['kk'] = $this->db->get_where('penduduk', array('id_status_kk' => '1', 'no_kk' => $no_kk))->row_array();
        $data['kades'] = $this->M_Profil->index();
        $data['no_kk'] = $this->db->get_where('penduduk', array('no_kk' => $no_kk))->row_array();
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "KK.pdf";
        $this->pdf->load_view('belakang/keluarga/cetak', $data);
    }
    public function ktpsementara()
    {
        $data['title'] = "Cetak KTP Sementara";
        $id_penduduk = $this->session->userdata('id_penduduk');
        $data['setting'] = $this->M_Setting->index()->row_array();

        $data['akun'] = $this->M_Cetak->penduduk($id_penduduk)->row_array();
        $data['kades'] = $this->M_Profil->index();

        $data['form'] = $this->M_Cetak->index()->row_array();

        $this->pdf->set_base_path(base_url());
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "datadiri.pdf";
        $this->pdf->load_view('depan/cetak/ktp', $data);
    }

    public function spt()
    {
        $data['title'] = "Cetak SP Tanah";
        $id_penduduk = $this->session->userdata('id_penduduk');
        $data['setting'] = $this->M_Setting->index()->row_array();

        $data['akun'] = $this->M_Cetak->penduduk($id_penduduk)->row_array();
        $data['kades'] = $this->M_Profil->index();

        $data['form'] = $this->M_Cetak->index()->row_array();

        $this->pdf->set_base_path(base_url());
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "SPT.pdf";
        $this->pdf->load_view('depan/cetak/SPT', $data);
    }
    public function domisili()
    {
        $data['title'] = "Cetak Keterangan Domisili";
        $id_penduduk = $this->session->userdata('id_penduduk');
        $data['setting'] = $this->M_Setting->index()->row_array();

        $data['akun'] = $this->M_Cetak->penduduk($id_penduduk)->row_array();
        $data['kades'] = $this->M_Profil->index();

        $data['form'] = $this->M_Cetak->index()->row_array();

        $this->pdf->set_base_path(base_url());
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "domisili.pdf";
        $this->pdf->load_view('depan/cetak/domisili', $data);
    }
    public function keramaian()
    {
        $data['title'] = "Cetak Izin Keramaian";
        $id_penduduk = $this->session->userdata('id_penduduk');
        $data['setting'] = $this->M_Setting->index()->row_array();

        $data['akun'] = $this->M_Cetak->penduduk($id_penduduk)->row_array();
        $data['kades'] = $this->M_Profil->index();

        $data['form'] = $this->M_Cetak->index()->row_array();

        $this->pdf->set_base_path(base_url());
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "datadiri.pdf";
        $this->pdf->load_view('depan/cetak/keramaian', $data);
    }
    public function npwp()
    {
        $data['title'] = "Cetak Kehilangan NPWP";
        $id_penduduk = $this->session->userdata('id_penduduk');
        $data['setting'] = $this->M_Setting->index()->row_array();

        $data['akun'] = $this->M_Cetak->penduduk($id_penduduk)->row_array();
        $data['form'] = $this->M_Cetak->index()->row_array();

        $data['kades'] = $this->M_Profil->index();
        $this->pdf->set_base_path(base_url());
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "datadiri.pdf";
        $this->pdf->load_view('depan/cetak/npwp', $data);
    }
    public function penghasilan()
    {
        $data['title'] = "Cetak Penghasilan Orang Tua";
        $id_penduduk = $this->session->userdata('id_penduduk');
        $data['setting'] = $this->M_Setting->index()->row_array();

        $data['akun'] = $this->M_Cetak->penduduk($id_penduduk)->row_array();
        $data['kades'] = $this->M_Profil->index();

        $data['form'] = $this->M_Cetak->index()->row_array();

        $this->pdf->set_base_path(base_url());
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "datadiri.pdf";
        $this->pdf->load_view('depan/cetak/penghasilan', $data);
    }
    public function usaha()
    {
        $data['title'] = "Cetak Izin Usaha";
        $id_penduduk = $this->session->userdata('id_penduduk');
        $data['setting'] = $this->M_Setting->index()->row_array();

        $data['akun'] = $this->M_Cetak->penduduk($id_penduduk)->row_array();
        $data['kades'] = $this->M_Profil->index();

        $data['form'] = $this->M_Cetak->index()->row_array();

        $this->pdf->set_base_path(base_url());
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "datadiri.pdf";
        $this->pdf->load_view('depan/cetak/usaha', $data);
    }

    public function hapus($id_pengajuan)
    {
        $data =
            $this->db->get_where('pengajuan', array('id_pengajuan' => $id_pengajuan))->row_array();
        if ($data) {
            $this->M_Cetak->hapus($id_pengajuan);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('administrasi/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('administrasi/index', 'refresh');
        }
    }
}
