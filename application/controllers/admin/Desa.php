<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Profil');
        $this->load->model('M_Setting');
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
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['title'] = 'Identitas Desa';
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/desa/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function edit()
    {
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['profil_get'] = $this->db->get_where('profil', $this->uri->segment(4))->row_array();
        $data['title'] = 'Identitas Desa';
        $data['profil'] = $this->M_Profil->index();
        $data['pejabat'] = $this->M_Profil->kades();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/desa/edit', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function ubah()
    {

        $id_desa = $this->input->post('id_desa');
        $nama_desa = $this->input->post('nama_desa');
        $kode_desa = $this->input->post('kode_desa');
        $id_kades = $this->input->post('id_kades');
        $kode_pos = $this->input->post('kode_pos');
        $nama_kecamatan = $this->input->post('nama_kecamatan');
        $kode_kecamatan = $this->input->post('kode_kecamatan');
        $nama_camat = $this->input->post('nama_camat');
        $nip_camat = $this->input->post('nip_camat');
        $nama_kabupaten = $this->input->post('nama_kabupaten');
        $kode_kabupaten = $this->input->post('kode_kabupaten');
        $nama_provinsi = $this->input->post('nama_provinsi');
        $kode_provinsi = $this->input->post('kode_provinsi');
        $alamat_kantor = $this->input->post('alamat_kantor');
        $telepon_desa = $this->input->post('telepon_desa');

        $data = array(
            'nama_desa' => $nama_desa,
            'kode_desa' => $kode_desa,
            'kode_pos' => $kode_pos,
            'nama_kecamatan' => $nama_kecamatan,
            'kode_kecamatan' => $kode_kecamatan,
            'nama_kabupaten' => $nama_kabupaten,
            'kode_kabupaten' => $kode_kabupaten,
            'nama_provinsi' => $nama_provinsi,
            'kode_provinsi' => $kode_provinsi,
            'alamat_kantor' => $alamat_kantor,
            'telepon_desa' => $telepon_desa,
            'nama_camat' => $nama_camat,
            'nip_camat' => $nip_camat,
            'id_kades' => $id_kades
        );
        $this->M_Profil->update('profil', $data, array('id_desa' => $id_desa));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/desa/index', 'refresh');
    }
}
