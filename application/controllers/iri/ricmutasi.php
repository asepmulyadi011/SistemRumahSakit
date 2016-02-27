<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ricmutasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('iri/rimreservasi');
	}
	public function index(){
		$data['reservasi']='';
		$data['daftar']='';
		$data['pendaftaran']='';
		$data['pasien']='';
		$data['mutasi']='active';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$this->load->view('iri/rivlink');
		$this->load->view('iri/rivheader');
		$this->load->view('iri/rivmenu', $data);
		$this->load->view('iri/rivmutasi');
		$this->load->view('iri/rivfooter');
	}
	public function insert_mutasi(){
		$this->session->set_flashdata('pesan',
		"<div class='alert alert-success alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<i class='icon fa fa-check'></i> Data telah tersimpan!
		</div>");
		
		redirect('iri/ricmutasi');
	}
}
