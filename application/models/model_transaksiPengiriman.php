<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_transaksiPengiriman extends CI_Model
{
    private $_table = "transaksi";

    public function getAll()
	{
        $this->db->select('transaksi.id_trx, barang.nama_barang, storage.Area, storage.Lemari, karyawan.nama_kry, transaksi.qty, transaksi.status, transaksi.keterangan, transaksi.tgl_aksi');
        $this->db->from('transaksi');
        $this->db->join('barang','barang.id_barang=transaksi.id_barang');
        $this->db->join('storage','storage.id_str=transaksi.id_str');
        $this->db->join('karyawan','karyawan.id_kry=transaksi.id_kry');
        $this->db->where('transaksi.status',4);
        $query = $this->db->get();
       
		return $query->result();
    }

    public function updateKirim($id_trx)
    {
       
        $this->tgl_aksi = date("Y-m-d H:i:s");
        $this->status = 5;

        $where = array(
        'id_trx' => $id_trx,
        );
        
        $this->db->where($where);
        return $this->db->update($this->_table, $this);
    }

}