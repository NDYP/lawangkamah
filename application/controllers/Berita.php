<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Setting');
        $this->load->model('M_Artikel');
        $this->load->model('M_Profil');
        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }
    function index()
    {
        $config['base_url'] = site_url('barita/index'); //site url
        $config['total_rows'] = $this->db->count_all('artikel'); //total row
        $config['per_page'] = 12;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['pagination'] = $this->pagination->create_links();

        $data['artikel'] = $this->M_Artikel->pengunjung($config["per_page"], $data['page']);
        $data['title'] = 'Berita';
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('depan/template/header', $data);
        $this->load->view('depan/berita/index', $data);
        $this->load->view('depan/template/footer', $data);
    }
    function get($id_artikel)
    {
        $data['id_artikel'] = $this->M_Artikel->get($id_artikel);
        $url = $data['id_artikel']['judul'];
        $url_slug = url_title($url, 'dash', TRUE);
        redirect(base_url('berita/baca/' . $id_artikel . '/' . $url_slug));
    }
    function baca($id_artikel)
    {
        $data['title'] = 'Berita';
        $data['artikel'] = $this->M_Artikel->get($id_artikel);
        $data['komentar'] = $this->M_Artikel->komentar($id_artikel);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['index'] = $this->M_Artikel->pengunjung(5, $data['page']);
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('depan/template/header', $data);
        $this->load->view('depan/berita/detail', $data);
        $this->load->view('depan/template/footer', $data);
    }
    function komentar()
    {
        $id_artikel = $this->input->post('id_artikel');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $isi = $this->input->post('isi');
        date_default_timezone_set("ASIA/JAKARTA");
        $date = date('d-m-Y');
        $data = array(
            'id_artikel' => $id_artikel,
            'nama' => $nama,
            'email' => $email,
            'isi' => $isi,
            'tanggal_upload' => $date,
            'status' => 'Aktif',
        );
        $this->M_Artikel->tambah('komentar', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
