<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaTransaksiPenyimpanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("model_transaksi");
				$this->load->model("model_barang");
        $this->load->library("session");
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data['count'] = $this->model_barang->barang_habis_stok();
		$data["barang"] = $this->model_barang->getAll();
		$this->load->view('addBarangToTransaksi', $data);
  }


	public function tambahTransaksi($idbarang){
		$data['count'] = $this->model_barang->barang_habis_stok();
		$data["daftarTransaksi"] = $this->model_transaksi->getPenyimpananByBarang($idbarang);
		$data["supplier"] = $this->model_transaksi->getAllSupplier();
		$data["barang"] = $this->model_barang->getByID($idbarang);
		$this->load->view('addTransaksiPenyimpanan',$data);
	}

	public function saveTransaksi(){
		$post = $this->input->post();
		$id_barang = $post["id_barang"];

		$transaksi = $this->model_transaksi;
		$result = $transaksi->savePenyimpanan();
		if($result>0){
				$this->session->set_flashdata("Sukses", "Data Berhasil Di Simpan");
				redirect(base_url('KelolaTransaksiPenyimpanan/tambahTransaksi/'.$id_barang));
		}else {
				$this->session->set_flashdata("Gagal", "Data Gagal Di Simpan");
				echo "<script>history.go(-1)</script>";
		}
	}



}
