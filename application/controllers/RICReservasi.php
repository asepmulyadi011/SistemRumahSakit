<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RICReservasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$data['reservasi']='active';
		$data['daftar']='';
		$data['pendaftaran']='';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$this->load->view('RIVLink');
		$this->load->view('RIVHeader');
		$this->load->view('RIVMenu', $data);
		
		$this->load->model('RIMReservasi');	
	}
	public function index(){
		$data['stasal1'] = 'selected';
		$data['stasal2'] = '';
		$data['stasal3'] = '';
		
		$pasien_iri = $this->RIMReservasi->select_pasien_iri()->result();
		$data['noantrian'] = 'RI'.sprintf("%08d", (count($pasien_iri)+1));
		
		$data['strujukan1'] = 'selected';
		
		$this->load->view('RIVReservasi', $data);
	}
	public function insert_reservasi(){
		$this->session->set_flashdata('pesan',
		"<div class='alert bg-success alert-success' role='alert'>
			<svg class='glyph stroked checkmark'><use xlink:href='#stroked-checkmark'></use></svg> Data tersimpan! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		</div>");
		
		redirect('RICReservasi');
	}
	public function insert_rencana_masuk(){
		$this->session->set_flashdata('pesan',
		"<div class='alert bg-success alert-success' role='alert'>
			<svg class='glyph stroked checkmark'><use xlink:href='#stroked-checkmark'></use></svg> Data tersimpan! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		</div>");
		
		redirect('RICReservasi');
	}
	public function insert_belum_approve(){
		$this->session->set_flashdata('pesan',
		"<div class='alert bg-success alert-success' role='alert'>
			<svg class='glyph stroked checkmark'><use xlink:href='#stroked-checkmark'></use></svg> Data tersimpan! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		</div>");
		
		redirect('RICReservasi');
	}
}
