<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ricpasien extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('iri/rimpasien');
	}
	public function index(){
		$data['reservasi']='';
		$data['daftar']='';
		$data['pasien']='active';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$this->load->view('iri/rivlink');
		$this->load->view('iri/rivheader');
		$this->load->view('iri/rivmenu', $data);
		$this->load->view('iri/rivpasien');
		$this->load->view('iri/rivfooter');
	}
	public function get_pasien_iri(){
		$result=$this->rimpasien->select_pasien_iri_all();
		$totalDataQuery=count($result);
		
		if($totalDataQuery==0){
			$data=Array();
		}
		
		for($i=0;$i<$totalDataQuery;$i++){
			$data[$i]['0']=$result[$i]['tgl_masuk']; // Tanggal Masuk
			$data[$i]['1']=$result[$i]['no_ipd']; // No. Register
			$data[$i]['2']=$result[$i]['nama']; // Nama
			$data[$i]['3']=$result[$i]['kelas']; // Kelas
			$data[$i]['4']=$result[$i]['bed']; // No. Bed
			$data[$i]['5']=$result[$i]['nmpembayarri']; // Penjamin
			$data[$i]['6']='-'; // Dokter Yang Merawat
			$data[$i]['7']='-'; // LOS
			$data[$i]['8']='-'; // Total Biaya
		}
		
		$json_data=array(
			"data"=>$data // total data array
		);
		echo json_encode($json_data); // send data as json format
	}
}
