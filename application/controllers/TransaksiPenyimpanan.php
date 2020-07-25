<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiPenyimpanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("model_transaksiPenyimpanan");
        $this->load->model("model_barang");
        $this->load->model("Storage");
        $this->load->library("session");
        $this->load->library('form_validation');
	}
	public function index()
	{
		$data["transaksi"] = $this->model_transaksiPenyimpanan->getAll();
        $data["barang"] = $this->model_barang->getAll();
        $data1["brg"] = $this->model_barang->getData();
        $data["storage"] = $this->Storage->getAll();
		$this->load->view('transaksiPenyimpanan/view', $data);
    }
    public function tambah()
	{
		$transaksi = $this->model_transaksiPenyimpanan;
        $result = $transaksi->save();
          if($result>0){
                $this->session->set_flashdata("Sukses", "Data Berhasil Disimpan");
                redirect(base_url('TransaksiPenyimpanan/index'));
            }
            else {
                $this->session->set_flashdata("Gagal", "Data Gagal Disimpan");
                redirect(base_url('TransaksiPenyimpanan/tambahBarang'));
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
    public function tambahBarang()
	{
		$this->load->view('transaksiPenyimpanan/add');
    }

    public function editBarang()
	{
        $id = $this->uri->segment(3);
      	$data['barang'] = $this->model_barang->getByID($id);
		$this->load->view('barang/editBarang',$data);
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
