<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Keluarga extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('penduduk')
            //->join('penduduk', 'keluarga.id_kepala_keluarga=penduduk.id_penduduk', 'left')
            //->join('keluarga_anggota', 'penduduk.id_penduduk=keluarga_anggota.id_anggota', 'left')
            //->join('penduduk_jenis_kelamin', 'penduduk.id_jenis_kelamin=penduduk_jenis_kelamin.id_jk', 'left')
            //->join('penduduk_agama', 'penduduk.id_agama=penduduk_agama.id_agama', 'left')
            //->join('penduduk_asuransi', 'penduduk.id_asuransi=penduduk_asuransi.id_asuransi', 'left')
            //->join('penduduk_golongan_darah', 'penduduk.id_golongan_darah=penduduk_golongan_darah.id_goldar', 'left')
            //->join('penduduk_kecacatan', 'penduduk.id_cacat=penduduk_kecacatan.id_cacat', 'left')
            //->join('penduduk_pekerjaan', 'penduduk.id_pekerjaan=penduduk_pekerjaan.id_pekerjaan', 'left')
            //->join('penduduk_pendidikan', 'penduduk.id_pendidikan_kk=penduduk_pendidikan.id_pendidikan', 'left')
            //->join('penduduk_pendidikan_ditempuh as p', 'penduduk.id_pendidikan_ditempuh=p.id_pendidikan', 'left')
            //->join('penduduk_penolong_kelahiran', 'penduduk.id_penolong_kelahiran=penduduk_penolong_kelahiran.id_penolong_kelahiran', 'left')
            //->join('penduduk_sakit', 'penduduk.id_sakit=penduduk_sakit.id_sakit', 'left')
            //->join('penduduk_status', 'penduduk.id_status_kependudukan=penduduk_status.id_status', 'left')
            ->join('penduduk_status_kk', 'penduduk.id_status_kk=penduduk_status_kk.id_status_kk', 'left')
            //->join('penduduk_status_nikah', 'penduduk.id_status_perkawinan=penduduk_status_nikah.id_nikah', 'left')
            //->join('penduduk_wn', 'penduduk.id_status_wn=penduduk_wn.id_wn', 'left')
            //->order_by('keluarga.id_keluarga', 'DESC') //urut berdasarkan id
            ->where('penduduk.id_status_kk', '1')
            ->group_by('penduduk.no_kk')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($no_kk)
    {
        $query = $this->db->select('*')
            ->from('penduduk')
            //->join('penduduk', 'keluarga.id_kepala_keluarga=penduduk.id_penduduk', 'left')

            //->join('keluarga_anggota', 'penduduk.id_penduduk=keluarga_anggota.id_anggota', 'left')
            //->join('keluarga_anggota as b', 'keluarga.id_kepala_keluarga=b.id_kepala_keluarga', 'left')
            ///->join('penduduk_jenis_kelamin', 'penduduk.id_jenis_kelamin=penduduk_jenis_kelamin.id_jk', 'left')
            //->join('penduduk_agama', 'penduduk.id_agama=penduduk_agama.id_agama', 'left')
            //->join('penduduk_asuransi', 'penduduk.id_asuransi=penduduk_asuransi.id_asuransi', 'left')
            //->join('penduduk_golongan_darah', 'penduduk.id_golongan_darah=penduduk_golongan_darah.id_golongan_darah', 'left')
            //->join('penduduk_kecacatan', 'penduduk.id_cacat=penduduk_kecacatan.id_cacat', 'left')
            ->join('penduduk_pekerjaan', 'penduduk.id_pekerjaan=penduduk_pekerjaan.id_pekerjaan', 'left')
            ->join('penduduk_pendidikan', 'penduduk.id_pendidikan_kk=penduduk_pendidikan.id_pendidikan', 'left')
            //->join('penduduk_pendidikan_ditempuh', 'penduduk.id_pendidikan_ditempuh=penduduk_pendidikan_ditempuh.id_pendidikan', 'left')
            //->join('penduduk_penolong_kelahiran', 'penduduk.id_penolong_kelahiran=penduduk_penolong_kelahiran.id_penolong_kelahiran', 'left')
            //->join('penduduk_sakit', 'penduduk.id_sakit=penduduk_sakit.id_sakit', 'left')
            //->join('penduduk_pendapatan', 'penduduk.id_pendapatan=penduduk_pendapatan.id_pendapatan', 'left')
            //->join('penduduk_status', 'penduduk.id_status_kependudukan=penduduk_status.id_status', 'left')
            ->join('penduduk_status_kk', 'penduduk.id_status_kk=penduduk_status_kk.id_status_kk', 'left')
            //->join('penduduk_status_nikah', 'penduduk.id_status_nikah=penduduk_status_nikah.id_status_nikah', 'left')
            //->join('penduduk_wn', 'penduduk.id_status_wn=penduduk_wn.id_status_wn', 'left')
            ->where('penduduk.no_kk', $no_kk)
            ->order_by('penduduk.no_kk', 'ASC') //urut berdasarkan id
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
    public function hapus($id_keluarga)
    {
        $this->db->where('id_keluarga', $id_keluarga);
        $this->db->delete('keluarga');
    }



    //Anggota Keluarga//
    public function anggota($id_keluarga)
    {
        $query = $this->db->select('*')
            ->from('keluarga_anggota')
            ->join('penduduk', 'keluarga_anggota.id_anggota=penduduk.id_penduduk', 'left')
            //->join('keluarga', 'penduduk.id_penduduk=keluarga.id_kepala_keluarga', 'left')
            //->join('keluarga_anggota as a', 'keluarga.id_keluarga=a.id_kepala_keluarga', 'left')
            //->join('penduduk_jenis_kelamin', 'penduduk.id_jenis_kelamin=penduduk_jenis_kelamin.id_jk', 'left')
            ->join('penduduk_agama', 'penduduk.id_agama=penduduk_agama.id_agama', 'left')
            ->join('penduduk_asuransi', 'penduduk.id_asuransi=penduduk_asuransi.id_asuransi', 'left')
            ->join('penduduk_golongan_darah', 'penduduk.id_golongan_darah=penduduk_golongan_darah.id_golongan_darah', 'left')
            ->join('penduduk_kecacatan', 'penduduk.id_cacat=penduduk_kecacatan.id_cacat', 'left')
            ->join('penduduk_pekerjaan', 'penduduk.id_pekerjaan=penduduk_pekerjaan.id_pekerjaan', 'left')
            ->join('penduduk_pendidikan', 'penduduk.id_pendidikan_kk=penduduk_pendidikan.id_pendidikan', 'left')
            ->join('penduduk_pendidikan_ditempuh', 'penduduk.id_pendidikan_ditempuh=penduduk_pendidikan_ditempuh.id_pendidikan', 'left')
            ->join('penduduk_penolong_kelahiran', 'penduduk.id_penolong_kelahiran=penduduk_penolong_kelahiran.id_penolong_kelahiran', 'left')
            ->join('penduduk_sakit', 'penduduk.id_sakit=penduduk_sakit.id_sakit', 'left')
            ->join('penduduk_pendapatan', 'penduduk.id_pendapatan=penduduk_pendapatan.id_pendapatan', 'left')
            ->join('penduduk_status', 'penduduk.id_status_kependudukan=penduduk_status.id_status', 'left')
            ->join('penduduk_status_kk', 'penduduk.id_status_kk=penduduk_status_kk.id_status_kk', 'left')
            ->join('penduduk_status_nikah', 'penduduk.id_status_nikah=penduduk_status_nikah.id_status_nikah', 'left')
            ->join('penduduk_wn', 'penduduk.id_status_wn=penduduk_wn.id_status_wn', 'left')
            ->where('keluarga_anggota.id_kepala_keluarga', $id_keluarga)
            ->order_by('keluarga_anggota.id_keluarga_anggota', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function hapusanggota($id_keluarga_anggota)
    {
        $this->db->where('id_keluarga_anggota', $id_keluarga_anggota);
        $this->db->delete('keluarga_anggota');
    }
}
