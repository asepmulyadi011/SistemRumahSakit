<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RICKontrol extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$data['reservasi']='';
		$data['daftar']='';
		$data['pendaftaran']='';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='active';
		
		$this->load->view('RIVLink');
		$this->load->view('RIVHeader');
		$this->load->view('RIVMenu', $data);
		
		$this->load->model('RIMReservasi');
	}
	public function index(){		
		$this->load->view('RIVKontrol');
	}
}