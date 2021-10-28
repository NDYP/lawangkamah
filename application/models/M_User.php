<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('user')
            ->join('pejabat_desa', 'pejabat_desa.id_pejabat=user.id_pejabat', 'left')
            ->join('penduduk', 'penduduk.nik_penduduk=pejabat_desa.nik', 'left')
            ->order_by('id_user', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_user)
    {
        $query = $this->db->select('*, user.username as admin_username, user.password as admin_password')
            ->from('user')
            ->join('pejabat_desa', 'pejabat_desa.id_pejabat=user.id_pejabat', 'left')
            ->join('penduduk', 'penduduk.nik_penduduk=pejabat_desa.nik', 'left')
            ->where('user.id_user', $id_user)
            ->order_by('id_user', 'ASC') //urut berdasarkan id
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function auth($username)
    {
        $query = $this->db->select('*, user.username as admin_username, user.password as admin_password')
            ->from('user')
            ->join('pejabat_desa', 'pejabat_desa.id_pejabat=user.id_pejabat', 'left')
            ->join('penduduk', 'penduduk.nik_penduduk=pejabat_desa.nik', 'left')
            ->where('user.username', $username)
            ->get();
        return $query;
    }
    public function authfront($nik)
    {
        $query = $this->db->select('*')
            ->from('penduduk')
            ->where('nik_penduduk', $nik)
            ->get();

        return $query;
    }
    public function authfront2($username)
    {
        $query = $this->db->select('*')
            ->from('penduduk')
            ->where('username', $username)
            ->get();

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
    public function hapus($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }
}
