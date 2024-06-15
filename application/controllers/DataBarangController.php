<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataBarangController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('BarangMasuk_model');
    }

    public function index()
    {
        $data['barang'] = $this->Barang_model->get_all();

        // $this->load->view('databarang/index', $data);

        return $this->template->load('template', 'databarang/index', $data);
    }

    public function create()
    {
        return $this->template->load('template', 'databarang/create');
    }

    public function store()
    {
        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $keterangan = $this->input->post('keterangan');
        $stok = $this->input->post('stok');

        $result = $this->Barang_model->add_barang($kode_barang, $nama_barang, $keterangan, $stok);

        if ($result) {
            redirect('data-barang', 'refresh');
        } else {
            echo "Failed to store barang data.";
        }
    }

    public function edit($id)
    {
        $data['barang'] = $this->Barang_model->get_barang_by_id($id);

        return $this->template->load('template', 'databarang/edit', $data);
    }

    public function update()
    {
        $id_barang = $this->input->post('id_barang');
        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $keterangan = $this->input->post('keterangan');
        $stok = $this->input->post('stok');

        $result = $this->Barang_model->update_barang($id_barang, $kode_barang, $nama_barang, $keterangan, $stok);

        if ($result) {
            redirect('data-barang', 'refresh');
        } else {
            echo "Failed to update barang data.";
        }
    }

    public function destroy($id)
    {
        $result = $this->Barang_model->delete_barang($id);

        if ($result) {
            redirect('data-barang', 'refresh');
        } else {
            echo "Gagal menghapus data barang.";
        }
    }

    public function cetak_pdf()
    {
        $this->load->library('MY_Tcpdf');

        $data['barang'] = $this->Barang_model->get_all(); 

        $pdf_view = $this->load->view('databarang/cetakPdf', $data, true);

        $pdf = new MY_Tcpdf();
        $pdf->SetTitle('Data Barang');
        $pdf->AddPage();
        $pdf->writeHTML($pdf_view);
        $pdf->Output('data_barang.pdf', 'I'); 
    }
    
}
