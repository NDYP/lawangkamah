<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdown_status extends CI_Controller
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
        $data['title'] = 'Master Dropdown Status KK';
        $data['status_kk'] = $this->M_Dropdown->status_kk();
        //var_dump($data['kelompok']);
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/status_kk/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules('status_kk', 'status_kk', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Master Dropdown';
            $data['status_kk'] = $this->M_Dropdown->status_kk();
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
            $this->load->view('belakang/status_kk/tambah', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $status_kk = $this->input->post('status_kk');
            $data = array(
                'status_kk' => $status_kk,
            );
            $this->M_Dropdown->tambahstatus_kk('penduduk_status_kk', $data);
            $this->session->set_flashdata('success', 'Berhasil Tambah Data');
            redirect('admin/Dropdown_status/index', 'refresh');
        }
    }
    public function ubah()
    {
        $id_status_kk = $this->input->post('id_status_kk');
        $status_kk = $this->input->post('status_kk');
        $data = array(
            'status_kk' => $status_kk,
        );
        $this->M_Dropdown->updatestatus_kk('penduduk_status_kk', $data, array('id_status_kk' => $id_status_kk));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/Dropdown_status/index', 'refresh');
    }

    public function hapus($id_status_kk)
    {
        $data =
            $this->db->get_where('penduduk_status_kk', array('id_status_kk' => $id_status_kk))->row_array();
        if ($data) {
            $this->M_Dropdown->hapusstatus_kk($id_status_kk);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/Dropdown_status/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/Dropdown_status/index', 'refresh');
        }
    }
}