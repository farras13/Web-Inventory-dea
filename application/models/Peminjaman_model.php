<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

	public function getData($t, $w)
	{
		$this->db->select($t.'.*, barang.id_barang, barang.nama_barang');		
		$this->db->where($w);
		$this->db->join('barang', 'barang.id_barang = ' . $t . '.id_barang', 'left');
		return $this->db->get($t);
	}
	
	public function getDataId($t, $w)
	{		
		$this->db->where($w);		
		return $this->db->get($t);
	}

	public function ins($t , $object)
	{
		$this->db->insert($t, $object);
	}

	public function upd($t, $object, $w)
	{
		$this->db->update($t, $object, $w);
	}

	public function del($t, $w)
	{
		$this->db->delete($t, $w);
	}

}

/* End of file Peminjaman_model.php */

