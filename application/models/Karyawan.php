<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Model
{
  private $_table = "karyawan";


  public function __construct()
  {
        parent::__construct();
  }

  public function getAll()
  {
     $this->db->select('*')
             ->from('karyawan');
    $query = $this->db->get();
    return $query->result();
  }

  public function getByID($id_kry)
  {
    $this->db->select('*')
             ->from('karyawan')
             ->where('id_kry',$id_kry);
    $query = $this->db->get();
    return $query->row();
  }

  public function save()
  {
    $post = $this->input->post();
    $this->nama_kry = $post["nama_kry"];
    $this->username = $post["username"];
    $this->pass = $post["pass"];
    $this->email_kry = $post["email_kry"];
    $this->sex = $post["sex"];
    $this->role = $post["role"];
    $this->status = $post["status"];
		return $this->db->insert($this->_table,$this);


  }

  public function update()
  {
    $post = $this->input->post();
    $this->nama_kry = $post["nama_kry"];
    $this->username = $post["username"];
    $this->pass = $post["pass"];
    $this->email_kry = $post["email_kry"];
    $this->sex = $post["sex"];
    $this->role = $post["role"];
    //$this->status = $post["status"];

    $where = array(
      'id_kry' => $this->input->post("id_kry"),
    );

    $this->db->where($where);
    return $this->db->update($this->_table, $this);
  }


  public function hapus($id_kry)
  {
    $this->status = 0;

    $where = array(
    'id_kry' => $id_kry,
    );
    $this->db->where($where);
    return $this->db->update($this->_table, $this);
  }

  public function aktif($id_kry)
  {
    $this->status = 1;

    $where = array(
    'id_kry' => $id_kry,
    );
    $this->db->where($where);
    return $this->db->update($this->_table, $this);
  }

}

?>
