<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ricmutasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('iri/rimmutasi');
	}
	public function index($noreservasi=''){
		$data['reservasi']='';
		$data['daftar']='active';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$data_reservasi['irna_antrian']=$this->rimmutasi->select_irna_antrian_by_noreservasi($noreservasi);
		$data_reservasi['pasien_iri']=$this->rimmutasi->select_pasien_iri_by_no_ipd($data_reservasi['irna_antrian'][0]['no_register_asal']);
		
		$this->load->view('iri/rivlink');
		$this->load->view('iri/rivheader');
		$this->load->view('iri/rivmenu', $data);
		$this->load->view('iri/rivmutasi', $data_reservasi);
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
