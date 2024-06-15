<?php
defined('BASEPATH') or die('No direct script access allowed!');

function check_absen_harian()
{
    $CI = &get_instance();
    $id_user = $CI->session->id_user;
    $CI->load->model('Absensi_model', 'presensi');
    $absen_user = $CI->presensi->absen_harian_user($id_user)->num_rows();
    if (!is_weekend()) {
        if ($absen_user < 2) {
            $CI->session->set_userdata('absen_warning', 'true');
        } else {
            $CI->session->set_userdata('absen_warning', 'false');
        }
    }
}

function show_status($id_user, $date, $keterangan)
{
    // if ($date) {
    // $keterangan = ucfirst($keterangan);
    // $tanggal = date($date, 'Y-m-d');
    $CI = &get_instance();
    $CI->load->model('Absensi_model', 'presensi');
    // $absen = $CI->presensi->db->where('tanggal', $date)->where('keterangan', $keterangan)->get('presensi')->row();
    $absen = $CI->presensi->get_by_date($id_user, $date, $keterangan);
    return $absen;
    // } else {
    // if ($raw) {
    //     return [
    //         'status' => 'normal',
    //         'text' => 'Tidak Hadir'
    //     ];
    // }
    //     return 1;
    // }
}

function coba($id_user, $date)
{
    $CI = &get_instance();
    $CI->load->model('Absensi_model', 'presensi');
    $absen = $CI->presensi->get_date_coba($id_user, $date);
    return $absen;
}

function check_jam($jam, $status, $raw = false)
{
    if ($jam) {
        $status = ucfirst($status);
        $CI = &get_instance();
        $CI->load->model('Jam_model', 'jam');
        $jam_kerja = $CI->jam->db->where('keterangan', $status)->get('jam')->row();

        if ($status == 'Masuk' && $jam > $jam_kerja->finish) {
            if ($raw) {
                return [
                    'status' => 'telat',
                    'text' => $jam
                ];
            } else {
                return '<span class="badge badge-danger">' . $jam . '</span>';
            }
        } elseif ($status == 'Pulang' && $jam > $jam_kerja->finish) {
            if ($raw) {
                return [
                    'status' => 'lembur',
                    'text' => $jam
                ];
            } else {
                return '<span class="badge badge-success">' . $jam . '</span>';
            }
        } else {
            if ($raw) {
                return [
                    'status' => 'normal',
                    'text' => $jam
                ];
            } else {
                return '<span class="badge badge-primary">' . $jam . '</span>';
            }
        }
    } else {
        if ($raw) {
            return [
                'status' => 'normal',
                'text' => 'Tidak Hadir'
            ];
        }
        return 'Tidak Hadir';
    }
}

function is_weekend($tgl = false)
{
    $tgl = @$tgl ? $tgl : date('d-m-Y');
    return in_array(date('l', strtotime($tgl)), ['Saturday', 'Sunday']);
}

/* End of File: d:\Ampps\www\project\absen-pegawai\application\helpers\check_absen_helper.php */