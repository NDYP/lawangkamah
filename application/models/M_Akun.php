<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Akun extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*, penduduk_pendidikan.pendidikan as pendidikan_kk, user.username as admin_username, user.password as admin_password')
            ->from('user')
            ->join('pejabat_desa', 'pejabat_desa.id_pejabat=user.id_pejabat', 'left')
            ->join('penduduk', 'penduduk.nik_penduduk=pejabat_desa.nik', 'left')
            ->join('keluarga', 'penduduk.id_penduduk=keluarga.id_kepala_keluarga', 'left')
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

            ->where('user.id_user', $this->session->userdata('id_user'))
            ->order_by('id_user', 'DESC') //urut berdasarkan id
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function penduduk()
    {
        $query = $this->db->select('*, penduduk_pendidikan.pendidikan as pendidikan_kk')
            ->from('penduduk')

            ->join('keluarga', 'penduduk.id_penduduk=keluarga.id_kepala_keluarga', 'left')
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

            ->where('penduduk.id_penduduk', $this->session->userdata('id_penduduk'))

            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
}
