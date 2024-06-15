<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangKeluar_model extends CI_Model {

    public function add_barang_keluar($barang_id, $tanggal, $jumlah, $keterangan)
    {
        $data = array(
            'barang_id' => $barang_id,
            'tanggal' => $tanggal,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan
        );

        $this->db->insert('databarangkeluar', $data);
        return $this->db->affected_rows() > 0;
    } 

    public function get_all()
    {
        $query = $this->db->get('databarangkeluar');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); 
        }
    }

    public function get_barang_keluar_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('databarangkeluar');

        return $query->row();
    }

    public function update_barang_keluar($id, $barang_id, $tanggal, $jumlah, $keterangan)
    {
        $data = array(
            'barang_id' => $barang_id,
            'tanggal' => $tanggal,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan
        );
    
        $this->db->where('id', $id);
        $this->db->update('databarangkeluar', $data);
    
        return $this->db->affected_rows() > 0;
    }

    public function delete_barang_keluar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('databarangkeluar');

        return $this->db->affected_rows() > 0;
    }

    public function barang_exists($kode_barang)
    {
        $this->db->where('kode_barang', $kode_barang);
        $query = $this->db->get('barang');
        return $query->num_rows() > 0;
    }

    public function get_stok_masuk_by_barang_id($barang_id)
    {
        $this->db->select_sum('jumlah');
        $this->db->where('barang_id', $barang_id);
        $query = $this->db->get('databarangkeluar');
        
        return $query->row()->jumlah;
    }


}
