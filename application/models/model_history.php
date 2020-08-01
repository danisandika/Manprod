<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_history extends CI_Model
{
    //private $_table = "transaksi_penyimpanan";

    public function getAllHistoryPenyimpanan(){
        $this->db->select('t.id_trx, t.id_barang,b.nama_barang as nama_barang, s.nama_perusahaan as nama_perusahaan,k.nama_kry as nama_karyawan,t.qty_masuk as qty_masuk,t.tgl_diterima as tgl_diterima,t.status');
        $this->db->from('transaksi_penyimpanan t');
        $this->db->join('barang b','t.id_barang=b.id_barang');
        $this->db->join('supplier s','s.id_supplier=t.id_supplier');
        $this->db->join('karyawan k','k.id_kry=t.id_karyawan');
        $this->db->where('t.status',1);
        $this->db->order_by('t.tgl_diterima','DESC');
        $query = $this->db->get();
        return $query->result();
    }


    public function getHistoryPenyimpananByDate($from, $until){
        $this->db->select('t.id_trx, t.id_barang,b.nama_barang as nama_barang, s.nama_perusahaan as nama_perusahaan,k.nama_kry as nama_karyawan,t.qty_masuk as qty_masuk,t.tgl_diterima as tgl_diterima,t.status');
        $this->db->from('transaksi_penyimpanan t');
        $this->db->join('barang b','t.id_barang=b.id_barang');
        $this->db->join('supplier s','s.id_supplier=t.id_supplier');
        $this->db->join('karyawan k','k.id_kry=t.id_karyawan');
        $this->db->where('t.tgl_diterima >=', $from);
        $this->db->where('t.tgl_diterima <=', $until);
        $this->db->order_by('t.tgl_diterima','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    //-------------------------------------------------------------------------------------------

    public function getAllHistoryPengambilan(){
        $this->db->select('t.id_trx, t.id_barang,
                            b.nama_barang as nama_barang, 
                            k.nama_kry as nama_karyawan_ambil,
                            k.nama_kry as nama_karyawan,
                            t.qty as qty,
                            t.tgl_diambil as tgl_diambil,
                            t.status');
        $this->db->from('transaksi_pengambilan t');
        $this->db->join('barang b','t.id_barang=b.id_barang');
        $this->db->join('karyawan k','k.id_kry=t.id_karyawan_bertugas or t.id_karyawan_ambil = k.id_kry') ;
        $this->db->where('t.status',1);
        $this->db->order_by('t.tgl_diambil','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getHistoryPengambilanByDate($from, $until){
        $this->db->select('t.id_trx, t.id_barang,
                            b.nama_barang as nama_barang, 
                            k.nama_kry as nama_karyawan_ambil,
                            k.nama_kry as nama_karyawan,
                            t.qty as qty,
                            t.tgl_diambil as tgl_diambil,
                            t.status');
        $this->db->from('transaksi_pengambilan t');
        $this->db->join('barang b','t.id_barang=b.id_barang');
        $this->db->join('karyawan k','k.id_kry=t.id_karyawan_bertugas or t.id_karyawan_ambil = k.id_kry') ;
        $this->db->where('t.tgl_diambil >=', $from);
        $this->db->where('t.tgl_diambil <=', $until);
        $this->db->order_by('t.tgl_diambil','DESC');
        $query = $this->db->get();
        return $query->result();
    }

}