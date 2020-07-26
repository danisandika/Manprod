<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_role extends CI_Model
{
    private $_table = "role";

    public function getAll()
	{
		return $this->db->get($this->_table)->result();
    }

    public function getData()
    {
        $query = $this->db->get('role');
        return $query;
    }

    public function getByID($id_role)
    {
        $this->db->select('*')
                ->from('role')
                ->where('id_role',$id_role);
        $query = $this->db->get();
        return $query->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_role = $post["nama_role"];
        $this->deskripsi = $post["deskripsi"];
        return $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama_role = $post["nama_role"];
        $this->deskripsi = $post["deskripsi"];

        $where = array(
        'id_role' => $this->input->post("id_role"),
        );

        $this->db->where($where);
        return $this->db->update($this->_table, $this);
    }


    public function hapus($id_role)
    {

        $where = array(
        'id_role' => $id_role,
        );
        $this->db->where($where);
        return $this->db->delete($this->_table, $this);
    }

    // public function aktif($id_role)
    // {
    //     $this->status = 1;

    //     $where = array(
    //     'id_barang' => $id_barang,
    //     );
    //     $this->db->where($where);
    //     return $this->db->update($this->_table, $this);
    // }
}
