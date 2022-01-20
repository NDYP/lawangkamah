<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Album extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Setting');
        $this->load->model('M_Album');
        $this->load->model('M_Profil');
        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }
    function index()
    {
        $config['base_url'] = site_url('album/index'); //site url
        $config['total_rows'] = $this->db->count_all('album'); //total row
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
        $data['pagination'] = $this->pagination->create_links();

        $data['profil'] = $this->M_Profil->index();
        $data['album'] = $this->M_Album->pengunjungalbum($config["per_page"], $data['page']);
        $data['title'] = 'Album';
        $data['setting'] = $this->M_Setting->index()->row_array();
        $this->load->view('depan/template/header', $data);
        $this->load->view('depan/album/index2', $data);
        $this->load->view('depan/template/footer', $data);
    }
    function get($id_album)
    {
        $data['album'] = $this->M_Album->get($id_album);
        $url = $data['album']['nama_album'];
        $url_slug = url_title($url, 'dash', TRUE);
        redirect(base_url('album/galeri/' . $id_album . '/' . $url_slug));
    }
    function galeri($id_album)
    {
        $config['base_url'] = site_url('album/galeri/' . $id_album); //site url
        $config['total_rows'] = $this->db->count_all('galeri', $id_album); //total row
        $config['per_page'] = 12;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
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
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['pagination'] = $this->pagination->create_links();

        $data['galeri'] = $this->M_Album->pengunjunggaleri($id_album, $config["per_page"], $data['page'])->result_array();

        $data['title'] = 'Galeri Album';
        $data['album'] = $this->M_Album->get($id_album);
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['profil'] = $this->M_Profil->index();
        $this->load->view('depan/template/header', $data);
        $this->load->view('depan/album/detail2', $data);
        $this->load->view('depan/template/footer', $data);
    }
}