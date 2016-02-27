<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ricresume extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('mrawatinap/rimreservasi');
	}
	public function index(){
		$data['reservasi']='';
		$data['daftar']='';
		$data['pendaftaran']='';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='active';
		$data['kontrol']='';
		
		$this->load->view('vrawatinap/rivlink');
		$this->load->view('vrawatinap/rivheader');
		$this->load->view('vrawatinap/rivmenu', $data);
		$this->load->view('vrawatinap/rivresume');
		$this->load->view('vrawatinap/rivfooter');
	}
}
