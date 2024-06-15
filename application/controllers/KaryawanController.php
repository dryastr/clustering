<?php
defined('BASEPATH') or die('No direct script access allowed!');

class KaryawanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        redirect_if_level_not('Manager');
        $this->load->model('Karyawan_model', 'karyawan');
        $this->load->model('Divisi_model', 'divisi');
    }

    public function index()
    {
        $data['karyawan'] = $this->karyawan->get_all();
        return $this->template->load('template', 'karyawan/index', $data);
    }

    public function create()
    {
        $data['divisi'] = $this->divisi->get_all();
        return $this->template->load('template', 'karyawan/create', $data);
    }

    public function store()
    {
        $post = $this->input->post();
        $data = [
            'nama' => $post['nama'],
            'telp' => $post['telp'],
            'email' => $post['email'],
            'divisi' => $post['divisi'],
            'username' => $post['username'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
        ];

        $result = $this->karyawan->insert_data($data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data karyawan telah ditambahkan!'
            ];
            $redirect = 'karyawan/';
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data karyawan gagal ditambahkan'
            ];
            $redirect = 'karyawan/create';
        }

        $this->session->set_flashdata('response', $response);
        redirect($redirect);
    }


    public function edit()
    {
        $id_user = $this->uri->segment(3);
        $data['karyawan'] = $this->karyawan->find($id_user);
        $data['users'] = $this->db->query("select * from users U, divisi D where U.divisi=D.id_divisi and U.id_user='$id_user'")->result();
        $data['divisi'] = $this->divisi->get_all();
        return $this->template->load('template', 'karyawan/edit', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = [
            'nik' => $post['nik'],
            'nama' => $post['nama'],
            'telp' => $post['telp'],
            'divisi' => $post['divisi'],
            'tanggal' => $post['tanggal'],
            'nama_kegiatan' => $post['nama_kegiatan'],
            'email' => $post['email'],
            'username' => $post['username'],
        ];

        if ($post['password'] !== '') {
            $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        }

        $result = $this->karyawan->update_data($post['id_user'], $data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data Karyawan berhasil diubah!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Karyawan gagal diubah!'
            ];
        }

        $this->session->set_flashdata('response', $response);
        redirect('karyawan');
    }

    public function destroy($id)
    {
        $result = $this->karyawan->delete_data($id);

        if ($result) {
            redirect('karyawan', 'refresh');
        } else {
            echo "Gagal menghapus data karyawan.";
        }
    }
    
}
