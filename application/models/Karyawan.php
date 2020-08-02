<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Model
{
  private $_table = "karyawan";


  public function __construct()
  {
        parent::__construct();
  }


  public function getByID($id_kry)
  {
    $this->db->select('*')
             ->from('karyawan')
             ->where('id_kry',$id_kry);
    $query = $this->db->get();
    return $query->row();
  }

  public function getKaryawanTransaksiPengambilan()
  {
    $role = array('Staff', 'Admin');
    $this->db->select('k.*,r.nama_role as role')
             ->from('karyawan k')
             ->join('role r','r.id_role=k.id_role')
             ->where('k.status',1)
             ->where_not_in('nama_role',$role);
    $query = $this->db->get();
    return $query->result();
  }


  public function getAll()
  {
     $this->db->select('*')
             ->from('karyawan')
             ->join('role', 'role.id_role=karyawan.id_role');
    $query = $this->db->get();
    return $query->result();
  }

  function get_role(){
        $hasil=$this->db->query("SELECT * FROM role");
        return $hasil;
    }


  public function save()
  {
    $post = $this->input->post();
    $this->nama_kry = $post["nama_kry"];
    $this->username = $post["username"];
    $this->pass = "GUDANG".date('Y');
    $this->email_kry = $post["email_kry"];
    $this->sex = $post["sex"];
    $this->id_role = $post["id_role"];
    $this->status = 1;
		return $this->db->insert($this->_table,$this);


  }

  public function update()
  {
    $post = $this->input->post();
    $this->nama_kry = $post["nama_kry"];
    $this->username = $post["username"];
    $this->email_kry = $post["email_kry"];
    $this->sex = $post["sex"];
    $this->id_role = $post["role"];

    $where = array(
      'id_kry' => $this->input->post("id_kry"),
    );

    $this->db->where($where);
    return $this->db->update($this->_table, $this);
  }

  public function updateProfile()
  {
    $post = $this->input->post();
    $this->nama_kry = $post["nama_kry"];
    $this->username = $post["username"];
    $this->email_kry = $post["email_kry"];
    $this->sex = $post["sex"];
    $where = array(
      'id_kry' => $this->input->post("id_kry"),
    );

    $this->db->where($where);
    return $this->db->update($this->_table, $this);
  }

  public function updatePassword()
  {
    $post = $this->input->post();
    $this->pass = $post["txtrePassword"];
    $where = array(
      'id_kry' => $this->input->post("id"),
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
