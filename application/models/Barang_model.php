<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model');
		$this->load->library('upload');
	}

	public function add_barang($kode_barang, $nama_barang, $keterangan, $stok)
	{
		$data = array(
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'keterangan' => $keterangan,
			'stok' => $stok
		);

		$this->db->insert('barang', $data);

		return $this->db->affected_rows() > 0;
	}

	public function get_all()
	{
		$query = $this->db->get('barang');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_all_barang()
	{
		$query = $this->db->get('barang');
		return $query->result();
	}

	public function get_barang_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('barang');

		return $query->row();
	}

	public function update_barang($id, $kode_barang, $nama_barang, $keterangan, $stok)
	{
		$data = array(
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'keterangan' => $keterangan,
			'stok' => $stok
		);

		$this->db->where('id', $id);
		$this->db->update('barang', $data);

		return $this->db->affected_rows() > 0;
	}

	public function delete_barang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('barang');

		return $this->db->affected_rows() > 0;
	}

	public function barang_exists($kode_barang)
	{
		$this->db->where('kode_barang', $kode_barang);
		$query = $this->db->get('barang');
		return $query->num_rows() > 0;
	}

	public function update_stok_barang($barang_id, $stok_baru)
	{
		$this->db->set('stok', $stok_baru);
		$this->db->where('id', $barang_id);
		$this->db->update('barang');
		return $this->db->affected_rows() > 0;
	}

	public function get_data()
	{
		$query = $this->db->get('barang');
		return $query->result_array();
	}

	public function save_clusters($data)
	{
		$this->db->update_batch('barang', $data, 'id');
	}

	public function upload()
	{
		$this->load->view('upload_form');
	}

	public function import()
	{
		$file_mimes = array('application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
			$arr_file = explode('.', $_FILES['file']['name']);
			$extension = end($arr_file);

			if ('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();

			foreach ($sheetData as $key => $value) {
				if ($key == 0) {
					continue;
				}
				$this->Barang_model->add_barang($value[1], $value[2], $value[3], $value[4]);
			}

			redirect('barang');
		}
	}
}
