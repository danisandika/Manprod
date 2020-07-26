<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class DbMasterKaryawan extends CI_Model
{
	private $_table = "karyawan";

	public function getByUsernamePassword()
	{
		$post1 = $this->input->post();
		$username = $post1["txtusername"];
		$password = $post1["txtPassword"];
		$array = array('username' => $username, 'pass' => $password);
		$query = $this->db->get_where($this->_table,$array);
		return $query->row();
	}

	public function getRole($id){
		$array = array('id_role' => $id);
		$query = $this->db->get_where('role',$array);
		return $query->row();
	}
}
?>
