<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
	public function getData($t)
	{
		return $this->db->get($t);
	}

	public function getBarang($t)
	{
		$this->db->join('instansi', 'instansi.id_instansi = ' . $t . '.id_instansi', 'left');
		$this->db->join('kategori', 'kategori.idKategori = ' . $t . '.idKategori', 'left');
		return $this->db->get($t);
	}

	public function getDataId($t, $w)
	{
		$this->db->join('instansi', 'instansi.id_instansi = ' . $t . '.id_instansi', 'left');
		$this->db->join('kategori', 'kategori.idKategori = ' . $t . '.idKategori', 'left');
		$this->db->where($w);
		return $this->db->get($t);
	}

	public function search($cari)
	{
		return $this->db->query("SELECT * FROM barang as b
		JOIN instansi as i on i.id_instansi = b.id_instansi
		JOIN kategori as k on k.idKategori = b.idKategori
		WHERE b.id_barang LIKE '%" . $cari . "%' OR 
		b.nama_barang LIKE '%" . $cari . "%' OR 
		b.status LIKE '%" . $cari . "%' OR
		b.keterangan LIKE '%" . $cari . "%' OR
		i.nama_instansi LIKE '%" . $cari . "%' OR
		k.kategori LIKE '%" . $cari . "%' ");
	}

	public function ins($t, $object)
	{
		$this->db->insert($t, $object);
	}

	public function updData($t, $object, $w)
	{
		$this->db->update($t, $object, $w);
	}

	public function del($t, $w)
	{
		$this->db->delete($t, $w);
	}
}

/* End of file Barang_model.php */
