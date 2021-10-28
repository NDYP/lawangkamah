<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Tentang');
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
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['title'] = 'Visi & Misi Desa';
        $data['tentang'] = $this->M_Tentang->index();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/tentang/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function edit()
    {
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['tentang'] = $this->db->get_where('tentang', $this->uri->segment(4))->row_array();
        $data['title'] = 'Visi & Misi Desa';

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/tentang/edit', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function editvisi()
    {
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['tentang'] = $this->db->get_where('tentang', $this->uri->segment(4))->row_array();
        $data['title'] = 'Visi & Misi Desa';
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/tentang/visi', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function editmisi()
    {
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['tentang'] = $this->db->get_where('tentang', $this->uri->segment(4))->row_array();
        $data['title'] = 'Visi & Misi Desa';
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/tentang/misi', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function ubah()
    {
        $id_tentang = $this->input->post('id_tentang');
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');
        $profil_singkat = $this->input->post('profil_singkat');

        $data = array(
            'visi' => $visi,
            'misi' => $misi,
            'profil_singkat' => $profil_singkat,
        );
        $this->M_Tentang->update('tentang', $data, array('id_tentang' => $id_tentang));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/tentang/index', 'refresh');
    }
    public function visi()
    {
        $id_tentang = $this->input->post('id_tentang');
        $visi = $this->input->post('visi');


        $data = array(
            'visi' => $visi,
        );
        $this->M_Tentang->update('tentang', $data, array('id_tentang' => $id_tentang));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/tentang/index', 'refresh');
    }
    public function misi()
    {
        $id_tentang = $this->input->post('id_tentang');
        $misi = $this->input->post('misi');
        $data = array(
            'misi' => $misi,
        );
        $this->M_Tentang->update('tentang', $data, array('id_tentang' => $id_tentang));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/tentang/index', 'refresh');
    }
    function detail($id_tentang)
    {
        $data['setting'] = $this->M_Setting->index()->row_array();

        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['title'] = 'Visi & Misi Desa';
        $data['penduduk'] = $this->M_Tentang->index();
        $data['tentang'] = $this->M_Tentang->get($id_tentang);
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/tentang/detail', $data);
        $this->load->view('belakang/template/footer', $data);
    }
}
