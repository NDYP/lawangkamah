<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pejabat_Desa extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('pejabat_desa')
            ->join('penduduk', 'penduduk.nik_penduduk=pejabat_desa.nik', 'left')
            ->order_by('id_pejabat', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_pejabat)
    {
        $query = $this->db->select('*')
            ->from('pejabat_desa')
            ->join('penduduk', 'penduduk.nik_penduduk=pejabat_desa.nik', 'left')
            ->where('pejabat_desa.id_pejabat', $id_pejabat)
            ->order_by('id_pejabat', 'ASC') //urut berdasarkan id
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
        $this->db->where('id_pejabat', $id_pejabat);
        $this->db->delete('pejabat_desa');
    }
}
