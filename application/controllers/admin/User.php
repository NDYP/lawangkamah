<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Setting');
        $this->load->model('M_Pejabat_Desa');
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
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['title'] = 'Kelola User';
        $data['user'] = $this->M_User->index();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/user/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }

    public function ubah()
    {
        $config['upload_path'] = './assets/foto/user/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('id_user'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/user/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/user/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];
                date_default_timezone_set("ASIA/JAKARTA");
                $date = date('d-m-Y');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $id_pejabat = $this->input->post('id_pejabat');
                $id_user = $this->input->post('id_user');

                $data = array(
                    'foto' => $file,
                    'username' => $username,
                    'password' => $password,
                    'id_pejabat' => $id_pejabat,
                    'tanggal_daftar' => $date,
                );

                $this->M_User->update('user', $data, array('id_user' => $id_user));
                $this->session->set_flashdata('success', 'Berhasil Ubah Data');
                redirect('admin/user/index', 'refresh');
            } else {
                $this->session->set_flashdata('success', 'Gagal Tambah Data');
                redirect('admin/user/index', 'refresh');
            }
        } else {
            $username = $this->input->post('username');
            $id_user = $this->input->post('id_user');
            $password = $this->input->post('password');
            $data = array(
                'username' => $username,
                'password' => $password,
            );
            $this->M_User->update('user', $data, array('id_user' => $id_user));
            $this->session->set_flashdata('success', 'Berhasil Ubah Data');
            redirect('admin/user/index', 'refresh');
        }
    }
    function edit($id_user)
    {
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['profil'] = $this->M_Profil->index();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['title'] = 'Detail User';
        $data['user'] = $this->M_User->get($id_user);
        $data['pejabat'] = $this->M_Pejabat_Desa->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/user/edit', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function aktif($id_user)
    {
        $data = array(
            'status' => 'Aktif',
        );
        $this->M_User->update('user', $data, array('id_user' => $id_user));
        $this->session->set_flashdata('success', 'User Aktif');
        redirect('admin/user/index', 'refresh');
    }
    function nonaktif($id_user)
    {
        $data = array(
            'status' => 'Nonaktif',
        );
        $this->M_User->update('user', $data, array('id_user' => $id_user));
        $this->session->set_flashdata('success', 'User Nonaktif');
        redirect('admin/user/index', 'refresh');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'Username sudah digunakan'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'User Baru';
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
            $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
            $data['pengajuan_header'] =
                $this->M_Cetak->get()->result_array();

            $data['pejabat'] = $this->M_Pejabat_Desa->index();
            $data['profil'] = $this->M_Profil->index();
            $this->load->view('belakang/template/header', $data);
            $this->load->view('belakang/template/sidebar', $data);
            $this->load->view('belakang/user/tambah', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/user/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
            $config['file_name'] = $this->input->post('id_user'); //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/user/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $config['new_image'] = './assets/foto/user/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];
                    date_default_timezone_set("ASIA/JAKARTA");
                    $date = date('d-m-Y');
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $id_pejabat = $this->input->post('id_pejabat');
                    $data = array(
                        'foto' => $file,
                        'username' => $username,
                        'password' => $password,
                        'id_pejabat' => $id_pejabat,
                        'tanggal_daftar' => $date,
                        'status' => 'Aktif',
                    );
                    $this->M_User->tambah('user', $data);
                    $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                    redirect('admin/user/index', 'refresh');
                } else {
                    $this->session->set_flashdata('success', 'Gagal Tambah Data');
                    redirect('admin/user/index', 'refresh');
                }
            } else {
                date_default_timezone_set("ASIA/JAKARTA");
                $date = date('d-m-Y');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $id_pejabat = $this->input->post('id_pejabat');
                $data = array(
                    'username' => $username,
                    'password' => $password,
                    'id_pejabat' => $id_pejabat,
                    'tanggal_daftar' => $date,
                    'status' => 'Aktif',
                );
                $this->M_User->tambah('user', $data);
                $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                redirect('admin/user/index', 'refresh');
            }
        }
    }

    public function hapus($id_user)
    {
        $data =
            $this->db->get_where('user', array('id_user' => $id_user))->row_array();
        if ($data['foto']) {
            unlink("./assets/foto/user/" . $data['foto']);
        }
        if ($data) {
            $this->M_User->hapus($id_user);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/user/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/user/index', 'refresh');
        }
    }
}
