<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("dbMasterKaryawan");
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function cekLogin()
	{
		$post = $this->input->post();
		if(isset($post["txtusername"]) && isset($post["txtPassword"]))
		{
			//cek user
			$user = $this->dbMasterKaryawan;
			$data = $user->getByUsernamePassword();

			if($data != null)
			{
				$email = $data->email_kry; 
				$nama = $data->nama_kry;
				$ro = $data->role;

				$newdata = array(
					'user_email' => $email,
					'user_nama' => $nama,
					'user_role' => $ro,
				);
				
				$this->session->set_userdata($newdata);

				if($ro == "Admin")
				{
					session_start();
					$_SESSION['Admin'] = $ro;
					redirect(base_url('kelolaKaryawan'));
				}
				else if($ro == "2")
				{
					session_start();
					$_SESSION['Leader'] = $ro;
					redirect(base_url('kelolaRole'));
				}
				else if($ro == "3")
				{
					session_start();
					$_SESSION['Freelancer'] = $ro;
					redirect(base_url('daftarPelatihan'));
				}
				else
				{
					echo "<script>alert('User atau password tidak terdaftar!');</script>";		
				}
			}
			else
			{		echo ("<script LANGUAGE='JavaScript'>
				window.alert('Username Atau Password Salah!');
				window.location.href='".base_url('Login')."';
				</script>");
			}
		}
		else
		{
			echo ("<script LANGUAGE='JavaScript'>
				window.alert('Username Atau Password Salah!');
				window.location.href='".base_url('Login')."';
				</script>");
		}
	}
}
