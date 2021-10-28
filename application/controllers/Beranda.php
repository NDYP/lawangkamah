<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Setting');
        $this->load->model('M_Baner');
        $this->load->model('M_Tentang');
        $this->load->model('M_Profil');
        $this->load->model('M_Beranda');
        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }
    function index()
    {
        $browser = $this->agent->browser();
        $os = $this->agent->platform();
        $ip = $this->input->ip_address();
        date_default_timezone_set("ASIA/JAKARTA");
        $tanggal = date('Y-m-d');
        $data = [
            'tanggal' => $tanggal,
            'ip' => $ip,
            'os' => $os,
            'browser' => $browser,
            'online' => time()
        ];

        $query = $this->M_User->get($tanggal, $ip);
        if ($query == 0) {
            $this->M_User->tambah('pengunjung', $data);
        } else {
            $this->M_User->update('pengunjung', $data, array('ip' => $ip, 'tanggal' => $tanggal));
        }


        $data['profil'] = $this->M_Profil->index();
        $data['tentang'] = $this->M_Tentang->index();
        $data['baner'] = $this->M_Baner->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['title'] = 'Beranda';

        $this->load->view('depan/template/header', $data);
        $this->load->view('depan/beranda/index', $data);
        $this->load->view('depan/template/footer', $data);
    }
}
