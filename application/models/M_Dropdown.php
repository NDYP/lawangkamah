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
    public function status_wn()
    {
        $query = $this->db->select('*')
            ->from('penduduk_wn')
            ->order_by('penduduk_wn.id_status_wn', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function updatestatus_wn($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambahstatus_wn($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapusstatus_wn($id_sakit)
    {
        $this->db->where('id_status_wn', $id_sakit);
        $this->db->delete('penduduk_wn');
    }
    public function golongan_darah()
    {
        $query = $this->db->select('*')
            ->from('penduduk_golongan_darah')
            ->order_by('penduduk_golongan_darah.id_golongan_darah', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function updategolongan_darah($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambahgolongan_darah($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapusgolongan_darah($id_golongan_darah)
    {
        $this->db->where('id_golongan_darah', $id_golongan_darah);
        $this->db->delete('penduduk_golongan_darah');
    }
    public function asuransi()
    {
        $query = $this->db->select('*')
            ->from('penduduk_asuransi')
            ->order_by('penduduk_asuransi.id_asuransi', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function updateasuransi($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambahasuransi($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapusasuransi($id_asuransi)
    {
        $this->db->where('id_asuransi', $id_asuransi);
        $this->db->delete('penduduk_asuransi');
    }
    public function penolong_kelahiran()
    {
        $query = $this->db->select('*')
            ->from('penduduk_penolong_kelahiran')
            ->order_by('penduduk_penolong_kelahiran.id_penolong_kelahiran', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function updatepenolong_kelahiran($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambahpenolong_kelahiran($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapuspenolong_kelahiran($id_sakit)
    {
        $this->db->where('id_penolong_kelahiran', $id_sakit);
        $this->db->delete('penduduk_penolong_kelahiran');
    }
    public function agama()
    {
        $query = $this->db->select('*')
            ->from('penduduk_agama')
            ->order_by('penduduk_agama.id_agama', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function updateagama($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambahagama($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapusagama($id_sakit)
    {
        $this->db->where('id_agama', $id_sakit);
        $this->db->delete('penduduk_agama');
    }
    public function status_kk()
    {
        $query = $this->db->select('*')
            ->from('penduduk_status_kk')
            ->order_by('penduduk_status_kk.id_status_kk', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function updatestatus_kk($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambahstatus_kk($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapusstatus_kk($id_status_kk)
    {
        $this->db->where('id_status_kk', $id_status_kk);
        $this->db->delete('penduduk_status_kk');
    }
    public function pendidikan()
    {
        $query = $this->db->select('*')
            ->from('penduduk_pendidikan')
            ->order_by('penduduk_pendidikan.id_pendidikan', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function updatependidikan($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambahpendidikan($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapuspendidikan($id_pendidikan)
    {
        $this->db->where('id_pendidikan', $id_pendidikan);
        $this->db->delete('penduduk_pendidikan');
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