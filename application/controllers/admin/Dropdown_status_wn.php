<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdown_status_wn extends CI_Controller
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
        $data['title'] = 'Master Dropdown Status WN';
        $data['status_wn'] = $this->M_Dropdown->status_wn();
        //var_dump($data['kelompok']);
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/status_wn/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules('warga_negara', 'warga_negara', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Master Dropdown';
            $data['status_wn'] = $this->M_Dropdown->status_wn();
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
            $this->load->view('belakang/status_wn/tambah', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $warga_negara = $this->input->post('warga_negara');
            $data = array(
                'warga_negara' => $warga_negara,
            );
            $this->M_Dropdown->tambahstatus_wn('penduduk_wn', $data);
            $this->session->set_flashdata('success', 'Berhasil Tambah Data');
            redirect('admin/Dropdown_status_wn/index', 'refresh');
        }
    }
    public function ubah()
    {
        $id_status_wn = $this->input->post('id_status_wn');
        $warga_negara = $this->input->post('status_wn');
        $data = array(
            'warga_negara' => $warga_negara,
        );
        $this->M_Dropdown->updatestatus_wn('penduduk_wn', $data, array('id_status_wn' => $id_status_wn));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/Dropdown_status_wn/index', 'refresh');
    }

    public function hapus($id_status_wn)
    {
        $data =
            $this->db->get_where('penduduk_wn', array('id_status_wn' => $id_status_wn))->row_array();
        if ($data) {
            $this->M_Dropdown->hapusstatus_wn($id_status_wn);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/Dropdown_status_wn/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/Dropdown_status_wn/index', 'refresh');
        }
    }
}