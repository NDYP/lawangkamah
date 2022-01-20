<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdown_asuransi extends CI_Controller
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
        $data['asuransi'] = $this->M_Dropdown->asuransi();
        //var_dump($data['kelompok']);
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/asuransi/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules('asuransi', 'asuransi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Master Dropdown';
            $data['asuransi'] = $this->M_Dropdown->asuransi();
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
            $this->load->view('belakang/asuransi/tambah', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $asuransi = $this->input->post('asuransi');
            $data = array(
                'asuransi' => $asuransi,
            );
            $this->M_Dropdown->tambahasuransi('penduduk_asuransi', $data);
            $this->session->set_flashdata('success', 'Berhasil Tambah Data');
            redirect('admin/Dropdown_asuransi/index', 'refresh');
        }
    }
    public function ubah()
    {
        $id_asuransi = $this->input->post('id_asuransi');
        $asuransi = $this->input->post('asuransi');
        $data = array(
            'asuransi' => $asuransi,
        );
        $this->M_Dropdown->updateasuransi('penduduk_asuransi', $data, array('id_asuransi' => $id_asuransi));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/Dropdown_asuransi/index', 'refresh');
    }

    public function hapus($id_asuransi)
    {
        $data =
            $this->db->get_where('penduduk_asuransi', array('id_asuransi' => $id_asuransi))->row_array();
        if ($data) {
            $this->M_Dropdown->hapusasuransi($id_asuransi);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/Dropdown_asuransi/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/Dropdown_asuransi/index', 'refresh');
        }
    }
}