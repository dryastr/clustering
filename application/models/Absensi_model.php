<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Absensi_model extends CI_Model
{
    public function get_absen($id_user, $bulan, $tahun)
    {
        $this->db->select("DATE_FORMAT(a.tanggal, '%d-%m-%Y') AS tanggal, a.waktu AS waktu, a.status as status, a.latitude as latitude, a.longitude as longitude, a.accuracy as accuracy, a.keterangan as keterangan");
        $this->db->where('id_user', $id_user);
        $this->db->where("DATE_FORMAT(tanggal, '%m') = ", $bulan);
        $this->db->where("DATE_FORMAT(tanggal, '%Y') = ", $tahun);
        $this->db->group_by("tanggal");
        $result = $this->db->get('presensi a');
        return $result->result_array();
    }

    public function absen_harian_user($id_user)
    {
        $today = date('Y-m-d');
        $this->db->where('tanggal', $today);
        $this->db->where('id_user', $id_user);
        $data = $this->db->get('presensi');
        return $data;
    }

    public function absensi_harian_user($id_user)
    {
        $today = date('Y-m-d');
        $this->db->where('tanggal', $today);
        $this->db->where('id_user', $id_user);
        $data = $this->db->get('presensi');
        return $data;
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('presensi', $data);
        return $result;
    }

    public function get_jam_by_time($time)
    {
        $this->db->where('start', $time, '<=');
        $this->db->or_where('finish', $time, '>=');
        $data = $this->db->get('jam');
        return $data->row();
    }

    public function get_by_date($id_user, $date, $keterangan)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('tanggal', $date);
        $this->db->where('keterangan', $keterangan);
        $data = $this->db->get('presensi');
        return $data->result();
    }

    public function get_date_coba($id_user, $date)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('tanggal', $date);
        $data = $this->db->get('presensi');
        return $data->result();
    }
}
