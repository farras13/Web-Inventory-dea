<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Peminjaman_model', 'pm');
		date_default_timezone_set('Asia/Jakarta');
	}	

	public function index()
	{
		$w = array ('id_barang' => $this->uri->segment(3));
		$data['barang'] = $this->pm->getDataId('barang', $w)->row();
		
		$this->load->view('template/header');
		$this->load->view('peminjaman/form',$data);
		$this->load->view('template/footer');		
	}

	public function pengajuan()
	{
		$w = array ('peminjam.status' => "mengajukan");
		$data['peminjam'] = $this->pm->getData('peminjam', $w)->result();
		
		$this->load->view('template/header');
		$this->load->view('peminjaman/peminjam',$data);
		$this->load->view('template/footer');		
	}

	public function diambil()
	{
		$w = array ('peminjam.status' => "Diambil");
		$data['peminjam'] = $this->pm->getData('peminjam', $w)->result();
		
		$this->load->view('template/header');
		$this->load->view('peminjaman/peminjam',$data);
		$this->load->view('template/footer');		
	}

	public function onproses()
	{
		$w = array ('peminjam.status' => "Dipakai");
		$data['peminjam'] = $this->pm->getData('peminjam', $w)->result();
		
		$this->load->view('template/header');
		$this->load->view('peminjaman/peminjam',$data);
		$this->load->view('template/footer');		
	}

	public function dikembalikan()
	{
		$w = array ('peminjam.status' => "Dikembalikan");
		$data['peminjam'] = $this->pm->getData('peminjam', $w)->result();
		
		$this->load->view('template/header');
		$this->load->view('peminjaman/peminjam',$data);
		$this->load->view('template/footer');		
	}

	public function ditolak()
	{
		$w = array ('peminjam.status' => "Ditolak");
		$data['peminjam'] = $this->pm->getData('peminjam', $w)->result();
		
		$this->load->view('template/header');
		$this->load->view('peminjaman/peminjam',$data);
		$this->load->view('template/footer');		
	}
	public function print()
	{
		$w = array ('peminjam.status' => "Dikembalikan");
		$data['pp'] = $this->pm->getData('peminjam', $w)->result();
		$mpdf = new \Mpdf\Mpdf();
		$html= $this->load->view('peminjaman/print', $data, TRUE);
		$mpdf->WriteHTML($html);
		// $mpdf->Output();
		$mpdf->Output('invoice.pdf','D');

	}
	public function ins_pengajuan()
	{				
		$ins = array(
			'nip' => $this->input->post('nip'), 
			'nama_peminjam' => $this->input->post('nama'), 
			'no_hp' => $this->input->post('hp'), 
			'tgl_pinjam' => $this->input->post('pinjam'), 
			'tgl_kembali' => $this->input->post('bali'), 
			'tgl_pengajuan' => date('Y-m-d'), 
			'keperluan' => $this->input->post('ket'), 
			'id_barang' => $this->input->post('idbrg'), 
			'status' => 'mengajukan' 
		);
		
		$this->pm->ins('peminjam', $ins);
		
		$this->session->set_flashdata('pesan', 'Pengajuan berhasil ! Mohon tunggu konfrimasi selanjutnya via WA!');
		
		redirect('Dashboard','refresh');
		
	}
	public function status_upd()
	{				
		$upd = array('status' => $this->uri->segment(3));
		$w = array('id_peminjam' => $this->uri->segment(4));
		
		$this->pm->upd('peminjam', $upd, $w);
		
		$this->session->set_flashdata('pesan', 'Pengajuan telah di Update!');
		
		redirect('Peminjaman/pengajuan','refresh');
		
	}

}

/* End of file Peminjaman.php */