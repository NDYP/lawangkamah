<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdown_sakit extends CI_Controller
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
        $data['title'] = 'Master Dropdown Penyakit';
        $data['sakit'] = $this->M_Dropdown->sakit();
        //var_dump($data['kelompok']);
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/sakit/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules('sakit', 'sakit', 'required|trim', [
            'required' => 'Nama Penyakit Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['profil'] = $this->M_Profil->index();
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
            $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
            $data['pengajuan_header'] =
                $this->M_Cetak->get()->result_array();
            $data['title'] = 'Master Dropdown';
            $data['sakit'] = $this->M_Dropdown->sakit();
            $this->load->view('belakang/template/header', $data);
            $this->load->view('belakang/template/sidebar', $data);
            $this->load->view('belakang/sakit/tambah', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $sakit = $this->input->post('sakit');
            $data = array(
                'sakit' => $sakit,
            );
            $this->M_Dropdown->tambahsakit('penduduk_sakit', $data);
            $this->session->set_flashdata('success', 'Berhasil Tambah Data');
            redirect('admin/Dropdown_sakit/index', 'refresh');
        }
    }
    public function ubah()
    {
        $id_sakit = $this->input->post('id_sakit');
        $sakit = $this->input->post('sakit');
        $data = array(
            'sakit' => $sakit,
        );
        $this->M_Dropdown->updatesakit('penduduk_sakit', $data, array('id_sakit' => $id_sakit));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/Dropdown_sakit/index', 'refresh');
    }

    public function hapus($id_sakit)
    {
        $data =
            $this->db->get_where('penduduk_sakit', array('id_sakit' => $id_sakit))->row_array();
        if ($data) {
            $this->M_Dropdown->hapussakit($id_sakit);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/Dropdown_sakit/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/Dropdown_sakit/index', 'refresh');
        }
    }
}
