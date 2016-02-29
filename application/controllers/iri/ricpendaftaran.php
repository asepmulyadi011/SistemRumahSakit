<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ricpendaftaran extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('iri/rimpendaftaran');
	}
	public function index($noreservasi=''){
		$data['reservasi']='';
		$data['daftar']='';
		$data['pendaftaran']='active';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$data_reservasi['irna_reservasi']=$this->rimpendaftaran->select_irna_antrian_by_noreservasi($noreservasi);
		
		$this->load->view('iri/rivlink');
		$this->load->view('iri/rivheader');
		$this->load->view('iri/rivmenu', $data);
		$this->load->view('iri/rivpendaftaran', $data_reservasi);
		$this->load->view('iri/rivfooter');
	}
	public function insert_pendaftaran(){
		$this->session->set_flashdata('pesan',
		"<div class='alert alert-success alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<i class='icon fa fa-check'></i> Data telah tersimpan!
		</div>");
		
		redirect('iri/ricpendaftaran');
	}
}
