<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek($t, $w)
	{		
		// $this->db->join('instansi', 'instansi.id_instansi = petugas.id_instansi', 'left');
		$this->db->where($w);
		return $this->db->get($t);
	}

}

/* End of file Login_model.php */

