<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Baner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Baner');
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
        $data['title'] = 'Kelola Baner Pengunjung';
        $data['baner'] = $this->M_Baner->index();
        $data['galeri'] = $this->M_Baner->indexgaleri();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/baner/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function ubah()
    {
        $config['upload_path'] = './assets/foto/baner/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('id_baner'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['foto_baner']['name'])) {
            if ($this->upload->do_upload('foto_baner')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/baner/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/baner/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];
                $x = $this->input->post('foto_baner');
                $id_baner = $this->input->post('id_baner');
                unlink("./assets/foto/baner/" . $x);
                $data = array(
                    'foto_baner' => $file,
                );
                $this->M_Baner->update('baner', $data, array('id_baner' => $id_baner));
                $this->session->set_flashdata('success', 'Berhasil Ubah Data');
                redirect('admin/baner/index', 'refresh');
            } else {
                $this->session->set_flashdata('success', 'Gagal Tambah Data');
                redirect('admin/baner/index', 'refresh');
            }
        } else {
            $this->session->set_flashdata('info', 'Pilih Foto');
            redirect('admin/baner/index', 'refresh');
        }
    }
    public function tambah()
    {
        $config['upload_path'] = './assets/foto/baner/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('id_baner'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['foto_baner']['name'])) {
            if ($this->upload->do_upload('foto_baner')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/baner/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/baner/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];
                date_default_timezone_set("ASIA/JAKARTA");
                $data = array(
                    'foto_baner' => $file,
                    'status' => 'Nonaktif',
                );
                $this->M_Baner->tambah('baner', $data);
                $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                redirect('admin/baner/index', 'refresh');
            } else {
                $this->session->set_flashdata('success', 'Gagal Tambah Data');
                redirect('admin/baner/index', 'refresh');
            }
        } else {
            $this->session->set_flashdata('info', 'Pilih File');
            $data['title'] = 'Tambah Baner baru';
            $data['galeri'] = $this->M_Baner->indexgaleri();
            $data['profil'] = $this->M_Profil->index();
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

            $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
            $data['pengajuan_header'] = $this->load->view('belakang/template/header', $data);
            $this->load->view('belakang/template/sidebar', $data);
            $this->load->view('belakang/baner/tambah', $data);
            $this->load->view('belakang/template/footer', $data);
        }
    }
    function aktif($id_baner)
    {
        $data = array(
            'status' => 'Aktif',
        );
        $this->M_Baner->update('baner', $data, array('id_baner' => $id_baner));
        $this->session->set_flashdata('success', 'User Aktif');
        redirect('admin/baner/index', 'refresh');
    }
    function nonaktif($id_baner)
    {
        $data = array(
            'status' => 'Nonaktif',
        );
        $this->M_Baner->update('baner', $data, array('id_baner' => $id_baner));
        $this->session->set_flashdata('success', 'User Nonaktif');
        redirect('admin/baner/index', 'refresh');
    }
    public function hapus($id_baner)
    {
        $data =
            $this->db->get_where('baner', array('id_baner' => $id_baner))->row_array();
        if ($data) {
            $this->M_Baner->hapus($id_baner);
            unlink("./assets/foto/baner/" . $data['foto_baner']);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/baner/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/baner/index', 'refresh');
        }
    }
}
