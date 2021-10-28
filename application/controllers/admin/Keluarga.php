<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluarga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Penduduk');
        $this->load->model('M_Keluarga');
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
        $data['title'] = 'Keluarga';
        $data['penduduk'] = $this->M_Penduduk->index();
        $data['keluarga'] = $this->M_Keluarga->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/keluarga/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function edit($id_keluarga)
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['penduduk'] = $this->M_Penduduk->index();
        $data['title'] = 'Keluarga';
        $data['keluarga'] = $this->db->get_where('keluarga', array('id_keluarga' => $id_keluarga))->row_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/keluarga/edit', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function ubah()
    {
        $id_keluarga = $this->input->post('id_keluarga');
        $nomor_kk = $this->input->post('nomor_kk');
        $id_kepala_keluarga = $this->input->post('id_kepala_keluarga');
        $data = array(
            'nomor_kk' => $nomor_kk,
            'id_kepala_keluarga' => $id_kepala_keluarga,
        );

        $this->M_Keluarga->update('keluarga', $data, array('id_keluarga' => $id_keluarga));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/keluarga/index', 'refresh');
    }
    function detail($id_keluarga)
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['title'] = 'Detail keluarga';
        $data['keluarga'] = $this->M_Keluarga->get($id_keluarga);
        $data['berkas'] =
            $this->db->get_where('keluarga_anggota', array('id_keluarga' => $id_keluarga))->result_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/keluarga/detail', $data);
        $this->load->view('belakang/template/footer', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nomor_kk', 'nomor_kk', 'required|trim|is_unique[keluarga.nomor_kk]', [
            'required' => 'Nomor KK Tidak Boleh Kosong!',
            'is_unique' => 'Nomor KK Telah Terdaftar'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
            $data['title'] = 'Penduduk Desa';
            $data['penduduk'] = $this->M_Penduduk->index();
            $data['profil'] = $this->M_Profil->index();
            $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
            $data['pengajuan_header'] =
                $this->M_Cetak->get()->result_array();
            $this->load->view('belakang/template/header', $data);
            $this->load->view('belakang/template/sidebar', $data);
            $this->load->view('belakang/keluarga/tambah', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $nomor_kk = $this->input->post('nomor_kk');
            $id_kepala_keluarga = $this->input->post('id_kepala_keluarga');
            date_default_timezone_set("ASIA/JAKARTA");
            $date = date('d-m-Y');
            $data = array(
                'nomor_kk' => $nomor_kk,
                'id_kepala_keluarga' => $id_kepala_keluarga,
                'registrasi' => $date,
            );
            $this->M_Keluarga->tambah('keluarga', $data);
            $this->session->set_flashdata('success', 'Berhasil Tambah Data');
            redirect('admin/keluarga/index', 'refresh');
        }
    }
    public function hapus($id_keluarga)
    {
        $data =
            $this->db->get_where('keluarga', array('id_keluarga' => $id_keluarga))->row_array();
        if ($data) {

            $this->M_Keluarga->hapus($id_keluarga);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/keluarga/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/keluarga/index', 'refresh');
        }
    }


    function anggotakeluarga($no_kk)
    {
        $data['title'] = 'Rincian Keluarga';
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['penduduk'] = $this->M_Penduduk->index();
        $data['anggota'] = $this->M_Keluarga->get($no_kk);
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
        $this->M_Cetak->get()->result_array();
        //$data['anggota'] =
        //$this->M_Keluarga->anggota($no_kk);
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/keluarga/anggota', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function tambahkeluarga()
    {
        $data['setting'] = $this->M_Setting->index()->row_array();
        $id_kepala_keluarga = $this->input->post('id_kepala_keluarga');
        $id_anggota = $this->input->post('id_anggota');
        $data = array(
            'id_kepala_keluarga' => $id_kepala_keluarga,
            'id_anggota' => $id_anggota,
        );
        $this->M_Keluarga->tambah('keluarga_anggota', $data);
        $this->session->set_flashdata('success', 'Berhasil Tambah Data');
        redirect('admin/keluarga/index', 'refresh');
    }
    public function hapusanggota($id_keluarga_anggota)
    {
        $data =
            $this->db->get_where('keluarga_anggota', array('id_keluarga_anggota' => $id_keluarga_anggota))->row_array();
        if ($data) {
            $this->M_Keluarga->hapusanggota($id_keluarga_anggota);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('admin/keluarga/index', 'refresh');
        }
    }
    public function cetak($no_kk)
    {
        $data['title'] = 'Cetak Biodata Keluarga';
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['penduduk'] = $this->M_Penduduk->index();
        $data['keluarga'] = $this->M_Keluarga->get($no_kk);
        $data['no_kk'] = $this->db->get_where('penduduk', array('no_kk' => $no_kk))->row_array();
        $data['kk'] = $this->db->get_where('penduduk', array('id_status_kk' => '1', 'no_kk' => $no_kk))->row_array();
        $data['kades'] = $this->M_Profil->index();
        //$data['anggota'] =
        //$this->M_Keluarga->anggota($id_keluarga);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "KK.pdf";
        $this->pdf->load_view('belakang/keluarga/cetak', $data);
    }
    public function upload()
    {

        $config['upload_path'] = './assets/berkas/keluarga/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('id_keluarga'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['berkas']['name'])) {
            if ($this->upload->do_upload('berkas')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/berkas/keluarga/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/berkas/keluarga/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $id_keluarga = $this->input->post('id_keluarga');
                $judul = $this->input->post('judul');
                $file = $gbr['file_name'];
                $data = array(
                    'berkas' => $file,
                    'id_keluarga' => $id_keluarga,
                    'judul' => $judul

                );
                $this->M_Penduduk->tambah('berkas_penduduk', $data);
                $this->session->set_flashdata('success', 'Berhasil Upload Berkas');
                redirect('admin/keluarga/index', 'refresh');
            } else {

                $this->session->set_flashdata('info', 'Gagal Upload');
                redirect('admin/keluarga/index', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', 'Berkas Kosong');
            redirect('admin/keluarga/index', 'refresh');
        }
    }
}
