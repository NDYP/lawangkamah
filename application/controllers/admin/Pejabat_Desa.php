<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pejabat_Desa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pejabat_Desa');
        $this->load->model('M_Penduduk');
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
        $data['title'] = 'Pejabat/Pemerintah Desa';
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['pejabat'] = $this->M_Pejabat_Desa->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/pejabat/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function edit($id_pejabat)
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['penduduk'] = $this->M_Penduduk->index();
        $data['pejabat'] = $this->M_Pejabat_Desa->get($id_pejabat);
        $data['title'] = 'Pejabat Desa';
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/pejabat/edit', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function ubah()
    {

        $config['upload_path'] = './assets/foto/pejabat/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('nip_nipd'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['foto_pejabat']['name'])) {
            if ($this->upload->do_upload('foto_pejabat')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/pejabat/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/pejabat/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];

                $id_pejabat = $this->input->post('id_pejabat');
                $nik = $this->input->post('nik');
                $nip_nipd = $this->input->post('nip_nipd');

                $jabatan = $this->input->post('jabatan');
                $no_sk_pengangkatan = $this->input->post('no_sk_pengangkatan');
                $tgl_sk_pengangkatan = $this->input->post('tgl_sk_pengangkatan');
                $no_sk_pemberhentian = $this->input->post('no_sk_pemberhentian');

                $masa_jabatan = $this->input->post('masa_jabatan');
                $data = array(
                    'foto_pejabat' => $file,
                    'nik' => $nik,
                    'nip_nipd' => $nip_nipd,

                    'jabatan' => $jabatan,
                    'no_sk_pengangkatan' => $no_sk_pengangkatan,
                    'no_sk_pemberhentian' => $no_sk_pemberhentian,
                    'tgl_sk_pengangkatan' => $tgl_sk_pengangkatan,
                    'masa_jabatan' => $masa_jabatan,

                );
                $this->M_Penduduk->update('pejabat_desa', $data, array('id_pejabat' => $id_pejabat));
                $this->session->set_flashdata('success', 'Berhasil Ubah Data');
                redirect('admin/pejabat_desa/index', 'refresh');
            } else {
                $this->session->set_flashdata('info', 'Gagal Ubah Data');
                redirect('admin/penduduk/index', 'refresh');
            }
        } else {
            $id_pejabat = $this->input->post('id_pejabat');
            $nik = $this->input->post('nik');
            $nip_nipd = $this->input->post('nip_nipd');

            $jabatan = $this->input->post('jabatan');
            $no_sk_pengangkatan = $this->input->post('no_sk_pengangkatan');
            $tgl_sk_pengangkatan = $this->input->post('tgl_sk_pengangkatan');
            $no_sk_pemberhentian = $this->input->post('no_sk_pemberhentian');

            $masa_jabatan = $this->input->post('masa_jabatan');
            $data = array(
                'nik' => $nik,
                'nip_nipd' => $nip_nipd,

                'jabatan' => $jabatan,
                'no_sk_pengangkatan' => $no_sk_pengangkatan,
                'no_sk_pemberhentian' => $no_sk_pemberhentian,
                'tgl_sk_pengangkatan' => $tgl_sk_pengangkatan,
                'masa_jabatan' => $masa_jabatan,

            );
            $this->M_Penduduk->update('pejabat_desa', $data, array('id_pejabat' => $id_pejabat));
            $this->session->set_flashdata('success', 'Berhasil Ubah Data');
            redirect('admin/pejabat_desa/index', 'refresh');
        }
    }
    function detail($id_pejabat)
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['title'] = 'Pejabat/Pemerintah Desa';
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['penduduk'] = $this->M_Penduduk->index();
        $data['pejabat'] = $this->M_Pejabat_Desa->get($id_pejabat);
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/pejabat/detail', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim|callback_jabatan_check', [
            'required' => 'Jabatan Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_sk_pengangkatan', 'no_sk_pengangkatan', 'required|trim', [
            'required' => 'Nomor SK pengangkatan Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tgl_sk_pengangkatan', 'tgl_sk_pengangkatan', 'required|trim', [
            'required' => 'Tanggal SK pengangkatan Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pejabat/Pemerintah Desa';
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
            $data['penduduk'] = $this->M_Penduduk->index();
            $data['profil'] = $this->M_Profil->index();
            $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
            $data['pengajuan_header'] =
                $this->M_Cetak->get()->result_array();
            $this->load->view('belakang/template/header', $data);
            $this->load->view('belakang/template/sidebar', $data);
            $this->load->view('belakang/pejabat/tambah', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/pejabat/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
            $config['file_name'] = $this->input->post('nip_nipd'); //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['foto_pejabat']['name'])) {
                if ($this->upload->do_upload('foto_pejabat')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/pejabat/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $config['new_image'] = './assets/foto/pejabat/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];

                    $nik = $this->input->post('nik');
                    $nip_nipd = $this->input->post('nip_nipd');
                    $jabatan = $this->input->post('jabatan');
                    $no_sk_pengangkatan = $this->input->post('no_sk_pengangkatan');
                    $masa_jabatan = $this->input->post('masa_jabatan');
                    $data = array(
                        'foto_pejabat' => $file,
                        'nik' => $nik,
                        'nip_nipd' => $nip_nipd,
                        'jabatan' => $jabatan,
                        'no_sk_pengangkatan' => $no_sk_pengangkatan,
                        'masa_jabatan' => $masa_jabatan,
                    );
                    $this->M_Penduduk->tambah('pejabat_desa', $data);
                    $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                    redirect('admin/pejabat_desa/index', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Gagal Tambah Data');
                    redirect('admin/penduduk/index', 'refresh');
                }
            } else {
                $nik = $this->input->post('nik');
                $nip_nipd = $this->input->post('nip_nipd');
                $jabatan = $this->input->post('jabatan');
                $no_sk_pengangkatan = $this->input->post('no_sk_pengangkatan');
                $tgl_sk_pengangkatan = $this->input->post('tgl_sk_pengangkatan');
                $data = array(
                    'nik' => $nik,
                    'nip_nipd' => $nip_nipd,
                    'jabatan' => $jabatan,
                    'no_sk_pengangkatan' => $no_sk_pengangkatan,
                    'tgl_sk_pengangkatan' => $tgl_sk_pengangkatan,
                );
                $this->M_Penduduk->tambah('pejabat_desa', $data);
                $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                redirect('admin/pejabat_desa/index', 'refresh');
            }
        }
    }
    public function tambah_pejabat_sebelumnya()
    {
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', [
            'required' => 'Jabatan Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_sk_pengangkatan', 'no_sk_pengangkatan', 'required|trim', [
            'required' => 'Nomor SK pengangkatan Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tgl_sk_pengangkatan', 'tgl_sk_pengangkatan', 'required|trim', [
            'required' => 'Tanggal SK pengangkatan Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_sk_pemberhentian', 'no_sk_pemberhentian', 'required|trim', [
            'required' => 'Nomor SK Pemberhentian Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tgl_sk_pemberhentian', 'tgl_sk_pemberhentian', 'required|trim', [
            'required' => 'Tanggal SK Pemberhentian Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('masa_jabatan', 'masa_jabatan', 'required|trim', [
            'required' => 'Masa Jabatan Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pejabat/Pemerintah Desa';
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
            $data['penduduk'] = $this->M_Penduduk->index();
            $data['profil'] = $this->M_Profil->index();
            $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
            $data['pengajuan_header'] =
                $this->M_Cetak->get()->result_array();
            $this->load->view('belakang/template/header', $data);
            $this->load->view('belakang/template/sidebar', $data);
            $this->load->view('belakang/pejabat/tambah_sebelumnya', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/pejabat/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
            $config['file_name'] = $this->input->post('nip_nipd'); //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['foto_pejabat']['name'])) {
                if ($this->upload->do_upload('foto_pejabat')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/pejabat/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $config['new_image'] = './assets/foto/pejabat/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];
                    $nik = $this->input->post('nik');
                    $nip_nipd = $this->input->post('nip_nipd');

                    $jabatan = $this->input->post('jabatan');
                    $no_sk_pengangkatan = $this->input->post('no_sk_pengangkatan');
                    $tgl_sk_pengangkatan = $this->input->post('tgl_sk_pengangkatan');
                    $no_sk_pemberhentian = $this->input->post('no_sk_pemberhentian');

                    $masa_jabatan = $this->input->post('masa_jabatan');
                    $data = array(
                        'foto_pejabat' => $file,
                        'nik' => $nik,
                        'nip_nipd' => $nip_nipd,

                        'jabatan' => $jabatan,
                        'no_sk_pengangkatan' => $no_sk_pengangkatan,
                        'no_sk_pemberhentian' => $no_sk_pemberhentian,
                        'tgl_sk_pengangkatan' => $tgl_sk_pengangkatan,
                        'masa_jabatan' => $masa_jabatan,

                    );
                    $this->M_Penduduk->tambah('pejabat_desa', $data);
                    $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                    redirect('admin/pejabat_desa/index', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Gagal Tambah Data');
                    redirect('admin/penduduk/index', 'refresh');
                }
            } else {
                $nik = $this->input->post('nik');
                $nip_nipd = $this->input->post('nip_nipd');

                $jabatan = $this->input->post('jabatan');
                $no_sk_pengangkatan = $this->input->post('no_sk_pengangkatan');
                $tgl_sk_pengangkatan = $this->input->post('tgl_sk_pengangkatan');
                $no_sk_pemberhentian = $this->input->post('no_sk_pemberhentian');

                $masa_jabatan = $this->input->post('masa_jabatan');
                $data = array(
                    'nik' => $nik,
                    'nip_nipd' => $nip_nipd,

                    'jabatan' => $jabatan,
                    'no_sk_pengangkatan' => $no_sk_pengangkatan,
                    'no_sk_pemberhentian' => $no_sk_pemberhentian,
                    'tgl_sk_pengangkatan' => $tgl_sk_pengangkatan,
                    'masa_jabatan' => $masa_jabatan,

                );
                $this->M_Penduduk->tambah('pejabat_desa', $data);
                $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                redirect('admin/pejabat_desa/index', 'refresh');
            }
        }
    }
    public function jabatan_check($str)
    {
        //$jabatan = $this->input->post('jabatan');

        $x = $this->db->get_where('pejabat_desa', array('jabatan' => $str, 'no_sk_pemberhentian' => NULL))->num_rows();

        if ($str == 'KASI') {
            return TRUE;
        } elseif ($x >= 1) {
            $this->form_validation->set_message('jabatan_check', 'Jabatan Sudah Ada');
            return FALSE;
        } else {
            return true;
        }
    }
    public function hapus($id_pejabat)
    {
        $data =
            $this->db->get_where('pejabat_desa', array('id_pejabat' => $id_pejabat))->row_array();
        if ($data) {

            $this->M_Pejabat_Desa->hapus($id_pejabat);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/pejabat_desa/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/pejabat_desa/index', 'refresh');
        }
    }
}
