<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login(true);
    }

    public function index()
    {
        return $this->load->view('login');
    }

    public function login()
    {
        $this->load->model('User_Model', 'user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $check = $this->user->find_by('username', $username, false);
        if ($check->num_rows() == 1) {
            $user_data = $check->row();
            $verify_password = password_verify($password, $user_data->password);

            if ($verify_password) {
                $this->set_session($user_data);
                redirect('dashboard');
            } else {
                $this->error('Login gagal! <br>Password tidak sesuai');
            }
        } else {
            $this->error('Login gagal! <br>User tidak ditemukan');
        }

        redirect('auth/');
    }

    private function set_session($user_data)
    {
        $this->load->model('Absensi_model', 'absensi');
        $this->session->set_userdata([
           'id_user' => $user_data->id_user,
           'nama' => $user_data->nama,
           'foto' => $user_data->foto,
           'username' => $user_data->username,
           'divisi' => $user_data->divisi,
           'level' => $user_data->level,
           'is_login' => true
        ]);

        

        $this->session->set_flashdata('response', [
            'status' => 'success', 
            'message' => 'Selamat Datang ' . $user_data->nama
            // 'message' => '<span style="background-color: orange; color: white; padding: 5px;">Selamat Datang</span> ' . $user_data->nama
        ]);
    }

    private function error($msg)
    {
        $this->session->set_flashdata('error', $msg);
    }
}
