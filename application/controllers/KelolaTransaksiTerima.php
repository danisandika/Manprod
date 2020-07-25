<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaTransaksiTerima extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("model_trs");
        $this->load->library("session");
        $this->load->library('form_validation');
	}
	public function index()
	{
		$data["transaksi"] = $this->model_trs->getAllTerima();
		$this->load->view('trs/transaksiPenerimaan', $data);
    }
    
   

    public function statusTerima($id_trx)
    {
        $transaksi = $this->model_trs;
        $result = $transaksi->updateTerima($id_trx);
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('kelolaTransaksiTerima/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }
    

}
