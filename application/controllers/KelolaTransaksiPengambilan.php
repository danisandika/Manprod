<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaTransaksiPengambilan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("model_transaksi");
				$this->load->model("model_barang");
				$this->load->model("Storage");
				$this->load->model("Karyawan");
        $this->load->library("session");
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data["barang"] = $this->model_barang->getBarangNotNull();
		$this->load->view('viewBarangAtPengambilan', $data);
  }


	public function viewStorage($id_barang)
	{
		$data["storageByBarang"] = $this->Storage->getStorageByBarang($id_barang);
		$this->load->view('viewStoragePengambilan', $data);
	}


	public function addTransaksiPengambilan($idbarang,$id_storage){
		$data["karyawan"] = $this->Karyawan->getKaryawanTransaksiPengambilan();
		$data["storage"] = $this->Storage->getByID($id_storage);
		$data["barang"] = $this->model_barang->getByID($idbarang);
		$this->load->view('addTransaksiPengambilan', $data);
	}


	public function saveTransaksi(){
		$post = $this->input->post();
		$id_barang = $post["id_barang"];

		$transaksi = $this->model_transaksi;
		$result = $transaksi->saveDataTransaksiPengambilan();
		if($result>0){
				$this->session->set_flashdata("Sukses", "Data Berhasil Di Simpan");
				redirect(base_url('KelolaTransaksiPengambilan/viewStorage/'.$id_barang));
		}else {
				$this->session->set_flashdata("Gagal", "Data Gagal Di Simpan");
				echo "<script>history.go(-1)</script>";
		}
	}


}
