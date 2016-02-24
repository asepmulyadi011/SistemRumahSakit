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
		
		$this->load->model('RIMReservasi');
	}
	public function index(){
		$this->load->view('RIVMutasi');
		
		$this->load->view('RIVFooter');
	}
	public function insert_mutasi(){
		$this->session->set_flashdata('pesan',
		"<div class='alert alert-success alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<i class='icon fa fa-check'></i> Data telah tersimpan!
		</div>");
		
		redirect('RICMutasi');
	}
}
