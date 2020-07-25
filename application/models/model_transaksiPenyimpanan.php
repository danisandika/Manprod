<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_transaksiPenyimpanan extends CI_Model
{
  private $_table = "transaksi";
  private $_table1 = "barang";
  private $_table2 = "storage";

  public function __construct()
  {
        parent::__construct();
  }

  public function getAll()
  {
     $this->db->select('transaksi.id_trx, barang.nama_barang, storage.Area, storage.Lemari, karyawan.nama_kry, transaksi.qty, transaksi.status, transaksi.keterangan, transaksi.tgl_aksi');
        $this->db->from('transaksi');
        $this->db->join('barang','barang.id_barang=transaksi.id_barang');
        $this->db->join('storage','storage.id_str=transaksi.id_str');
        $this->db->join('karyawan','karyawan.id_kry=transaksi.id_kry');
        $this->db->where('transaksi.status',0);
    $query = $this->db->get();
       
        return $query->result();
  }

  public function getByID($id_kry)
  {
    $this->db->select('*')
             ->from('transaksi')
             ->where('id_trx',$id_trx);
    $query = $this->db->get();
    return $query->row();
  }

  public function save()
  {
    $post = $this->input->post();
    $this->id_barang = $post["id_barang"];
    $this->id_str = $post["id_str"];
    $this->id_kry = "5";
    $this->qty = $post["qty"];
    $this->keterangan = $post["keterangan"];
    $this->tgl_aksi = date("Y-m-d H:i:s");
    $this->status = 0;
		return $this->db->insert($this->_table,$this);
  }

  public function update()
  {
    $post = $this->input->post();
    $this->nama_kry = $post["nama_kry"];
    $this->username = $post["username"];
    $this->pass = $post["pass"];
    $this->email_kry = $post["email_kry"];
    $this->sex = $post["sex"];
    $this->role = $post["role"];
    $this->status = $post["status"];

    $where = array(
      'id_kry' => $this->input->post("id_kry"),
    );
    
    $this->db->where($where);
    return $this->db->update($this->_table, $this);
  }


  public function hapus($id_kry)
  {
    $this->status = 0;
    
    $where = array(
    'id_kry' => $id_kry,
    );
    $this->db->where($where);
    return $this->db->update($this->_table, $this);
  }

  public function aktif($id_kry)
  {
    $this->status = 1;
    
    $where = array(
    'id_kry' => $id_kry,
    );
    $this->db->where($where);
    return $this->db->update($this->_table, $this);
  }

}

?>
