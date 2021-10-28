<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dropdown extends CI_Model
{
    public function sakit()
    {
        $query = $this->db->select('*')
            ->from('penduduk_sakit')
            ->order_by('penduduk_sakit.id_sakit', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function updatesakit($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambahsakit($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapussakit($id_sakit)
    {
        $this->db->where('id_sakit', $id_sakit);
        $this->db->delete('penduduk_sakit');
    }
    public function cacat()
    {
        $query = $this->db->select('*')
            ->from('penduduk_kecacatan')
            ->order_by('penduduk_kecacatan.id_cacat', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function updatecacat($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambahcacat($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapuscacat($id_cacat)
    {
        $this->db->where('id_cacat', $id_cacat);
        $this->db->delete('penduduk_kecacatan');
    }

    public function pekerjaan()
    {
        $query = $this->db->select('*')
            ->from('penduduk_pekerjaan')
            ->order_by('penduduk_pekerjaan.id_pekerjaan', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function updatepekerjaan($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambahpekerjaan($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapuspekerjaan($id_pekerjaan)
    {
        $this->db->where('id_pekerjaan', $id_pekerjaan);
        $this->db->delete('penduduk_pekerjaan');
    }

    public function kategorikelompok()
    {
        $query = $this->db->select('*')
            ->from('kelompok_kategori')
            ->order_by('kelompok_kategori.id_kategori', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function updatekelompok($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambahkelompok($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapuskelompok($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kelompok_kategori');
    }
}
