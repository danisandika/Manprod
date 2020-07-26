<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaSupplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("model_supplier");
        $this->load->library("session");
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data["supplier"] = $this->model_supplier->getAll();
		$this->load->view('viewSupplier', $data);
  }


  public function tambah()
	{
			  $sup = $this->model_supplier;
        $this->form_validation->set_rules('txtNamaBarang','Nama Barang','is_unique[barang.nama_barang]');

  	        $result = $sup->save();
            if($result>0){
                $this->session->set_flashdata("Sukses", "Data Berhasil Disimpan");
                redirect(base_url('KelolaSupplier/index'));
            }
            else {
                $this->session->set_flashdata("Gagal", "Data Gagal Disimpan");
                redirect(base_url('KelolaSupplier/tambahSupplier'));
            }

  }

    public function update()
    {
        $sup = $this->model_supplier;
        $result = $sup->update();
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('KelolaSupplier/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }


    public function tambahSupplier()
	  {
		$this->load->view('addSupplier');
    }

  public function editSupplier()
	{
        $id = $this->uri->segment(3);
      	$data['supplier'] = $this->model_supplier->getByID($id);
				$this->load->view('editSupplier',$data);
    }

    public function aktif($id_supplier)
    {
        $sup = $this->model_supplier;
        $result = $sup->aktif($id_supplier);
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('KelolaSupplier/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }

    public function hapus($id_supplier)
    {
        $sup = $this->model_supplier;
        $result = $sup->hapus($id_supplier);
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('KelolaSupplier/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }

}
