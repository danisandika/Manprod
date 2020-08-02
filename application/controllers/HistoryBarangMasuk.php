<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryBarangMasuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("model_transaksi");
				$this->load->model("model_history");
				$this->load->model("model_barang");
				$this->load->model("Storage");
				$this->load->model("Karyawan");
        $this->load->library("session");
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data['count'] = $this->model_barang->barang_habis_stok();
		$data["history_simpan"] = $this->model_history->getAllHistoryPenyimpanan();
		$this->load->view('viewHistoryPenyimpanan', $data);
    }

    public function viewPeriode()
	{
		$post = $this->input->post();
    $fromdate = $post["fromdate"];
		$untildate = $post["untildate"];
		$data['count'] = $this->model_barang->barang_habis_stok();

		if($fromdate == null || $untildate == null){
			$data["history_simpan"] = $this->model_history->getAllHistoryPenyimpanan();
		}
		else{
			$data["history_simpan"] = $this->model_history->getHistoryPenyimpananByDate($fromdate, $untildate);
		}
		$this->load->view('viewHistoryPenyimpanan', $data);
    }

}
