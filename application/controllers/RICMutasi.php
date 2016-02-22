<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RICMutasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$data['reservasi']='';
		$data['daftar']='';
		$data['pendaftaran']='';
		$data['pasien']='';
		$data['mutasi']='active';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$this->load->view('RIVLink');
		$this->load->view('RIVHeader');
		$this->load->view('RIVMenu', $data);
	}
	public function index(){	
		$this->load->view('RIVMutasi');
	}
	public function insert_mutasi(){
		$this->session->set_flashdata('pesan_mutasi',
		"<div class='alert bg-success alert-success' role='alert'>
			<svg class='glyph stroked checkmark'><use xlink:href='#stroked-checkmark'></use></svg> Data tersimpan! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		</div>");
		
		redirect('RICMutasi');
	}
}
