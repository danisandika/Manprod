<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaStorage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("Storage");
        $this->load->library("session");
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data["storage"] = $this->Storage->getAll();
		$this->load->view('viewStorage', $data);
  }

  public function tambah()
	{
      $storage = $this->Storage;
      $result = $storage->save();
      if($result>0){
          $this->session->set_flashdata("Sukses", "Data Berhasil Disimpan");
          redirect(base_url('KelolaStorage/index'));
      }
      else {
          $this->session->set_flashdata("Gagal", "Data Gagal Disimpan");
          redirect(base_url('KelolaStorage/tambahStorage'));
      }
  }

    public function update()
    {
      $post = $this->input->post();
      $id_str = $post["id_storage"];
      $storage = $this->Storage;
      $qty = $storage->getByID($id_str)->jumlah;

			if($qty<=0){
        $result = $storage->update();
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Disimpan");
            redirect(base_url('KelolaStorage/index'));
        }
        else {
            $this->session->set_flashdata("Gagal", "Data Gagal Disimpan");
            redirect(base_url('KelolaStorage/editStorage/'.$id_str));
        }
      }else{
        $this->session->set_flashdata("Gagal", "Data Storage tidak Kosong");
				echo "<script>history.go(-1)</script>";
      }
    }

    public function editStorage()
     {
          $id = $this->uri->segment(3);
          $data['storage'] = $this->Storage->getByID($id);
          $this->load->view('editStorage',$data);
    }


  public function tambahStorage()
	{
		$this->load->view('addStorage');
  }



}
