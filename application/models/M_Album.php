<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Album extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('album')
            ->order_by('album.id_album', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function get($id_album)
    {
        $query = $this->db->select('*')
            ->from('album')
            ->where('album.id_album', $id_album)
            ->order_by('id_album', 'ASC') //urut berdasarkan id
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function tambah($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapus($id_album)
    {
        $this->db->where('id_album', $id_album);
        $this->db->delete('album');
    }
    public function hapusgaleri($id_galeri)
    {
        $this->db->where('id_galeri', $id_galeri);
        $this->db->delete('galeri');
    }
    public function galeri($id_album)
    {
        $query = $this->db->select('*, galeri.gambar as galeri, galeri.judul as judul_galeri,galeri.tanggal_upload as tanggal_upload_galeri')
            ->from('galeri')
            ->join('album', 'galeri.id_album=album.id_album', 'right')
            ->where('galeri.id_album', $id_album)
            ->order_by('galeri.id_galeri', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pengunjungalbum($limit, $start)
    {
        $query = $this->db->select('*')
            ->order_by('album.id_album', 'DESC') //urut berdasarkan id
            ->get('album', $limit, $start)
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pengunjunggaleri($id_album, $limit, $start)
    {
        $query = $this->db->select('*, galeri.gambar as galeri, galeri.judul as judul_galeri,galeri.tanggal_upload as tanggal_upload_galeri')
            ->join('album', 'galeri.id_album=album.id_album', 'right')
            ->where('galeri.id_album', $id_album)
            ->order_by('galeri.id_galeri', 'DESC') //urut berdasarkan id
            ->get('galeri', $limit, $start); //ditampilkan dalam bentuk array
        return $query;
    }
}