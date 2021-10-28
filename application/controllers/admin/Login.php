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
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Nama Pengguna Tidak Boleh Kosong!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Kata Sandi Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Page';
            $this->load->view('belakang/login', $data);
        } else {
            $this->auth();
        }
    }
    function auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek_dosen = $this->M_User->auth($username);
        if ($data = $cek_dosen->row_array()) {
            if (($password == $data['admin_password'])) {
                $all = [
                    'username' => $data['admin_username'],
                    'admin_password' => $data['admin_password'],
                    'nik' => $data['nik'],
                    'foto' => $data['foto'],
                    'tanggal_daftar' => $data['tanggal_daftar'],
                    'jabatan' => $data['jabatan'],
                    'id_user' => $data['id_user'],
                ];
                $this->session->set_userdata($all);
                redirect('admin/beranda/index', 'refresh');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                redirect('admin/login/index');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Tidak Terdaftar</div>');
            redirect('admin/login/index');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login/index', 'refresh');
    }
}
