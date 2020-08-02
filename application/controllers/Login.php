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
				$idrole = $user->getRole($data->id_role);
				$id = $data->id_kry;
				$email = $data->email_kry;
				$nama = $data->nama_kry;
				$ro = $idrole->nama_role;

				$newdata = array(
					'user_id' => $id,
					'user_email' => $email,
					'user_nama' => $nama,
					'user_role' => $ro,
				);

				$this->session->set_userdata($newdata);

				if($ro == "Admin")
				{
					session_start();
					$_SESSION['Admin'] = $ro;
					redirect(base_url('Dashboard/index'));
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
