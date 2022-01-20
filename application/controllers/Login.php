<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Setting');
        $this->load->model('M_Profil');

        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }
    function index()
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $this->form_validation->set_rules('nik_penduduk', 'nik_penduduk', 'required|trim', [
            'required' => 'Nama Pengguna Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim', [
            'required' => 'Kata Sandi Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Page';
            $this->load->view('depan/login/login', $data);
        } else {
            $this->auth();
        }
    }
    function auth()
    {
        $username = $this->input->post('nik_penduduk');
        $x = $this->input->post('tanggal_lahir');
        //here
        $pass = date('Y-m-d', strtotime($x));

        $cek1 = $this->M_User->authfront($username);
        $cek2 = $this->M_User->authfront2($username);
        if ($data = $cek1->row_array()) {
            if (($pass == date('Y-m-d', strtotime($data['tanggal_lahir'])))) {
                $all = [
                    'id_penduduk' => $data['id_penduduk'],
                    'no_kk' => $data['no_kk'],
                    'nama_lengkap' => $data['nama_lengkap'],
                    'nik_penduduk' => $data['nik_penduduk'],
                    'foto_penduduk' => $data['foto_penduduk'],
                ];
                $this->session->set_userdata($all);
                redirect('administrasi/index', 'refresh');
            } elseif ($data = $cek2->row_array()) {
                $x = $this->input->post('tanggal_lahir');
                if (($x == $data['password'])) {
                    $all = [
                        'id_penduduk' => $data['id_penduduk'],
                        'no_kk' => $data['no_kk'],
                        'nama_lengkap' => $data['nama_lengkap'],
                        'nik_penduduk' => $data['nik_penduduk'],
                        'foto_penduduk' => $data['foto_penduduk'],
                    ];
                    $this->session->set_userdata($all);
                    redirect('administrasi/index', 'refresh');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('login/index');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                redirect('login/index');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Tidak Terdaftar</div>');
            redirect('login/index');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('beranda/index', 'refresh');
    }
}