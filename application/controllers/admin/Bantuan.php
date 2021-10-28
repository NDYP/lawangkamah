<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bantuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Penduduk');
        $this->load->model('M_Keluarga');
        $this->load->model('M_Kelompok');
        $this->load->model('M_Bantuan');
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
        $data['title'] = 'Bantuan Desa';
        $data['keluarga'] = $this->M_Keluarga->index();
        $data['kelompok'] = $this->M_Kelompok->anggotakelompok();
        $data['penduduk'] = $this->M_Penduduk->index();
        $data['bantuan'] = $this->M_Bantuan->index();
        //var_dump($data['kelompok']);
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/bantuan/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_bantuan', 'nama_bantuan', 'required|trim', [
            'required' => 'Nama Bantuan Tidak Boleh Kosong!',

        ]);
        $this->form_validation->set_rules('asal_dana', 'asal_dana', 'required|trim', [
            'required' => 'Asal Dana Tidak Boleh Kosong!',

        ]);
        $this->form_validation->set_rules('sasaran', 'sasaran', 'required|trim', [
            'required' => 'Sasaran Tidak Boleh Kosong!',

        ]);
        $this->form_validation->set_rules('status', 'status', 'required|trim', [
            'required' => 'Status Tidak Boleh Kosong!',

        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Bantuan Desa';
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
            $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
            $data['pengajuan_header'] =
                $this->M_Cetak->get()->result_array();
            $data['penduduk'] = $this->M_Penduduk->index();
            $data['bantuan'] = $this->M_Bantuan->index();
            $data['profil'] = $this->M_Profil->index();
            $this->load->view('belakang/template/header', $data);
            $this->load->view('belakang/template/sidebar', $data);
            $this->load->view('belakang/bantuan/tambah', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $sasaran = $this->input->post('sasaran');
            $nama_bantuan = $this->input->post('nama_bantuan');
            $asal_dana = $this->input->post('asal_dana');
            $keterangan = $this->input->post('keterangan');
            $status = $this->input->post('status');
            $data = array(
                'sasaran' => $sasaran,
                'nama_bantuan' => $nama_bantuan,
                'asal_dana' => $asal_dana,
                'keterangan' => $keterangan,
                'status' => $status,
            );
            $this->M_Bantuan->tambah('bantuan', $data);
            $this->session->set_flashdata('success', 'Berhasil Tambah Data');
            redirect('admin/bantuan/index', 'refresh');
        }
    }
    function edit($id_bantuan)
    {
        $data['profil'] = $this->M_Profil->index();
        $data['title'] = 'Bantuan Desa';
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['bantuan'] = $this->db->get_where('bantuan', array('id_bantuan' => $id_bantuan))->row_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/bantuan/edit', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function ubah()
    {
        $id_bantuan = $this->input->post('id_bantuan');
        $sasaran = $this->input->post('sasaran');
        $nama_bantuan = $this->input->post('nama_bantuan');
        $asal_dana = $this->input->post('asal_dana');
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status');
        $data = array(
            'sasaran' => $sasaran,
            'nama_bantuan' => $nama_bantuan,
            'asal_dana' => $asal_dana,
            'keterangan' => $keterangan,
            'status' => $status,
        );
        $this->M_Bantuan->update('bantuan', $data, array('id_bantuan' => $id_bantuan));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/bantuan/index', 'refresh');
    }
    function detail($id_bantuan)
    {
        $data['profil'] = $this->M_Profil->index();
        $data['title'] = 'Bantuan Desa';
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['anggota'] = $this->M_Bantuan->anggota($id_bantuan);
        $data['bantuan'] = $this->db->get_where('bantuan', array('id_bantuan' => $id_bantuan))->row_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/bantuan/detail', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function tambahanggota()
    {
        $id_bantuan = $this->input->post('id_bantuan');
        $id_penerima = $this->input->post('id_penerima');
        $data = array(
            'id_bantuan' => $id_bantuan,
            'id_penerima' => $id_penerima,
        );
        $this->M_Bantuan->tambah('bantuan_penerima', $data);
        $this->session->set_flashdata('success', 'Berhasil Tambah Data');
        redirect('admin/bantuan/index', 'refresh');
    }
    public function hapus($id_bantuan)
    {
        $data =
            $this->db->get_where('bantuan', array('id_bantuan' => $id_bantuan))->row_array();
        if ($data) {
            $this->M_Bantuan->hapus($id_bantuan);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/bantuan/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/bantuan/index', 'refresh');
        }
    }
    public function hapusanggota($id_bantuan_penerima)
    {
        $data =
            $this->db->get_where('bantuan_penerima', array('id_bantuan_penerima' => $id_bantuan_penerima))->row_array();
        if ($data) {
            $this->M_Bantuan->hapusanggota($id_bantuan_penerima);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/bantuan/index', 'refresh');
        }
    }
    public function cetak($id_bantuan)
    {
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['title'] = 'Bantuan Desa';
        $data['anggota'] = $this->M_Bantuan->anggota($id_bantuan);
        $data['kelompok'] =
            $this->M_Bantuan->anggota($id_bantuan);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Kelompok.pdf";
        $this->pdf->load_view('belakang/bantuan/cetak', $data);
    }
}
