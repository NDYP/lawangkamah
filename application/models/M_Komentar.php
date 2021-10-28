<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Komentar extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*, komentar.status as status_komentar,komentar.tanggal_upload as tanggal_artikel,
        komentar.isi as isi_komentar')
            ->from('komentar')
            ->join('artikel', 'komentar.id_artikel=artikel.id_artikel', 'left')
            ->order_by('komentar.id_komentar', 'DESC') //urut berdasarkan id
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function get($id_komentar)
    {
        $query = $this->db->select('*,count(komentar.id_komentar) as jumlah, komentar.isi as x, komentar.tanggal_upload as tgl1')
            ->from('komentar')
            ->join('komentar', 'komentar.id_komentar=komentar.id_komentar')
            ->where('komentar.id_komentar', $id_komentar)
            ->order_by('komentar.id_komentar', 'ASC') //urut berdasarkan id
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function hapus($id_komentar)
    {
        $this->db->where('id_komentar', $id_komentar);
        $this->db->delete('komentar');
    }
}
