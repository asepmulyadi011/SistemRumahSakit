<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ricresume extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('iri/rimreservasi');
	}
	public function index(){
		$data['reservasi']='';
		$data['daftar']='';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='active';
		$data['kontrol']='';
		
		$this->load->view('iri/rivlink');
		$this->load->view('iri/rivheader');
		$this->load->view('iri/rivmenu', $data);
		$this->load->view('iri/rivresume');
		$this->load->view('iri/rivfooter');
	}
}
