<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Setting');
        $this->load->model('M_Statistik');
        $this->load->model('M_Beranda');
        $this->load->model('M_Profil');
        $this->load->model('M_Komentar');
        $this->load->model('M_Cetak');
        login();
        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }
    function index()
    {
        $query = $this->M_Beranda->bulan();
        $record = $query->result();
        $data = [];

        foreach ($record as $row) {
            $data['label'][] = $row->month_name;
            $data['data'][] = (int) $row->count;
            $data['title'] = 'Kunjungan/Bulan';
        }
        $data['chart_data'] = json_encode($data);

        $query = $this->M_Beranda->pengajuan();
        $record = $query->result();
        $x = [];

        foreach ($record as $row) {
            $x['label'][] = $row->month_name . ' ' . $row->opsi;
            $x['data'][] = (int) $row->count;
            $x['title'] = 'Pengajuan/Bulan';
        }
        $data['chart_data2'] = json_encode($x);

        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['title'] = 'Beranda';
        $data['title2'] = 'PENGUNJUNG WEB';
        $data['online'] = $this->M_Beranda->online()->num_rows();
        $data['total'] = $this->M_Beranda->total();
        $data['today'] = $this->M_Beranda->hari_ini();

        $data['penduduk'] = $this->M_Beranda->penduduk();
        $data['kelompok'] = $this->M_Beranda->kelompok1();
        $data['keluarga'] = $this->M_Beranda->keluarga();
        $data['pejabat'] = $this->M_Beranda->pejabat();

        $data['profil'] = $this->M_Profil->index();

        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/beranda/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
}