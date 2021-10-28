<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kelompok extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('kelompok')
            ->join('kelompok_kategori', 'kelompok.kategori=kelompok_kategori.id_kategori', 'left')
            ->order_by('kelompok.id_kelompok', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function kategori()
    {
        $query = $this->db->select('*')
            ->from('kelompok_kategori')
            ->order_by('kelompok_kategori.id_kategori', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function jabatan()
    {
        $query = $this->db->select('*')
            ->from('kelompok_jabatan')
            ->order_by('kelompok_jabatan.id_jabatan', 'ASC') //urut berdasarkan id
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
    public function hapus($id_kelompok)
    {
        $this->db->where('id_kelompok', $id_kelompok);
        $this->db->delete('kelompok');
    }
    public function hapusanggota($id_kelompok_anggota)
    {
        $this->db->where('id_kelompok_anggota', $id_kelompok_anggota);
        $this->db->delete('kelompok_anggota');
    }
    public function anggota($id_kelompok)
    {
        $query = $this->db->select('*')
            ->from('kelompok_anggota')
            ->join('kelompok', 'kelompok.id_kelompok=kelompok_anggota.id_kelompok', 'left')
            ->join('kelompok_jabatan', 'kelompok_anggota.id_jabatan=kelompok_jabatan.id_jabatan', 'left')
            ->join('penduduk', 'kelompok_anggota.id_anggota=penduduk.id_penduduk', 'left')
            //->join('keluarga_anggota', 'penduduk.id_penduduk=keluarga_anggota.id_anggota', 'left')
            //->join('keluarga_anggota as b', 'keluarga.id_kepala_keluarga=b.id_kepala_keluarga', 'left')
            //->join('penduduk_jenis_kelamin', 'penduduk.id_jenis_kelamin=penduduk_jenis_kelamin.id_jk', 'left')
            //->join('penduduk_agama', 'penduduk.id_agama=penduduk_agama.id_agama', 'left')
            //->join('penduduk_asuransi', 'penduduk.id_asuransi=penduduk_asuransi.id_asuransi', 'left')
            //->join('penduduk_golongan_darah', 'penduduk.id_golongan_darah=penduduk_golongan_darah.id_goldar', 'left')
            ->join('penduduk_kecacatan', 'penduduk.id_cacat=penduduk_kecacatan.id_cacat', 'left')
            ->join('penduduk_pekerjaan', 'penduduk.id_pekerjaan=penduduk_pekerjaan.id_pekerjaan', 'left')
            ->join('penduduk_pendidikan', 'penduduk.id_pendidikan_kk=penduduk_pendidikan.id_pendidikan', 'left')

            //->join('penduduk_pendidikan_ditempuh as p', 'penduduk.id_pendidikan_ditempuh=p.id_pendidikan', 'left')
            //->join('penduduk_penolong_kelahiran', 'penduduk.id_penolong_kelahiran=penduduk_penolong_kelahiran.id_penolong_kelahiran', 'left')
            //->join('penduduk_sakit', 'penduduk.id_sakit=penduduk_sakit.id_sakit', 'left')
            //->join('penduduk_status', 'penduduk.id_status_kependudukan=penduduk_status.id_status', 'left')
            //->join('penduduk_status_kk', 'penduduk.id_status_dalam_keluarga=penduduk_status_kk.id_status_kk', 'left')
            //->join('penduduk_status_nikah', 'penduduk.id_status_perkawinan=penduduk_status_nikah.id_nikah', 'left')
            //->join('penduduk_wn', 'penduduk.id_status_wn=penduduk_wn.id_wn', 'left')
            ->where('kelompok.id_kelompok', $id_kelompok)
            ->order_by('kelompok.id_kelompok', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function anggotakelompok()
    {
        $query = $this->db->select('*')
            ->from('kelompok_anggota')
            ->join('kelompok', 'kelompok.id_kelompok=kelompok_anggota.id_kelompok', 'left')
            ->join('kelompok_jabatan', 'kelompok_anggota.id_jabatan=kelompok_jabatan.id_jabatan', 'left')
            ->join('penduduk', 'kelompok_anggota.id_anggota=penduduk.id_penduduk', 'left')
            //->join('keluarga_anggota', 'penduduk.id_penduduk=keluarga_anggota.id_anggota', 'left')
            //->join('keluarga_anggota as b', 'keluarga.id_kepala_keluarga=b.id_kepala_keluarga', 'left')
            //->join('penduduk_jenis_kelamin', 'penduduk.id_jenis_kelamin=penduduk_jenis_kelamin.id_jk', 'left')
            //->join('penduduk_agama', 'penduduk.id_agama=penduduk_agama.id_agama', 'left')
            //->join('penduduk_asuransi', 'penduduk.id_asuransi=penduduk_asuransi.id_asuransi', 'left')
            //>join('penduduk_golongan_darah', 'penduduk.id_golongan_darah=penduduk_golongan_darah.id_goldar', 'left')
            ->join('penduduk_kecacatan', 'penduduk.id_cacat=penduduk_kecacatan.id_cacat', 'left')
            ->join('penduduk_pekerjaan', 'penduduk.id_pekerjaan=penduduk_pekerjaan.id_pekerjaan', 'left')
            //->join('penduduk_pendidikan', 'penduduk.id_pendidikan_kk=penduduk_pendidikan.id_pendidikan', 'left')

            //->join('penduduk_pendidikan_ditempuh as p', 'penduduk.id_pendidikan_ditempuh=p.id_pendidikan', 'left')
            // ->join('penduduk_penolong_kelahiran', 'penduduk.id_penolong_kelahiran=penduduk_penolong_kelahiran.id_penolong_kelahiran', 'left')
            ->join('penduduk_sakit', 'penduduk.id_sakit=penduduk_sakit.id_sakit', 'left')
            // ->join('penduduk_status', 'penduduk.id_status_kependudukan=penduduk_status.id_status', 'left')
            // ->join('penduduk_status_kk', 'penduduk.id_status_dalam_keluarga=penduduk_status_kk.id_status_kk', 'left')
            // ->join('penduduk_status_nikah', 'penduduk.id_status_perkawinan=penduduk_status_nikah.id_nikah', 'left')
            // ->join('penduduk_wn', 'penduduk.id_status_wn=penduduk_wn.id_wn', 'left')

            ->order_by('kelompok_anggota.id_kelompok_anggota', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_kelompok)
    {
        $query = $this->db->select('*')
            ->from('kelompok')
            ->join('kelompok_kategori', 'kelompok.kategori=kelompok_kategori.id_kategori', 'left')
            ->where('kelompok.id_kelompok', $id_kelompok)
            ->order_by('kelompok.id_kelompok', 'ASC') //urut berdasarkan id
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
}
