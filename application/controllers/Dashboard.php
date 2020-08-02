<?php
	defined('BASEPATH') OR exit ('No direct script access allowed');

	class Dashboard extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
				$this->load->model("model_dashboard");
        $this->load->model("model_barang");
		}

		public function index()
		{
      $data['count'] = $this->model_barang->barang_habis_stok();
			$data['barang_all'] = $this->model_dashboard->barang_all();
      $data['barang_in'] = $this->model_dashboard->barang_in();
      $data['barang_wait'] = $this->model_dashboard->barang_wait();
      $data['barang_out'] = $this->model_dashboard->barang_out();
			$this->load->view('dashboard',$data);
		}
}
?>
