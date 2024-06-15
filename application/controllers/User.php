<?php
defined('BASEPATH') or die('No direct script access allowed!');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_Model', 'user');
        $this->load->model('Divisi_model', 'divisi');
    }

    public function index()
    {
        $id_user = $this->session->id_user;
        $data['user'] = $this->user->find_by('id_user', $id_user, true);
        $data['users'] = $this->db->query("select * from users U, divisi D where U.divisi=D.id_divisi and U.id_user='$id_user'")->result();
        $data['divisi'] = $this->divisi->get_all();
        return $this->template->load('template', 'management_user', $data);
    }


    public function management_user()
    {
        $post = $this->input->post();
        $data = [
            'nik' => $post['nik'],
            'nama' => $post['nama'],
            'telp' => $post['telp'],
            'divisi' => $post['divisi'],
            'email' => $post['email'],
            'username' => $post['username'],
        ];

        if ($post['password'] !== '') {
            $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        }

        $result = $this->user->update_data($this->session->id_user, $data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Profil berhasil diubah!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Profil gagal diubah!'
            ];
        }

        $this->session->set_flashdata('response', $response);
        redirect('management_user');
    }

    public function update_foto()
    {
        $config = [
            'upload_path' => './assets/img/profil',
            'allowed_types' => 'gif|jpg|png',
            'max_size' => '2000',
            'file_name' => round(microtime(date('dY')))
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $response = [
                'status' => 'error',
                'message' => $this->upload->display_errors()
            ];

            $this->session->set_flashdata('response', $response);
            return redirect('management_user');
        }

        $data_foto = $this->upload->data();
        $data['foto'] = $data_foto['file_name'];
        $result = $this->user->update_data($this->session->id_user, $data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Foto Profil berhasil diubah!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Foto Profil gagal diubah!'
            ];
            unlink($data_foto['full_path']);
        }

        $this->session->set_flashdata('response', $response);
        redirect('management_useruser');
    }
}
