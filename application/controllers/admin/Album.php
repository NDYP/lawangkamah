<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Album extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Album');
        $this->load->model('M_Setting');
        $this->load->model('M_Komentar');
        $this->load->model('M_Profil');
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
        $data['title'] = 'Kelola Album';
        $data['album'] = $this->M_Album->index();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/album/index', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function ubah()
    {
        $config['upload_path'] = './assets/foto/album/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('nik_penduduk'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['gambar']['name'])) {
            if ($this->upload->do_upload('gambar')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/album/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/album/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];

                $nama_album = $this->input->post('nama_album');
                $id_album = $this->input->post('id_album');
                $isi = $this->input->post('isi');
                $author = $this->session->userdata('username');
                $data = array(
                    'gambar' => $file,
                    'nama_album' => $nama_album,
                    'isi' => $isi,
                    'status' => 'Aktif',
                    'author' => $author,
                );
                $this->M_Album->update('album', $data, array('id_album' => $id_album));
                $this->session->set_flashdata('success', 'Berhasil Ubah Data');
                redirect('admin/album/index', 'refresh');
            } else {
                $this->session->set_flashdata('success', 'Gagal Tambah Data');
                redirect('admin/album/index', 'refresh');
            }
        } else {
            $nama_album = $this->input->post('nama_album');
            $id_album = $this->input->post('id_album');
            $isi = $this->input->post('isi');
            $author = $this->session->userdata('username');
            $data = array(
                'nama_album' => $nama_album,
                'isi' => $isi,
                'status' => 'Aktif',
                'author' => $author,
            );
            $this->M_Album->update('album', $data, array('id_album' => $id_album));
            $this->session->set_flashdata('success', 'Berhasil Ubah Data');
            redirect('admin/album/index', 'refresh');
        }
    }
    function edit($id_album)
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['title'] = 'Detail Album';
        $data['album'] = $this->M_Album->get($id_album);
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/album/edit', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function detail($id_album)
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();
        $data['title'] = 'Detail Album';
        $data['album'] = $this->M_Album->get($id_album);
        $data['galeri'] = $this->M_Album->galeri($id_album);
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/album/detail', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function aktif($id_album)
    {
        $data = array(
            'status' => 'Aktif',
        );
        $this->M_Album->update('album', $data, array('id_album' => $id_album));
        $this->session->set_flashdata('success', 'Album Aktif');
        redirect('admin/album/index', 'refresh');
    }
    function nonaktif($id_album)
    {
        $data = array(
            'status' => 'Nonaktif',
        );
        $this->M_Album->update('album', $data, array('id_album' => $id_album));
        $this->session->set_flashdata('success', 'Album Nonaktif');
        redirect('admin/album/index', 'refresh');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('nama_album', 'nama_album', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Album Baru';
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
            $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
            $data['pengajuan_header'] =
                $this->M_Cetak->get()->result_array();
            $data['profil'] = $this->M_Profil->index();
            $this->load->view('belakang/template/header', $data);
            $this->load->view('belakang/template/sidebar', $data);
            $this->load->view('belakang/album/tambah', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/album/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
            $config['file_name'] = $this->input->post('nama_album');
            $this->upload->initialize($config);
            if (!empty($_FILES['gambar']['name'])) {
                if ($this->upload->do_upload('gambar')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/album/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $config['new_image'] = './assets/foto/album/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];
                    date_default_timezone_set("ASIA/JAKARTA");
                    $date = date('d-m-Y');
                    $nama_album = $this->input->post('nama_album');

                    $data = array(
                        'gambar' => $file,
                        'nama_album' => $nama_album,
                        'tanggal_upload' => $date,
                        'status' => 'Aktif',
                    );
                    $this->M_Album->tambah('album', $data);
                    $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                    redirect('admin/album/index', 'refresh');
                } else {
                    $this->session->set_flashdata('success', 'Gagal Tambah Data');
                    redirect('admin/album/index', 'refresh');
                }
            } else {
                $this->session->set_flashdata('warning', 'Pilih Gambar');
                redirect('admin/album/tambah', 'refresh');
            }
        }
    }
    public function tambahgaleri()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_album', 'id_album', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Album Baru';
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

            $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
            $data['pengajuan_header'] =

                $data['album'] = $this->M_Album->index();
            $data['profil'] = $this->M_Profil->index();
            $this->load->view('belakang/template/header', $data);
            $this->load->view('belakang/template/sidebar', $data);
            $this->load->view('belakang/album/galeri', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/album/galeri/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
            $config['file_name'] = $this->input->post('nik_penduduk'); //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['gambar']['name'])) {
                if ($this->upload->do_upload('gambar')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/album/galeri/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $config['new_image'] = './assets/foto/album/galeri/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];
                    date_default_timezone_set("ASIA/JAKARTA");
                    $date = date('d-m-Y');
                    $judul = $this->input->post('judul');
                    $id_album = $this->input->post('id_album');
                    $author = $this->session->userdata('username');
                    $data = array(
                        'gambar' => $file,
                        'judul' => $judul,
                        'id_album' => $id_album,
                        'tanggal_upload' => $date,
                        'author' => $author,
                        'status' => 'Aktif',
                    );
                    $this->M_Album->tambah('galeri', $data);
                    $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                    redirect('admin/album/index', 'refresh');
                } else {
                    $this->session->set_flashdata('success', 'Gagal Tambah Data');
                    redirect('admin/album/index', 'refresh');
                }
            } else {
                $this->session->set_flashdata('warning', 'Pilih Gambar');
                redirect('admin/album/index', 'refresh');
            }
        }
    }
    public function hapusgaleri($id_galeri)
    {
        $data =
            $this->db->get_where('galeri', array('id_galeri' => $id_galeri))->row_array();
        if ($data) {
            $this->M_Album->hapusgaleri($id_galeri);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/album/index', 'refresh');
        }
    }
    public function hapus($id_album)
    {
        $data =
            $this->db->get_where('album', array('id_album' => $id_album))->row_array();
        if ($data) {
            $this->M_Album->hapus($id_album);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/album/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/album/index', 'refresh');
        }
    }

    public function cetak($id_album)
    {
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['title'] = 'Kelompok Desa';
        $data['title'] = 'Kelompok Desa';
        $data['anggota'] = $this->M_Album->anggota($id_album);
        $data['album'] = $this->M_Album->get($id_album);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Kelompok.pdf";
        $this->pdf->load_view('belakang/album/cetak', $data);
    }
}
