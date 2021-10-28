<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Profil extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('profil') //dari tbel user
            ->join('pejabat_desa', 'profil.id_kades=pejabat_desa.id_pejabat', 'left')
            ->join('penduduk', 'pejabat_desa.nik=penduduk.nik_penduduk', 'left')
            ->order_by('id_desa', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function kades()
    {
        $query = $this->db->select('*,pejabat_desa.id_pejabat,penduduk.id_penduduk')
            ->from('pejabat_desa')
            ->join('penduduk', 'pejabat_desa.nik=penduduk.nik_penduduk', 'left')
            ->order_by('id_pejabat', 'desc')
            ->get()
            ->result_array();
        return $query;
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
}
