<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_dashboard extends CI_Model
{

    public function barang_all(){
      $this->db->from('barang');
      return $this->db->count_all_results(); // Produces an integer, like 17
    }

    public function barang_in(){
      $this->db->select('SUM(qty) as total');
      $this->db->where('status',1);
      $this->db->from('transaksi_penyimpanan');
      return $this->db->get()->row()->total;
    }

    public function barang_wait(){
      $this->db->select('SUM(qty) as total');
      $this->db->where('status',0);
      $this->db->from('transaksi_penyimpanan');
      return $this->db->get()->row()->total;
    }

    public function barang_out(){
      $this->db->select('SUM(qty) as total');
      $this->db->where('status',1);
      $this->db->from('transaksi_pengambilan');
      return $this->db->get()->row()->total;
    }
}
?>
