<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Setting extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('setting')
            ->order_by('setting.id_setting', 'DESC') //urut berdasarkan id
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_setting)
    {
        $query = $this->db->select('*')
            ->from('setting')
            ->order_by('setting.id_setting', 'DESC') //urut berdasarkan id
            ->where('id_setting', $id_setting)
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
    public function hapus($id_setting)
    {
        $this->db->where('id_setting', $id_setting);
        $this->db->delete('setting');
    }
}
