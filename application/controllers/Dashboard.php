<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Barang_model', 'bm');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		// print_r($this->uri->segment(4));die;
		if ($this->uri->segment(3) == NULL) {
			$data['data_barang'] = $this->bm->getData('barang')->result();
		} else if ( $this->uri->segment(3) != NULL && $this->uri->segment(4) == "kat") {
			$w = array('barang.idKategori' => $this->uri->segment(3));
			$data['data_barang'] = $this->bm->getDataId('barang', $w)->result();
		}else{
			$w = array('barang.id_instansi' => $this->uri->segment(3));
			$data['data_barang'] = $this->bm->getDataId('barang', $w)->result();
		}
		$data['kat'] = $this->bm->getData('kategori')->result();
		$data['ins'] = $this->bm->getData('instansi')->result();
		$this->load->view('template/header', $data);
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}
}

/* End of file Dashboard.php */
