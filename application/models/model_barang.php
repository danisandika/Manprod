<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_barang extends CI_Model
{
    private $_table = "barang";

    public function getAll()
	  {
		    return $this->db->get($this->_table)->result();
    }

    public function getBarangNotNull(){
      $this->db->select('*')
              ->from('barang')
              ->where('qty !=',0);
      $query = $this->db->get();
      return $query->result();
    }

    public function barang_habis_stok(){
      $this->db->where('qty < batas_stok');
      $this->db->or_where('qty',0);
      $this->db->from('barang');
      return $this->db->count_all_results(); // Produces an integer, like 17
    }

    public function getByID($id_barang)
    {
        $this->db->select('*')
                ->from('barang')
                ->where('id_barang',$id_barang);
        $query = $this->db->get();
        return $query->row();
    }

    public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(barcode_string) as barcode_string from barang");
        $hasil = $query->row();
        return $hasil->barcode_string;
    }

    public function save()
    {
        $barcodeString = $this->cekkodebarang();
        $nobarcode = substr($barcodeString,3,4);
        $nobarcodeInt = $nobarcode+1;
        $nobarcodeFix = "BRG".sprintf("%04s", $nobarcodeInt);

        $post = $this->input->post();
        $this->nama_barang = $post["nama_barang"];
        $this->jenis_barang = $post["jenis_barang"];
        $this->qty = 0;
        $this->batas_stok = $post["batas_stok"];
        $this->satuan = $post["satuan"];
        $this->kemasan = $post["kemasan"];
        $this->keterangan = $post["keterangan"];
		    $this->tgl_daftar = date('Y-m-d');
		    $this->status = 1;
        $this->barcode_string = $nobarcodeFix;
        $this->barcode = $this->cetakBarcode($nobarcodeFix);

        return $this->db->insert($this->_table,$this);
    }

    public function cetakBarcode($nama){
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$nama), array())->draw();
        $image_name     = $nama.'.jpg';
        $image_dir      = './assets/image_barcode/'; // penyimpanan file barcode
        imagejpeg($image_resource, $image_dir.$image_name);

        return $image_name;
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama_barang = $post["nama_barang"];
        $this->jenis_barang = $post["jenis_barang"];
        $this->satuan = $post["satuan"];
        $this->kemasan = $post["kemasan"];
        $this->batas_stok = $post["batas_stok"];
        $this->keterangan = $post["keterangan"];

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
