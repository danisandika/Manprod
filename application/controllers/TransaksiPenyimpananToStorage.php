<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiPenyimpananToStorage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_transaksi");
    $this->load->model("model_barang");
    $this->load->model("Storage");
    $this->load->library("session");
    $this->load->library('form_validation');
	}


	public function index()
	{
		$data['count'] = $this->model_barang->barang_habis_stok();
		$data["transaksi"] = $this->model_transaksi->getAllPenyimpanan();
		$this->load->view('viewTransaksiPenyimpanan',$data);
  }

	public function tambahTransaksiPenyimpanan()
	{
		$data['count'] = $this->model_barang->barang_habis_stok();
		$data["barang"] = $this->model_barang->getAll();
		$this->load->view('addtransaksiPenyimpanan', $data);
	}

	public function addTransaksiPenyimpanantoStorage($idbarang,$id_trx){
		$data['count'] = $this->model_barang->barang_habis_stok();
		$data["transaksi"] = $this->model_transaksi->getByIDTransaksiPenyimpanan($id_trx);
		$data["barang"] = $this->model_barang->getByID($idbarang);
		$data["storagenotfull"] = $this->Storage->getAllNotFull($idbarang);
		$data["storageByBarang"] = $this->Storage->getStorageByBarang($idbarang);
		$this->load->view('addTransaksiPenyimpanantoStorage', $data);
	}


  public function saveDataToStorage()
	{
		$transaksi = $this->model_transaksi;
    $result = $transaksi->saveDataToStorage();
          if($result>0){
                $this->session->set_flashdata("Sukses", "Data Berhasil Disimpan");
                redirect(base_url('TransaksiPenyimpananToStorage/index'));
            }
            else {
                $this->session->set_flashdata("Gagal", "Data Gagal Disimpan");
                echo "<script>history.go(-1)</script>";
            }
    }

    public function update()
    {
        $barang = $this->model_barang;
        $result = $barang->update();
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('KelolaBarang/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }


  
    public function aktif($id_barang)
    {
        $barang = $this->model_barang;
        $result = $barang->aktif($id_barang);
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('KelolaBarang/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }

    public function hapus($id_barang)
    {
        $barang = $this->model_barang;
        $result = $barang->hapus($id_barang);
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('KelolaBarang/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }

}
