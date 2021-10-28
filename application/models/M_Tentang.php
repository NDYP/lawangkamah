<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Tentang extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('tentang')
            ->order_by('id_tentang', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_pejabat)
    {
        $query = $this->db->select('*')
            ->from('tentang')
            ->where('tentang.id_tentang', $id_pejabat)
            ->order_by('id_tentang', 'ASC') //urut berdasarkan id
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambah($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapus($id_pejabat)
    {
        $this->db->where('tentang', $id_pejabat);
        $this->db->delete('tentang');
    }
}
