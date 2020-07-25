<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaBarang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("model_barang");
        $this->load->library("session");
        $this->load->library('form_validation');
	}
	public function index()
	{
		$data["barang"] = $this->model_barang->getAll();
		$this->load->view('viewBarang', $data);
    }
    public function tambah()
	{
		$barang = $this->model_barang;
        $this->form_validation->set_rules('txtNamaBarang','Nama Barang','is_unique[barang.nama_barang]');

	    if ($this->form_validation->run() == TRUE){
  	        $result = $barang->save();
            if($result>0){
                $this->session->set_flashdata("Sukses", "Data Berhasil Disimpan");
                redirect(base_url('KelolaBarang/index'));
            }
            else {
                $this->session->set_flashdata("Gagal", "Data Gagal Disimpan");
                redirect(base_url('KelolaBarang/tambahBarang'));
            }
        }
        else{
            $this->session->set_flashdata("Gagal", "Nama Barang Sudah Ada");
            redirect(base_url('KelolaBarang/tambahBarang'));
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
		$this->load->view('addBarang');
    }

    public function editBarang()
	{
        $id = $this->uri->segment(3);
      	$data['barang'] = $this->model_barang->getByID($id);
		$this->load->view('editBarang',$data);
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
