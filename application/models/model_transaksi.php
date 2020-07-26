<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_transaksi extends CI_Model
{
    private $_table = "transaksi_penyimpanan";


    public function getAllPenyimpanan(){
      $this->db->select('t.*,b.nama_barang as nama_barang,s.nama_perusahaan as nama_supplier,k.nama_kry as nama_karyawan');
      $this->db->from('transaksi_penyimpanan t');
      $this->db->join('barang b','t.id_barang=b.id_barang');
      $this->db->join('supplier s','s.id_supplier=t.id_supplier');
      $this->db->join('karyawan k','k.id_kry=t.id_karyawan');
      $this->db->where('t.status',0);
      $this->db->order_by('t.tgl_diterima','ASC');
      $query = $this->db->get();
      return $query->result();
    }

    public function getByIDTransaksiPenyimpanan($id_trx)
    {
        $this->db->select('*')
                ->from('transaksi_penyimpanan')
                ->where('id_trx',$id_trx);
        $query = $this->db->get();
        return $query->row();
    }

    public function savePenyimpanan()
    {
      $post = $this->input->post();
      $this->id_trx = "IN".date("YmdHis");
      $this->id_barang = $post["id_barang"];
      $this->qty = $post["qty"];
      $this->qty_rusak = $post["qty"];
      $this->id_karyawan = $this->session->userdata('user_id');
      $this->id_supplier = $post["id_supplier"];
      $this->tgl_diterima = $post["tgl_diterima"];
      $this->deskripsi = $post["deskripsi"];
      $this->status = 0;

  		return $this->db->insert($this->_table,$this);
    }


    public function getPenyimpananByBarang($idbarang){
      $this->db->select('t.*,b.nama_barang as nama_barang,s.nama_perusahaan as nama_supplier,k.nama_kry as nama_karyawan');
      $this->db->from('transaksi_penyimpanan t');
      $this->db->join('barang b','t.id_barang=b.id_barang');
      $this->db->join('supplier s','s.id_supplier=t.id_supplier');
      $this->db->join('karyawan k','k.id_kry=t.id_karyawan');
      $this->db->where('t.status',0);
      $this->db->where('t.id_barang',$idbarang);
      $query = $this->db->get();
      return $query->result();
    }


    public function getAllSupplier()
  	{
  		return $this->db->get("supplier")->result();
    }


    public function saveDataToStorage(){
      $post = $this->input->post();
      $qty = $post["qty"];
      $qty_masuk = $post["qty_masuk"];
      $id_trx = $post["txtIdTransaksi"];
      $jumlahTotalBarang = $post["txtTotalBarang"];

      if($qty == $qty_masuk){
        $trx->status = 1;
        $trx->qty_masuk = $qty_masuk;
        $trx->qty_rusak = $qty - $qty_masuk;
      }else{
        $trx->status = 0;
        $trx->qty_masuk = $qty_masuk;
        $trx->qty_rusak = $qty - $qty_masuk;
      }

      $this->db->update($this->_table,$trx,array('id_trx'=>$id_trx));

      $storage->id_barang = $post["txtIdBarang"];
      $storage->nama_barang = $post["txtNamaBarang"];
      $storage->jumlah = $qty_masuk;
      $storage->tgl_masuk = date('Y-m-d');
      $storage->keterangan = $post["deskripsi"];
      $storage->status = $post["status_storage"];

      $this->db->update("storage",$storage,array('id_storage'=>$post["id_storage"]));

      $this->qty = $qty_masuk + $jumlahTotalBarang;
      return $this->db->update("barang",$this,array('id_barang'=>$post["txtIdBarang"]));
    }



    /*BAGIAN DARI PROSES TRANSAKSI PENGAMBILAN*/
    public function saveDataTransaksiPengambilan(){
      $post = $this->input->post();
      $qty_barang = $post["qty_barang"];
      $qty_ambil = $post["txtJumlahAmbil"];
      $id_trx = "OUT".date("YmdHis");
      $qty_storage = $post["txtJumlah"];

      if($qty_storage>$qty_ambil){
        $storage->status = 1;
        $storage->jumlah = $qty_storage - $qty_ambil;
      }else{
        $storage->id_barang = null;
        $storage->nama_barang = null;
        $storage->jumlah = $qty_storage - $qty_ambil;
        $storage->tgl_masuk = '0000-00-00';
        $storage->keterangan = null;
        $storage->status = 0;
      }

      $this->db->update("storage",$storage,array('id_storage'=>$post["id_storage"]));


      $barang->qty = $qty_barang-$qty_ambil;
      $this->db->update("barang",$barang,array('id_barang'=>$post["id_barang"]));

      $this->id_trx = $id_trx;
      $this->id_barang = $post["id_barang"];
      $this->qty = $qty_ambil;
      $this->id_karyawan_bertugas = $this->session->userdata('user_id');
      $this->id_karyawan_ambil = $post["kry_ambil"];
      $this->tgl_diambil = $post["dtKeluar"];
      $this->deskripsi = $post["deskripsi"];
      $this->status = 1;
      return $this->db->insert("transaksi_pengambilan",$this);
    }




}
