<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Penduduk extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*, penduduk_pendidikan.pendidikan as pendidikan_kk')
            ->from('penduduk')
            //->join('penduduk_jenis_kelamin', 'penduduk.id_jenis_kelamin=penduduk_jenis_kelamin.id_jk', 'left')
            ->join('penduduk_agama', 'penduduk.id_agama=penduduk_agama.id_agama', 'left')
            ->join('penduduk_asuransi', 'penduduk.id_asuransi=penduduk_asuransi.id_asuransi', 'left')
            ->join('penduduk_golongan_darah', 'penduduk.id_golongan_darah=penduduk_golongan_darah.id_golongan_darah', 'left')
            ->join('penduduk_kecacatan', 'penduduk.id_cacat=penduduk_kecacatan.id_cacat', 'left')
            ->join('penduduk_pekerjaan', 'penduduk.id_pekerjaan=penduduk_pekerjaan.id_pekerjaan', 'left')
            ->join('penduduk_pendidikan', 'penduduk.id_pendidikan_kk=penduduk_pendidikan.id_pendidikan', 'left')
            //->join('penduduk_pendidikan_ditempuh', 'penduduk.id_pendidikan_ditempuh=penduduk_pendidikan_ditempuh.id_pendidikan', 'left')
            ->join('penduduk_penolong_kelahiran', 'penduduk.id_penolong_kelahiran=penduduk_penolong_kelahiran.id_penolong_kelahiran', 'left')
            ->join('penduduk_sakit', 'penduduk.id_sakit=penduduk_sakit.id_sakit', 'left')
            ->join('penduduk_pendapatan', 'penduduk.id_pendapatan=penduduk_pendapatan.id_pendapatan', 'left')
            //->join('penduduk_status', 'penduduk.id_status_kependudukan=penduduk_status.id_status', 'left')
            ->join('penduduk_status_kk', 'penduduk.id_status_kk=penduduk_status_kk.id_status_kk', 'left')
            ->join('penduduk_status_nikah', 'penduduk.id_status_nikah=penduduk_status_nikah.id_status_nikah', 'left')
            ->join('penduduk_wn', 'penduduk.id_status_wn=penduduk_wn.id_status_wn', 'left')
            ->order_by('id_penduduk', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_penduduk)
    {
        $query = $this->db->select('*, penduduk_pendidikan.pendidikan as pendidikan_kk')
            ->from('penduduk')
            //->join('penduduk_jenis_kelamin', 'penduduk.id_jenis_kelamin=penduduk_jenis_kelamin.id_jk', 'left')
            ->join('penduduk_agama', 'penduduk.id_agama=penduduk_agama.id_agama', 'left')
            ->join('penduduk_asuransi', 'penduduk.id_asuransi=penduduk_asuransi.id_asuransi', 'left')
            ->join('penduduk_golongan_darah', 'penduduk.id_golongan_darah=penduduk_golongan_darah.id_golongan_darah', 'left')
            ->join('penduduk_kecacatan', 'penduduk.id_cacat=penduduk_kecacatan.id_cacat', 'left')
            ->join('penduduk_pekerjaan', 'penduduk.id_pekerjaan=penduduk_pekerjaan.id_pekerjaan', 'left')
            ->join('penduduk_pendidikan', 'penduduk.id_pendidikan_kk=penduduk_pendidikan.id_pendidikan', 'left')
            //->join('penduduk_pendidikan_ditempuh', 'penduduk.id_pendidikan_ditempuh=penduduk_pendidikan_ditempuh.id_pendidikan', 'left')
            ->join('penduduk_penolong_kelahiran', 'penduduk.id_penolong_kelahiran=penduduk_penolong_kelahiran.id_penolong_kelahiran', 'left')
            ->join('penduduk_sakit', 'penduduk.id_sakit=penduduk_sakit.id_sakit', 'left')
            ->join('penduduk_pendapatan', 'penduduk.id_pendapatan=penduduk_pendapatan.id_pendapatan', 'left')
            //->join('penduduk_status', 'penduduk.id_status_kependudukan=penduduk_status.id_status', 'left')
            ->join('penduduk_status_kk', 'penduduk.id_status_kk=penduduk_status_kk.id_status_kk', 'left')
            ->join('penduduk_status_nikah', 'penduduk.id_status_nikah=penduduk_status_nikah.id_status_nikah', 'left')
            ->join('penduduk_wn', 'penduduk.id_status_wn=penduduk_wn.id_status_wn', 'left')
            ->where('penduduk.id_penduduk', $id_penduduk)
            ->order_by('id_penduduk', 'ASC') //urut berdasarkan id
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function agama()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_agama') //dari tbel user
            ->order_by('id_agama', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function asuransi()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_asuransi') //dari tbel user
            ->order_by('id_asuransi', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function golongan_darah()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_golongan_darah') //dari tbel user
            ->order_by('id_golongan_darah', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function jenis_kelamin()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_jenis_kelamin') //dari tbel user
            ->order_by('id_jk', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function kecacatan()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_kecacatan') //dari tbel user
            ->order_by('id_cacat', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pekerjaan()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_pekerjaan') //dari tbel user
            ->order_by('id_pekerjaan', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pendidikan()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_pendidikan') //dari tbel user
            ->order_by('id_pendidikan', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pendidikanditempuh()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_pendidikan_ditempuh') //dari tbel user
            ->order_by('id_pendidikan', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function penolong_kelahiran()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_penolong_kelahiran') //dari tbel user
            ->order_by('id_penolong_kelahiran', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function sakit()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_sakit') //dari tbel user
            ->order_by('id_sakit', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function status()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_status') //dari tbel user
            ->order_by('id_status', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function status_kk()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_status_kk') //dari tbel user
            ->order_by('id_status_kk', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function status_nikah()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_status_nikah') //dari tbel user
            ->order_by('id_status_nikah', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function wn()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_wn') //dari tbel user
            ->order_by('id_status_wn', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
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
    public function tambahbatch($tabel, $params)
    {
        return $this->db->insert_batch($tabel, $params);
    }
    public function hapus($id_penduduk)
    {
        $this->db->where('id_penduduk', $id_penduduk);
        $this->db->delete('penduduk');
    }
    public function hapusberkas($id_berkas)
    {
        $this->db->where('id_berkas', $id_berkas);
        $this->db->delete('berkas_penduduk');
    }
    public function pendapatan()
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_pendapatan') //dari tbel user
            ->join('penduduk_pekerjaan', 'penduduk_pendapatan.id_pekerjaan_fk=penduduk_pekerjaan.id_pekerjaan', 'left')
            ->order_by('id_pendapatan', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pendapatanget($id_pendapatan)
    {
        $query = $this->db->select('*') //pilih semua
            ->from('penduduk_pendapatan') //dari tbel user
            ->join('penduduk_pekerjaan', 'penduduk_pendapatan.id_pekerjaan_fk=penduduk_pekerjaan.id_pekerjaan', 'left')
            ->where('penduduk_pendapatan.id_pendapatan', $id_pendapatan)
            ->order_by('id_pendapatan', 'ASC') //urut berdasarkan id
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
}