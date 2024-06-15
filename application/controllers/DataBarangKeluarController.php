<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataBarangKeluarController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load the necessary models in the constructor
        $this->load->model('Barang_model');
        $this->load->model('BarangKeluar_model');
    }

    public function index()
    {
        $data['databarangkeluar'] = $this->BarangKeluar_model->get_all();

        // $this->load->view('databarang/index', $data);

        return $this->template->load('template', 'databarangkeluar/index', $data);
    }

    public function create()
    {
        $data['barang'] = $this->Barang_model->get_all();
        return $this->template->load('template', 'databarangkeluar/create', $data);
    }
    
    public function store()
    {
        $barang_id = $this->input->post('barang_id');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');
    
        $result = $this->BarangKeluar_model->add_barang_keluar($barang_id, $tanggal, $jumlah, $keterangan);
    
        if ($result) {
            // Update stok barang setelah barang keluar
            $this->update_stok_barang($barang_id, $jumlah);
            redirect('data-barang-keluar', 'refresh');
        } else {
            echo "Gagal menyimpan data barang keluar.";
        }
    }
    
    private function update_stok_barang($barang_id, $jumlah_berkurang)
    {
        $barang = $this->Barang_model->get_barang_by_id($barang_id);
        if ($barang) {
            $stok_sekarang = $barang->stok;
            $stok_baru = $stok_sekarang - $jumlah_berkurang;
            // Update stok barang
            $this->Barang_model->update_stok_barang($barang_id, $stok_baru);
        }
    }   

    public function edit($id)
    {
        $data['barang'] = $this->Barang_model->get_all();
        $data['databarangkeluar'] = $this->BarangKeluar_model->get_barang_keluar_by_id($id);
    
        return $this->template->load('template', 'databarangkeluar/edit', $data);
    }
    
    public function update()
    {
        $id = $this->input->post('id');
        $barang_id = $this->input->post('barang_id');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');
    
        // Simpan jumlah sebelumnya sebelum diupdate
        $databarangkeluar_sebelum = $this->BarangKeluar_model->get_barang_keluar_by_id($id);
        $jumlah_sebelum = $databarangkeluar_sebelum->jumlah;
    
        // Update data barang keluar
        $result = $this->BarangKeluar_model->update_barang_keluar($id, $barang_id, $tanggal, $jumlah, $keterangan);
    
        if ($result) {
            // Hitung jumlah yang berkurang
            $jumlah_berkurang = $jumlah_sebelum - $jumlah;
    
            // Update stok barang di Barang_model
            $this->update_stok_barang($barang_id, $jumlah_berkurang);
    
            redirect('data-barang-keluar', 'refresh');
        } else {
            echo "Gagal memperbarui data barang keluar.";
        }
    }

    public function destroy($id)
    {
        $result = $this->BarangKeluar_model->delete_barang_keluar($id);

        if ($result) {
            redirect('data-barang-keluar', 'refresh');
        } else {
            echo "Gagal menghapus data barang.";
        }
    }

}
