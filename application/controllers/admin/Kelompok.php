<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Penduduk');
        $this->load->model('M_Kelompok');
        $this->load->model('M_Setting');
        $this->load->model('M_Profil');
        $this->load->model('M_Komentar');
        $this->load->model('M_Cetak');
        $this->load->model('M_Statistik');
        login();
        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }
    //function index()
    //{
    // $data['profil'] = $this->M_Profil->index();
    // $data['setting'] = $this->M_Setting->index()->row_array();
    //$data['komentar'] = $this->M_Komentar->index()->result_array();
    //$data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
    //$data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
    //$data['title'] = 'Kelompok Desa';
    //$data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
    //$data['pengajuan_header'] =
    //   $this->M_Cetak->get()->result_array();
    //$data['penduduk'] = $this->M_Penduduk->index();
    //$data['kelompok'] = $this->M_Kelompok->index();
    //$data['kategori'] = $this->M_Kelompok->kategori();
    //$data['jabatan'] = $this->M_Kelompok->jabatan();
    //$this->load->view('belakang/template/header', $data);
    //$this->load->view('belakang/template/sidebar', $data);
    //$this->load->view('belakang/kelompok/index', $data);
    //$this->load->view('belakang/template/footer', $data);
    //}
    public function index()
    {
        $q = $this->M_Statistik->pendidikankk();
        $data = [];
        foreach ($q as $x) {
            $data['label'][] = $x['pendidikan_kk'];
            $data['data'][] = $x['jumlah'];
            $data['title'] = 'Chart Menurut Pendidikan Dalam KK';
        }
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['chart_data'] = json_encode($data);
        $data['title'] = 'Kelompok Desa';
        $data['title2'] = 'Statistik Menurut Pendidikan Dalam KK';
        $data['statistik'] = $this->M_Statistik->pendidikankk();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);

        $this->load->view('belakang/kelompok/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }

    public function ubah()
    {
        $id_kelompok = $this->input->post('id_kelompok');
        $kode_kelompok = $this->input->post('kode_kelompok');
        $nama_kelompok = $this->input->post('nama_kelompok');
        $kategori = $this->input->post('kategori');
        $deskripsi = $this->input->post('deskripsi');
        $data = array(
            'kode_kelompok' => $kode_kelompok,
            'nama_kelompok' => $nama_kelompok,
            'kategori' => $kategori,
            'deskripsi' => $deskripsi,
        );
        $this->M_Kelompok->update('kelompok', $data, array('id_kelompok' => $id_kelompok));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/kelompok/index', 'refresh');
    }
    function detail($id_kelompok)
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['title'] = 'Kelompok Desa';
        $data['anggota'] = $this->M_Kelompok->anggota($id_kelompok);
        $data['kelompok'] = $this->M_Kelompok->get($id_kelompok);
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/kelompok/detail', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function tambah()
    {
        $kode_kelompok = $this->input->post('kode_kelompok');
        $nama_kelompok = $this->input->post('nama_kelompok');
        $kategori = $this->input->post('kategori');
        $deskripsi = $this->input->post('deskripsi');
        $data = array(
            'kode_kelompok' => $kode_kelompok,
            'nama_kelompok' => $nama_kelompok,
            'kategori' => $kategori,
            'deskripsi' => $deskripsi,
        );
        $this->M_Kelompok->tambah('kelompok', $data);
        $this->session->set_flashdata('success', 'Berhasil Tambah Data');
        redirect('admin/kelompok/index', 'refresh');
    }
    public function tambahanggota()
    {
        $id_kelompok = $this->input->post('id_kelompok');
        $id_anggota = $this->input->post('id_anggota');
        $id_jabatan = $this->input->post('id_jabatan');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'id_kelompok' => $id_kelompok,
            'id_anggota' => $id_anggota,
            'id_jabatan' => $id_jabatan,
            'keterangan' => $keterangan,
        );
        $this->M_Kelompok->tambah('kelompok_anggota', $data);
        $this->session->set_flashdata('success', 'Berhasil Tambah Data');
        redirect('admin/kelompok/index', 'refresh');
    }
    public function hapus($id_kelompok)
    {
        $data =
            $this->db->get_where('kelompok', array('id_kelompok' => $id_kelompok))->row_array();
        if ($data) {
            $this->M_Kelompok->hapus($id_kelompok);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/kelompok/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/kelompok/index', 'refresh');
        }
    }
    public function hapusanggota($id_kelompok_anggota)
    {
        $data =
            $this->db->get_where('kelompok_anggota', array('id_kelompok_anggota' => $id_kelompok_anggota))->row_array();
        if ($data) {
            $this->M_Kelompok->hapusanggota($id_kelompok_anggota);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/kelompok/index', 'refresh');
        }
    }
    public function cetak($id_kelompok)
    {
        $data['title'] = "Cetak Biodata Kelompok";
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['title'] = 'Kelompok Desa';
        $data['title'] = 'Kelompok Desa';
        $data['kades'] = $this->M_Profil->index();
        $data['anggota'] = $this->M_Kelompok->anggota($id_kelompok);
        $data['kelompok'] = $this->M_Kelompok->get($id_kelompok);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Kelompok.pdf";
        $this->pdf->load_view('belakang/kelompok/cetak', $data);
    }
}
