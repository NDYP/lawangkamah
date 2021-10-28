<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Baner extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('baner')

            ->order_by('baner.id_baner', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function get($id_baner)
    {
        $query = $this->db->select('*')
            ->from('baner')
            ->where('baner.id_baner', $id_baner)
            ->order_by('id_baner', 'ASC') //urut berdasarkan id
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function tambah($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapus($id_baner)
    {
        $this->db->where('id_baner', $id_baner);
        $this->db->delete('baner');
    }
    public function indexgaleri()
    {
        $query = $this->db->select('*')
            ->from('galeri')
            ->order_by('galeri.id_galeri', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
}
