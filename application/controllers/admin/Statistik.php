<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Statistik');
        $this->load->model('M_Setting');
        $this->load->model('M_Setting');
        $this->load->model('M_Profil');
        $this->load->model('M_Komentar');
        $this->load->model('M_Cetak');
        login();
        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }
    function pendidikan_ditempuh()
    {


        $q = $this->M_Statistik->pendidikanditempuh();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['pendidikan'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Pendidikan Ditempuh';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Pendidikan Ditempuh';
        $data['statistik'] = $this->M_Statistik->pendidikanditempuh();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function pendidikan()
    {
        $q = $this->M_Statistik->pendidikankk();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['pendidikan_kk'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Pendidikan Dalam KK';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Pendidikan Dalam KK';
        $data['statistik'] = $this->M_Statistik->pendidikankk();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/pendidikan_kk', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function status_kk()
    {
        $q = $this->M_Statistik->status_kk();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['status_kk'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Status Dalam Keluarga';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Status Dalam Keluarga';
        $data['statistik'] = $this->M_Statistik->status_kk();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/status_kk', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function agama()
    {
        $q = $this->M_Statistik->agama();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['agama'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Agama';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Agama';
        $data['statistik'] = $this->M_Statistik->agama();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/agama', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function jenis_kelamin()
    {
        $q = $this->M_Statistik->jenis_kelamin();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['jenis_kelamin'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Jenis Kelamin';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Jenis kelamin';
        $data['statistik'] = $this->M_Statistik->jenis_kelamin();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/jenis_kelamin', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function status_kependudukan()
    {
        $q = $this->M_Statistik->status_kependudukan();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['status_kependudukan'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Status Kependudukan';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Status Kependudukan';
        $data['statistik'] = $this->M_Statistik->status_kependudukan();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/status_kependudukan', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function penolong_kelahiran()
    {
        $q = $this->M_Statistik->penolong_kelahiran();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['penolong_kelahiran'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Penolong Kelahiran';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Penolong Kelahiran';
        $data['statistik'] = $this->M_Statistik->penolong_kelahiran();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/penolong_kelahiran', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function pekerjaan()
    {
        $q = $this->M_Statistik->pekerjaan();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['pekerjaan'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Pekerjaan';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Pekerjaan';
        $data['statistik'] = $this->M_Statistik->pekerjaan();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/pekerjaan', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function status_wn()
    {
        $q = $this->M_Statistik->status_wn();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['status_wn'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Status Warga Nergara';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Status Warga Negara';
        $data['statistik'] = $this->M_Statistik->status_wn();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/status_wn', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function status_kawin()
    {
        $q = $this->M_Statistik->status_kawin();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['status_kawin'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Status Pernikahan';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Status Pernikahan';
        $data['statistik'] = $this->M_Statistik->status_kawin();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/status_kawin', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function golongan_darah()
    {
        $q = $this->M_Statistik->golongan_darah();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['golongan_darah'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Status Pernikahan';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Status Pernikahan';
        $data['statistik'] = $this->M_Statistik->golongan_darah();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/golongan_darah', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function daftar_darah($golongan_darah)
    {

        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['title'] = 'Daftar Golongan Darah';
        $data['darah'] = $this->M_Statistik->darah($golongan_darah)->result_array();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/darah', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function sakit()
    {
        $q = $this->M_Statistik->sakit();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['sakit'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Penyakit';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Penyakit';
        $data['statistik'] = $this->M_Statistik->sakit();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/sakit', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function cacat()
    {
        $q = $this->M_Statistik->cacat();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['cacat'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Jenis Kecacatan';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Jenis Kecacatan';
        $data['statistik'] = $this->M_Statistik->cacat();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/cacat', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function asuransi()
    {
        $q = $this->M_Statistik->asuransi();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['asuransi'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Jenis Asuransi';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Jenis Asuransi';
        $data['statistik'] = $this->M_Statistik->asuransi();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/asuransi', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function rentang_umur()
    {

        $q = $this->M_Statistik->rentang_umur();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['rentang'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Rentang umur';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Kependudukan';
        $data['title2'] = 'Statistik Menurut Jenis Asuransi';
        $data['statistik'] = $this->M_Statistik->rentang_umur();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/nav', $data);
        $this->load->view('belakang/statistik/rentang_umur', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function pendapatan()
    {

        $q = $this->M_Statistik->pendapatan();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['pendapatan'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut kelompok Pendapatan';
        }
        $data['chart_data'] = json_encode($data);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Statistik Menurut kelompok Pendapatan';
        $data['title2'] = 'Statistik Menurut kelompok Pendapatan';
        $data['statistik'] = $this->M_Statistik->pendapatan();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);

        $this->load->view('belakang/statistik/pendapatan', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function kelompokrentan()
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['penduduk'] = $this->M_Statistik->rentan();
        $data['title'] = 'Kelompok Rentan';
        $data['title2'] = 'Kelompok Rentan';
        $data['judul'] = 'DAFTAR PENDUDUK RENTAN (UMUR >50 TAHUN)';
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/rentan', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function detailrentan($id_penduduk)
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['penduduk'] = $this->M_Statistik->getrentan($id_penduduk)->result_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['title'] = 'Kelompok Rentan';
        $data['title2'] = 'Kelompok Rentan';
        $data['judul'] = 'DAFTAR PENDUDUK RENTAN (UMUR >50 TAHUN)';
        $data['berkas'] =
            $this->db->get_where('berkas_penduduk', array('id_penduduk' => $id_penduduk))->result_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/statistik/detailrentan', $data);
        $this->load->view('belakang/template/footer', $data);
    }
}