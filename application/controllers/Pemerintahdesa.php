<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemerintahdesa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Setting');
        $this->load->model('M_Baner');
        $this->load->model('M_Tentang');
        $this->load->model('M_Pejabat_Desa');
        $this->load->model('M_Profil');
        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }
    function index()
    {
        $data['profil'] = $this->M_Profil->index();
        $data['pejabat'] = $this->M_Pejabat_Desa->index();
        $data['title'] = 'Pemerintah Desa';
        $data['tentang'] = $this->M_Tentang->index();
        $data['baner'] = $this->M_Baner->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $this->load->view('depan/template/header', $data);
        $this->load->view('depan/pemerintah/index', $data);
        $this->load->view('depan/template/footer', $data);
    }
}
