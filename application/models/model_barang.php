<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_barang extends CI_Model
{
    private $_table = "barang";

    public function getAll()
	{
		return $this->db->get($this->_table)->result();
    }

    public function getData()
    {
        $query = $this->db->get('barang');
        return $query; 
    }
    
    public function getByID($id_barang)
    {
        $this->db->select('*')
                ->from('barang')
                ->where('id_barang',$id_barang);
        $query = $this->db->get();
        return $query->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_barang = $post["nama_barang"];
        $this->jenis_barang = $post["jenis_barang"];
        $this->qty = $post["qty"];
        $this->keterangan = $post["keterangan"];
		$this->tgl_daftar = $post["tgl_daftar"];
		$this->status = $post["status"];
        return $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama_barang = $post["nama_barang"];
        $this->jenis_barang = $post["jenis_barang"];
        $this->qty = $post["qty"];
        $this->keterangan = $post["keterangan"];
		$this->tgl_daftar = $post["tgl_daftar"];
		$this->status = $post["status"];

        $where = array(
        'id_barang' => $this->input->post("id_barang"),
        );
        
        $this->db->where($where);
        return $this->db->update($this->_table, $this);
    }


    public function hapus($id_barang)
    {
        $this->status = 0;
        
        $where = array(
        'id_barang' => $id_barang,
        );
        $this->db->where($where);
        return $this->db->update($this->_table, $this);
    }

    public function aktif($id_barang)
    {
        $this->status = 1;
        
        $where = array(
        'id_barang' => $id_barang,
        );
        $this->db->where($where);
        return $this->db->update($this->_table, $this);
    }
}