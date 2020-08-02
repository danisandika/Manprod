<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaRole extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("model_role");
				$this->load->model("model_barang");
        $this->load->library("session");
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data['count'] = $this->model_barang->barang_habis_stok();
		$data["role"] = $this->model_role->getAll();
		$this->load->view('viewRole', $data);
  }

  public function tambah()
	{
		$role = $this->model_role;
        $this->form_validation->set_rules('txtRole','Role','is_unique[barang.nama_barang]');

	    if ($this->form_validation->run() == TRUE){
  	        $result = $role->save();
            if($result>0){
                $this->session->set_flashdata("Sukses", "Data Berhasil Disimpan");
                redirect(base_url('KelolaRole/index'));
            }
            else {
                $this->session->set_flashdata("Gagal", "Data Gagal Disimpan");
                redirect(base_url('KelolaRole/tambahRole'));
            }
        }
        else{
            $this->session->set_flashdata("Gagal", "Nama Role Sudah Ada");
            redirect(base_url('KelolaRole/tambahRole'));
        }

    }
    public function update()
    {
        $barang = $this->model_role;
        $result = $barang->update();
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('KelolaRole/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }


  public function tambahRole()
	{
		$data['count'] = $this->model_barang->barang_habis_stok();
		$this->load->view('addRole',$data);
  }

  public function editRole()
	 {
        $id = $this->uri->segment(3);
				$data['count'] = $this->model_barang->barang_habis_stok();
      	$data['role'] = $this->model_role->getByID($id);
		    $this->load->view('editRole',$data);
  }


    //PR
    public function aktif($id_role)
    {
        $role = $this->model_role;
        $result = $role->aktif($id_role);
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('KelolaRole/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }

    public function hapus($id_role)
    {
        $role = $this->model_role;
        $result = $role->hapus($id_role);
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('KelolaRole/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }

}
