<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangMasuk_model extends CI_Model {

    public function add_barang_masuk($barang_id, $tanggal, $jumlah)
    {
        $data = array(
            'barang_id' => $barang_id,
            'tanggal' => $tanggal,
            'jumlah' => $jumlah
        );
    
        $this->db->insert('databarangmasuk', $data);
        return $this->db->affected_rows() > 0;
    }    

    public function get_all()
    {
        $query = $this->db->get('databarangmasuk');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); 
        }
    }

    public function get_barang_masuk_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('databarangmasuk');

        return $query->row();
    }

    public function update_barang_masuk($id, $barang_id, $tanggal, $jumlah)
    {
        $data = array(
            'barang_id' => $barang_id,
            'tanggal' => $tanggal,
            'jumlah' => $jumlah
        );
    
        $this->db->where('id', $id);
        $this->db->update('databarangmasuk', $data);
    
        return $this->db->affected_rows() > 0;
    }

    public function delete_barang_masuk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('databarangmasuk');

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
        $query = $this->db->get('databarangmasuk');
        
        return $query->row()->jumlah;
    }


}
