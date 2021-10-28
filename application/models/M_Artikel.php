<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Artikel extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('artikel')
            ->order_by('artikel.id_artikel', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function get($id_artikel)
    {
        $query = $this->db->select('*,count(komentar.id_komentar) as jumlah, artikel.isi as x, artikel.tanggal_upload as tgl1')
            ->from('artikel')
            ->join('komentar', 'artikel.id_artikel=komentar.id_artikel')
            ->where('artikel.id_artikel', $id_artikel)
            ->order_by('artikel.id_artikel', 'ASC') //urut berdasarkan id
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function tambah($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapus($id_artikel)
    {
        $this->db->where('id_artikel', $id_artikel);
        $this->db->delete('artikel');
    }
    public function pengunjung($limit, $start)
    {
        $query = $this->db->select('*')
            ->order_by('id_artikel', 'DESC') //urut berdasarkan id
            ->get('artikel', $limit, $start)
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function komentar($id_artikel)
    {
        $query = $this->db->select('*, komentar.isi as komentar, komentar.tanggal_upload as tgl')
            ->from('komentar')
            ->join('artikel', 'artikel.id_artikel=komentar.id_artikel')
            ->order_by('id_komentar', 'DESC') //urut berdasarkan id
            ->where(
                'komentar.id_artikel',
                $id_artikel
            )
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
}
