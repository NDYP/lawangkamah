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
        $this->load->model('M_User');
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


        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();


        $data['title'] = 'Administrasi Desa';
        $data['pengajuan'] = $this->M_Cetak->index()->result_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/administrasi/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function accept($id_pengajuan)
    {
        $data = array(
            'status' => 'Diterima',
        );
        $this->M_User->update('pengajuan', $data, array('id_pengajuan' => $id_pengajuan));
        $this->session->set_flashdata('success', 'Pengajuan Diterima');
        redirect('admin/administrasi/index', 'refresh');
    }
    function proses($id_pengajuan)
    {
        $data = array(
            'status' => 'Proses',
        );
        $this->M_User->update('pengajuan', $data, array('id_pengajuan' => $id_pengajuan));
        $this->session->set_flashdata('success', 'Pengajuan Diproses');
        redirect('admin/administrasi/index', 'refresh');
    }
    function decline($id_pengajuan)
    {
        $data = array(
            'status' => 'Ditolak',
        );
        $this->M_User->update('pengajuan', $data, array('id_pengajuan' => $id_pengajuan));
        $this->session->set_flashdata('success', 'Pengajuan Ditolak');
        redirect('admin/administrasi/index', 'refresh');
    }
}