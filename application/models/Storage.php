<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Storage extends CI_Model
{
    private $_table = "storage";

  public function getAll()
	{
		return $this->db->get($this->_table)->result();
  }

  public function getAllNotFull($idbarang)
  {
      $this->db->select('*')
              ->from('storage')
              ->where('status = 0 OR status = 1 AND id_barang = "'.$idbarang.'"');
      $query = $this->db->get();
      return $query->result();
  }

  public function getStorageByBarang($id_barang)
  {
      $this->db->select('*')
              ->from('storage')
              ->where('id_barang',$id_barang)
              ->order_by('tgl_masuk','ASC');
      $query = $this->db->get();
      return $query->result();
  }

    public function getByID($id_str)
    {
        $this->db->select('*')
                ->from('storage')
                ->where('id_storage',$id_str);
        $query = $this->db->get();
        return $query->row();
    }


    public function save()
    {
        $post = $this->input->post();
        $this->area = $post["area"];
        $this->racking = $post["racking"];
        $this->tingkat = $post["tingkat"];
        $this->jumlah = 0;
        $this->no_racking = $post["no_racking"];
        $this->keterangan = $post["keterangan"];
        $this->status = 0;
        return $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->area = $post["area"];
        $this->racking = $post["racking"];
        $this->tingkat = $post["tingkat"];
        $this->no_racking = $post["no_racking"];
        $this->keterangan = $post["keterangan"];

        $where = array(
        'id_storage' => $this->input->post("id_storage"),
        );

        $this->db->where($where);
        return $this->db->update($this->_table, $this);
    }



}
