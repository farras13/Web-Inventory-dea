<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Barang_model', 'bm');
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->userdata('data_session') == NULL) {
			redirect('Dashboard','refresh');
		}
	}

	public function index()
	{
		error_reporting(0);
		$cari = $_GET['keyword'];
		if ($cari != null) {
			$data['data_barang'] = $this->bm->search($cari)->result();
		}else{
			$w = array ('barang.id_instansi' => $this->session->userdata['data_session']['level']);
			$data['data_barang'] = $this->bm->getDataId('barang', $w)->result();
		}
		$data['k'] = $this->bm->getData('kategori')->result();
		$data['in'] = $this->bm->getData('instansi')->result();
		$this->load->view('template/header', $data);
		$this->load->view('barang/index', $data);
		$this->load->view('template/footer');
	}

	public function Barang_ts()
	{
		$w = array ('status' => 'Tersedia', 'barang.id_instansi' => $this->session->userdata['data_session']['level']);
		$data['data_barang'] = $this->bm->getDataId('barang', $w)->result();
		$data['k'] = $this->bm->getData('kategori')->result();
		$data['in'] = $this->bm->getData('instansi')->result();
		$this->load->view('template/header');
		$this->load->view('barang/index',$data);
		$this->load->view('template/footer');	
	}

	public function Barang_dp()
	{
		$w = array ('status' => 'Dipinjam', 'barang.id_instansi' => $this->session->userdata['data_session']['level']);
		$data['data_barang'] = $this->bm->getDataId('barang', $w)->result();
		$data['k'] = $this->bm->getData('kategori')->result();
		$data['in'] = $this->bm->getData('instansi')->result();
		$this->load->view('template/header');
		$this->load->view('barang/index',$data);
		$this->load->view('template/footer');	
	}

	public function simpan_barang()
	{
		
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', $error['error']);
			redirect('Barang','refresh');
		}
		else{
			$ins = array(
				'nama_barang' => $this->input->post('nama_barang'),
				'id_instansi' => $this->input->post('id_instansi'),
				'idKategori' => $this->input->post('idKategori'),
				'foto' => $this->upload->data('file_name'),
				'keterangan' => $this->input->post('deskripsi'),
				'status' =>  $this->input->post('status'),
			);
			$this->bm->ins('barang', $ins);
			$this->session->set_flashdata('pesan', 'Data Berhasil ditambahkan!');
			redirect('Barang','refresh');
		}	
		
	}

	public function update_barang()
	{
		$w = array('id_barang' => $this->uri->segment(3));
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto')){
			$ins = array(
				'nama_barang' => $this->input->post('nama_barang'),
				'id_instansi' => $this->input->post('id_instansi'),
				'idKategori' => $this->input->post('idKategori'),				
				'keterangan' => $this->input->post('deskripsi'),
				'status' =>  $this->input->post('status'),
			);			
		}
		else{
			$ins = array(
				'nama_barang' => $this->input->post('nama_barang'),
				'id_instansi' => $this->input->post('id_instansi'),
				'idKategori' => $this->input->post('idKategori'),
				'foto' => $this->upload->data('file_name'),
				'keterangan' => $this->input->post('deskripsi'),
				'status' =>  $this->input->post('status'),
			);
		}	
		$this->bm->updData('barang', $ins, $w);
		$this->session->set_flashdata('pesan', 'Data Berhasil Diupdate!');
		redirect('Barang','refresh');
	}

	public function hapus_barang()
	{
		$w = array('id_barang' => $this->uri->segment(3));
		$this->bm->del('barang', $w);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
		redirect('Barang','refresh');
	}

}

/* End of file Barang.php */
