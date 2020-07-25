<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaStorage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

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
      $this->form_validation->set_rules('txtnamaStr','Nama Penyimpanan','is_unique[storage.nama_str]');

	    if ($this->form_validation->run() == TRUE){
  	        $result = $storage->save();
            if($result>0){
                $this->session->set_flashdata("Sukses", "Data Berhasil Disimpan");
                redirect(base_url('KelolaStorage/index'));
            }
            else {
                $this->session->set_flashdata("Gagal", "Data Gagal Disimpan");
                redirect(base_url('KelolaStorage/p_addStorage'));
            }
        }
        else{
            $this->session->set_flashdata("Gagal", "Nama Penyimpanan Tidak Boleh Sama");
            redirect(base_url('KelolaStorage/p_addStorage'));
        }

    }
    public function update()
    {
        $storage = $this->Storage;
        $result = $storage->update();
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('KelolaStorage/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }

  public function p_addStorage()
	{
		$this->load->view('AddStorage');
  }

	  public function p_editStorage()
		{
        $id = $this->uri->segment(3);
      	$data['storage'] = $this->Storage->getByID($id);
				$this->load->view('EditStorage',$data);
    }

    public function aktif($id_str)
    {
        $storage = $this->Storage;
        $result = $storage->aktif($id_str);
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('KelolaStorage/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }

    public function hapus($id_str)
    {
        $storage = $this->Storage;
        $result = $storage->hapus($id_str);
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('KelolaStorage/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }

}
