<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{

	public function getData($t)
	{
		return $this->db->get($t);
	}
}

/* End of file Barang_model.php */
