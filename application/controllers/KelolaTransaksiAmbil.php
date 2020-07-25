<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaTransaksiAmbil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("model_trs");
        $this->load->library("session");
        $this->load->library('form_validation');
	}
	public function index()
	{
		$data["transaksi"] = $this->model_trs->getAllAmbil();
		$this->load->view('trs/transaksiPengambilan', $data);
    }
    
    public function statusAmbil($id_trx)
    {
        $transaksi = $this->model_trs;
        $result = $transaksi->updateAmbil($id_trx);
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('kelolaTransaksiAmbil/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }
    

}
