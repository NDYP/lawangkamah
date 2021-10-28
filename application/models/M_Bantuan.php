<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Bantuan extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('bantuan')
            ->order_by('bantuan.id_bantuan', 'DESC') //urut berdasarkan id
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
    public function hapus($id_bantuan)
    {
        $this->db->where('id_bantuan', $id_bantuan);
        $this->db->delete('bantuan');
    }

    public function hapusanggota($id_bantuan_penerima)
    {
        $this->db->where('id_bantuan_penerima', $id_bantuan_penerima);
        $this->db->delete('bantuan_penerima');
    }
    public function anggota($id_bantuan)
    {
        $query = $this->db->select('*')
            ->from('bantuan_penerima')
            ->join('penduduk', 'bantuan_penerima.id_penerima=penduduk.id_penduduk', 'left')
            ->join('bantuan', 'bantuan_penerima.id_bantuan=bantuan_penerima.id_bantuan', 'left')

            //->join('keluarga_anggota', 'penduduk.id_penduduk=keluarga_anggota.id_anggota', 'left')
            //->join('keluarga_anggota as b', 'keluarga.id_kepala_keluarga=b.id_kepala_keluarga', 'left')
            //->join('penduduk_jenis_kelamin', 'penduduk.id_jenis_kelamin=penduduk_jenis_kelamin.id_jk', 'left')
            //->join('penduduk_agama', 'penduduk.id_agama=penduduk_agama.id_agama', 'left')
            //->join('penduduk_asuransi', 'penduduk.id_asuransi=penduduk_asuransi.id_asuransi', 'left')
            //->join('penduduk_golongan_darah', 'penduduk.id_golongan_darah=penduduk_golongan_darah.id_goldar', 'left')
            ->join('penduduk_kecacatan', 'penduduk.id_cacat=penduduk_kecacatan.id_cacat', 'left')
            ->join('penduduk_pekerjaan', 'penduduk.id_pekerjaan=penduduk_pekerjaan.id_pekerjaan', 'left')
            //->join('penduduk_pendidikan', 'penduduk.id_pendidikan_kk=penduduk_pendidikan.id_pendidikan', 'left')

            //->join('penduduk_pendidikan_ditempuh as p', 'penduduk.id_pendidikan_ditempuh=p.id_pendidikan', 'left')
            //->join('penduduk_penolong_kelahiran', 'penduduk.id_penolong_kelahiran=penduduk_penolong_kelahiran.id_penolong_kelahiran', 'left')
            //->join('penduduk_sakit', 'penduduk.id_sakit=penduduk_sakit.id_sakit', 'left')
            //->join('penduduk_status', 'penduduk.id_status_kependudukan=penduduk_status.id_status', 'left')
            //->join('penduduk_status_kk', 'penduduk.id_status_dalam_keluarga=penduduk_status_kk.id_status_kk', 'left')
            //->join('penduduk_status_nikah', 'penduduk.id_status_perkawinan=penduduk_status_nikah.id_nikah', 'left')
            //->join('penduduk_wn', 'penduduk.id_status_wn=penduduk_wn.id_wn', 'left')
            ->where('bantuan_penerima.id_bantuan', $id_bantuan)
            ->order_by('bantuan_penerima.id_bantuan', 'ASC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
}
