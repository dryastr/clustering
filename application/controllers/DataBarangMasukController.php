<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataBarangMasukController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load the necessary models in the constructor
        $this->load->model('Barang_model');
        $this->load->model('BarangMasuk_model');
    }

    public function index()
    {
        $data['databarangmasuk'] = $this->BarangMasuk_model->get_all();

        // $this->load->view('databarang/index', $data);

        return $this->template->load('template', 'databarangmasuk/index', $data);
    }

    public function create()
    {
        $data['barang'] = $this->Barang_model->get_all();
        return $this->template->load('template', 'databarangmasuk/create', $data);
    }

    public function store()
    {
        $barang_id = $this->input->post('barang_id');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');

        $result = $this->BarangMasuk_model->add_barang_masuk($barang_id, $tanggal, $jumlah);

        if ($result) {
            redirect('data-barang', 'refresh');
        } else {
            echo "Gagal menyimpan data barang masuk.";
        }
    }

    public function edit($id)
    {
        $data['barang'] = $this->Barang_model->get_all();
        $data['databarangmasuk'] = $this->BarangMasuk_model->get_barang_masuk_by_id($id);
    
        return $this->template->load('template', 'databarangmasuk/edit', $data);
    }
    
    public function update()
    {
        $id = $this->input->post('id'); // ID data barang masuk yang akan diupdate
        $barang_id = $this->input->post('barang_id');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
    
        $result = $this->BarangMasuk_model->update_barang_masuk($id, $barang_id, $tanggal, $jumlah);
    
        if ($result) {
            redirect('data-barang-masuk', 'refresh');
        } else {
            echo "Gagal memperbarui data barang masuk.";
        }
    }

    public function destroy($id)
    {
        $result = $this->BarangMasuk_model->delete_barang_masuk($id);

        if ($result) {
            redirect('data-barang-masuk', 'refresh');
        } else {
            echo "Gagal menghapus data barang.";
        }
    }

}
