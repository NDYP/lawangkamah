<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Komentar');
        $this->load->model('M_Setting');
        $this->load->model('M_Profil');
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
        $data['title'] = 'Kelola Komentar';
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/komentar/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function aktif($id_komentar)
    {
        $data = array(
            'status' => 'Aktif',
        );
        $this->M_Komentar->update('komentar', $data, array('id_komentar' => $id_komentar));
        $this->session->set_flashdata('success', 'Komentar Unread');
        redirect('admin/komentar/index', 'refresh');
    }
    function nonaktif($id_komentar)
    {
        $data = array(
            'status' => 'Nonaktif',
        );
        $this->M_Komentar->update('komentar', $data, array('id_komentar' => $id_komentar));
        $this->session->set_flashdata('success', 'Komentar Read');
        redirect('admin/komentar/index', 'refresh');
    }
    public function hapus($id_komentar)
    {
        $data =
            $this->db->get_where('komentar', array('id_komentar' => $id_komentar))->row_array();
        if ($data) {
            $this->M_Komentar->hapus($id_komentar);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/komentar/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/komentar/index', 'refresh');
        }
    }
}
