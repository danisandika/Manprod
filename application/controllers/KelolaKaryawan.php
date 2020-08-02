<?php
	defined('BASEPATH') OR exit ('No direct script access allowed');

	class KelolaKaryawan extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
     	 	$this->load->model("Karyawan");
     	 	$this->load->model("model_role");
				$this->load->model("model_barang");
     	 	$this->load->library("session");
   			$this->load->library('form_validation');
		}

		public function index()
		{
			$data['count'] = $this->model_barang->barang_habis_stok();
     	$data['karyawan'] = $this->Karyawan->getAll();
			$this->load->view('kelolaKaryawan',$data);
		}

    public function tKaryawan()
	  {
				$data['count'] = $this->model_barang->barang_habis_stok();
      	//$data['karyawan'] = $this->Karyawan->getAll();
      	$data['karyawan'] = $this->Karyawan->get_role();
	    	$this->load->view('tambahKaryawan',$data);
	  }

		public function editProfile()
	  {
			$data['count'] = $this->model_barang->barang_habis_stok();
	  	$id = $this->uri->segment(3);
      $data['karyawan'] = $this->Karyawan->getByID($id);
	    $this->load->view('editProfile',$data);
	  }

    public function eKaryawan()
	  {
			$data['count'] = $this->model_barang->barang_habis_stok();
	  	$id = $this->uri->segment(3);
      $data['karyawan'] = $this->Karyawan->getByID($id);
			$data['role'] = $this->Karyawan->get_role();
	    $this->load->view('editKaryawan',$data);
	  }

    public function tambah()
	  {
		$karyawan = $this->Karyawan;

			$this->form_validation->set_rules('txtEmail','Email Pengguna','is_unique[karyawan.email_kry]');

	    if ($this->form_validation->run() == TRUE){
  	    $result = $karyawan->save();
  	    if($result>0){
          $this->session->set_flashdata("Sukses", "Data Berhasil Disimpan");
          redirect(base_url('KelolaKaryawan/index'));
        }else {
          $this->session->set_flashdata("Gagal", "Data Gagal Disimpan");
          redirect(base_url('KelolaKaryawan/tPengguna'));
        }
		}else{
      $this->session->set_flashdata("Gagal", "Email Tidak Boleh Sama");
      redirect(base_url('KelolaKaryawan/tPengguna'));
	  }

	  }

		public function update()
		{
			$karyawan = $this->Karyawan;
			$result = $karyawan->update();
			if($result>0){
				$this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
				redirect(base_url('KelolaKaryawan/index'));
			}else {
				$this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
				echo "<script>history.go(-1)</script>";
			}
		}

		public function updateProfile()
		{
			$karyawan = $this->Karyawan;
			$result = $karyawan->updateProfile();
			if($result>0){
				$this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
				redirect(base_url('Dashboard/index'));
			}else {
				$this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
				echo "<script>history.go(-1)</script>";
			}
		}

		public function editPassword(){
			$data['count'] = $this->model_barang->barang_habis_stok();
			$id = $this->uri->segment(3);
      $data['karyawan'] = $this->Karyawan->getByID($id);
	    $this->load->view('editPassword',$data);
		}

		public function updatePassword()
		{
			$karyawan = $this->Karyawan;
			$result = $karyawan->updatePassword();
			if($result>0){
				$this->session->set_flashdata("Sukses", "Password Berhasil Di Ubah");
				redirect(base_url('KelolaRole/index'));
			}else {
				$this->session->set_flashdata("Gagal", "Password Gagal Di Ubah");
				echo "<script>history.go(-1)</script>";
			}
		}

		public function hapus($id_kry)
		{
			$karyawan = $this->Karyawan;
			$result = $karyawan->hapus($id_kry);
			if($result>0){
				$this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
				redirect(base_url('KelolaKaryawan/index'));
			}else {
				$this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
				echo "<script>history.go(-1)</script>";
			}
		}

		public function aktif($id_kry)
		{
			$karyawan = $this->Karyawan;
			$result = $karyawan->aktif($id_kry);
			if($result>0){
				$this->session->set_flashdata("Sukses", "Data Berhasil Di Ubah");
				redirect(base_url('KelolaKaryawan/index'));
			}else {
				$this->session->set_flashdata("Gagal", "Data Gagal Di Ubah");
				echo "<script>history.go(-1)</script>";
			}
		}

	}
?>
