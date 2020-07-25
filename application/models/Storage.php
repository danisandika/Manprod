<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Storage extends CI_Model
{
    private $_table = "storage";

    public function getAll()
	{
		return $this->db->get($this->_table)->result();
    }
    
    public function getByID($id_str)
    {
        $this->db->select('*')
                ->from('storage')
                ->where('id_str',$id_str);
        $query = $this->db->get();
        return $query->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_str = $post["nama_str"];
        $posisi = $post["posisi"] . "-" . $post["Lantai"];
        $this->posisi = $posisi;
        $this->keterangan = $post["keterangan"];
        $this->status = $post["status"];
        return $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama_str = $post["nama_str"];
        $posisi = $post["posisi"] . "-" . $post["Lantai"];
        $this->posisi = $posisi;
        $this->keterangan = $post["keterangan"];
        $this->status = $post["status"];

        $where = array(
        'id_str' => $this->input->post("id_str"),
        );
        
        $this->db->where($where);
        return $this->db->update($this->_table, $this);
    }


    public function hapus($id_str)
    {
        $this->status = 0;
        
        $where = array(
        'id_str' => $id_str,
        );
        $this->db->where($where);
        return $this->db->update($this->_table, $this);
    }

    public function aktif($id_str)
    {
        $this->status = 1;
        
        $where = array(
        'id_str' => $id_str,
        );
        $this->db->where($where);
        return $this->db->update($this->_table, $this);
    }
}