<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Setting');
        $this->load->model('M_Album');
        $this->load->model('M_Profil');
        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }
    function index()
    {

        $data['profil'] = $this->M_Profil->index();
        $data['title'] = 'Kontak Layanan';
        $data['setting'] = $this->M_Setting->index()->row_array();
        $this->load->view('depan/template/header', $data);
        $this->load->view('depan/kontak/index', $data);
        $this->load->view('depan/template/footer', $data);
    }
    function komentar()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $isi = $this->input->post('isi');
        date_default_timezone_set("ASIA/JAKARTA");
        $date = date('d-m-Y');
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'isi' => $isi,
            'tanggal_upload' => $date,
        );
        $this->M_Artikel->tambah('komentar', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
