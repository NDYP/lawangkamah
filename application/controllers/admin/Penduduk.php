<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Penduduk');
        $this->load->model('M_Setting');
        $this->load->model('M_Profil');
        $this->load->model('M_Komentar');
        $this->load->model('M_Cetak');
        $this->load->library(array('excel', 'session'));
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

        $data['title'] = 'Penduduk Desa';
        $data['agama'] = $this->M_Penduduk->index();
        $data['agama'] = $this->M_Penduduk->agama();
        $data['asuransi'] = $this->M_Penduduk->asuransi();
        $data['golongan_darah'] = $this->M_Penduduk->golongan_darah();
        $data['jenis_kelamin'] = $this->M_Penduduk->jenis_kelamin();
        $data['kecacatan'] = $this->M_Penduduk->kecacatan();
        $data['pekerjaan'] = $this->M_Penduduk->pekerjaan();
        $data['pendidikan'] = $this->M_Penduduk->pendidikan();
        $data['penolong_kelahiran'] = $this->M_Penduduk->penolong_kelahiran();
        $data['sakit'] = $this->M_Penduduk->sakit();
        $data['status'] = $this->M_Penduduk->status();
        $data['status_kk'] = $this->M_Penduduk->status_kk();
        $data['status_wn'] = $this->M_Penduduk->wn();
        $data['status_nikah'] = $this->M_Penduduk->status_nikah();
        $data['penduduk'] = $this->M_Penduduk->index();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/penduduk/penduduk', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    function edit($id_penduduk)
    {
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['penduduk_get'] = $this->db->get_where('penduduk', array('id_penduduk' => $id_penduduk))->row_array();
        $data['title'] = 'Penduduk Desa';
        $data['agama'] = $this->M_Penduduk->index();
        $data['agama'] = $this->M_Penduduk->agama();
        $data['asuransi'] = $this->M_Penduduk->asuransi();
        $data['golongan_darah'] = $this->M_Penduduk->golongan_darah();
        $data['jenis_kelamin'] = $this->M_Penduduk->jenis_kelamin();
        $data['kecacatan'] = $this->M_Penduduk->kecacatan();
        $data['pekerjaan'] = $this->M_Penduduk->pekerjaan();
        $data['pendidikan'] = $this->M_Penduduk->pendidikan();
        $data['pendidikan_ditempuh'] = $this->M_Penduduk->pendidikanditempuh();
        $data['penolong_kelahiran'] = $this->M_Penduduk->penolong_kelahiran();
        $data['sakit'] = $this->M_Penduduk->sakit();
        $data['status'] = $this->M_Penduduk->status();
        $data['status_kk'] = $this->M_Penduduk->status_kk();
        $data['wn'] = $this->M_Penduduk->wn();
        $data['status_nikah'] = $this->M_Penduduk->status_nikah();

        $id_pendapatan = $data['penduduk_get']['id_pendapatan'];
        $data['pendapatan'] = $this->M_Penduduk->pendapatan();
        $data['pekerjaan'] = $this->M_Penduduk->pekerjaan();


        $data['selected'] = $this->M_Penduduk->pendapatanget($id_pendapatan);

        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/penduduk/edit', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function ubah()
    {
        $config['upload_path'] = './assets/foto/penduduk/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('nik_penduduk'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['foto_penduduk']['name'])) {
            if ($this->upload->do_upload('foto_penduduk')) {
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
                $nama_lengkap = $this->input->post('nama_lengkap');
                $no_kk = $this->input->post('no_kk');
                $id_status_kk = $this->input->post('id_status_kk');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $id_agama = $this->input->post('id_agama');


                $tempat_lahir = $this->input->post('tempat_lahir');
                $tanggal_lahir = $this->input->post('tanggal_lahir');

                $x = date('Y-m-d', strtotime($tanggal_lahir));
                $y = date_diff(date_create($x), date_create('now'))->y;


                $id_penolong_kelahiran = $this->input->post('id_penolong_kelahiran');
                $id_pendidikan_kk = $this->input->post('id_pendidikan_kk');

                $id_pekerjaan = $this->input->post('id_pekerjaan');
                $id_status_wn = $this->input->post('id_status_wn');
                $tgl_paspor = $this->input->post('tgl_paspor');
                $no_paspor = $this->input->post('no_paspor');





                $alamat_sekarang = $this->input->post('alamat_sekarang');
                $alamat_sebelum = $this->input->post('alamat_sebelum');
                $id_pekerjaan = $this->input->post('id_pekerjaan');
                $rt = $this->input->post('rt');
                $rw = $this->input->post('rw');


                $id_status_nikah = $this->input->post('id_status_nikah');




                $id_golongan_darah = $this->input->post('id_golongan_darah');
                $id_cacat = $this->input->post('id_cacat');
                $id_asuransi = $this->input->post('id_asuransi');
                $id_sakit = $this->input->post('id_sakit');
                $id_pendapatan = $this->input->post('id_pendapatan');
                $data = array(
                    'foto_penduduk' => $file,
                    'id_penduduk' => $id_penduduk,
                    'nik_penduduk' => $nik_penduduk,
                    'nama_lengkap' => $nama_lengkap,

                    'no_kk' => $no_kk,
                    'id_status_kk' => $id_status_kk,
                    'jenis_kelamin' => $jenis_kelamin,
                    'id_agama' => $id_agama,


                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $x,
                    'rentang_umur' => 10 * floor($y / 10),

                    'rentang_umur2' => 10 * floor($y / 10) + 10,
                    'id_penolong_kelahiran' => $id_penolong_kelahiran,
                    'id_pendidikan_kk' => $id_pendidikan_kk,


                    'id_pekerjaan' => $id_pekerjaan,
                    'id_status_wn' => $id_status_wn,
                    'tgl_paspor' => $tgl_paspor,
                    'no_paspor' => $no_paspor,



                    'alamat_sekarang' => $alamat_sekarang,
                    'alamat_sebelum' => $alamat_sebelum,

                    'rt' => $rt,
                    'rw' => $rw,
                    'id_status_nikah' => $id_status_nikah,



                    'id_golongan_darah' => $id_golongan_darah,
                    'id_cacat' => $id_cacat,
                    'id_asuransi' => $id_asuransi,

                    'id_sakit' => $id_sakit,
                    'id_pendapatan' => $id_pendapatan,
                );
                $this->M_Penduduk->update('penduduk', $data, array('id_penduduk' => $id_penduduk));
                $this->session->set_flashdata('success', 'Berhasil Ubah Data');
                redirect('admin/penduduk/index', 'refresh');
            } else {
                $this->session->set_flashdata('info', 'Gagal Ubah Data');
                redirect('admin/penduduk/index', 'refresh');
            }
        } else {
            $id_penduduk = $this->input->post('id_penduduk');
            $nik_penduduk = $this->input->post('nik_penduduk');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $no_kk = $this->input->post('no_kk');
            $id_status_kk = $this->input->post('id_status_kk');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $id_agama = $this->input->post('id_agama');


            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $x = date('Y-m-d', strtotime($tanggal_lahir));
            $y = date_diff(date_create($x), date_create('now'))->y;

            $id_penolong_kelahiran = $this->input->post('id_penolong_kelahiran');
            $id_pendidikan_kk = $this->input->post('id_pendidikan_kk');

            $id_pekerjaan = $this->input->post('id_pekerjaan');
            $id_status_wn = $this->input->post('id_status_wn');
            $tgl_paspor = $this->input->post('tgl_paspor');
            $no_paspor = $this->input->post('no_paspor');





            $alamat_sekarang = $this->input->post('alamat_sekarang');
            $alamat_sebelum = $this->input->post('alamat_sebelum');
            $id_pekerjaan = $this->input->post('id_pekerjaan');
            $rt = $this->input->post('rt');
            $rw = $this->input->post('rw');


            $id_status_nikah = $this->input->post('id_status_nikah');




            $id_golongan_darah = $this->input->post('id_golongan_darah');
            $id_cacat = $this->input->post('id_cacat');
            $id_asuransi = $this->input->post('id_asuransi');
            $id_sakit = $this->input->post('id_sakit');
            $id_pendapatan = $this->input->post('id_pendapatan');
            $data = array(
                'id_penduduk' => $id_penduduk,
                'nik_penduduk' => $nik_penduduk,
                'nama_lengkap' => $nama_lengkap,
                'no_kk' => $no_kk,
                'id_status_kk' => $id_status_kk,
                'jenis_kelamin' => $jenis_kelamin,
                'id_agama' => $id_agama,


                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $x,

                'rentang_umur' => 10 * floor($y / 10),
                'rentang_umur2' => 10 * floor($y / 10) + 10,

                'id_penolong_kelahiran' => $id_penolong_kelahiran,
                'id_pendidikan_kk' => $id_pendidikan_kk,

                'id_pekerjaan' => $id_pekerjaan,
                'id_status_wn' => $id_status_wn,
                'tgl_paspor' => $tgl_paspor,
                'no_paspor' => $no_paspor,





                'alamat_sekarang' => $alamat_sekarang,
                'alamat_sebelum' => $alamat_sebelum,
                'rt' => $rt,
                'rw' => $rw,


                'id_status_nikah' => $id_status_nikah,




                'id_golongan_darah' => $id_golongan_darah,
                'id_cacat' => $id_cacat,
                'id_asuransi' => $id_asuransi,
                'id_sakit' => $id_sakit,
                'id_pendapatan' => $id_pendapatan,
            );
            $this->M_Penduduk->update('penduduk', $data, array('id_penduduk' => $id_penduduk));
            $this->session->set_flashdata('success', 'Berhasil Ubah Data');
            redirect('admin/penduduk/index', 'refresh');
        }
    }
    function detail($id_penduduk)
    {
        $data['profil'] = $this->M_Profil->index();
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['komentar'] = $this->M_Komentar->index()->result_array();
        $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
        $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();

        $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
        $data['pengajuan_header'] =
            $this->M_Cetak->get()->result_array();

        $data['title'] = 'Penduduk Desa';
        $data['penduduk'] = $this->M_Penduduk->get($id_penduduk)->result_array();
        $data['berkas'] =
            $this->db->get_where('berkas_penduduk', array('id_penduduk' => $id_penduduk))->result_array();
        $this->load->view('belakang/template/header', $data);
        $this->load->view('belakang/template/sidebar', $data);
        $this->load->view('belakang/penduduk/detail', $data);
        $this->load->view('belakang/template/footer', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules('nik_penduduk', 'nik_penduduk', 'required|trim|is_unique[penduduk.nik_penduduk]', [
            'required' => 'NIK Tidak Boleh Kosong!',
            'is_unique' => 'NIK Telah Terdaftar'
        ]);
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required|trim', [
            'required' => 'Nama Lengkap Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_kk', 'no_kk', 'required|trim', [
            'required' => 'Nomor KK Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'nama_lengkap', 'required|trim', [
            'required' => 'Tempat Lahir Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim', [
            'required' => 'Tanggal Lahir Tidak Boleh Kosong!'
        ]);

        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);
        $this->form_validation->set_rules('id_agama', 'id_agama', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);

        $this->form_validation->set_rules('id_penolong_kelahiran', 'id_penolong_kelahiran', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);
        $this->form_validation->set_rules('id_pendidikan_kk', 'id_pendidikan_kk', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);

        $this->form_validation->set_rules('id_pekerjaan', 'id_pekerjaan', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);
        $this->form_validation->set_rules('id_status_wn', 'id_status_wn', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);
        $this->form_validation->set_rules('id_status_nikah', 'id_status_nikah', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);
        $this->form_validation->set_rules('id_golongan_darah', 'id_golongan_darah', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);
        $this->form_validation->set_rules('id_asuransi', 'id_asuransi', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);
        $this->form_validation->set_rules('id_sakit', 'id_sakit', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);
        $this->form_validation->set_rules('id_cacat', 'id_cacat', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);
        $this->form_validation->set_rules('id_status_kk', 'id_status_kk', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);
        $this->form_validation->set_rules('id_pendapatan', 'id_pendapatan', 'required|trim', [
            'required' => 'Pilih Salah Satu!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['title'] = 'Penduduk Desa';
            $data['agama'] = $this->M_Penduduk->index();
            $data['agama'] = $this->M_Penduduk->agama();
            $data['asuransi'] = $this->M_Penduduk->asuransi();
            $data['golongan_darah'] = $this->M_Penduduk->golongan_darah();
            $data['jenis_kelamin'] = $this->M_Penduduk->jenis_kelamin();
            $data['kecacatan'] = $this->M_Penduduk->kecacatan();


            //$data['pekerjaan'] = $this->M_Penduduk->pekerjaan();

            $data['pekerjaan'] = $this->M_Penduduk->pekerjaan();
            $data['pendapatan'] = $this->M_Penduduk->pendapatan();
            $data['pekerjaan_selected'] = '';
            $data['pendapatan_selected'] = '';



            $data['pendidikan'] = $this->M_Penduduk->pendidikan();
            $data['pendidikan_ditempuh'] = $this->M_Penduduk->pendidikanditempuh();
            $data['penolong_kelahiran'] = $this->M_Penduduk->penolong_kelahiran();
            $data['sakit'] = $this->M_Penduduk->sakit();
            $data['status'] = $this->M_Penduduk->status();
            $data['status_kk'] = $this->M_Penduduk->status_kk();
            $data['wn'] = $this->M_Penduduk->wn();
            $data['status_nikah'] = $this->M_Penduduk->status_nikah();
            //$data['pendapatan'] = $this->M_Penduduk->pendapatan();


            $data['profil'] = $this->M_Profil->index();

            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
            $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
            $data['pengajuan_header'] =
                $this->M_Cetak->get()->result_array();
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['title'] = 'Penduduk Desa';
            $this->load->view('belakang/template/header', $data);
            $this->load->view('belakang/template/sidebar', $data);
            $this->load->view('belakang/penduduk/tambah', $data);
            $this->load->view('belakang/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/penduduk/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
            $config['file_name'] = $this->input->post('nik_penduduk'); //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['foto_penduduk']['name'])) {
                if ($this->upload->do_upload('foto_penduduk')) {
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
                    $nik_penduduk = $this->input->post('nik_penduduk');
                    $nama_lengkap = $this->input->post('nama_lengkap');
                    $no_kk = $this->input->post('no_kk');
                    $id_status_kk = $this->input->post('id_status_kk');
                    $jenis_kelamin = $this->input->post('jenis_kelamin');
                    $id_agama = $this->input->post('id_agama');


                    $tempat_lahir = $this->input->post('tempat_lahir');
                    $tanggal_lahir = $this->input->post('tanggal_lahir');
                    $x = date('Y-m-d', strtotime($tanggal_lahir));
                    $x = date('Y-m-d', strtotime($tanggal_lahir));
                    $y = date_diff(date_create($x), date_create('now'))->y;


                    $id_penolong_kelahiran = $this->input->post('id_penolong_kelahiran');
                    $id_pendidikan_kk = $this->input->post('id_pendidikan_kk');

                    $id_pekerjaan = $this->input->post('id_pekerjaan');
                    $id_status_wn = $this->input->post('id_status_wn');
                    $tgl_paspor = $this->input->post('tgl_paspor');
                    $no_paspor = $this->input->post('no_paspor');

                    $alamat_sekarang = $this->input->post('alamat_sekarang');
                    $alamat_sebelum = $this->input->post('alamat_sebelum');
                    $id_pekerjaan = $this->input->post('id_pekerjaan');
                    $rt = $this->input->post('rt');
                    $rw = $this->input->post('rw');

                    $id_status_nikah = $this->input->post('id_status_nikah');



                    $id_golongan_darah = $this->input->post('id_golongan_darah');
                    $id_cacat = $this->input->post('id_cacat');
                    $id_asuransi = $this->input->post('id_asuransi');
                    $id_sakit = $this->input->post('id_sakit');
                    $id_pendapatan = $this->input->post('id_pendapatan');
                    $data = array(
                        'foto_penduduk' => $file,
                        'nik_penduduk' => $nik_penduduk,
                        'nama_lengkap' => $nama_lengkap,
                        'no_kk' => $no_kk,
                        'id_status_kk' => $id_status_kk,
                        'jenis_kelamin' => $jenis_kelamin,
                        'id_agama' => $id_agama,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $x,
                        'rentang_umur' => 10 * floor($y / 10),
                        'rentang_umur2' => 10 * floor($y / 10) + 10,
                        'id_penolong_kelahiran' => $id_penolong_kelahiran,
                        'id_pendidikan_kk' => $id_pendidikan_kk,

                        'id_pekerjaan' => $id_pekerjaan,
                        'id_status_wn' => $id_status_wn,
                        'tgl_paspor' => $tgl_paspor,
                        'no_paspor' => $no_paspor,

                        'alamat_sekarang' => $alamat_sekarang,
                        'alamat_sebelum' => $alamat_sebelum,
                        'rt' => $rt,
                        'rw' => $rw,
                        'id_status_nikah' => $id_status_nikah,


                        'id_golongan_darah' => $id_golongan_darah,
                        'id_cacat' => $id_cacat,
                        'id_asuransi' => $id_asuransi,
                        'id_sakit' => $id_sakit,
                        'id_pendapatan' => $id_pendapatan,
                    );
                    $this->M_Penduduk->tambah('penduduk', $data);
                    $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                    redirect('admin/penduduk/index', 'refresh');
                } else {
                    $this->session->set_flashdata('success', 'Gagal Tambah Data');
                    redirect('admin/penduduk/index', 'refresh');
                }
            } else {
                $nik_penduduk = $this->input->post('nik_penduduk');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $no_kk = $this->input->post('no_kk');
                $id_status_kk = $this->input->post('id_status_kk');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $id_agama = $this->input->post('id_agama');
                $tempat_lahir = $this->input->post('tempat_lahir');
                $tanggal_lahir = $this->input->post('tanggal_lahir');
                $x = date('Y-m-d', strtotime($tanggal_lahir));
                $id_penolong_kelahiran = $this->input->post('id_penolong_kelahiran');
                $id_pendidikan_kk = $this->input->post('id_pendidikan_kk');

                $id_pekerjaan = $this->input->post('id_pekerjaan');
                $id_status_wn = $this->input->post('id_status_wn');
                $tgl_paspor = $this->input->post('tgl_paspor');
                $no_paspor = $this->input->post('no_paspor');


                $alamat_sekarang = $this->input->post('alamat_sekarang');
                $alamat_sebelum = $this->input->post('alamat_sebelum');
                $id_pekerjaan = $this->input->post('id_pekerjaan');
                $rt = $this->input->post('rt');
                $rw = $this->input->post('rw');
                $id_status_nikah = $this->input->post('id_status_nikah');


                $id_golongan_darah = $this->input->post('id_golongan_darah');
                $id_cacat = $this->input->post('id_cacat');
                $id_asuransi = $this->input->post('id_asuransi');
                $id_sakit = $this->input->post('id_sakit');
                $id_pendapatan = $this->input->post('id_pendapatan');
                $data = array(
                    'nik_penduduk' => $nik_penduduk,
                    'nama_lengkap' => $nama_lengkap,
                    'no_kk' => $no_kk,
                    'id_status_kk' => $id_status_kk,
                    'jenis_kelamin' => $jenis_kelamin,
                    'id_agama' => $id_agama,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $x,
                    'id_penolong_kelahiran' => $id_penolong_kelahiran,
                    'id_pendidikan_kk' => $id_pendidikan_kk,

                    'id_pekerjaan' => $id_pekerjaan,
                    'id_status_wn' => $id_status_wn,
                    'tgl_paspor' => $tgl_paspor,
                    'no_paspor' => $no_paspor,


                    'alamat_sekarang' => $alamat_sekarang,
                    'alamat_sebelum' => $alamat_sebelum,
                    'rt' => $rt,
                    'rw' => $rw,
                    'id_status_nikah' => $id_status_nikah,


                    'id_golongan_darah' => $id_golongan_darah,
                    'id_cacat' => $id_cacat,
                    'id_asuransi' => $id_asuransi,
                    'id_sakit' => $id_sakit,
                    'id_pendapatan' => $id_pendapatan,
                );
                $this->M_Penduduk->tambah('penduduk', $data);
                $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                redirect('admin/penduduk/index', 'refresh');
            }
        }
    }
    public function hapus($id_penduduk)
    {
        $data =
            $this->db->get_where('penduduk', array('id_penduduk' => $id_penduduk))->row_array();
        if ($data) {

            $this->M_Penduduk->hapus($id_penduduk);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/penduduk/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/penduduk/index', 'refresh');
        }
    }
    public function hapusberkas($id_berkas)
    {
        $data =
            $this->db->get_where('berkas_penduduk', array('id_berkas' => $id_berkas))->row_array();
        if ($data) {
            unlink("./assets/berkas/penduduk/" . $data['berkas']);
            $this->M_Penduduk->hapusberkas($id_berkas);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/penduduk', 'refresh');
        }
    }
    public function upload()
    {

        $config['upload_path'] = './assets/berkas/penduduk/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('id_penduduk'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['berkas']['name'])) {
            if ($this->upload->do_upload('berkas')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/berkas/penduduk/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/berkas/penduduk/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $id_penduduk = $this->input->post('id_penduduk');
                $judul = $this->input->post('judul');
                $file = $gbr['file_name'];
                $data = array(
                    'berkas' => $file,
                    'id_penduduk' => $id_penduduk,
                    'judul' => $judul

                );
                $this->M_Penduduk->tambah('berkas_penduduk', $data);
                $this->session->set_flashdata('success', 'Berhasil Upload Berkas');
                redirect('admin/penduduk/index', 'refresh');
            } else {

                $this->session->set_flashdata('info', 'Gagal Upload');
                redirect('admin/penduduk/index', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', 'Berkas Kosong');
            redirect('admin/penduduk/index', 'refresh');
        }
    }
    public function cetak($id_penduduk)
    {
        $data['title'] = "Cetak Biodata";
        $data['setting'] = $this->M_Setting->index()->row_array();
        $data['penduduk'] = $this->M_Penduduk->get($id_penduduk)->row_array();
        $data['kades'] = $this->M_Profil->index();
        $this->pdf->set_base_path(base_url());
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Biodata.pdf";
        $this->pdf->load_view('belakang/penduduk/cetak', $data);
    }
    public function tambah_excel()
    {
        if (isset($_FILES["excel"]["name"])) {
            $path = $_FILES["excel"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $nik_penduduk
                        = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama_lengkap
                        = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $no_kk
                        = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $jenis_kelamin
                        = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $tempat_lahir
                        = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $tanggal_lahir
                        = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $no_paspor
                        = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $tgl_paspor
                        = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $alamat_sekarang
                        = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $alamat_sebelum
                        = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $rt
                        = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $rw = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $id_penolong_kelahiran
                        = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $id_pendidikan_kk
                        = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $id_pekerjaan
                        = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $id_status_wn
                        = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $id_agama
                        = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    $id_status_nikah
                        = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    $id_golongan_darah
                        = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                    $id_cacat
                        = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                    $id_asuransi
                        = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                    $id_sakit
                        = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                    $id_status_kk
                        = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                    $id_pendapatan
                        = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
                    $temp_data[] = array(
                        'nik_penduduk' => $nik_penduduk,
                        'nama_lengkap' => $nama_lengkap,
                        'no_kk' => $no_kk,
                        'jenis_kelamin' => $jenis_kelamin,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => date('Y-m-d', strtotime($tanggal_lahir)),
                        'no_paspor' => $no_paspor,
                        'tgl_paspor' => date('Y-m-d', strtotime($tgl_paspor)),
                        'alamat_sekarang' => $alamat_sekarang,
                        'alamat_sebelum' => $alamat_sebelum,
                        'rt' => $rt,
                        'rw' => $rw,
                        'id_penolong_kelahiran' => $id_penolong_kelahiran,
                        'id_pendidikan_kk' => $id_pendidikan_kk,
                        'id_pekerjaan' => $id_pekerjaan,
                        'id_status_wn' => $id_status_wn,
                        'id_agama' => $id_agama,
                        'id_status_nikah' => $id_status_nikah,
                        'id_golongan_darah' => $id_golongan_darah,
                        'id_cacat' => $id_cacat,
                        'id_asuransi' => $id_asuransi,
                        'id_sakit' => $id_sakit,
                        'id_status_kk' => $id_status_kk,
                        'id_pendapatan' => $id_pendapatan,
                    );
                }
            }

            $insert = $this->M_Penduduk->tambahbatch('penduduk', $temp_data);
            if ($insert) {
                $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                redirect('admin/penduduk/index', 'refresh');
            } else {
                $this->session->set_flashdata('success', 'Gagal Tambah Data');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $data['setting'] = $this->M_Setting->index()->row_array();
            $data['title'] = 'Penduduk Desa';
            $data['agama'] = $this->M_Penduduk->index();
            $data['agama'] = $this->M_Penduduk->agama();
            $data['asuransi'] = $this->M_Penduduk->asuransi();
            $data['golongan_darah'] = $this->M_Penduduk->golongan_darah();
            $data['jenis_kelamin'] = $this->M_Penduduk->jenis_kelamin();
            $data['kecacatan'] = $this->M_Penduduk->kecacatan();
            $data['pekerjaan'] = $this->M_Penduduk->pekerjaan();
            $data['pendidikan'] = $this->M_Penduduk->pendidikan();
            $data['pendidikan_ditempuh'] = $this->M_Penduduk->pendidikanditempuh();
            $data['penolong_kelahiran'] = $this->M_Penduduk->penolong_kelahiran();
            $data['sakit'] = $this->M_Penduduk->sakit();
            $data['status'] = $this->M_Penduduk->status();
            $data['status_kk'] = $this->M_Penduduk->status_kk();
            $data['wn'] = $this->M_Penduduk->wn();
            $data['status_nikah'] = $this->M_Penduduk->status_nikah();
            $data['pendapatan'] = $this->M_Penduduk->pendapatan();


            $data['profil'] = $this->M_Profil->index();

            $data['komentar'] = $this->M_Komentar->index()->result_array();
            $data['jumlah'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->num_rows();
            $data['komentar_header'] = $this->db->get_where('komentar', array('status' => 'Aktif'))->result_array();
            $data['jumlahadministrasi'] = $this->db->get_where('pengajuan', array('status' => 'Pengajuan'))->num_rows();
            $data['pengajuan_header'] =
                $this->M_Cetak->get()->result_array();
            $this->load->view('belakang/template/header', $data);
            $this->load->view('belakang/template/sidebar', $data);
            $this->load->view('belakang/penduduk/tambah_excel', $data);
            $this->load->view('belakang/template/footer', $data);
        }
    }
}