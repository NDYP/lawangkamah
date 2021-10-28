<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Akun');
        $this->load->model('M_Komentar');
        $this->load->model('M_Setting');
        $this->load->model('M_Profil');
        $this->load->model('M_Cetak');
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

        $data['title'] = 'Kelola Akun';
        $data['akun'] = $this->M_Akun->penduduk();
        $this->load->view('depan/administrasi/header', $data);
        $this->load->view('depan/administrasi/sidebar', $data);
        $this->load->view('depan/akun/index', $data);
        $this->load->view('depan/administrasi/footer', $data);
    }
    public function ubah()
    {
        $config['upload_path'] = './assets/foto/penduduk/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('id_penduduk'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/penduduk/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/penduduk/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];

                $id_penduduk = $this->input->post('id_penduduk');
                $nik_penduduk = $this->input->post('nik_penduduk');
                $tanggal_lahir = $this->input->post('tanggal_lahir');

                $data = array(
                    'foto' => $file,
                    'username' => $nik_penduduk,
                    'password' => $tanggal_lahir,
                );
                $this->M_Akun->update('penduduk', $data, array('id_penduduk' => $id_penduduk));
                $this->session->set_flashdata('success', 'Berhasil Ubah Data');
                redirect('akun/index', 'refresh');
            } else {
                $this->session->set_flashdata('info', 'Gagal Ubah Data');
                redirect('akun/index', 'refresh');
            }
        } else {
            $id_penduduk = $this->input->post('id_penduduk');
            $nik_penduduk = $this->input->post('nik_penduduk');
            $tanggal_lahir = $this->input->post('tanggal_lahir');

            $data = array(
                'username' => $nik_penduduk,
                'password' => $tanggal_lahir,
            );
            $this->M_Akun->update('penduduk', $data, array('id_penduduk' => $id_penduduk));
            $this->session->set_flashdata('success', 'Berhasil Ubah Data');
            redirect('akun/index', 'refresh');
        }
    }
}
