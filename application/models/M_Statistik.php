<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Statistik extends CI_Model
{
    public function pendidikanditempuh()
    {
        $totallaki = '(select count(*) from penduduk WHERE jenis_kelamin="Laki-Laki")';
        $totalperempuan = '(select count(*) from penduduk WHERE jenis_kelamin="Perempuan")';
        $total = '(select count(penduduk.id_penduduk) from penduduk 
        RIGHT JOIN penduduk_pendidikan_ditempuh 
        on penduduk.id_pendidikan_ditempuh=penduduk_pendidikan_ditempuh.id_pendidikan)';
        $query = $this->db
            ->select('
            penduduk_pendidikan_ditempuh.pendidikan,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            concat(round((100*count(penduduk.id_penduduk))/' . $totallaki . ',2),"%") as persenco,
            concat(round((100*count(penduduk.id_penduduk))/' . $totalperempuan . ',2),"%") as persence')
            ->from('penduduk')
            ->join(
                'penduduk_pendidikan_ditempuh',
                'penduduk.id_pendidikan_ditempuh=penduduk_pendidikan_ditempuh.id_pendidikan',
                'right'
            )
            ->order_by('penduduk_pendidikan_ditempuh.id_pendidikan', 'ASC')
            ->group_by('penduduk_pendidikan_ditempuh.id_pendidikan')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pendidikankk()
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
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function status_kk()
    {
        $total = '(select count(penduduk.id_status_kk) from penduduk RIGHT JOIN penduduk_status_kk on penduduk.id_status_kk=penduduk_status_kk.id_status_kk)';
        $query = $this->db
            ->select('
            penduduk_status_kk.status_kk as status_kk,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_status_kk', 'penduduk.id_status_kk=penduduk_status_kk.id_status_kk', 'right')
            ->order_by('penduduk_status_kk.id_status_kk', 'ASC')
            ->group_by('penduduk_status_kk.id_status_kk')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function agama()
    {
        $total = '(select count(penduduk.id_agama) from penduduk
        RIGHT JOIN penduduk_agama on penduduk.id_agama=penduduk_agama.id_agama)';
        $query = $this->db
            ->select('
            penduduk_agama.agama as agama,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_agama', 'penduduk.id_agama=penduduk_agama.id_agama', 'right')
            ->order_by('penduduk_agama.id_agama', 'ASC')
            ->group_by('penduduk_agama.id_agama')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function jenis_kelamin()
    {
        $total = '(select count(*) from penduduk)';
        $query = $this->db
            ->select('
            jenis_kelamin,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(*))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->order_by('penduduk.jenis_kelamin', 'ASC')
            ->group_by('penduduk.jenis_kelamin')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function status_kependudukan()
    {
        $total = '(select count(penduduk.id_status_kependudukan) from penduduk
        RIGHT JOIN penduduk_status on penduduk.id_status_kependudukan=penduduk_status.id_status)';
        $query = $this->db
            ->select('
            penduduk_status.status_penduduk as status_kependudukan,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_status', 'penduduk.id_status_kependudukan=penduduk_status.id_status', 'right')
            ->order_by('penduduk_status.id_status', 'ASC')
            ->group_by('penduduk_status.id_status')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function penolong_kelahiran()
    {
        $total = '(select count(penduduk.id_penolong_kelahiran) from penduduk
        RIGHT JOIN penduduk_penolong_kelahiran 
        on penduduk.id_penolong_kelahiran=penduduk_penolong_kelahiran.id_penolong_kelahiran)';
        $query = $this->db
            ->select('
            penolong_kelahiran,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_penolong_kelahiran', 'penduduk.id_penolong_kelahiran=penduduk_penolong_kelahiran.id_penolong_kelahiran', 'right')
            ->order_by('penduduk_penolong_kelahiran.id_penolong_kelahiran', 'ASC')
            ->group_by('penduduk_penolong_kelahiran.id_penolong_kelahiran')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pekerjaan()
    {
        $total = '(select count(penduduk.id_penduduk) from penduduk 
        RIGHT JOIN penduduk_pekerjaan 
        on penduduk.id_pekerjaan=penduduk_pekerjaan.id_pekerjaan)';
        $query = $this->db
            ->select('
            penduduk_pekerjaan.pekerjaan,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_pekerjaan', 'penduduk.id_pekerjaan=penduduk_pekerjaan.id_pekerjaan', 'right')
            ->order_by('penduduk_pekerjaan.id_pekerjaan', 'ASC')
            ->group_by('penduduk_pekerjaan.id_pekerjaan')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function status_wn()
    {
        $total = '(select count(penduduk.id_penduduk) from penduduk 
        RIGHT JOIN penduduk_wn 
        on penduduk.id_status_wn=penduduk_wn.id_status_wn)';
        $query = $this->db
            ->select('
            penduduk_wn.warga_negara as status_wn,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_wn', 'penduduk.id_status_wn=penduduk_wn.id_status_wn', 'right')
            ->order_by('penduduk_wn.id_status_wn', 'ASC')
            ->group_by('penduduk_wn.id_status_wn')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function status_kawin()
    {
        $total = '(select count(penduduk.id_penduduk) from penduduk
        RIGHT JOIN penduduk_status_nikah 
        on penduduk.id_status_nikah=penduduk_status_nikah.id_status_nikah)';
        $query = $this->db
            ->select('
            penduduk_status_nikah.status_nikah as status_kawin,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_status_nikah', 'penduduk.id_status_nikah=penduduk_status_nikah.id_status_nikah', 'right')
            ->order_by('penduduk_status_nikah.id_status_nikah', 'ASC')
            ->group_by('penduduk_status_nikah.id_status_nikah')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function golongan_darah()
    {
        $total = '(select count(penduduk.id_penduduk) from penduduk
        RIGHT JOIN penduduk_golongan_darah 
        on penduduk.id_golongan_darah=penduduk_golongan_darah.id_golongan_darah)';
        $query = $this->db
            ->select('
            penduduk_golongan_darah.golongan_darah,penduduk_golongan_darah.id_golongan_darah,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_golongan_darah', 'penduduk.id_golongan_darah=penduduk_golongan_darah.id_golongan_darah', 'right')
            ->order_by('penduduk_golongan_darah.id_golongan_darah', 'ASC')
            ->group_by('penduduk_golongan_darah.id_golongan_darah')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function darah($golongan_darah)
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
            ->where('penduduk_golongan_darah.id_golongan_darah', $golongan_darah)
            ->order_by('id_penduduk', 'ASC') //urut berdasarkan id
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function sakit()
    {
        $total = '(select count(penduduk.id_penduduk) from penduduk RIGHT JOIN penduduk_sakit on penduduk.id_sakit=penduduk_sakit.id_sakit)';
        $query = $this->db
            ->select('
            penduduk_sakit.sakit,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_sakit', 'penduduk.id_sakit=penduduk_sakit.id_sakit', 'right')
            ->order_by('penduduk_sakit.id_sakit', 'ASC')
            ->group_by('penduduk_sakit.id_sakit')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function cacat()
    {
        $total = '(select count(penduduk.id_penduduk) from penduduk RIGHT JOIN penduduk_kecacatan on penduduk.id_cacat=penduduk_kecacatan.id_cacat)';
        $query = $this->db
            ->select('
            penduduk_kecacatan.cacat,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_kecacatan', 'penduduk.id_cacat=penduduk_kecacatan.id_cacat', 'right')
            ->order_by('penduduk_kecacatan.id_cacat', 'ASC')
            ->group_by('penduduk_kecacatan.id_cacat')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function asuransi()
    {
        $total = '(select count(penduduk.id_penduduk) from penduduk
        RIGHT JOIN penduduk_asuransi on penduduk.id_asuransi=penduduk_asuransi.id_asuransi)';
        $query = $this->db
            ->select('
            penduduk_asuransi.asuransi,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_asuransi', 'penduduk.id_asuransi=penduduk_asuransi.id_asuransi', 'right')
            ->order_by('penduduk_asuransi.id_asuransi', 'ASC')
            ->group_by('penduduk_asuransi.id_asuransi')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function rentang_umur()
    {

        $total = '(select count(*) from penduduk)';
        $x = '(TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) from penduduk)';
        $query = $this->db
            ->select('rentang_umur,
            concat(rentang_umur,"-",rentang_umur2) as rentang,
            TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur,
            count(penduduk.id_penduduk) as jumlah,
            
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(*))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->order_by('penduduk.rentang_umur', 'ASC')
            ->group_by('penduduk.rentang_umur')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pendapatan()
    {
        $total = '(select count(penduduk.id_penduduk) from penduduk
        RIGHT JOIN penduduk_pendapatan on penduduk.id_pendapatan=penduduk_pendapatan.id_pendapatan)';
        $query = $this->db
            ->select('
            penduduk_pendapatan.pendapatan,
            count(penduduk.id_penduduk) as jumlah,
            sum(CASE WHEN jenis_kelamin ="Laki-Laki" THEN 1 ELSE 0 END) as jumlahco,
            sum(CASE WHEN jenis_kelamin ="Perempuan" THEN 1 ELSE 0 END) as jumlahce,
            concat(round((100*count(penduduk.id_penduduk))/' . $total . ',2),"%") as persentasi, 
            ')
            ->from('penduduk')
            ->join('penduduk_pendapatan', 'penduduk.id_pendapatan=penduduk_pendapatan.id_pendapatan', 'right')
            ->order_by('penduduk_pendapatan.id_pendapatan', 'ASC')
            ->group_by('penduduk_pendapatan.pendapatan')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function rentan()
    {
        $query = $this->db->select('*')
            ->from('penduduk')
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
            ->where('penduduk.rentang_umur>=', '50')
            ->order_by('id_penduduk', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function getrentan($id_penduduk)
    {
        $query = $this->db->select('*, penduduk_pendidikan.pendidikan as pendidikan_kk')
            ->from('penduduk')
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
            ->where('penduduk.rentang_umur>=', '50')
            ->where('penduduk.id_penduduk', $id_penduduk)
            ->order_by('id_penduduk', 'ASC') //urut berdasarkan id
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
}