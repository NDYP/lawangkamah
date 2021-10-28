<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Beranda extends CI_Model
{

    public function hari_ini()
    {
        $date = date('Y-m-d');
        $query = $this->db->select('*')
            ->from('pengunjung')
            ->where('tanggal', $date) //urut berdasarkan id
            ->group_by('ip')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function total()
    {
        $query = $this->db->select('*')
            ->from('pengunjung')
            ->group_by('ip')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function online()
    {
        $batas_waktu = time() - 300;
        $query = $this->db->select('*')
            ->from('pengunjung')
            ->where('online >', $batas_waktu) //urut berdasarkan id
            ->group_by('ip')
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function penduduk()
    {
        $query = $this->db->select('*')
            ->from('penduduk')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function kelompok()
    {
        $query = $this->db->select('*')
            ->from('kelompok')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function kelompok1()
    {
        $total = '(select count(penduduk.id_pendidikan_kk) from penduduk RIGHT JOIN penduduk_pendidikan on penduduk.id_pendidikan_kk=penduduk_pendidikan.id_pendidikan)';
        $query = $this->db
            ->select('
            penduduk_pendidikan.pendidikan as pendidikan_kk,
            count(penduduk.id_pendidikan_kk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_pendidikan', 'penduduk.id_pendidikan_kk=penduduk_pendidikan.id_pendidikan', 'right')
            ->order_by('penduduk_pendidikan.id_pendidikan', 'ASC')
            ->group_by('penduduk_pendidikan.id_pendidikan')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function keluarga()
    {
        $query = $this->db->select('*')
            ->from('penduduk')
            ->where('penduduk.id_status_kk', '1')
            ->group_by('penduduk.no_kk')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pejabat()
    {
        $query = $this->db->select('*')
            ->from('pejabat_desa')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function bulan()
    {
        $query = $this->db->select('COUNT(id_pengunjung) as count, MONTHNAME(tanggal) as month_name')
            ->from('pengunjung')
            ->where('YEAR(tanggal)', date('Y'))
            ->group_by('ip')
            ->group_by('YEAR(tanggal)')
            ->group_by('MONTH(tanggal)')
            ->get();
        return $query;
    }
    public function get($date, $ip)
    {

        $query = $this->db->select('*')
            ->from('pengunjung')
            ->where('tanggal', $date) //urut berdasarkan id
            ->where('ip', $ip) //urut berdasarkan id
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
}