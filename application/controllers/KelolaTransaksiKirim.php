<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaTransaksiKirim extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("model_transaksiPengiriman");
        $this->load->library("session");
        $this->load->library('form_validation');
	}
	
	public function index()
	{
		$data["transaksi"] = $this->model_transaksiPengiriman->getAll();
		$this->load->view('trs/transaksiPengiriman', $data);
    }

    public function statusKirim($id_trx)
    {
        $transaksi = $this->model_transaksiPengiriman;
        $result = $transaksi->updateKirim($id_trx);
        if($result>0){
            $this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
            redirect(base_url('kelolaTransaksiKirim/index'));
        }else {
            $this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
            echo "<script>history.go(-1)</script>";
        }
    }
    

}
