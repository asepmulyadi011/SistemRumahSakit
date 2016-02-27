<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ricmutasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('mrawatinap/rimreservasi');
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
		
		$this->load->view('vrawatinap/rivlink');
		$this->load->view('vrawatinap/rivheader');
		$this->load->view('vrawatinap/rivmenu', $data);
		$this->load->view('vrawatinap/rivmutasi');
		$this->load->view('vrawatinap/rivfooter');
	}
	public function insert_mutasi(){
		$this->session->set_flashdata('pesan',
		"<div class='alert alert-success alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<i class='icon fa fa-check'></i> Data telah tersimpan!
		</div>");
		
		redirect('crawatinap/ricmutasi');
	}
}
