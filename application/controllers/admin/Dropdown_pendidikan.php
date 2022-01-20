<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdown_pendidikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Dropdown');
        $this->load->model('M_Setting');
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
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['title'] = 'Master Dropdown pendidikan';
        $data['pendidikan'] = $this->M_Dropdown->pendidikan();
        //var_dump($data['kelompok']);
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/pendidikan/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Master Dropdown';
            $data['pendidikan'] = $this->M_Dropdown->pendidikan();
            $data['profil'] = $this->M_Profil->index();
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
            $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
            $data['pengajuan_header'] =
                $this->M_Cetak->get()->result_array();
            $this->load->view('belakang/template/header', $data);
            $this->load->view('belakang/template/sidebar', $data);
            $this->load->view('belakang/pendidikan/tambah', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $pendidikan = $this->input->post('pendidikan');
            $data = array(
                'pendidikan' => $pendidikan,
            );
            $this->M_Dropdown->tambahpendidikan('penduduk_pendidikan', $data);
            $this->session->set_flashdata('success', 'Berhasil Tambah Data');
            redirect('admin/Dropdown_pendidikan/index', 'refresh');
        }
    }
    public function ubah()
    {
        $id_pendidikan = $this->input->post('id_pendidikan');
        $pendidikan = $this->input->post('pendidikan');
        $data = array(
            'pendidikan' => $pendidikan,
        );
        $this->M_Dropdown->updatependidikan('penduduk_pendidikan', $data, array('id_pendidikan' => $id_pendidikan));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/Dropdown_pendidikan/index', 'refresh');
    }

    public function hapus($id_pendidikan)
    {
        $data =
            $this->db->get_where('penduduk_pendidikan', array('id_pendidikan' => $id_pendidikan))->row_array();
        if ($data) {
            $this->M_Dropdown->hapuspendidikan($id_pendidikan);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/Dropdown_pendidikan/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/Dropdown_pendidikan/index', 'refresh');
        }
    }
}