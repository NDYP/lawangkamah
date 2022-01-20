<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Penduduk');
        $this->load->model('M_Setting');
        $this->load->model('M_Profil');
        $this->load->model('M_Komentar');
        $this->load->model('M_Cetak');
        //$this->load->model('M_Administrasi');

        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }
    function index()
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['title'] = 'Administrasi Desa';
        $data['pengajuan'] = $this->M_Cetak->index()->result_array();
        $this->load->view('depan/administrasi/header', $data);
        $this->load->view('depan/administrasi/sidebar', $data);
        $this->load->view('depan/administrasi/index', $data);
        $this->load->view('depan/administrasi/footer', $data);
    }
    public function ktpsementara()
    {
        $tanggal = $this->input->post('tanggal');
        $x = date('Y-m-d', strtotime($tanggal));
        $data = array(
            'tanggal' => $x,
            'status' => 'Pengajuan',
            'opsi' => 'KTP Sementara',
            'id_penduduk' => $this->session->userdata('id_penduduk'),
        );
        $this->M_Penduduk->tambah('pengajuan', $data);
        $this->session->set_flashdata('success', 'Berhasil Tambah Data');
        redirect('administrasi/index', 'refresh');
    }
    public function domisili()
    {
        $tanggal = $this->input->post('tanggal');
        $x = date('Y-m-d', strtotime($tanggal));
        $data = array(
            'tanggal' => $x,
            'status' => 'Pengajuan',
            'opsi' => 'Keterangan Domisili',
            'id_penduduk' => $this->session->userdata('id_penduduk'),
        );
        $this->M_Penduduk->tambah('pengajuan', $data);
        $this->session->set_flashdata('success', 'Berhasil Tambah Data');
        redirect('administrasi/index', 'refresh');
    }
    public function spt()
    {
        $tanggal = $this->input->post('tanggal');
        $x = date('Y-m-d', strtotime($tanggal));
        $data = array(
            'tanggal' => $x,
            'status' => 'Pengajuan',
            'opsi' => 'SP Tanah',
            'id_penduduk' => $this->session->userdata('id_penduduk'),
        );
        $this->M_Penduduk->tambah('pengajuan', $data);
        $this->session->set_flashdata('success', 'Berhasil Tambah Data');
        redirect('administrasi/index', 'refresh');
    }
    public function keramaian()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tempat', 'tempat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['title'] = 'Administrasi Desa';
            $data['profil'] = $this->M_Profil->index();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

            $this->load->view('depan/administrasi/header', $data);
            $this->load->view('depan/administrasi/sidebar', $data);
            $this->load->view('depan/administrasi/index', $data);
            $this->load->view('depan/administrasi/footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $tempat = $this->input->post('tempat');
            $tanggal = $this->input->post('tanggal');
            $x = date('Y-m-d', strtotime($tanggal));

            $data = array(
                'nama' => $nama,
                'tanggal' => $x,
                'tempat' => $tempat,
                'status' => 'Pengajuan',
                'opsi' => 'Izin Keramaian',
                'id_penduduk' => $this->session->userdata('id_penduduk'),
            );
            $this->M_Penduduk->tambah('pengajuan', $data);
            $this->session->set_flashdata('success', 'Berhasil Tambah Data');
            redirect('administrasi/index', 'refresh');
        }
    }
    public function npwp()
    {
        $this->form_validation->set_rules('npwp', 'npwp', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['title'] = 'Administrasi Desa';
            $data['profil'] = $this->M_Profil->index();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

            $this->load->view('depan/administrasi/header', $data);
            $this->load->view('depan/administrasi/sidebar', $data);
            $this->load->view('depan/administrasi/index', $data);
            $this->load->view('depan/administrasi/footer', $data);
        } else {
            $npwp = $this->input->post('npwp');
            $tanggal = $this->input->post('tanggal');
            $x = date('Y-m-d', strtotime($tanggal));
            $data = array(
                'npwp' => $npwp,
                'tanggal' => $x,
                'status' => 'Pengajuan',
                'opsi' => 'Kehilangan NPWP',
                'id_penduduk' => $this->session->userdata('id_penduduk'),
            );
            $this->M_Penduduk->tambah('pengajuan', $data);
            $this->session->set_flashdata('success', 'Berhasil Tambah Data');
            redirect('administrasi/index', 'refresh');
        }
    }
    public function penghasilan()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',

        ]);
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tempat', 'tempat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('fakultas', 'fakultas', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('universitas', 'universitas', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['title'] = 'Administrasi Desa';
            $data['profil'] = $this->M_Profil->index();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

            $this->load->view('depan/administrasi/header', $data);
            $this->load->view('depan/administrasi/sidebar', $data);
            $this->load->view('depan/administrasi/index', $data);
            $this->load->view('depan/administrasi/footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $tempat = $this->input->post('tempat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jurusan = $this->input->post('jurusan');
            $fakultas = $this->input->post('fakultas');
            $universitas = $this->input->post('universitas');
            $tanggal = $this->input->post('tanggal');
            $x = date('Y-m-d', strtotime($tanggal));

            $data = array(
                'nama' => $nama,
                'tempat' => $tempat,
                'jenis_kelamin' => $jenis_kelamin,
                'jurusan' => $jurusan,
                'fakultas' => $fakultas,
                'universitas' => $universitas,
                'tanggal' => $x,
                'status' => 'Pengajuan',
                'opsi' => 'Penghasilan',
                'id_penduduk' => $this->session->userdata('id_penduduk'),
            );
            $this->M_Penduduk->tambah('pengajuan', $data);
            $this->session->set_flashdata('success', 'Berhasil Tambah Data');
            redirect('administrasi/index', 'refresh');
        }
    }
    public function usaha()
    {
        $this->form_validation->set_rules('nama_usaha', 'nama_usaha', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',

        ]);
        $this->form_validation->set_rules('jenis_usaha', 'jenis_usaha', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['title'] = 'Administrasi Desa';
            $data['profil'] = $this->M_Profil->index();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

            $this->load->view('depan/administrasi/header', $data);
            $this->load->view('depan/administrasi/sidebar', $data);
            $this->load->view('depan/administrasi/index', $data);
            $this->load->view('depan/administrasi/footer', $data);
        } else {
            $nama_usaha = $this->input->post('nama_usaha');
            $jenis_usaha = $this->input->post('jenis_usaha');
            $tanggal = $this->input->post('tanggal');
            $x = date('Y-m-d', strtotime($tanggal));

            $data = array(
                'nama_usaha' => $nama_usaha,
                'jenis_usaha' => $jenis_usaha,
                'tanggal' => $x,
                'status' => 'Pengajuan',
                'opsi' => 'Izin Usaha',
                'id_penduduk' => $this->session->userdata('id_penduduk'),
            );
            $this->M_Penduduk->tambah('pengajuan', $data);
            $this->session->set_flashdata('success', 'Berhasil Tambah Data');
            redirect('administrasi/index', 'refresh');
        }
    }
}