<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_supplier extends CI_Model
{
    private $_table = "supplier";

    public function getAll()
	{
		return $this->db->get($this->_table)->result();
    }

    public function getData()
    {
        $query = $this->db->get('supplier');
        return $query;
    }

    public function getByID($id_supplier)
    {
        $this->db->select('*')
                ->from('supplier')
                ->where('id_supplier',$id_supplier);
        $query = $this->db->get();
        return $query->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_perusahaan = $post["nama_perusahaan"];
        $this->nama_contact_person = $post["nama_contact_person"];
        $this->alamat = $post["alamat"];
        $this->no_telp = $post["no_telp"];
        $this->email = $post["email"];
        $this->status = 1;
        return $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama_perusahaan = $post["nama_perusahaan"];
        $this->nama_contact_person = $post["nama_contact_person"];
        $this->alamat = $post["alamat"];
        $this->no_telp = $post["no_telp"];
        $this->email = $post["email"];
        $this->status = 1;

        $where = array(
        'id_supplier' => $this->input->post("id_supplier"),
        );

        $this->db->where($where);
        return $this->db->update($this->_table, $this);
    }


    public function hapus($id_supplier)
    {
        $this->status = 0;

        $where = array(
        'id_supplier' => $id_supplier,
        );
        $this->db->where($where);
        return $this->db->update($this->_table, $this);
    }

    public function aktif($id_supplier)
    {
        $this->status = 1;

        $where = array(
        'id_supplier' => $id_supplier,
        );
        $this->db->where($where);
        return $this->db->update($this->_table, $this);
    }
}
