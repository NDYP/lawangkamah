<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Setting');
        $this->load->model('M_Komentar');
        $this->load->model('M_Profil');
        $this->load->model('M_Cetak');
        login();
        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }
    function logo()
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['title'] = 'Setting Logo Web';
        $data['index'] = $this->M_Setting->index()->result_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/setting/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function title()
    {
        $data['title'] = 'Setting Title Web';
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();


        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['index'] = $this->M_Setting->index()->result_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/setting/title', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function editlogologin($id_setting)
    {
        $data['title'] = 'Ubah Logo Login';
        $data['setting'] = $this->M_Setting->get($id_setting);
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/setting/logologin', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function ubahlogologin()
    {
        $config['upload_path'] = './assets/foto/setting/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('id_setting'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['logo_login']['name'])) {
            if ($this->upload->do_upload('logo_login')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/setting/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/setting/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];

                $id_setting = $this->input->post('id_setting');
                $data = array(
                    'logo_login' => $file,
                );
                $this->M_Setting->update('setting', $data, array('id_setting' => $id_setting));
                $this->session->set_flashdata('success', 'Berhasil Ubah Data');
                redirect('admin/setting/logo', 'refresh');
            } else {
                $this->session->set_flashdata('success', 'Gagal Tambah Data');
                redirect('admin/setting/logo', 'refresh');
            }
        } else {
            $this->session->set_flashdata('info', 'Pilih File');
            redirect('admin/setting/logo', 'refresh');
        }
    }
    function editlogoadmin($id_setting)
    {
        $data['title'] = 'Ubah Logo Admin';
        $data['setting'] = $this->M_Setting->get($id_setting);
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['profil'] = $this->M_Profil->index();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/setting/logoadmin', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function ubahlogoadmin()
    {
        $config['upload_path'] = './assets/foto/setting/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('id_setting'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['logo_admin']['name'])) {
            if ($this->upload->do_upload('logo_admin')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/setting/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/setting/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];

                $id_setting = $this->input->post('id_setting');
                $data = array(
                    'logo_admin' => $file,
                );
                $this->M_Setting->update('setting', $data, array('id_setting' => $id_setting));
                $this->session->set_flashdata('success', 'Berhasil Ubah Data');
                redirect('admin/setting/logo', 'refresh');
            } else {
                $this->session->set_flashdata('success', 'Gagal Tambah Data');
                redirect('admin/setting/logo', 'refresh');
            }
        } else {
            $this->session->set_flashdata('info', 'Pilih File');
            redirect('admin/setting/logo', 'refresh');
        }
    }
    function editlogopengunjung($id_setting)
    {
        $data['title'] = 'Ubah Logo Pengunjung';
        $data['setting'] = $this->M_Setting->get($id_setting);
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['profil'] = $this->M_Profil->index();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/setting/logopengunjung', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function ubahlogopengunjung()
    {
        $config['upload_path'] = './assets/foto/setting/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('id_setting'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['logo_pengunjung']['name'])) {
            if ($this->upload->do_upload('logo_pengunjung')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/setting/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/setting/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];

                $id_setting = $this->input->post('id_setting');
                $data = array(
                    'logo_pengunjung' => $file,
                );
                $this->M_Setting->update('setting', $data, array('id_setting' => $id_setting));
                $this->session->set_flashdata('success', 'Berhasil Ubah Data');
                redirect('admin/setting/logo', 'refresh');
            } else {
                $this->session->set_flashdata('success', 'Gagal Tambah Data');
                redirect('admin/setting/logo', 'refresh');
            }
        } else {
            $this->session->set_flashdata('info', 'Pilih File');
            redirect('admin/setting/logo', 'refresh');
        }
    }
    public function ubahtitle()
    {
        $title_admin = $this->input->post('title_admin');
        $title_pengunjung = $this->input->post('title_pengunjung');
        $id_setting = $this->input->post('id_setting');

        $data = array(
            'title_admin' => $title_admin,
            'title_pengunjung' => $title_pengunjung,
        );
        $this->M_Setting->update('setting', $data, array('id_setting' => $id_setting));
        $this->session->set_flashdata('success', 'Berhasil Ubah Data');
        redirect('admin/setting/title', 'refresh');
    }
}
