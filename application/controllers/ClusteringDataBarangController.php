<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ClusteringDataBarangController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['clusters'] = $this->Barang_model->get_all();

		return $this->template->load('template', 'clustering/index', $data);
	}

	public function uploadExcel()
	{
		$fileName = time() . $_FILES['file']['name'];

		$config['upload_path'] = './uploads/';
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size'] = 10000;

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('message', 'Failed to upload file.');
			redirect('data-clustering');
		} else {
			$media = $this->upload->data();
			$inputFileName = './uploads/' . $media['file_name'];

			try {
				$spreadsheet = IOFactory::load($inputFileName);
			} catch (Exception $e) {
				die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
					. '": ' . $e->getMessage());
			}

			$sheet = $spreadsheet->getActiveSheet();
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();

			for ($row = 2; $row <= $highestRow; $row++) {
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

				$kode_barang = $rowData[0][0];
				$nama_barang = $rowData[0][1];
				$keterangan = $rowData[0][2];
				$stok = $rowData[0][3];

				$this->Barang_model->add_barang($kode_barang, $nama_barang, $keterangan, $stok);
			}

			$this->session->set_flashdata('message', 'File successfully uploaded and data imported.');
			redirect('data-clustering');
		}
	}

	public function processView()
	{
		$data['clusters'] = $this->Barang_model->get_all();

		return $this->template->load('template', 'clustering/clustering_form', $data);
	}

	public function process()
	{
		$type_centroid = $this->input->post('type_centroid');
		$num_clusters = $this->input->post('num_clusters');
		$max_iterations = $this->input->post('max_iterations');

		if ($type_centroid && $num_clusters && $max_iterations) {
			$data = array(
				'type_centroid' => $type_centroid,
				'num_clusters' => $num_clusters,
				'max_iterations' => $max_iterations
			);

			$this->db->insert('clustering_settings', $data);

			$barang = $this->Barang_model->get_all_barang();

			$data_points = array();
			foreach ($barang as $item) {
				$data_points[] = array(
					'id' => $item->id,
					'stok' => $item->stok
				);
			}

			$clusters = $this->k_means($data_points, $num_clusters, $max_iterations, $type_centroid);

			redirect('tentukan-clustering');
		} else {
			echo "Data tidak valid";
		}
	}

	private function k_means($data_points, $num_clusters, $max_iterations, $type_centroid)
	{
		$centroids = array();

		if ($type_centroid == 'random') {
			$random_keys = array_rand($data_points, $num_clusters);
			foreach ($random_keys as $key) {
				$centroids[] = $data_points[$key];
			}
		} else {
			$sum = array_reduce($data_points, function ($carry, $item) {
				return $carry + $item['stok'];
			}, 0);
			$mean = $sum / count($data_points);
			for ($i = 0; $i < $num_clusters; $i++) {
				$centroids[] = array('stok' => $mean + rand(-10, 10));
			}
		}

		$clusters = array();
		for ($iteration = 1; $iteration <= $max_iterations; $iteration++) {
			$clusters = array_fill(0, $num_clusters, array());

			foreach ($data_points as $point) {
				$distances = array();
				foreach ($centroids as $index => $centroid) {
					$distances[$index] = abs($point['stok'] - $centroid['stok']);
				}
				$closest_centroid = array_keys($distances, min($distances))[0];
				$clusters[$closest_centroid][] = $point;

				$this->db->insert('barang_clusters_iterations', array(
					'iteration' => $iteration,
					'barang_id' => $point['id'],
					'cluster_id' => $closest_centroid,
					'distance' => $distances[$closest_centroid]
				));
			}

			$new_centroids = array();
			foreach ($clusters as $cluster) {
				if (count($cluster) > 0) {
					$sum = array_reduce($cluster, function ($carry, $item) {
						return $carry + $item['stok'];
					}, 0);
					$new_centroids[] = array('stok' => $sum / count($cluster));
				} else {
					$new_centroids[] = array('stok' => 0);
				}
			}

			if ($centroids == $new_centroids) {
				break;
			}

			$centroids = $new_centroids;
		}

		return $clusters;
	}

	public function clusterResultView()
	{
		$query = $this->db->select('bc.*, b.kode_barang, b.nama_barang, b.keterangan, b.stok')
			->from('barang_clusters_iterations bc')
			->join('barang b', 'bc.barang_id = b.id')
			->order_by('bc.iteration, bc.cluster_id, b.id')
			->get();
		$data['clustering_results'] = $query->result();

		log_message('debug', 'Data clustering results: ' . print_r($data['clustering_results'], true));

		if (empty($data['clustering_results'])) {
			show_error('No clustering results found.', 404);
		}

		return $this->template->load('template', 'clustering/clustering_results', $data);
	}
}
